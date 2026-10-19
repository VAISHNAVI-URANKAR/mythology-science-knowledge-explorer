<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Surya Siddhanta & Vedic Astronomy</title>
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
    .calculation-box { background: #141414; border: 1px solid rgba(212, 175, 55, 0.3); border-radius: 10px; padding: 25px; margin: 25px 0; }
    .math-formula { font-size: 18px; color: #f1d46b; font-weight: 600; margin: 10px 0; }
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Surya Siddhanta & Vedic Astronomy</h2>
    <h4>Planetary Epicycles, Sidereal Calendars & The Speed of Light</h4>
    <img src="static/god.jpg" alt="Surya Siddhanta Astronomy" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="surya">
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

    <h3 class="section-title">The Classical Astronomical Treatise</h3>
    <p>
      The <em>Surya Siddhanta</em> is one of the earliest preserved mathematical treatises on astronomy (Jyotisha Shastra) in ancient India. According to tradition, the knowledge of cosmic time, celestial coordinates, and planetary orbits was revealed by Surya (the Sun deity) to the sage Mayasura at the end of the Satya Yuga.
    </p>

    <h3 class="section-title">Scientific Feats & Calculations</h3>
    
    <div class="calculation-box">
      <h4 style="color:#d4af37;">1. Sidereal Solar Year Precision</h4>
      <p>The Surya Siddhanta calculated the length of the sidereal solar year (time taken for Earth to orbit the Sun relative to fixed stars):</p>
      <div class="math-formula">Surya Siddhanta: 365.2563627 days</div>
      <p>Modern Atomic Clock Measurement: <strong>365.2563630 days</strong> (Accurate to within 1.4 seconds per year!)</p>
    </div>

    <div class="calculation-box">
      <h4 style="color:#d4af37;">2. Sayana's Speed of Light Commentary</h4>
      <p>In his 14th-century commentary on Rigveda 1.50.4, scholar Sayana wrote: <em>"Tatha cha smaryate yojananam sahasre dve dve sate dve cha yojane, ekena nimishardhena kramaman"</em></p>
      <div class="math-formula">Distance: 2,202 Yojanas per half-nimesha (0.1066 sec) ≈ 187,670 miles/sec (302,000 km/s)</div>
      <p>Modern Physics Value: <strong>299,792 km/s</strong> (186,282 miles/s)</p>
    </div>

    <h3 class="section-title">Spherical Earth and Gravity</h3>
    <p>
      Long before the European Renaissance, astronomers like Aryabhata, Varahamihira, and Bhaskara II utilized the principles of the Surya Siddhanta to demonstrate:
    </p>
    <ul>
      <li><strong>Earth as a Sphere (Golakara):</strong> Suspended without physical support in space (<em>Akasha</em>).</li>
      <li><strong>Planetary Rotation (Bhramana):</strong> Celestial diurnal motion caused by Earth's axial rotation.</li>
      <li><strong>Gravitational Attraction (Gurutvakarshan):</strong> Bhaskara II noted in <em>Siddhanta Shiromani</em> that the Earth naturally draws all celestial and terrestrial objects toward itself with an attractive force.</li>
    </ul>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Sources & Mathematical Documentation</h4>
      <p style="color:#aaa; font-size:14px;">
        • Burgess, Ebenezer (1860). <em>Translation of the Surya Siddhanta: A Text-Book of Hindu Astronomy</em><br>
        • Subhash Kak (1998). <em>The Speed of Light and Puranic Cosmology</em>, Annals of the Bhandarkar Oriental Research Institute<br>
        • Indian National Science Academy (INSA) Archives of History of Science
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
