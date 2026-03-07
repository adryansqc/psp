@php
    $type = $record->persyaratanVerifikasi->type ?? null;
    $data = $getState();

    if (is_string($data) && str_starts_with($data, '[')) {
        $decoded = json_decode($data, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $data = $decoded;
        }
    }
@endphp

<div class="flex flex-col space-y-2">
    @switch($type)
        @case('file')
            @if ($data)
                <a href="{{ Storage::disk('public')->url($data) }}" target="_blank" class="text-blue-600 hover:underline">
                    📄 Lihat File
                </a>
            @else
                <span class="text-gray-400">Tidak ada file</span>
            @endif
        @break

        @case('checkbox')
            <span class="{{ $data ? 'text-green-600' : 'text-red-600' }}">
                {{ $data ? '✅ Ya' : '❌ Tidak' }}
            </span>
        @break

        @case('checkbox_list')
        @case('select')

        @case('radio')
            @if (is_array($data))
                <ul class="list-disc list-inside text-gray-800">
                    @foreach ($data as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @else
                <span>{{ $data ?: '-' }}</span>
            @endif
        @break

        @case('textarea')
        @case('text')

            @default
                <span>{{ $data ?: '-' }}</span>
        @endswitch
    </div>
