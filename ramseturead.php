<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Ram Setu - The Bridge to Lanka</title>
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
    .image-grid img { width: 100%; height: 220px; object-fit: cover; border-radius: 10px; border: 1px solid #222; }
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Ram Setu: The Bridge to Lanka</h2>
    <h4>Satellite Imagery, Coral Shoal Formations & Ancient Maritime Engineering</h4>
    <img src="static/Ram setu.jpg" alt="Ram Setu Shoals" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="ramsetu">
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
      <a href="map.php?loc=1" style="background:#141414; border:1px solid #d4af37; color:#d4af37; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:600; display:inline-flex; align-items:center; gap:6px;">
        📍 View Ram Setu on Interactive Map
      </a>
      <a href="evidence.php?topic=ramsetu" style="background:linear-gradient(135deg, #d4af37, #997305); color:#000; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:700; display:inline-flex; align-items:center; gap:6px;">
        🔬 4-Part Evidence & Sources Dossier
      </a>
      <a href="quiz.php?category=ramayana" style="background:#141414; border:1px solid #333; color:#eee; padding:9px 18px; border-radius:20px; text-decoration:none; font-size:13px; font-weight:600;">
        🧠 Take Ramayana Quiz
      </a>
    </div>

    <h3 class="section-title">Mythological Account</h3>
    <p>
      In the ancient epic <em>Ramayana</em>, Lord Rama required a bridge across the Palk Strait to cross from Dhanushkodi in southern India to Lanka to rescue his wife Sita. Under the direction of master architects Nala and Nila (sons of Vishwakarma), the Vanara army inscribed the holy name of Rama on stones, which floated atop the ocean waters to forge a 100-yojana causeway within five days.
    </p>

    <h3 class="section-title">Scientific, Geological & Satellite Analysis</h3>
    <p>
      Marine geological expeditions and satellite observations conducted by space research organizations have revealed several intriguing empirical facts:
    </p>
    <ul>
      <li><strong>48-km Linear Shoal Formation:</strong> High-resolution satellite imagery from NASA and ISRO shows a distinct, non-random chain of limestone and sandstone shoals spanning the Palk Strait between Pamban Island and Mannar Island.</li>
      <li><strong>Discrepancy in Carbon Dating:</strong> Scientific core drilling and optical thermoluminescence (OSL) studies revealed that the top layer of boulders sits upon a marine sandbank. Crucially, the stones were carbon-dated to ~7,000 years old, whereas the underlying sandbank is only ~4,000 years old, indicating the rocks were moved and placed manually atop the natural ridge.</li>
      <li><strong>Walkable Causeway Until 1480 CE:</strong> Historical and temple records in Rameswaram confirm that the causeway was entirely above sea level and walkable on foot until a catastrophic cyclonic storm breached the ridge in the 15th century.</li>
    </ul>

    <div class="image-grid">
      <img src="static/ramsetu1.jpg" alt="Satellite Image 1">
      <img src="static/ramsetu2.jpg" alt="Satellite Image 2">
      <img src="static/ramsetu3.jpg" alt="Satellite Image 3">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Scientific & Geological References</h4>
      <p style="color:#aaa; font-size:14px;">
        • Space Applications Centre, ISRO: <em>Marine Remote Sensing of the Palk Strait</em>.<br>
        • Geological Survey of India (GSI) Special Publication on Marine Geology.<br>
        • Science Channel: <em>What on Earth? (Ancient Land Bridge Episode)</em>.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
