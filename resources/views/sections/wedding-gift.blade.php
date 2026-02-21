<section id="wedding-gift"
    class="flex justify-center px-4 py-20">

    <div class="relative

        w-full
        max-w-[460px]

        rounded-[30px]

        px-6 md:px-10
        py-20              <!-- tambah tinggi -->

        text-center

        border border-[#c6b89a]
        shadow-sm"

        style="
            background-color: rgba(243, 237, 227, 0.65);
            backdrop-filter: blur(8px);
        ">


        <!-- INNER BORDER -->
        <div class="absolute inset-3
            rounded-t-[240px] 
            rounded-b-[26px] 
            
            border border-[#c6b89a]/70 pointer-events-none">
        </div>
        <div class="relative z-10">


            <!-- TITLE -->
            <h2 class="font-[Playfair_Display]

                font-bold

                text-3xl md:text-4xl

                text-[#5c3a3a]

                text-center

                mb-6">

                Wedding Gift

            </h2>


            <!-- DESKRIPSI -->
            <p class="text-sm
                text-[#5c3a3a]/80
                leading-relaxed
                max-w-[320px]
                mx-auto
                mb-12">

                Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                Namun jika Anda ingin memberikan hadiah, kami akan senang hati menerimanya.

            </p>


            <!-- CARD MANDIRI -->
            <div class="relative
                w-full
                max-w-[360px]
                h-[150px]

                mx-auto mb-6

                rounded-[20px]
                overflow-hidden

                border border-[#d8cdb8]
                shadow-sm"

                style="
                background-image: url('/assets/images/bg/bg-atm.png');
                background-size: cover;
                background-position: center;
            ">

                <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px]"></div>

                <img src="/assets/images/icon/mandiri.png"
                    class="absolute top-4 right-4 h-8 z-10">

                <img src="/assets/images/icon/chip-atm.jpg"
                    class="absolute top-[55px] left-5 w-9 z-10">

                <div id="rekeningMandiri"
                    class="absolute bottom-7 left-5 z-10
                    text-[12px]
                    tracking-[0.25em]
                    text-[#5c3a3a]
                    font-medium">

                    1060017244321

                </div>

                <div class="absolute bottom-4 left-5 z-10
                    text-[11px]
                    text-[#5c3a3a]">

                    Alya Silvina Wijaya

                </div>

                <button onclick="copyRekening('rekeningMandiri')"
                    class="absolute bottom-5 right-5 z-10
                    px-3 py-1
                    text-[11px]
                    rounded-[8px]
                    bg-[#6b4340]
                    text-white">

                    Salin

                </button>

            </div>


            <!-- CARD BCA -->
            <div class="relative
                w-full
                max-w-[360px]
                h-[150px]

                mx-auto

                rounded-[20px]
                overflow-hidden

                border border-[#d8cdb8]
                shadow-sm"

                style="
                background-image: url('/assets/images/bg/bg-atm.png');
                background-size: cover;
                background-position: center;
            ">

                <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px]"></div>

                <img src="/assets/images/icon/bca.png"
                    class="absolute top-4 right-4 h-8 z-10">

                <img src="/assets/images/icon/chip-atm.jpg"
                    class="absolute top-[55px] left-5 w-9 z-10">

                <div id="rekeningBca"
                    class="absolute bottom-7 left-5 z-10
                    text-[12px]
                    tracking-[0.25em]
                    text-[#5c3a3a]
                    font-medium">

                    2421182398

                </div>

                <div class="absolute bottom-4 left-5 z-10
                    text-[11px]
                    text-[#5c3a3a]">

                    Anas Dary Arinto

                </div>

                <button onclick="copyRekening('rekeningBca')"
                    class="absolute bottom-5 right-5 z-10
                    px-3 py-1
                    text-[11px]
                    rounded-[8px]
                    bg-[#6b4340]
                    text-white">

                    Salin

                </button>

            </div>


        </div>


    </div>

</section>