<section id="wedding-gift"
    class="flex justify-center px-4 py-20">

    <div class="relative
        w-full
        max-w-[380px] sm:max-w-[420px] md:max-w-[460px]
        rounded-[30px]
        px-6 sm:px-8 md:px-10
        py-16 sm:py-20
        text-center
        border border-[#c6b89a]
        shadow-sm"
        style="background-color: rgba(243, 237, 227, 0.65); backdrop-filter: blur(8px);">

        <!-- INNER BORDER -->
        <div class="absolute inset-3
            rounded-[24px]
            border border-[#c6b89a]/70 pointer-events-none">
        </div>
        
        <div class="relative z-10">

            <!-- TITLE -->
            <h2 class="font-[Playfair_Display] font-bold
                text-2xl sm:text-3xl md:text-4xl
                text-[#5c3a3a] text-center mb-4 sm:mb-6">
                Wedding Gift
            </h2>

            <!-- DESKRIPSI -->
            <p class="text-xs sm:text-sm
                text-[#5c3a3a]/80 leading-relaxed
                max-w-[280px] sm:max-w-[320px]
                mx-auto mb-8 sm:mb-12">
                Doa restu Anda merupakan karunia yang sangat berarti bagi kami.
                Namun jika Anda ingin memberikan hadiah, kami akan senang hati menerimanya.
            </p>

            <!-- CARD MANDIRI -->
            <div class="relative w-full max-w-[320px] sm:max-w-[360px] h-[150px] sm:h-[160px]
                mx-auto mb-5 sm:mb-6 rounded-[16px] overflow-hidden
                border border-[#d8cdb8] shadow-lg"
                style="background-image: url('/assets/images/bg/bg-atm.png');
                       background-size: cover; background-position: center;">

                <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px]"></div>

                <img src="/assets/images/icon/mandiri.png"
                    class="absolute top-4 right-4 h-7 sm:h-8 z-10">

                <img src="/assets/images/icon/chip-atm.jpg"
                    class="absolute top-[55px] sm:top-[60px] left-5 w-9 z-10">

                <div id="rekeningMandiri"
                    class="absolute bottom-9 sm:bottom-10 left-5 z-10
                    text-[12px] sm:text-[13px] tracking-[0.2em]
                    text-[#5c3a3a] font-semibold">
                    1060017244321
                </div>

                <div class="absolute bottom-5 sm:bottom-6 left-5 z-10
                    text-[11px] sm:text-[12px] text-[#5c3a3a]">
                    Alya Silvina Wijaya
                </div>

                <button onclick="copyRekening('rekeningMandiri', this)"
                    class="absolute bottom-5 sm:bottom-6 right-4 sm:right-5 z-10
                    px-3 sm:px-4 py-1.5 sm:py-2 text-[11px] sm:text-xs
                    rounded-lg bg-[#6b4340] text-white font-medium
                    hover:bg-[#5c3a3a] transition shadow-md">
                    Salin
                </button>

            </div>

            <!-- CARD BCA -->
            <div class="relative w-full max-w-[320px] sm:max-w-[360px] h-[150px] sm:h-[160px]
                mx-auto rounded-[16px] overflow-hidden
                border border-[#d8cdb8] shadow-lg"
                style="background-image: url('/assets/images/bg/bg-atm.png');
                       background-size: cover; background-position: center;">

                <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px]"></div>

                <img src="/assets/images/icon/bca.png"
                    class="absolute top-3 right-4 h-11 sm:h-12 z-10">

                <img src="/assets/images/icon/chip-atm.jpg"
                    class="absolute top-[55px] sm:top-[60px] left-5 w-9 z-10">

                <div id="rekeningBca"
                    class="absolute bottom-9 sm:bottom-10 left-5 z-10
                    text-[12px] sm:text-[13px] tracking-[0.2em]
                    text-[#5c3a3a] font-semibold">
                    2421182398
                </div>

                <div class="absolute bottom-5 sm:bottom-6 left-5 z-10
                    text-[11px] sm:text-[12px] text-[#5c3a3a]">
                    Anas Dary Arinto
                </div>

                <button onclick="copyRekening('rekeningBca', this)"
                    class="absolute bottom-5 sm:bottom-6 right-4 sm:right-5 z-10
                    px-3 sm:px-4 py-1.5 sm:py-2 text-[11px] sm:text-xs
                    rounded-lg bg-[#6b4340] text-white font-medium
                    hover:bg-[#5c3a3a] transition shadow-md">
                    Salin
                </button>

            </div>

        </div>

    </div>

</section>

<script>
function copyRekening(elementId, button) {
    const element = document.getElementById(elementId);
    if (!element) {
        alert('Element tidak ditemukan');
        return;
    }

    const text = element.innerText.trim();
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text)
            .then(() => {
                const originalText = button.innerText;
                button.innerText = '✓ Tersalin';
                button.style.backgroundColor = '#16a34a';
                
                setTimeout(() => {
                    button.innerText = originalText;
                    button.style.backgroundColor = '';
                }, 2000);
            })
            .catch((err) => {
                console.error('Clipboard error:', err);
                fallbackCopy(text, button);
            });
    } else {
        fallbackCopy(text, button);
    }
}

function fallbackCopy(text, button) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.left = '-9999px';
    document.body.appendChild(textarea);
    textarea.select();
    textarea.setSelectionRange(0, 99999);
    
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            const originalText = button.innerText;
            button.innerText = '✓ Tersalin';
            button.style.backgroundColor = '#16a34a';
            
            setTimeout(() => {
                button.innerText = originalText;
                button.style.backgroundColor = '';
            }, 2000);
        } else {
            alert('Nomor rekening: ' + text);
        }
    } catch (err) {
        console.error('Fallback copy error:', err);
        alert('Nomor rekening: ' + text);
    }
    
    document.body.removeChild(textarea);
}
</script>