<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Nataraja & Quantum Particle Physics</title>
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
    .quote-box { background: #141414; border-left: 4px solid #d4af37; padding: 20px 25px; border-radius: 6px; font-style: italic; color: #f1d46b; margin: 25px 0; }
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Nataraja & Quantum Particle Physics</h2>
    <h4>The Cosmic Dance of Shiva and the Subatomic Dance of Matter at CERN</h4>
    <img src="static/god.jpg" alt="Nataraja Cosmic Dance" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="nataraja">
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

    <h3 class="section-title">The Ananda Tandava (Dance of Bliss)</h3>
    <p>
      In Hindu iconography, Lord Shiva as <strong>Nataraja</strong> embodies the eternal rhythm of the cosmos. Encircling the deity is the <em>Prabhamandala</em> (ring of cosmic fire representing space-time). In his upper right hand, Shiva holds the <em>Damaru</em> (drum of creation emitting primordial sound waves), and in his upper left hand, he holds <em>Agni</em> (fire of transformation and destruction).
    </p>

    <div class="quote-box">
      "Modern physics has shown that the rhythm of creation and destruction is not only manifest in the turn of the seasons and in the birth and death of all living creatures, but is also the very essence of inorganic matter... For modern physicists, then, Shiva's dance is the dance of subatomic matter."
      <div style="font-size:13px; color:#aaa; margin-top:8px; font-style:normal;">— <strong>Dr. Fritjof Capra</strong>, Theoretical Physicist, <em>The Tao of Physics</em></div>
    </div>

    <h3 class="section-title">The CERN Statue in Geneva</h3>
    <p>
      On June 18, 2004, a 2-meter tall bronze statue of Nataraja was unveiled at the <strong>European Organization for Nuclear Research (CERN)</strong> in Geneva, Switzerland — the home of the Large Hadron Collider (LHC).
    </p>
    <ul>
      <li><strong>Quantum Field Theory:</strong> Subatomic particles are not static billiard balls; they are continuous fluctuations and oscillations of underlying energy fields — constantly creating and annihilating particle-antiparticle pairs in a subatomic dance.</li>
      <li><strong>Conservation of Energy:</strong> Energy cannot be created nor destroyed, only transformed — mirroring the five cosmic actions (Pancha Kritya: creation, sustenance, destruction, illusion, and liberation).</li>
    </ul>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Physics References & Plaques</h4>
      <p style="color:#aaa; font-size:14px;">
        • CERN Official Document Archives: <em>Shiva's Cosmic Dance at CERN</em><br>
        • Capra, Fritjof (1975). <em>The Tao of Physics</em><br>
        • Carl Sagan (1980). <em>Cosmos: A Personal Voyage</em>
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
