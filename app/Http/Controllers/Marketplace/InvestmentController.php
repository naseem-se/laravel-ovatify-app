<?php

namespace App\Http\Controllers\Marketplace;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceInvestment;
use App\Models\MarketplaceAsset;
use App\Models\MarketplaceTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    /**
     * Get user's investment details with earnings
     */
    public function getInvestmentDetails(Request $request, int $investmentId): JsonResponse
    {
        try {
            $user = $request->user();

            $investment = MarketplaceInvestment::where('user_id', $user->id)
                ->with('asset:id,title,asset_type,total_valuation,price_per_block,max_available_blocks')
                ->findOrFail($investmentId);

            // Calculate earnings
            $earnings = $this->calculateInvestmentEarnings($investment);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $investment->id,
                    'asset' => $investment->asset,
                    'blocks_purchased' => (int)$investment->blocks_purchased,
                    'investment_amount' => (float)$investment->investment_amount,
                    'ownership_percentage' => $this->calculateOwnershipPercentage($investment),
                    'invested_at' => $investment->created_at,
                    'earnings' => $earnings,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Investment not found',
            ], 404);
        }
    }

    /**
     * Get all user investments with earnings
     */
    public function getAllInvestments(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            $investments = MarketplaceInvestment::where('user_id', $user->id)
                ->with('asset:id,title,asset_type,total_valuation,price_per_block,max_available_blocks')
                ->orderByDesc('created_at')
                ->paginate(15);

            $investments->getCollection()->transform(function ($investment) {
                return [
                    'id' => $investment->id,
                    'asset' => $investment->asset,
                    'blocks_purchased' => (int)$investment->blocks_purchased,
                    'investment_amount' => (float)$investment->investment_amount,
                    'ownership_percentage' => $this->calculateOwnershipPercentage($investment),
                    'invested_at' => $investment->created_at,
                    'earnings' => $this->calculateInvestmentEarnings($investment),
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $investments->items(),
                'pagination' => [
                    'total' => $investments->total(),
                    'per_page' => $investments->perPage(),
                    'current_page' => $investments->currentPage(),
                    'last_page' => $investments->lastPage(),
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch investments',
            ], 500);
        }
    }

    /**
     * Calculate investment earnings based on asset transactions
     */
    private function calculateInvestmentEarnings(MarketplaceInvestment $investment): array
    {
        $asset = $investment->asset;

        // Base investment amount
        $investmentAmount = (float)$investment->investment_amount;

        // Get current asset sales/revenue (excluding investments)
        $assetRevenue = MarketplaceTransaction::where('marketplace_asset_id', $asset->id)
            ->where('status', 'completed')
            ->where('transaction_type', '!=', 'investment')
            ->sum('amount');

        $assetRevenue = (float)$assetRevenue;

        // Get total investment in this asset
        $totalInvestment = MarketplaceInvestment::where('marketplace_asset_id', $asset->id)
            ->sum('investment_amount');

        $totalInvestment = (float)$totalInvestment;

        // Calculate user's share of revenue
        $userSharePercentage = $totalInvestment > 0 ? ($investmentAmount / $totalInvestment) * 100 : 0;

        // Calculate earnings based on revenue share (after platform fee)
        $platformFeePercentage = 5; // Platform keeps 5%
        $revenueAfterFee = $assetRevenue * ((100 - $platformFeePercentage) / 100);
        $userEarnings = ($revenueAfterFee * $userSharePercentage) / 100;

        // Calculate pending earnings (total earned minus investment)
        $pendingEarnings = $userEarnings - $investmentAmount;
        $pendingEarnings = max(0, $pendingEarnings); // Don't show negative

        // Calculate ROI
        $roi = $investmentAmount > 0 ? (($userEarnings / $investmentAmount) * 100) : 0;

        // Get investment transactions count
        $transactionsCount = MarketplaceTransaction::where('marketplace_asset_id', $asset->id)
            ->where('status', 'completed')
            ->where('transaction_type', '!=', 'investment')
            ->count();

        // Days since investment
        $daysSinceInvestment = $investment->created_at->diffInDays(now());
        $daysSinceInvestment = max(1, $daysSinceInvestment); // At least 1 day

        // Expected monthly earning based on daily average
        $dailyEarning = $userEarnings / $daysSinceInvestment;
        $expectedMonthlyEarning = $dailyEarning * 30;

        return [
            'total_earned' => round($userEarnings, 2),
            'invested_amount' => round($investmentAmount, 2),
            'pending_earnings' => round($pendingEarnings, 2),
            'roi_percentage' => round($roi, 2),
            'ownership_share_percentage' => round($userSharePercentage, 2),
            'asset_total_revenue' => round($assetRevenue, 2),
            'transactions_count' => $transactionsCount,
            'days_invested' => $daysSinceInvestment,
            'expected_monthly_earning' => round($expectedMonthlyEarning, 2),
            'expected_daily_earning' => round($dailyEarning, 2),
        ];
    }

    /**
     * Calculate ownership percentage
     */
    private function calculateOwnershipPercentage(MarketplaceInvestment $investment): float
    {
        $asset = $investment->asset;

        if (!$asset->max_available_blocks || $asset->max_available_blocks == 0) {
            return 0;
        }

        return round(($investment->blocks_purchased / $asset->max_available_blocks) * 100, 2);
    }

    /**
     * Get investment dashboard summary
     */
    public function getInvestmentSummary(Request $request): JsonResponse
    {
        try {
            $user = $request->user();

            $investments = MarketplaceInvestment::where('user_id', $user->id)
                ->with('asset:id,title,total_valuation')
                ->get();

            $totalInvested = (float)$investments->sum('investment_amount');
            $totalEarned = 0;
            $totalPending = 0;
            $averageRoi = 0;

            foreach ($investments as $investment) {
                $earnings = $this->calculateInvestmentEarnings($investment);
                $totalEarned += $earnings['total_earned'];
                $totalPending += $earnings['pending_earnings'];
            }

            // Calculate average ROI
            if ($totalInvested > 0) {
                $averageRoi = (($totalEarned / $totalInvested) * 100);
            }

            return response()->json([
                'success' => true,
                'summary' => [
                    'total_invested' => round($totalInvested, 2),
                    'total_earned' => round($totalEarned, 2),
                    'total_pending' => round($totalPending, 2),
                    'total_profit' => round(($totalEarned - $totalInvested), 2),
                    'average_roi' => round($averageRoi, 2),
                    'total_investments' => $investments->count(),
                ],
                'investments' => $investments->map(function ($investment) {
                    return [
                        'id' => $investment->id,
                        'asset_title' => $investment->asset->title,
                        'blocks_purchased' => (int)$investment->blocks_purchased,
                        'investment_amount' => round((float)$investment->investment_amount, 2),
                        'ownership_percentage' => $this->calculateOwnershipPercentage($investment),
                        'earnings' => $this->calculateInvestmentEarnings($investment),
                        'invested_at' => $investment->created_at,
                    ];
                })->toArray(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch investment summary',
            ], 500);
        }
    }

    /**
     * Get investment earning history
     */
    public function getEarningHistory(Request $request, int $investmentId): JsonResponse
    {
        try {
            $user = $request->user();

            $investment = MarketplaceInvestment::where('user_id', $user->id)
                ->with('asset:id,title')
                ->findOrFail($investmentId);

            // Get all transactions for this asset
            $transactions = MarketplaceTransaction::where('marketplace_asset_id', $investment->marketplace_asset_id)
                ->where('status', 'completed')
                ->where('transaction_type', '!=', 'investment')
                ->orderByDesc('created_at')
                ->get();

            // Calculate cumulative earnings per transaction
            $totalInvestment = MarketplaceInvestment::where('marketplace_asset_id', $investment->marketplace_asset_id)
                ->sum('investment_amount');

            $userSharePercentage = $totalInvestment > 0 
                ? (($investment->investment_amount / $totalInvestment) * 100) 
                : 0;

            $platformFeePercentage = 5;
            $cumulativeEarnings = 0;

            $earningHistory = $transactions->map(function ($transaction) use ($userSharePercentage, $platformFeePercentage, &$cumulativeEarnings) {
                $transactionAmount = (float)$transaction->amount;
                $revenueAfterFee = $transactionAmount * ((100 - $platformFeePercentage) / 100);
                $earningFromTransaction = ($revenueAfterFee * $userSharePercentage) / 100;
                $cumulativeEarnings += $earningFromTransaction;

                return [
                    'transaction_id' => $transaction->id,
                    'type' => $transaction->transaction_type,
                    'amount' => round($transactionAmount, 2),
                    'earning_from_this' => round($earningFromTransaction, 2),
                    'cumulative_earning' => round($cumulativeEarnings, 2),
                    'date' => $transaction->completed_at,
                ];
            })->toArray();

            return response()->json([
                'success' => true,
                'asset' => $investment->asset,
                'investment_amount' => round((float)$investment->investment_amount, 2),
                'ownership_share_percentage' => round($userSharePercentage, 2),
                'earning_history' => $earningHistory,
                'total_transactions' => count($earningHistory),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch earning history',
            ], 500);
        }
    }
}