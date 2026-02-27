<section 
    id="rsvp"
    class="flex justify-center px-4 py-20 scroll-mt-24"
    x-data
    x-init="
        if (window.location.hash === '#rsvp') {
            $el.scrollIntoView({ behavior: 'smooth' })
        }
    "
>

    <div class="relative w-full max-w-[480px]
        rounded-[32px]
        border border-[#c6b89a]
        px-6 md:px-8 py-12
        text-center
        shadow-[0_20px_60px_rgba(0,0,0,0.08)]"
        style="background-color: rgba(243,237,227,0.85); backdrop-filter: blur(10px);">

        <!-- INNER BORDER -->
        <div class="absolute inset-4
            rounded-[24px]
            border border-[#c6b89a]/70
            pointer-events-none">
        </div>

        <!-- CONTENT -->
        <div class="relative z-10">

            <!-- DECORATIVE TOP -->
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-12 h-[1px] bg-gradient-to-r from-transparent to-[#c6b89a]"></div>
                <svg class="w-5 h-5 text-[#8b7355]" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <div class="w-12 h-[1px] bg-gradient-to-l from-transparent to-[#c6b89a]"></div>
            </div>

            <!-- TITLE -->
            <h2 class="font-[Playfair_Display] text-3xl md:text-4xl font-bold text-[#6B5744] mb-3">
                RSVP
            </h2>

            <p class="text-sm text-[#8B7355] mb-10">
                Berikan ucapan & konfirmasi kehadiran
            </p>

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="mb-8 text-sm text-[#6B5744] bg-[#8B7355]/10 px-4 py-3 rounded-2xl border border-[#8B7355]/30
                    shadow-[0_4px_12px_rgba(139,115,85,0.1)]">
                    <svg class="w-5 h-5 inline-block mr-2 text-[#8B7355]" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- FORM -->
            <form method="POST" action="/rsvp#rsvp" class="space-y-6 mb-12">
                @csrf

                <!-- Honeypot -->
                <div style="display:none;">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <!-- INPUT NAMA -->
                <div class="relative">
                    <input
                        type="text"
                        name="nama"
                        required
                        maxlength="70"
                        placeholder="Nama Lengkap"
                        class="w-full rounded-2xl border-2 border-[#c6b89a] px-5 py-3.5 text-sm text-[#6B5744]
                        bg-white/60 backdrop-blur-sm
                        placeholder:text-[#8B7355]/50
                        focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20
                        transition-all duration-300
                        shadow-[0_2px_8px_rgba(198,184,154,0.15)]">
                </div>

                <!-- TEXTAREA UCAPAN -->
                <div class="relative">
                    <textarea
                        name="ucapan"
                        rows="4"
                        maxlength="300"
                        placeholder="Berikan ucapan dan doa restu untuk kami..."
                        class="w-full rounded-2xl border-2 border-[#c6b89a] px-5 py-3.5 text-sm text-[#6B5744]
                        bg-white/60 backdrop-blur-sm
                        placeholder:text-[#8B7355]/50
                        focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20
                        transition-all duration-300
                        shadow-[0_2px_8px_rgba(198,184,154,0.15)]
                        resize-none"></textarea>
                </div>

                <!-- STYLED SELECT DROPDOWN -->
                <div class="relative">
                    <select
                        name="kehadiran"
                        required
                        class="w-full rounded-2xl border-2 border-[#c6b89a] px-5 py-3.5 text-sm text-[#6B5744]
                        bg-white/60 backdrop-blur-sm
                        focus:outline-none focus:border-[#8B7355] focus:ring-2 focus:ring-[#8B7355]/20
                        transition-all duration-300
                        shadow-[0_2px_8px_rgba(198,184,154,0.15)]
                        appearance-none cursor-pointer
                        [&:invalid]:text-[#8B7355]/50">
                        <option value="" disabled selected>Pilih Kehadiran</option>
                        <option value="Hadir" class="text-[#6B5744]">Hadir</option>
                        <option value="Tidak Hadir" class="text-[#6B5744]">Tidak Hadir</option>
                        <option value="Ragu-ragu" class="text-[#6B5744]">Ragu-ragu</option>
                    </select>
                    
                    <!-- Custom Arrow Icon -->
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none">
                        <svg class="w-5 h-5 text-[#8B7355]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                <!-- BUTTON SUBMIT -->
                <button
                    type="submit"
                    class="w-full px-8 py-4 rounded-2xl
                    bg-gradient-to-r from-[#8B7355] to-[#6B5744]
                    text-white text-sm font-semibold
                    shadow-[0_8px_24px_rgba(139,115,85,0.35)]
                    hover:shadow-[0_12px_32px_rgba(139,115,85,0.45)]
                    hover:scale-[1.02]
                    active:scale-[0.98]
                    transition-all duration-300
                    border-2 border-[#6B5744]/20
                    flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Ucapan
                </button>
            </form>

            <!-- DIVIDER -->
            <div class="flex items-center gap-3 mb-10">
                <div class="flex-1 h-[1px] bg-gradient-to-r from-transparent to-[#c6b89a]"></div>
                <span class="text-xs text-[#8B7355] tracking-wider">UCAPAN TAMU</span>
                <div class="flex-1 h-[1px] bg-gradient-to-l from-transparent to-[#c6b89a]"></div>
            </div>

            <!-- LIST UCAPAN (TANPA STATUS BADGE) -->
            <div class="space-y-4 text-left max-h-[600px] overflow-y-auto pr-2
                scrollbar-thin scrollbar-track-transparent scrollbar-thumb-[#c6b89a]/50">

                @foreach($rsvps as $rsvp)

                    <div class="group relative p-5 rounded-2xl border border-[#c6b89a] 
                        bg-gradient-to-br from-white/70 to-white/50 backdrop-blur-sm
                        shadow-[0_4px_16px_rgba(198,184,154,0.15)]
                        hover:shadow-[0_8px_24px_rgba(198,184,154,0.25)]
                        hover:scale-[1.01]
                        transition-all duration-300
                        min-w-0 overflow-hidden">

                        <!-- Decorative Corner -->
                        <div class="absolute top-0 right-0 w-16 h-16 opacity-10">
                            <svg viewBox="0 0 100 100" class="text-[#8B7355]">
                                <path d="M0,0 L100,0 L100,100 Z" fill="currentColor"/>
                            </svg>
                        </div>

                        <!-- Content -->
                        <div class="relative">
                            <!-- NAMA dengan Avatar -->
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#8B7355] to-[#6B5744] 
                                    flex items-center justify-center text-white text-sm font-semibold
                                    shadow-[0_2px_8px_rgba(139,115,85,0.3)]">
                                    {{ strtoupper(substr($rsvp->nama, 0, 1)) }}
                                </div>
                                <div class="font-[Playfair_Display] font-semibold text-[#6B5744] text-base">
                                    {{ $rsvp->nama }}
                                </div>
                            </div>

                            <!-- UCAPAN -->
                            <div class="text-sm text-[#6B5744]/90 leading-relaxed whitespace-pre-line break-words pl-13">
                                {{ $rsvp->ucapan }}
                            </div>

                            <!-- TIMESTAMP -->
                            <div class="flex items-center gap-1 text-xs text-[#8B7355]/70 mt-3 pl-13">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $rsvp->created_at->diffForHumans() }}
                            </div>
                        </div>

                    </div>

                @endforeach

            </div>

            <!-- PAGINATION -->
            <div class="mt-8">
                {{ $rsvps->appends(request()->query())->fragment('rsvp')->links() }}
            </div>

        </div>

    </div>

</section>

<style>
/* Custom Scrollbar */
.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
}

.scrollbar-thin::-webkit-scrollbar-track {
    background: transparent;
}

.scrollbar-thin::-webkit-scrollbar-thumb {
    background: rgba(198, 184, 154, 0.5);
    border-radius: 3px;
}

.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: rgba(198, 184, 154, 0.7);
}
</style>