@php
    \Carbon\Carbon::setLocale('id');
    $latestCreatedAt = $pengumumans->max('created_at');
@endphp

@forelse ($pengumumans as $item)
    @php
        $gambar = $item->gambar && Storage::disk('public')->exists($item->gambar) ? Storage::url($item->gambar) : asset('assets/images/news-thumbnail.jpg');
        $thumbnail = $item->thumbnail && Storage::disk('public')->exists($item->thumbnail) ? Storage::url($item->thumbnail) : $gambar;
        $judul = $item->judul;
        $created_at = \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d-m-Y H:i');
        $isi = strip_tags($item->isi);
        $isNewest = $item->created_at == $latestCreatedAt;
    @endphp

    <a href="javascript:void(0)" data-gambar="{{ $gambar }}" data-judul="{{ $judul }}" data-tanggal="{{ $created_at }}" data-isi="{{ $isi }}" class="pengumuman-card group flex flex-col h-[420px] bg-white rounded-2xl shadow-xl overflow-hidden transition-transform duration-300 hover:-translate-y-2 hover:shadow-2xl border border-gray-100 dark:bg-slate-800">
        <div class="relative h-[250px] w-full overflow-hidden">
            <img src="{{ $thumbnail }}" alt="article image" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" />

            @if ($isNewest)
                <span class="absolute top-4 right-4 bg-sky-600 text-white text-xs px-3 py-1 rounded-full shadow-lg font-semibold flex items-center gap-1 transition-all duration-300 hover:bg-sky-700">
                    <i class="bi bi-star-fill text-yellow-300"></i>
                    <span>Baru</span>
                </span>
            @endif
        </div>
        <div class="flex flex-col flex-1 p-5 gap-2">
            <h3 class="text-2xl font-bold text-gray-800 max-md:text-lg line-clamp-2 group-hover:text-sky-600 transition-colors duration-300 dark:text-white">{{ $judul }}</h3>
            <p class="text-gray-400 text-xs flex items-center gap-2 dark:text-gray-400"><i class="bi bi-calendar-event"></i> {{ $created_at }}</p>
            <p class="text-gray-600 text-sm line-clamp-3 dark:text-gray-200">{{ $isi }}</p>
            <div class="mt-auto flex justify-end">
                <span class="inline-flex items-center gap-1 text-sky-500 font-semibold hover:underline cursor-pointer transition-colors duration-300">
                    Lihat detail <i class="bi bi-arrow-right"></i>
                </span>
            </div>
        </div>
    </a>
@empty
    <p class="text-center text-gray-500 text-lg mt-4">Belum ada pengumuman yang tersedia.</p>
@endforelse
