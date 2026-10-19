<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Hanuman and the Sun Distance</title>
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
    .calc-box { background: #141414; border: 1px solid rgba(212, 175, 55, 0.3); border-radius: 10px; padding: 25px; margin: 25px 0; }
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
    <h2>Hanuman and the Sun Distance</h2>
    <h4>Mathematical Decoding of the Hanuman Chalisa Astronomical Verse</h4>
    <img src="static/Hanuman.jpg" alt="Hanuman and the Sun" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="hanuman">
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

    <h3 class="section-title">Mythological Legend</h3>
    <p>
      According to the Valmiki Ramayana, when Hanuman was a child, he felt intense hunger at dawn. Looking toward the eastern horizon, he saw the glowing golden orb of the Sun and mistook it for a delicious, ripe fruit. Endowed with divine strength, he leapt across the celestial sky to grasp the Sun, demonstrating the ancient poetic vision of cosmic travel.
    </p>

    <h3 class="section-title">Mathematical & Scientific Analysis</h3>
    <p>
      In the 16th century, the sage-poet Goswami Tulsidas composed the <em>Hanuman Chalisa</em>, which contains the famous verse describing the leap to the Sun:
    </p>

    <div class="calc-box">
      <h4 style="color:#d4af37; font-size:18px;">युग सहस्त्र योजन पर भानू । लील्यो ताहि मधुर फल जानू ॥</h4>
      <p style="color:#bbb; margin:10px 0;">(<em>Yug Sahastra Yojan Par Bhanu, Leelyo Taahi Madhur Phal Jaanu</em>)</p>
      <ul style="color:#ddd; margin-left:20px; line-height:1.9;">
        <li><strong>1 Yug</strong> (Chaturyugi factor in astronomical calculations) = 12,000 celestial units</li>
        <li><strong>1 Sahastra</strong> = 1,000</li>
        <li><strong>1 Yojan</strong> (Standard ancient distance unit) = 8 miles (approx. 12.8 km)</li>
      </ul>
      <div style="font-size:18px; color:#f1d46b; font-weight:bold; margin-top:15px;">
        Computation: 12,000 × 1,000 × 8 miles = 96,000,000 miles ≈ 149.6 Million km
      </div>
      <p style="color:#aaa; font-size:13.5px; margin-top:8px;">
        Modern NASA Average Earth-to-Sun Distance (1 Astronomical Unit): <strong>149,597,870 km (~149.6 Million km)</strong>. The accuracy of this ancient numerical formulation remains one of the most celebrated poetic calculations in Indian literature.
      </p>
    </div>

    <div class="image-grid">
      <img src="static/hanuman1.jpg" alt="Hanuman Art 1">
      <img src="static/hanuman2.jpg" alt="Hanuman Art 2">
      <img src="static/hanuman3.jpg" alt="Hanuman Art 3">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Sources & Mathematical References</h4>
      <p style="color:#aaa; font-size:14px;">
        • Tulsidas (c. 1600). <em>Hanuman Chalisa</em>, Verse 18.<br>
        • NASA Solar System Exploration: Earth-Sun Distance (1 AU Standards).<br>
        • Kak, Subhash (2000). <em>The Astronomical Code of the Rigveda</em>.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
