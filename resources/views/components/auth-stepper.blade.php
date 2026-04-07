@props(['currentStep' => 1])

@php
    $steps = [
        ['number' => 1, 'label' => 'Select', 'icon' => 'fas fa-user-plus'],
        ['number' => 2, 'label' => 'Details', 'icon' => 'fas fa-id-card'],
        ['number' => 3, 'label' => 'Verify', 'icon' => 'fas fa-shield-alt'],
        ['number' => 4, 'label' => 'Success', 'icon' => 'fas fa-check-double'],
    ];

    $progressPercentage = (($currentStep - 1) / (count($steps) - 1)) * 100;
@endphp

<div class="w-full mb-12">
    <div class="relative flex justify-between items-center max-w-[600px] mx-auto">
        {{-- Progress Line Background --}}
        <div class="absolute top-[28px] left-[10%] right-[10%] h-[2px] bg-white/5 -z-10"></div>

        {{-- Active Progress Line --}}
        <div class="absolute top-[28px] left-[10%] h-[2px] bg-gradient-to-r from-[#4D61FF] to-[#FF00FF] transition-all duration-700 ease-in-out -z-10"
            style="width: calc({{ $progressPercentage }}% * 0.8)">
        </div>

        @foreach($steps as $step)
            @php
                $isActive = $step['number'] == $currentStep;
                $isCompleted = $step['number'] < $currentStep;
            @endphp

            <div class="flex flex-col items-center gap-4 group">
                {{-- Step Indicator --}}
                <div @class([
                    'w-14 h-14 rounded-2xl flex items-center justify-center transition-all duration-500 border-2',
                    'bg-[#4D61FF] border-[#4D61FF] shadow-[0_0_20px_rgba(77,97,255,0.4)] scale-110 step-active' => $isActive,
                    'bg-[#141414] border-magenta shadow-[0_0_15px_rgba(255,0,255,0.2)]' => $isCompleted,
                    'bg-[#141414] border-white/5' => !$isActive && !$isCompleted,
                ])>
                    @if($isCompleted)
                        <i class="fas fa-check text-magenta text-[16px]"></i>
                    @else
                        <i class="{{ $step['icon'] }} {{ $isActive ? 'text-white' : 'text-white/20' }} text-[18px]"></i>
                    @endif
                </div>

                {{-- Step Label --}}
                <div class="flex flex-col items-center">
                    <span @class([
                        'text-[10px] font-black uppercase tracking-[0.2em] transition-colors duration-300',
                        'text-[#4D61FF]' => $isActive,
                        'text-magenta/60' => $isCompleted,
                        'text-white/10' => !$isActive && !$isCompleted,
                    ])>
                        Step 0{{ $step['number'] }}
                    </span>
                    <span @class([
                        'text-[13px] font-bold transition-colors duration-300 whitespace-nowrap',
                        'text-white' => $isActive,
                        'text-white/60' => $isCompleted,
                        'text-white/20' => !$isActive && !$isCompleted,
                    ])>
                        {{ $step['label'] }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    @keyframes pulse-active-auth {
        0% {
            box-shadow: 0 0 0 0 rgba(77, 97, 255, 0.4);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(77, 97, 255, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(77, 97, 255, 0);
        }
    }

    .step-active {
        animation: pulse-active-auth 2s infinite;
    }
</style>