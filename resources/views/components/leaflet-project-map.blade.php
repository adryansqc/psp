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
                'cover' => $p->cover
                    ? Storage::url($p->cover)
                    : asset('dummypsp/assets/images/bestrumahkito.jpg'),
            ];
        })
        ->values();
@endphp

@once
    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <style>
            .leaflet-popup-content-wrapper {
                border-radius: 10px;
                padding: 0;
                overflow: hidden;
            }

            .leaflet-popup-content {
                margin: 0;
                width: 220px !important;
            }

            .map-popup-card img {
                width: 100%;
                height: 120px;
                object-fit: cover;
                display: block;
            }

            .map-popup-card .map-popup-body {
                padding: 10px 12px;
            }

            .map-popup-card h6 {
                margin: 0 0 8px 0;
                font-size: 14px;
                font-weight: 600;
                line-height: 1.3;
            }

            .map-popup-card a.map-popup-link {
                display: inline-block;
                font-size: 13px;
                font-weight: 600;
                color: #ff5a3c;
                text-decoration: none;
            }

            .map-popup-card a.map-popup-link:hover {
                text-decoration: underline;
            }
        </style>
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

        const popupHtml = `
            <div class="map-popup-card">
                <img src="${project.cover}" alt="${project.name}">
                <div class="map-popup-body">
                    <h6>${project.name}</h6>
                    <a href="${project.url}" class="map-popup-link">Lihat Detail &rarr;</a>
                </div>
            </div>
        `;

        marker.bindPopup(popupHtml);
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