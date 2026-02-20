<section id="rsvp" class="flex justify-center px-4 py-20">

    <div class="w-full max-w-[460px]

rounded-[32px]

border border-[#c6b89a]

px-6 py-10

text-center"

        style="background-color: rgba(243,237,227,0.75);">


        <!-- TITLE -->
        <h2 class="font-[Playfair_Display]

text-2xl

text-[#5c3a3a]

mb-2">

            RSVP & Ucapan

        </h2>

        <p class="text-sm text-[#5c3a3a]/80 mb-8">
            Berikan ucapan & konfirmasi kehadiran
        </p>


        <!-- FORM -->
        <form method="POST" action="/rsvp"

            class="space-y-4 mb-10">

            @csrf


            <input
                name="nama"
                required
                placeholder="Nama"
                class="w-full rounded-lg border border-[#c6b89a]
px-4 py-3 text-sm">


            <textarea
                name="ucapan"
                rows="3"
                placeholder="Berikan ucapan dan doa"
                class="w-full rounded-lg border border-[#c6b89a]
px-4 py-3 text-sm"></textarea>


            <select
                name="kehadiran"
                class="w-full rounded-lg border border-[#c6b89a]
px-4 py-3 text-sm">

                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <option value="Ragu-ragu">Ragu-ragu</option>

            </select>


            <button
                class="px-6 py-3

rounded-lg

bg-[#5c3a3a]

text-white

text-sm">

                Kirim Ucapan

            </button>

        </form>


        <!-- LIST UCAPAN -->
        <div class="space-y-4 text-left">

            @foreach(App\Models\Rsvp::latest()->get() as $rsvp)

            <div class="p-4 rounded-lg border border-[#c6b89a]
bg-white/60">

                <div class="font-semibold text-[#5c3a3a]">
                    {{ $rsvp->nama }}
                </div>

                <div class="text-sm mt-1">
                    {{ $rsvp->ucapan }}
                </div>

                <div class="text-xs mt-2 text-gray-500">
                    {{ $rsvp->created_at->diffForHumans() }}
                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>