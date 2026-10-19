<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | The Lost City of Dwarka</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">
  <style>
    body { margin: 0; font-family: 'Inter', sans-serif; background: #0b0b0b; color: #eaeaea; line-height: 1.7; }
    .container { max-width: 1100px; margin: auto; padding: 120px 30px 60px; }
    .story-hero h2 { font-family: 'Cinzel', serif; font-size: 38px; color: #d4af37; margin-bottom: 10px; }
    .story-hero h4 { color: #999; font-weight: 400; margin-top: 0; font-size: 18px; }
    .hero-img { width: 100%; max-height: 480px; object-fit: cover; border-radius: 12px; margin: 25px 0; border: 1px solid #222; }
    .section-title { font-family: 'Cinzel', serif; color: #d4af37; font-size: 24px; margin: 35px 0 12px; }
    .image-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; padding: 30px 0 50px; }
    .image-grid img { width: 100%; height: 220px; object-fit: cover; border-radius: 10px; border: 1px solid #222; transition: transform 0.3s; }
    .image-grid img:hover { transform: scale(1.03); border-color: #d4af37; }
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Dwarka: The Lost Submerged Kingdom</h2>
    <h4>Marine Archaeology & Submerged Ruins off the Coast of Gujarat</h4>
    <img src="static/dwarka.jpg" alt="Dwarka City" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="dwarka">
      <div class="player-header">
        <div class="player-title">
          <span class="ai-badge">🎙️ AI VOICE NARRATOR</span>
          <span class="now-reading">Listen in 3 Languages</span>
        </div>
        <div class="lang-selector">
          <button class="lang-btn active" data-lang="en">🇬🇧 English</button>
          <button class="lang-btn" data-lang="hi">🇮🇳 हिन्दी (Hindi)</button>
          <button class="lang-btn" data-lang="mr">🚩 मराठी (Marathi)</button>
        </div>
      </div>
      <div class="player-controls">
        <button class="play-ctrl-btn" id="audioPlayBtn" title="Play / Pause Narration">▶</button>
        <button class="stop-ctrl-btn" id="audioStopBtn" title="Stop Narration">⏹</button>
        <div class="audio-progress-wrap">
          <div class="audio-progress-bar" id="audioProgressBar"></div>
        </div>
        <div class="speed-control">
          <label>Speed:</label>
          <select id="audioSpeed">
            <option value="0.9">0.9x</option>
            <option value="1.0" selected>1.0x</option>
            <option value="1.2">1.2x</option>
          </select>
        </div>
      </div>
      <div class="audio-status" id="audioStatus">Select a language (English, हिन्दी, मराठी) and click ▶ to listen.</div>
    </div>

    <!-- Quick Exploration Actions -->
    <div style="display:flex; gap:12px; margin:20px 0 25px; flex-wrap:wrap;">
      <a href="map.php?loc=3" style="background:#141414; border:1px solid #d4af37; color:#d4af37; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:600; display:inline-flex; align-items:center; gap:6px;">
        📍 View Dwarka on Interactive Map
      </a>
      <a href="evidence.php?topic=dwarka" style="background:linear-gradient(135deg, #d4af37, #997305); color:#000; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:700; display:inline-flex; align-items:center; gap:6px;">
        🔬 4-Part Evidence & Sources Dossier
      </a>
      <a href="quiz.php?category=architecture" style="background:#141414; border:1px solid #333; color:#eee; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:600;">
        🧠 Take Archaeology Quiz
      </a>
    </div>

    <h3 class="section-title">Mythological Significance</h3>
    <p>
      In Hindu epics, Dwarka was the majestic fortified capital established by Lord Krishna after migrating from Mathura to safeguard the Yadavas. According to the <em>Mahabharata</em> and <em>Harivamsa</em>, the golden city was built by the celestial architect Vishwakarma. Following the departure of Krishna and the destruction of the Vrishnis, massive ocean surges rose from the Arabian Sea, engulfing the golden gates, temples, and palaces beneath the waves.
    </p>

    <h3 class="section-title">Scientific & Archaeological Interpretation</h3>
    <p>
      Marine archaeological explorations directed by the <strong>National Institute of Oceanography (NIO)</strong> led by Dr. S.R. Rao conducted underwater sonar and SCUBA diving surveys off the coast of Bet Dwarka and modern Dwarka:
    </p>
    <ul>
      <li><strong>Submerged Stone Fortifications:</strong> Underwater archaeologists excavated massive semi-circular sandstone bastions, paved jetty stones, and submerged residential structures extending up to 1.5 km seaward.</li>
      <li><strong>Triangular 3-Hole Anchors:</strong> Dozens of monolithic 3-holed stone anchors were recovered, matching the design of Bronze Age anchors found in the Mediterranean (Syria and Cyprus) dating between 1500 BCE and 3000 BCE.</li>
      <li><strong>Post-Glacial Sea Level Rise:</strong> Oceanographic models demonstrate that rising sea levels following the last glacial maximum, coupled with tectonic subduction along the Gulf of Khambhat, repeatedly submerged coastal settlements.</li>
    </ul>

    <div class="image-grid">
      <img src="static/dwarka1.jpg" alt="Dwarka Aerial View">
      <img src="static/dwarka2.jpg" alt="Dwarka Submerged Ruins">
      <img src="static/dwarka3.jpg" alt="Dwarka Marine Anchor">
      <img src="static/dwarka4.jpg" alt="Dwarka Coastal Mapping">
      <img src="static/dwarka5.jpg" alt="Dwarka Archaeological Chart">
      <img src="static/dwarka6.jpg" alt="Dwarka Artifacts">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Archaeological & Oceanographic Sources</h4>
      <p style="color:#aaa; font-size:14px;">
        • Rao, S. R. (1999). <em>The Lost City of Dvaraka</em>. Aditya Prakashan.<br>
        • National Institute of Oceanography (NIO), Goa: <em>Marine Archaeological Excavations in Dwarka Waters</em>.<br>
        • Gaur, A. S. et al. (2004). <em>Submerged Structure off Dwarka: An Archaeological Overview</em>. Current Science.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
