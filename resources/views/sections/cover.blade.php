<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="min-h-[100svh] flex items-center justify-center px-4">

    <!-- 9:16 Card Container -->
    <div class="relative w-full max-w-[430px] aspect-[9/16] overflow-hidden rounded-[28px] shadow-2xl">

        <!-- Background dari wrapper (jangan pakai arch lagi di sini) -->
        <div class="absolute inset-0 z-0"></div>

        <!-- ARCH sebagai dekorasi (BUKAN background full) -->
        <div class="absolute inset-0
            bg-[url('/assets/images/bg/arch2hd.png')]
            bg-no-repeat
            bg-center
            bg-cover
            z-10">
        </div>

        <!-- Content -->
        <div
            class="relative z-20 h-full flex flex-col items-center justify-center
                   px-6 text-center transition-all duration-700 ease-in-out"
            :class="open ? 'opacity-0 scale-95' : 'opacity-100 scale-100'">

            <div class="space-y-5">

                <!-- SUBTITLE -->
                <p class="text-[11px]
                          tracking-[0.2em]
                          font-light
                          text-[#8B7355]
                          drop-shadow-[0_2px_8px_rgba(255,255,255,0.9)]">
                    THE WEDDING OF
                </p>

                <!-- NAME -->
                <h1 class="text-[2.2rem]
                           font-[Playfair_Display]
                           font-semibold
                           text-[#6B5744]
                           leading-tight
                           drop-shadow-[0_3px_12px_rgba(255,255,255,0.95)]">
                    Alya & Anas
                </h1>

                <!-- BUTTON -->
                <button
                    @click="
                        open = true;
                        setTimeout(() => opened = true, 900);
                        window.dispatchEvent(new Event('start-music'));
                    "
                    class="mt-6 px-8 py-3
                           rounded-full
                           bg-[#8B7355]
                           text-white
                           text-sm
                           font-semibold
                           shadow-md
                           hover:bg-[#6B5744]
                           hover:scale-105
                           transition-all duration-300">
                    Buka Undangan
                </button>

            </div>
        </div>

    </div>
</section>