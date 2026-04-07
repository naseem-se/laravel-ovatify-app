<div x-data="{ open: false, type: 'success', title: '', message: '' }" x-show="open"
    @open-success-modal.window="open = true; type = $event.detail.type || 'success'; title = $event.detail.title || ''; message = $event.detail.message || ''"
    class="fixed inset-0 z-50 flex items-center justify-center p-4">
    {{-- Overlay --}}
    <div @click="open = false" class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>

    {{-- Modal Content --}}
    <div
        class="relative bg-[#1A1A1A] rounded-[40px] px-8 py-12 w-full max-w-[440px] shadow-2xl text-center overflow-hidden border border-white/5">

        {{-- Decorative Dots --}}
        <div class="absolute top-10 left-10 w-2 h-2 bg-magenta rounded-full opacity-50"></div>
        <div class="absolute top-20 right-10 w-1.5 h-1.5 bg-magenta rounded-full opacity-30"></div>
        <div class="absolute bottom-20 left-12 w-1.5 h-1.5 bg-magenta rounded-full opacity-20"></div>

        {{-- Success Checkmark Circle --}}
        <div class="relative w-32 h-32 mx-auto mb-10">
            <div
                class="w-full h-full bg-magenta rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(214,0,214,0.4)] relative z-10">
                <i class="fas fa-check text-white text-4xl"></i>
            </div>
            {{-- Pulse effect --}}
            <div class="absolute inset-0 bg-magenta/20 rounded-full animate-ping"></div>
        </div>

        <h2 class="text-white text-2xl font-bold mb-3 px-4"
            x-text="title || 'You now own 5% of this track\'s royalties'">
        </h2>

        <p class="text-gray-500 text-sm font-medium mb-10 px-6"
            x-text="message || 'Your track is now available in your library!'">
        </p>

        <div class="space-y-4">
            <button @click="window.location.href='/consumer/investments'"
                class="w-full py-4 bg-[#4D61FF] text-white font-bold text-sm rounded-full hover:bg-[#3D51EF] transition-all shadow-lg active:scale-95">
                View my Investments
            </button>
            <button @click="open = false"
                class="w-full py-4 bg-transparent border-2 border-white/10 text-white font-bold text-sm rounded-full hover:bg-white/5 transition-all active:scale-95">
                Explore more music
            </button>
        </div>
    </div>
</div>