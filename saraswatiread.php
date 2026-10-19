<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | The Lost Saraswati River</title>
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
    <h2>The Lost Saraswati River</h2>
    <h4>ISRO Satellite Radar Mapping & Paleochannel Subterranean Courses</h4>
    <img src="static/Saraswati.jpg" alt="Vedic Saraswati River" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="saraswati">
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

    <h3 class="section-title">The Mighty River of the Rigveda</h3>
    <p>
      In the <em>Rigveda</em> (the <em>Nadistuti Sukta</em>, 10.75), the Saraswati is praised as <em>"Ambitame, Naditame, Devitame"</em> (best of mothers, best of rivers, best of goddesses). Described as a majestic, snow-fed perennial river flowing from the Himalayas between the Yamuna and Sutlej, it emptied directly into the Arabian Sea in the Rann of Kutch.
    </p>

    <h3 class="section-title">Satellite Radar Discovery & Geological Proof</h3>
    <p>
      For over a century, colonial historians considered the Saraswati a mythical allegory. However, modern remote sensing technology has completely rewritten the narrative:
    </p>
    <ul>
      <li><strong>ISRO Synthetic Aperture Radar (SAR):</strong> Satellite sensors penetrated desert sand layers in Rajasthan and Haryana, mapping a massive subterranean river course (paleochannel) up to 8 km wide matching the Rigvedic path.</li>
      <li><strong>Tectonic Avulsion:</strong> Geological sediment core analyses revealed that major seismic shifts in the Himalayan foothills (around 1900 BCE) diverted the river's two primary glacial feeder tributaries: the Yamuna shifted eastward toward the Ganga, and the Sutlej shifted westward toward the Indus, causing the central Saraswati channel (Ghaggar-Hakra) to desiccate.</li>
      <li><strong>Concentration of Harappan Settlements:</strong> Over 60% of archaeological sites in the Indus-Saraswati civilization (including Rakhigarhi, Kalibangan, and Banawali) are clustered along the dry bed of the Saraswati rather than the Indus.</li>
    </ul>

    <div class="image-grid">
      <img src="static/saras1.jpg" alt="Saraswati Paleochannel Map">
      <img src="static/saras2.jpg" alt="Rakhigarhi Archaeological Site">
      <img src="static/saras3.jpg" alt="Thar Desert Radar Survey">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Geological & Remote Sensing Citations</h4>
      <p style="color:#aaa; font-size:14px;">
        • ISRO Space Applications Centre: <em>Paleochannel Mapping of Vedic Saraswati River</em>.<br>
        • Valdiya, K. S. (2002). <em>Saraswati: The River That Disappeared</em>. Universities Press.<br>
        • Geological Society of India Special Memoir on the Saraswati Basin.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
