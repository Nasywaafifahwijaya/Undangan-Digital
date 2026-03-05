    <section
        x-data="{ open: false }"
        x-show="!opened"
        x-transition.opacity.duration.500ms
        class="absolute inset-0 flex items-center justify-center px-4 overflow-hidden"

        <!-- ARCH -->
        <img src="/assets/images/bg/arch2hd.png"
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none z-10">

        <!-- CONTENT -->
        <div
            class="relative z-20 w-full flex flex-col items-center justify-center text-center
        translate-y-8 sm:translate-y-10 md:translate-y-14 lg:translate-y-20
        transition-all duration-700 ease-in-out"
            :class="open ? 'opacity-0 scale-95' : 'opacity-100 scale-100'">

            <div class="space-y-5 sm:space-y-4 md:space-y-7">

                <!-- TITLE -->
                <p class="text-[13px] sm:text-xs md:text-sm lg:text-base tracking-[0.2em] font-medium text-[#8B7355] drop-shadow-[0_2px_8px_rgba(255,255,255,0.9)] [text-shadow:0_2px_10px_rgb(255_255_255/_90%)] mt-6 md:mt-8 lg:mt-10">
                    THE WEDDING OF
                </p>
                <!-- <p class="text-[13px] sm:text-xs md:text-sm lg:text-base
            tracking-[0.2em] font-medium text-[#8B7355]
            drop-shadow-[0_2px_8px_rgba(255,255,255,0.9)]
            [text-shadow:0_2px_10px_rgb(255_255_255/_90%)]">
                    THE WEDDING OF
                </p> -->

                <!-- NAME -->
                <h1 class="text-[2rem] sm:text-[2.5rem] md:text-4xl lg:text-5xl
                        font-[Playfair_Display] font-semibold text-[#6B5744] leading-tight
                        drop-shadow-[0_3px_12px_rgba(255,255,255,0.95)]
                        [text-shadow:0_3px_14px_rgb(255_255_255/_95%)]">
                    Alya & Anas
                </h1>

                <!-- TAMU -->
                <div class="space-y-1">
                    <p class="text-[10px] sm:text-xs md:text-sm tracking-widest text-[#8B7355]">
                        Kepada Yth.
                    </p>

                    <p class="text-sm sm:text-base md:text-lg font-medium text-[#6B5744]">
                        {{ $guest }}
                    </p>
                </div>

                <!-- BUTTON -->
                <button
                    @click="
                        open = true;
                        setTimeout(() => opened = true, 900);
                        window.dispatchEvent(new Event('start-music'));
                    "
                    class="px-7 py-2.5 sm:px-8 sm:py-3 md:px-10 md:py-3.5 lg:px-12 lg:py-4
                        rounded-full bg-[#8B7355] text-white
                        text-xs sm:text-sm md:text-base
                        font-semibold shadow-md
                        hover:bg-[#6B5744] hover:scale-105
                        transition-all duration-300
                        min-h-[44px]">
                    Buka Undangan
                </button>

            </div>
        </div>

    </section>