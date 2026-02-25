<section
    x-data="{ open: false }"
    x-show="!opened"
    x-transition.opacity.duration.500ms
    class="relative w-full h-screen overflow-hidden">

    <!-- ARCH FULL SCREEN -->
    <img
        src="/assets/images/bg/arch.png"
        alt="Wedding Arch"
        class="absolute inset-0 w-full h-full object-contain object-center z-10
               transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]"
        :class="open
            ? 'opacity-0 scale-110'
            : 'opacity-100 scale-100'">

    <!-- Konten tengah - ADJUSTED POSITIONING -->
    <div
        class="relative z-20 h-full flex flex-col items-center justify-center
           px-6 text-center
           pt-16 md:pt-28 lg:pt-40
           transition-all duration-700 ease-in-out"
        :class="open
        ? 'opacity-0 scale-95'
        : 'opacity-100 scale-100'">

        <!-- CONTENT dengan TEXT SHADOW -->
        <div class="max-w-md w-full space-y-6 md:space-y-8">

            <!-- THE WEDDING OF -->
            <p class="text-xs md:text-sm lg:text-base tracking-[0.15em]
              font-normal text-[#8B7355]
              drop-shadow-[0_2px_8px_rgba(255,255,255,0.9)]
              [text-shadow:_0_2px_12px_rgb(255_255_255_/_90%),_0_1px_4px_rgb(255_255_255_/_80%)]">
                THE WEDDING OF
            </p>

            <!-- NAMA - SIZE ADJUSTED -->
            <h1 class="text-4xl md:text-5xl lg:text-5xl
            font-[Playfair_Display] font-bold
            text-[#6B5744]
            leading-tight
            drop-shadow-[0_4px_12px_rgba(255,255,255,0.95)]
            [text-shadow:_0_4px_16px_rgb(255_255_255_/_95%),_0_2px_8px_rgb(255_255_255_/_85%)]">
            Alya & Anas
            </h1>

            <!-- BUTTON - SIGNIFICANTLY SMALLER -->
            <button
                @click="
                open = true;
                setTimeout(() => opened = true, 900);
                window.dispatchEvent(new Event('start-music'));
            "
                class="px-6 py-2 md:px-8 md:py-2.5 lg:px-9 lg:py-3
           rounded-full bg-[#8B7355]
           text-white
           text-xs md:text-sm font-semibold 
           shadow-[0_6px_20px_rgba(139,115,85,0.35),0_3px_10px_rgba(139,115,85,0.25)]
           hover:bg-[#6B5744]
           hover:shadow-[0_8px_28px_rgba(107,87,68,0.45),0_4px_14px_rgba(107,87,68,0.35)]
           hover:scale-105 transition-all duration-300
           mx-auto">
                Buka Undangan
            </button>

        </div>

    </div>
</section>