<?php
require_once __DIR__ . '/config/db.php';

$pdo = Database::getInstance();
$locations = [];
try {
    $stmt = $pdo->query("SELECT * FROM event_locations ORDER BY id ASC");
    $locations = $stmt->fetchAll();
} catch (Exception $e) {
    // Handled gracefully in UI
}

$selectedLocId = isset($_GET['loc']) ? (int)$_GET['loc'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Interactive Mythology & Archaeology Map | Mythology Science Explorer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <!-- Leaflet.js CSS (Free Open Source, No API Key Required) -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #050505; color: #f0f0f0; font-family: 'Inter', sans-serif; overflow-x: hidden; }

    .map-header {
      padding: 110px 40px 20px;
      max-width: 1400px;
      margin: 0 auto;
    }
    .map-header h1 {
      font-family: 'Cinzel', serif;
      font-size: 36px;
      color: #d4af37;
      margin-bottom: 8px;
    }
    .map-header p {
      color: #aaa;
      font-size: 14.5px;
      max-width: 850px;
      line-height: 1.6;
    }

    /* MAP CONTAINER LAYOUT */
    .map-wrapper {
      max-width: 1400px;
      margin: 0 auto 60px;
      padding: 0 40px;
      display: grid;
      grid-template-columns: 340px 1fr;
      gap: 25px;
      align-items: start;
    }

    /* SIDEBAR CONTROLS */
    .map-sidebar {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .panel-box {
      background: #0d0d0d;
      border: 1px solid #222;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.4);
    }
    .panel-box h3 {
      font-family: 'Cinzel', serif;
      color: #d4af37;
      font-size: 16px;
      margin-bottom: 14px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    /* FILTERS */
    .filter-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .filter-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13.5px;
      color: #ccc;
      cursor: pointer;
    }
    .filter-item input[type="checkbox"] {
      accent-color: #d4af37;
      width: 16px;
      height: 16px;
      cursor: pointer;
    }
    .badge-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      display: inline-block;
    }
    .dot-archaeological { background: #2ed573; box-shadow: 0 0 6px rgba(46, 213, 115, 0.6); }
    .dot-traditional { background: #d4af37; box-shadow: 0 0 6px rgba(212, 175, 55, 0.6); }
    .dot-proposed { background: #ffa502; box-shadow: 0 0 6px rgba(255, 165, 2, 0.6); }
    .dot-disputed { background: #ff4757; box-shadow: 0 0 6px rgba(255, 71, 87, 0.6); }

    /* LOCATION BUTTONS & PRIVACY */
    .btn-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      padding: 12px 16px;
      background: linear-gradient(135deg, #d4af37, #b8860b);
      color: #000;
      font-weight: 700;
      font-size: 13.5px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.25s;
    }
    .btn-action:hover {
      background: linear-gradient(135deg, #f1d46b, #d4af37);
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.35);
    }
    .btn-secondary {
      background: #181818;
      border: 1px solid #333;
      color: #d4af37;
    }
    .btn-secondary:hover {
      background: #222;
      color: #fff;
    }
    .privacy-notice {
      font-size: 11px;
      color: #777;
      margin-top: 8px;
      line-height: 1.4;
    }

    /* DISTANCE CALCULATOR */
    .calc-row {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 12px;
    }
    .calc-row label {
      font-size: 12px;
      color: #888;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .calc-select {
      background: #141414;
      border: 1px solid #333;
      color: #fff;
      padding: 9px 12px;
      border-radius: 6px;
      font-size: 13px;
      outline: none;
    }
    .calc-select:focus { border-color: #d4af37; }
    .calc-result-box {
      background: #141414;
      border: 1px solid #282828;
      padding: 12px;
      border-radius: 6px;
      margin-top: 10px;
      font-size: 13px;
      display: none;
    }
    .calc-result-box .km-val {
      font-size: 20px;
      color: #d4af37;
      font-weight: 700;
    }

    /* NEARBY LIST */
    .nearby-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      max-height: 260px;
      overflow-y: auto;
      padding-right: 4px;
    }
    .nearby-item {
      background: #141414;
      border: 1px solid #222;
      padding: 10px 12px;
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: all 0.2s;
    }
    .nearby-item:hover {
      border-color: #d4af37;
      background: #1c1c1c;
      transform: translateX(3px);
    }
    .nearby-name {
      font-size: 13px;
      font-weight: 600;
      color: #eee;
    }
    .nearby-dist {
      font-size: 12px;
      color: #d4af37;
      font-weight: 600;
      white-space: nowrap;
    }

    /* MAP CONTAINER */
    .map-main-box {
      position: relative;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid #222;
      box-shadow: 0 10px 30px rgba(0,0,0,0.6);
      height: 720px;
      background: #111;
    }
    #mythologyMap {
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    /* LEAFLET POPUP CUSTOMIZATION */
    .leaflet-popup-content-wrapper {
      background: #0d0d0d !important;
      color: #eee !important;
      border: 1px solid #333 !important;
      border-radius: 8px !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.8) !important;
      font-family: 'Inter', sans-serif !important;
    }
    .leaflet-popup-tip {
      background: #0d0d0d !important;
      border: 1px solid #333 !important;
    }
    .popup-container {
      max-width: 320px;
      padding: 4px;
    }
    .popup-header {
      font-family: 'Cinzel', serif;
      font-size: 16px;
      color: #fff;
      margin-bottom: 4px;
    }
    .popup-event {
      font-size: 12px;
      color: #aaa;
      margin-bottom: 8px;
    }
    .popup-badge {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 600;
      margin-bottom: 8px;
    }
    .badge-archaeological-site { background: rgba(46, 213, 115, 0.15); color: #2ed573; border: 1px solid rgba(46, 213, 115, 0.3); }
    .badge-traditional-location { background: rgba(212, 175, 55, 0.15); color: #d4af37; border: 1px solid rgba(212, 175, 55, 0.3); }
    .badge-proposed-location { background: rgba(255, 165, 2, 0.15); color: #ffa502; border: 1px solid rgba(255, 165, 2, 0.3); }
    .badge-disputed-location { background: rgba(255, 71, 87, 0.15); color: #ff4757; border: 1px solid rgba(255, 71, 87, 0.3); }

    .popup-meta {
      font-size: 11.5px;
      color: #888;
      margin-bottom: 8px;
    }
    .popup-desc {
      font-size: 12.5px;
      color: #ccc;
      line-height: 1.5;
      margin-bottom: 8px;
    }
    .popup-sci {
      background: #151515;
      border-left: 3px solid #d4af37;
      padding: 6px 10px;
      font-size: 11.5px;
      color: #bbb;
      margin-bottom: 10px;
      line-height: 1.4;
    }
    .popup-link {
      display: inline-block;
      color: #d4af37;
      font-size: 12px;
      font-weight: 600;
      text-decoration: none;
    }
    .popup-link:hover { text-decoration: underline; }

    /* ACADEMIC DISCLAIMER BANNER */
    .disclaimer-banner {
      background: rgba(212, 175, 55, 0.08);
      border: 1px solid rgba(212, 175, 55, 0.25);
      border-radius: 8px;
      padding: 14px 20px;
      margin: 0 40px 30px;
      max-width: 1400px;
      margin-left: auto;
      margin-right: auto;
      font-size: 13px;
      color: #ccc;
      line-height: 1.6;
    }
    .disclaimer-banner strong { color: #d4af37; }

    @media (max-width: 992px) {
      .map-wrapper {
        grid-template-columns: 1fr;
        padding: 0 20px;
      }
      .map-header, .disclaimer-banner {
        padding-left: 20px;
        padding-right: 20px;
      }
      .map-main-box {
        height: 520px;
      }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<header class="map-header">
  <p class="tag">✦ GEOGRAPHICAL & ARCHAEOLOGICAL ATLAS</p>
  <h1>Explore Mythological Locations</h1>
  <p>
    An interactive open-access map plotting ancient epic locations alongside archaeological excavations, satellite radar paleochannels, and submerged maritime structures across South Asia.
  </p>
</header>

<div class="disclaimer-banner">
  <strong>🔬 Scientific & Historical Distinction:</strong>
  Traditional literary associations are distinguished from documented archaeological and geological sites. Points on this map are categorized as <em>Archaeological Sites</em>, <em>Traditional / Associated Locations</em>, <em>Proposed Sites</em>, or <em>Disputed Evidence</em> to foster empirical exploration rather than unverified equivalence.
</div>

<main class="map-wrapper">

  <!-- LEFT CONTROLS SIDEBAR -->
  <aside class="map-sidebar">

    <!-- 1. LIVE USER LOCATION & NEARBY -->
    <div class="panel-box">
      <h3>
        <span>Live Exploration</span>
        <span id="locStatusIcon">📍</span>
      </h3>
      <button type="button" class="btn-action" id="findLocationBtn">
        <span>📍</span> Find My Location
      </button>
      <p class="privacy-notice" id="geoNotice">
        🔒 <strong>Privacy Assured:</strong> Your browser coordinates are processed locally in memory for distance calculations only. Your exact location is never permanently stored or shared without permission.
      </p>

      <div id="nearbySection" style="display: none; margin-top: 15px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
          <h4 style="font-size:13px; color:#d4af37; text-transform:uppercase; letter-spacing:0.5px;">Nearby Sites</h4>
          <span style="font-size:11px; color:#777;" id="nearbySortLabel">Closest First</span>
        </div>
        <div class="nearby-list" id="nearbyList"></div>
      </div>
    </div>

    <!-- 2. MAP FILTERS & LEGEND -->
    <div class="panel-box">
      <h3>Map Filters & Legend</h3>
      <div class="filter-group">
        <label class="filter-item">
          <input type="checkbox" id="filterArchaeological" checked>
          <span class="badge-dot dot-archaeological"></span>
          <span>Archaeological Sites (Excavated)</span>
        </label>
        <label class="filter-item">
          <input type="checkbox" id="filterTraditional" checked>
          <span class="badge-dot dot-traditional"></span>
          <span>Traditional / Associated Sites</span>
        </label>
        <label class="filter-item">
          <input type="checkbox" id="filterProposed" checked>
          <span class="badge-dot dot-proposed"></span>
          <span>Proposed / Hydrogeological Sites</span>
        </label>
        <label class="filter-item">
          <input type="checkbox" id="filterDisputed" checked>
          <span class="badge-dot dot-disputed"></span>
          <span>Disputed / Speculative Evidence</span>
        </label>
      </div>
    </div>

    <!-- 3. DISTANCE CALCULATOR -->
    <div class="panel-box">
      <h3>Distance Calculator</h3>
      <div class="calc-row">
        <label>Origin Point</label>
        <select class="calc-select" id="calcOrigin">
          <option value="user" disabled selected>📍 My Location (Click Find My Location)</option>
          <?php foreach ($locations as $loc): ?>
            <option value="<?= $loc['id'] ?>"><?= htmlspecialchars($loc['location_name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="calc-row">
        <label>Destination Site</label>
        <select class="calc-select" id="calcDestination">
          <option value="" disabled selected>Select Destination...</option>
          <?php foreach ($locations as $loc): ?>
            <option value="<?= $loc['id'] ?>"><?= htmlspecialchars($loc['location_name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <button type="button" class="btn-action btn-secondary" id="calculateDistBtn" style="margin-top:6px;">
        Measure Distance ➔
      </button>

      <div class="calc-result-box" id="calcResultBox">
        <div style="color:#aaa; font-size:12px; margin-bottom:4px;">Approximate Geodesic Distance:</div>
        <div class="km-val" id="calcKmVal">0 km</div>
        <div style="margin-top:8px;">
          <a href="#" target="_blank" rel="noopener noreferrer" class="popup-link" id="openInMapsLink">
            🗺️ Open Directions in Maps ➔
          </a>
        </div>
      </div>
    </div>

  </aside>

  <!-- RIGHT MAP VIEWPORT -->
  <section class="map-main-box">
    <div id="mythologyMap"></div>
  </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<!-- Leaflet.js (Free OpenStreetMap library) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
// Initial raw location dataset from PostgreSQL
const rawLocations = <?= json_encode($locations, JSON_UNESCAPED_UNICODE) ?>;
const selectedTargetId = <?= $selectedLocId ?>;

let userLatLng = null;
let userMarker = null;
let markersMap = {};
let map = null;

// Initialize Leaflet Map centered over the Indian Subcontinent
function initMap() {
  map = L.map('mythologyMap', {
    center: [22.5, 78.5],
    zoom: 5,
    minZoom: 3,
    maxZoom: 17
  });

  // OpenStreetMap Tile Layer (Free, Open-Source, No API Key)
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | Mythology Science Explorer'
  }).addTo(map);

  renderMarkers();

  // If a location ID was specified in URL query, zoom straight to it
  if (selectedTargetId && markersMap[selectedTargetId]) {
    setTimeout(() => {
      const target = markersMap[selectedTargetId];
      map.setView(target.marker.getLatLng(), 9);
      target.marker.openPopup();
      recordLocationVisit(target.data.location_name);
    }, 400);
  }
}

// Marker Color Definitions
function getMarkerColor(locType) {
  if (locType.includes('Archaeological')) return '#2ed573';
  if (locType.includes('Proposed')) return '#ffa502';
  if (locType.includes('Disputed')) return '#ff4757';
  return '#d4af37'; // Traditional
}

// Create custom SVG marker pin
function createCustomPin(color) {
  const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 36" width="28" height="42">
    <path d="M12 0C5.373 0 0 5.373 0 12c0 9 12 24 12 24s12-15 12-24c0-6.627-5.373-12-12-12z" fill="${color}" stroke="#ffffff" stroke-width="1.5"/>
    <circle cx="12" cy="12" r="5" fill="#0b0b0b"/>
  </svg>`;
  return L.divIcon({
    className: 'custom-map-pin',
    html: svg,
    iconSize: [28, 42],
    iconAnchor: [14, 42],
    popupAnchor: [0, -38]
  });
}

// Render All Location Markers
function renderMarkers() {
  const showArch = document.getElementById('filterArchaeological').checked;
  const showTrad = document.getElementById('filterTraditional').checked;
  const showProp = document.getElementById('filterProposed').checked;
  const showDisp = document.getElementById('filterDisputed').checked;

  rawLocations.forEach(loc => {
    const lType = loc.location_type || '';
    let visible = true;
    if (lType.includes('Archaeological') && !showArch) visible = false;
    else if (lType.includes('Traditional') && !showTrad) visible = false;
    else if (lType.includes('Proposed') && !showProp) visible = false;
    else if (lType.includes('Disputed') && !showDisp) visible = false;

    if (!markersMap[loc.id]) {
      const pinColor = getMarkerColor(lType);
      const icon = createCustomPin(pinColor);
      const marker = L.marker([parseFloat(loc.latitude), parseFloat(loc.longitude)], { icon });

      // Badge CSS class
      let badgeClass = 'badge-traditional-location';
      if (lType.includes('Archaeological')) badgeClass = 'badge-archaeological-site';
      else if (lType.includes('Proposed')) badgeClass = 'badge-proposed-location';
      else if (lType.includes('Disputed')) badgeClass = 'badge-disputed-location';

      const popupHtml = `
        <div class="popup-container">
          <div class="popup-header">${escapeHtml(loc.location_name)}</div>
          <div class="popup-event">${escapeHtml(loc.event_name)}</div>
          <span class="popup-badge ${badgeClass}">${escapeHtml(lType)}</span>
          <div class="popup-meta">
            <strong>Evidence Status:</strong> ${escapeHtml(loc.evidence_status)}<br>
            <strong>Coordinates:</strong> ${parseFloat(loc.latitude).toFixed(4)}°N, ${parseFloat(loc.longitude).toFixed(4)}°E
          </div>
          <p class="popup-desc">${escapeHtml(loc.description)}</p>
          <div class="popup-sci">
            <strong>Scientific Context:</strong> ${escapeHtml(loc.scientific_context)}
          </div>
          ${loc.story_link ? `<a href="${escapeHtml(loc.story_link)}" class="popup-link">📖 Read Associated Story & Research →</a>` : ''}
        </div>
      `;
      marker.bindPopup(popupHtml);
      marker.on('click', () => {
        recordLocationVisit(loc.location_name);
      });

      markersMap[loc.id] = { marker, data: loc };
    }

    if (visible) {
      if (!map.hasLayer(markersMap[loc.id].marker)) {
        markersMap[loc.id].marker.addTo(map);
      }
    } else {
      if (map.hasLayer(markersMap[loc.id].marker)) {
        map.removeLayer(markersMap[loc.id].marker);
      }
    }
  });
}

// Filter Checkbox Listeners
['filterArchaeological', 'filterTraditional', 'filterProposed', 'filterDisputed'].forEach(id => {
  document.getElementById(id).addEventListener('change', renderMarkers);
});

// Haversine formula implemented locally in JavaScript
function haversineDist(lat1, lon1, lat2, lon2) {
  const R = 6371; // km
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;
  const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon/2) * Math.sin(dLon/2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  return Math.round(R * c * 10) / 10;
}

// 📍 Live User Geolocation
const findBtn = document.getElementById('findLocationBtn');
const geoNotice = document.getElementById('geoNotice');
const locStatusIcon = document.getElementById('locStatusIcon');

findBtn.addEventListener('click', () => {
  if (!navigator.geolocation) {
    geoNotice.innerHTML = '⚠️ Geolocation is not supported by your browser.';
    return;
  }

  findBtn.disabled = true;
  findBtn.innerHTML = '<span>⏳</span> Locating...';
  geoNotice.innerHTML = 'Requesting location permission from browser...';

  navigator.geolocation.getCurrentPosition(
    (pos) => {
      userLatLng = [pos.coords.latitude, pos.coords.longitude];
      findBtn.disabled = false;
      findBtn.innerHTML = '<span>🟢</span> You Are Located';
      geoNotice.innerHTML = `🟢 <strong>Location detected:</strong> ${userLatLng[0].toFixed(3)}°N, ${userLatLng[1].toFixed(3)}°E (used locally only).`;
      locStatusIcon.innerText = '🟢';

      // Remove existing user marker if present
      if (userMarker) map.removeLayer(userMarker);

      // Create "🟢 You are here" marker
      const pulseIcon = L.divIcon({
        className: 'user-pulse-marker',
        html: `<div style="background:#2ed573;width:18px;height:18px;border-radius:50%;border:3px solid #fff;box-shadow:0 0 12px #2ed573;"></div>`,
        iconSize: [24, 24],
        iconAnchor: [12, 12]
      });
      userMarker = L.marker(userLatLng, { icon: pulseIcon }).addTo(map);
      userMarker.bindPopup('<div style="font-weight:700;color:#2ed573;padding:4px;">🟢 You are here</div>').openPopup();

      map.setView(userLatLng, 7);

      // Update Origin dropdown in Distance Calculator
      const calcOrigin = document.getElementById('calcOrigin');
      calcOrigin.options[0].disabled = false;
      calcOrigin.options[0].text = `📍 My Current Location (${userLatLng[0].toFixed(2)}°N, ${userLatLng[1].toFixed(2)}°E)`;
      calcOrigin.value = 'user';

      // Compute and display Nearby Locations
      updateNearbyList();
    },
    (err) => {
      findBtn.disabled = false;
      findBtn.innerHTML = '<span>📍</span> Find My Location';
      locStatusIcon.innerText = '⚠️';
      if (err.code === 1) {
        geoNotice.innerHTML = '⚠️ <strong>Permission Denied:</strong> Location access was not granted. You can still select any site manually.';
      } else if (err.code === 2) {
        geoNotice.innerHTML = '⚠️ <strong>Unavailable:</strong> Location could not be determined by network.';
      } else {
        geoNotice.innerHTML = '⚠️ <strong>Timeout:</strong> Location request timed out.';
      }
    },
    { timeout: 10000, enableHighAccuracy: true }
  );
});

// Update Nearby Locations Panel
function updateNearbyList() {
  if (!userLatLng) return;

  const nearbyList = document.getElementById('nearbyList');
  nearbyList.innerHTML = '';

  const sitesWithDist = rawLocations.map(loc => {
    const d = haversineDist(userLatLng[0], userLatLng[1], parseFloat(loc.latitude), parseFloat(loc.longitude));
    return { ...loc, dist: d };
  });

  // Sort ascending by distance
  sitesWithDist.sort((a, b) => a.dist - b.dist);

  sitesWithDist.forEach(site => {
    const item = document.createElement('div');
    item.className = 'nearby-item';
    item.innerHTML = `
      <div>
        <div class="nearby-name">${escapeHtml(site.location_name)}</div>
        <div style="font-size:11px; color:#777;">${escapeHtml(site.location_type)}</div>
      </div>
      <div class="nearby-dist">${site.dist} km</div>
    `;
    item.addEventListener('click', () => {
      if (markersMap[site.id]) {
        map.setView([parseFloat(site.latitude), parseFloat(site.longitude)], 10);
        markersMap[site.id].marker.openPopup();
        recordLocationVisit(site.location_name);
      }
    });
    nearbyList.appendChild(item);
  });

  document.getElementById('nearbySection').style.display = 'block';
}

// Distance Calculator Logic
document.getElementById('calculateDistBtn').addEventListener('click', () => {
  const originVal = document.getElementById('calcOrigin').value;
  const destVal = document.getElementById('calcDestination').value;

  if (!originVal || !destVal) {
    alert('Please select both an origin and a destination.');
    return;
  }

  let lat1, lon1, originName;
  if (originVal === 'user') {
    if (!userLatLng) {
      alert('Please click "Find My Location" first or choose a specific origin site.');
      return;
    }
    lat1 = userLatLng[0];
    lon1 = userLatLng[1];
    originName = 'My Location';
  } else {
    const originSite = rawLocations.find(l => String(l.id) === String(originVal));
    if (!originSite) return;
    lat1 = parseFloat(originSite.latitude);
    lon1 = parseFloat(originSite.longitude);
    originName = originSite.location_name;
  }

  const destSite = rawLocations.find(l => String(l.id) === String(destVal));
  if (!destSite) return;
  const lat2 = parseFloat(destSite.latitude);
  const lon2 = parseFloat(destSite.longitude);

  const distance = haversineDist(lat1, lon1, lat2, lon2);

  document.getElementById('calcKmVal').innerText = `${distance.toLocaleString()} km`;
  document.getElementById('calcResultBox').style.display = 'block';

  // Free OpenStreetMap external directions link
  const osmUrl = `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=${lat1.toFixed(5)},${lon1.toFixed(5)};${lat2.toFixed(5)},${lon2.toFixed(5)}`;
  const mapsLink = document.getElementById('openInMapsLink');
  mapsLink.href = osmUrl;
  mapsLink.innerText = `🗺️ Open Navigation (${originName} ➔ ${destSite.location_name}) →`;

  // Draw temporary polyline on map
  if (window.calcPolyline) map.removeLayer(window.calcPolyline);
  window.calcPolyline = L.polyline([[lat1, lon1], [lat2, lon2]], {
    color: '#d4af37',
    weight: 3,
    dashArray: '8, 8',
    opacity: 0.8
  }).addTo(map);

  map.fitBounds([[lat1, lon1], [lat2, lon2]], { padding: [60, 60] });
});

// Helper to record location visits for profile badges
function recordLocationVisit(locName) {
  fetch('api/locations.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ location_name: locName })
  }).catch(() => {});
}

function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text || '';
  return div.innerHTML;
}

// Window load init
window.addEventListener('DOMContentLoaded', initMap);
</script>

</body>
</html>
