<div id="pengumuman-modal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <div class="pengumuman-close-modal cursor-pointer absolute inset-0 bg-gradient-to-br from-blue-900/70 via-blue-700/60 to-blue-400/50 backdrop-blur-sm"></div>

    <div class="relative z-10 bg-white dark:bg-slate-800 w-full max-w-2xl rounded-2xl shadow-2xl mx-4 overflow-hidden animate-fade-in-up">
        <div class="flex items-center justify-between px-8 py-4 border-b border-blue-100 dark:border-slate-600 bg-gradient-to-r from-blue-50 to-white dark:from-slate-700 dark:to-slate-800 sticky top-0 z-20">
            <div class="flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500 dark:text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
                <h3 class="text-2xl max-md:text-lg font-bold text-blue-700 dark:text-white tracking-wide">Detail Pengumuman</h3>
            </div>
            <button class="pengumuman-close-modal cursor-pointer text-3xl font-bold text-blue-400 dark:text-slate-300 hover:text-blue-700 dark:hover:text-white transition-colors">
                &times;
            </button>
        </div>

        <div class="p-8 space-y-6 max-h-[80vh] overflow-y-auto bg-gradient-to-br from-white via-blue-50 to-blue-100 dark:from-slate-800 dark:via-slate-700 dark:to-slate-700">
            <div class="relative w-full h-76 rounded-xl overflow-hidden shadow-lg">
                <img id="modal-gambar" src="" alt="gambar" class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-blue-900/60 to-transparent p-4">
                    <h3 id="modal-judul" class="text-xl font-semibold text-white drop-shadow-lg"></h3>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm text-blue-600 dark:text-blue-300 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span id="modal-tanggal"></span>
            </div>
            <p id="modal-isi" class="text-gray-700 dark:text-gray-300 text-justify leading-relaxed text-base"></p>
        </div>

        <div class="flex justify-end px-8 py-4 bg-white dark:bg-slate-800 border-t border-blue-100 dark:border-slate-600">
            <button class="pengumuman-close-modal cursor-pointer px-6 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-semibold shadow transition-colors duration-200">
                Tutup
            </button>
        </div>
    </div>
</div>

@push('styles')
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.4s cubic-bezier(.4, 0, .2, 1);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.pengumuman-card');
            const modal = document.getElementById('pengumuman-modal');
            const modalImage = document.getElementById('modal-gambar');
            const modalJudul = document.getElementById('modal-judul');
            const modalTanggal = document.getElementById('modal-tanggal');
            const modalIsi = document.getElementById('modal-isi');

            cards.forEach(card => {
                card.addEventListener('click', function() {
                    modalImage.src = card.dataset.gambar;
                    modalJudul.innerText = card.dataset.judul;
                    modalTanggal.innerText = card.dataset.tanggal;
                    modalIsi.innerText = card.dataset.isi;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                });
            });

            document.querySelectorAll('.pengumuman-close-modal').forEach(btn => {
                btn.addEventListener('click', function() {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                });
            });
        });

        document.addEventListener('click', function(e) {
            const card = e.target.closest('.pengumuman-card');
            if (!card) return;

            const gambar = card.dataset.gambar;
            const judul = card.dataset.judul;
            const tanggal = card.dataset.tanggal;
            const isi = card.dataset.isi;

            document.getElementById('modal-gambar').src = gambar;
            document.getElementById('modal-judul').textContent = judul;
            document.getElementById('modal-tanggal').textContent = tanggal;
            document.getElementById('modal-isi').innerHTML = isi;
            document.getElementById('pengumuman-modal').classList.remove('hidden');
            document.getElementById('pengumuman-modal').classList.add('flex');
        });
    </script>
@endpush
