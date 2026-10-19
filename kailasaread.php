<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Kailasa Temple Engineering</title>
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
    <h2>Kailasa Temple at Ellora</h2>
    <h4>Cave 16 — The Monolithic Marvel Carved from Top to Bottom</h4>
    <img src="static/temple.jpg" alt="Kailasa Temple Ellora" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="kailasa">
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

    <h3 class="section-title">Mythological & Architectural Conception</h3>
    <p>
      In Hindu tradition, the Kailasa Temple (Cave 16 of the Ellora Caves in Maharashtra) was envisioned as a terrestrial replica of Mount Kailash, the sacred Himalayan abode of Lord Shiva. According to legendary folklore, Queen Manikavati prayed to Lord Shiva when the King fell gravely ill, vowing to erect a temple and fast until she saw the crowning shikhara of the temple. Master architect Kokasa devised an ingenious vertical engineering plan: by carving the temple from the <strong>top of the basalt mountain downward</strong>, the spire was visible within weeks, allowing the Queen to conclude her fast while the rest of the colossal temple was excavated underneath.
    </p>

    <h3 class="section-title">Scientific & Engineering Analysis</h3>
    <p>
      Modern structural engineers and geologists consider Kailasa Temple one of the most astonishing megalithic engineering feats in human history:
    </p>
    <ul>
      <li><strong>200,000 Tons of Basalt Excavated:</strong> Unlike conventional architectural construction which adds blocks from the ground up, Kailasa was sculpted by removing over 200,000 tonnes of volcanic basalt rock through vertical trenching.</li>
      <li><strong>Zero Margin for Error:</strong> In additive architecture, a cracked stone or misalignment can be replaced. In subtractive monolithic carving, a single structural miscalculation would permanently ruin the columns, multi-storey halls, and stone elephant statues.</li>
      <li><strong>Acoustic Resonance:</strong> Laser scanning and sound propagation studies show that the inner sanctum produces unique reverberation acoustics designed for low-frequency Vedic chanting resonance.</li>
      <li><strong>Drainage and Water Harvesting:</strong> The monument contains complex subterranean rainwater channels and interconnected drainage systems carved directly into the rock bedrock.</li>
    </ul>

    <div class="image-grid">
      <img src="static/dwarka1.jpg" alt="Ellora Cave Top-down view">
      <img src="static/dwarka2.jpg" alt="Ellora Pillars and Basalt Carving">
      <img src="static/dwarka3.jpg" alt="Ellora Monolith Shikhara">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Archaeological & Scientific References</h4>
      <p style="color:#aaa; font-size:14px;">
        • Archaeological Survey of India (ASI) Ellora Monograph Series<br>
        • UNESCO World Heritage Centre Documentation: Rock-Cut Architecture of Ellora<br>
        • Journal of Architectural Heritage: <em>Subtractive Megalithic Engineering in Ancient India</em>
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
