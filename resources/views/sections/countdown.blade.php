<section id="countdown"
    class="flex justify-center px-4 py-24">

    <div class="relative
        w-full max-w-[420px]

        rounded-[28px]

        border border-[#8b7a55]/60

        px-8 md:px-12
        py-12 md:py-14

        text-center"

        style="background-color: rgba(243, 237, 227, 0.65);">


        <!-- INNER BORDER -->
        <div class="absolute inset-3
            rounded-[22px]
            border border-[#8b7a55]/40
            pointer-events-none">
        </div>



        <div class="relative z-10">


            <!-- TITLE -->
            <h2 class="font-[Playfair_Display]
                font-bold
                text-2xl md:text-3xl
                text-[#5c3a3a]
                mb-10">

                Wedding Event

            </h2>




            <!-- COUNTDOWN -->
            <div class="grid grid-cols-4 gap-4 mb-10 text-[#5c3a3a]">


                <div>
                    <div id="cd_days"
                        class="text-3xl md:text-4xl font-[Playfair_Display]">
                        0
                    </div>

                    <div class="text-[11px] tracking-[0.2em]">
                        HARI
                    </div>
                </div>


                <div>
                    <div id="cd_hours"
                        class="text-3xl md:text-4xl font-[Playfair_Display]">
                        0
                    </div>

                    <div class="text-[11px] tracking-[0.2em]">
                        JAM
                    </div>
                </div>


                <div>
                    <div id="cd_minutes"
                        class="text-3xl md:text-4xl font-[Playfair_Display]">
                        0
                    </div>

                    <div class="text-[11px] tracking-[0.2em]">
                        MENIT
                    </div>
                </div>


                <div>
                    <div id="cd_seconds"
                        class="text-3xl md:text-4xl font-[Playfair_Display]">
                        0
                    </div>

                    <div class="text-[11px] tracking-[0.2em]">
                        DETIK
                    </div>
                </div>


            </div>



            <!-- BUTTON -->
            <button type="button" onclick="addToCalendar()"
                class="px-6 py-2.5

                border border-[#5c3a3a]/70
                rounded-full

                text-sm
                text-[#5c3a3a]

                hover:bg-[#5c3a3a]
                hover:text-white

                transition">

                Add To Calendar

            </button>


        </div>

    </div>

</section>