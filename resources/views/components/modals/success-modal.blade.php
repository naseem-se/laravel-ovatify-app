<div x-data="{ open: false, type: 'success' }" x-show="open"
    @open-success-modal.window="open = true; type = $event.detail.type || 'success'"
    class="fixed inset-0 z-50 flex items-center justify-center p-4">
    {{-- Overlay --}}
    <div @click="open = false" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

    {{-- Modal Content --}}
    <div class="relative bg-[#1A1A1A] border border-gray-800 rounded-3xl w-full max-w-sm p-10 shadow-2xl text-center">
        {{-- Success Icon --}}
        <div
            class="w-24 h-24 rounded-full bg-accent/20 flex items-center justify-center mx-auto mb-8 shadow-[0_0_30px_rgba(255,0,255,0.2)]">
            <svg class="w-12 h-12 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h2 class="text-2xl font-black mb-4"
            x-text="type === 'order' ? 'Order Successful' : (type === 'listing' ? 'Listing Successful' : 'Completion')">
        </h2>
        <p class="text-sm text-gray-500 mb-10 leading-relaxed"
            x-text="type === 'order' ? 'Congratulations! You have successfully purchased the license. Your content is now available in your tracks.' : (type === 'listing' ? 'Your track has been successfully listed in the marketplace.' : 'Your action has been completed successfully.')">
        </p>

        <button @click="open = false"
            class="w-full py-4 rounded-xl bg-accent text-white font-bold text-sm hover:shadow-[0_0_20px_rgba(255,0,255,0.4)] transition">
            Continue
        </button>
    </div>
</div>