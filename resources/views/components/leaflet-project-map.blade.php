@php
    $mapId = 'leafletMap-' . uniqid();

    $mapData = $projects
        ->filter(fn ($p) => $p->map_latitude && $p->map_longitude)
        ->map(function ($p) {
            return [
                'name' => $p->nama_projek,
                'lat' => $p->map_latitude,
                'lng' => $p->map_longitude,
                'url' => route('frontend.project', $p->uuid),
            ];
        })
        ->values();
@endphp

@once
    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    @endpush

    @push('script')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @endpush
@endonce

<div
    id="{{ $mapId }}"
    style="width:100%; height:{{ $height ?? '500px' }}; border-radius:10px; box-shadow: 0px 0px 15px rgba(0,0,0,0.15); z-index:1;"
></div>

@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mapProjects = @json($mapData);

    const mapEl = document.getElementById('{{ $mapId }}');
    if (!mapEl || mapProjects.length === 0) return;

    const map = L.map('{{ $mapId }}');

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const markers = [];

    mapProjects.forEach(function (project) {
        const marker = L.marker([project.lat, project.lng]).addTo(map);
        marker.bindPopup(
            '<strong>' + project.name + '</strong><br>' +
            '<a href="' + project.url + '">Lihat Detail</a>'
        );
        markers.push(marker);
    });

    if (markers.length === 1) {
        map.setView([mapProjects[0].lat, mapProjects[0].lng], 15);
    } else {
        const group = L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.2));
    }
});
</script>
@endpush