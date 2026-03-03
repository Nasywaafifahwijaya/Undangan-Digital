<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="relative w-full h-screen overflow-hidden">

    <!-- ================= ARCH BACKGROUND ================= -->
    <img
        src="/assets/images/bg/arch2hd.png"
        alt="Wedding Arch"
        class="absolute inset-0 w-full h-full
               object-cover
               object-center
               md:object-[center_top]
               z-10
               transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]">

    <!-- ================= CONTENT ================= -->
    <div
        class="relative z-20 h-full flex flex-col items-center justify-center
               px-6 sm:px-8 md:px-10 xl:px-6
               text-center
               transition-all duration-700 ease-in-out"
        :class="open ? 'opacity-0 scale-95' : 'opacity-100 scale-100'">

        <div class="w-full
                    max-w-[420px]
                    md:max-w-[500px]
                    xl:max-w-[380px]
                    space-y-4 sm:space-y-6">

            <!-- SUBTITLE -->
            <p class="text-[11px]
                      sm:text-xs
                      md:text-sm
                      xl:text-xs
                      tracking-[0.2em]
                      font-light
                      text-[#8B7355]
                      drop-shadow-[0_2px_8px_rgba(255,255,255,0.9)]">
                THE WEDDING OF
            </p>

            <!-- NAME -->
            <h1 class="text-[1.9rem]
                       sm:text-[2.5rem]
                       md:text-4xl
                       xl:text-3xl
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
                class="px-6 py-2.5
                       sm:px-8 sm:py-3
                       xl:px-6 xl:py-2.5
                       rounded-full
                       bg-[#8B7355]
                       text-white
                       text-xs sm:text-sm xl:text-xs
                       font-semibold
                       shadow-md
                       hover:bg-[#6B5744]
                       hover:scale-105
                       transition-all duration-300">
                Buka Undangan
            </button>

        </div>
    </div>
</section>