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

    <div class="w-full max-w-[460px]
        rounded-[32px]
        border border-[#c6b89a]
        px-6 py-10
        text-center"
        style="background-color: rgba(243,237,227,0.75);">

        <!-- TITLE -->
        <h2 class="font-[Playfair_Display] text-2xl text-[#5c3a3a] mb-2">
            RSVP
        </h2>

        <p class="text-sm text-[#5c3a3a]/80 mb-8">
            Berikan ucapan & konfirmasi kehadiran
        </p>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-6 text-sm text-green-700 bg-green-100 px-4 py-2 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="/rsvp#rsvp" class="space-y-4 mb-10">
            @csrf

            <!-- Honeypot -->
            <div style="display:none;">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <input
                type="text"
                name="nama"
                required
                maxlength="70"
                placeholder="Nama"
                class="w-full rounded-lg border border-[#c6b89a] px-4 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-[#8b7a55]">

            <textarea
                name="ucapan"
                rows="3"
                maxlength="300"
                placeholder="Berikan ucapan dan doa"
                class="w-full rounded-lg border border-[#c6b89a] px-4 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-[#8b7a55]"></textarea>

            <select
                name="kehadiran"
                required
                class="w-full rounded-lg border border-[#c6b89a] px-4 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-[#8b7a55]">

                <option value=""> Pilih Kehadiran </option>
                <option value="Hadir">Hadir</option>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <option value="Ragu-ragu">Ragu-ragu</option>

            </select>

            <button
                type="submit"
                class="px-6 py-3 rounded-lg bg-[#5c3a3a] text-white text-sm hover:opacity-90 transition">
                Kirim Ucapan
            </button>
        </form>

        <!-- LIST UCAPAN -->
        <div class="space-y-4 text-left">

            @foreach($rsvps as $rsvp)

                <div class="p-4 rounded-lg border border-[#c6b89a] bg-white/60 min-w-0 overflow-hidden">

                    <div class="font-semibold text-[#5c3a3a]">
                        {{ $rsvp->nama }}
                    </div>

                    <div class="text-sm mt-1 text-[#5c3a3a]/90 whitespace-pre-line break-all leading-relaxed max-w-full">
                        {{ $rsvp->ucapan }}
                    </div>

                    <div class="text-xs mt-2 text-gray-500">
                        {{ $rsvp->created_at->diffForHumans() }}
                    </div>

                </div>

            @endforeach

        </div>

        <!-- PAGINATION -->
        <div class="mt-8">
            {{ $rsvps->appends(request()->query())->fragment('rsvp')->links() }}
        </div>

    </div>

</section>