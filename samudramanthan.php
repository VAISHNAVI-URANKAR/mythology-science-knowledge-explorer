<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Samudra Manthan & Cosmic Creation</title>
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
    <h2>Samudra Manthan: Churning of the Cosmic Ocean</h2>
    <h4>Cosmological Metaphors, Extraction of Minerals & Oceanic Evolution</h4>
    <img src="static/Samudra manthan.jpg" alt="Samudra Manthan Churning" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="samudra">
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

    <h3 class="section-title">The Mythological Episode</h3>
    <p>
      In the <em>Bhagavata Purana</em> and <em>Mahabharata</em>, the Devas and Asuras joined forces to churn the cosmic milk ocean (<em>Kshira Sagara</em>) using Mount Mandara as the churning rod and serpent Vasuki as the rope. As the ocean churned, 14 divine gems (<em>Chaturdasha Ratna</em>) emerged, including Halahala poison (consumed by Lord Shiva), Dhanvantari with Ayurveda and Amrita (elixir of immortality), Kamadhenu, and Goddess Lakshmi.
    </p>

    <h3 class="section-title">Cosmological & Scientific Interpretation</h3>
    <p>
      Astrophysicists, marine geochemists, and anthropologists view the Samudra Manthan as a powerful metaphor for cosmic and geochemical planetary evolution:
    </p>
    <ul>
      <li><strong>Spiral Galaxy Formation:</strong> The dual forces (Devas pulling one side, Asuras pulling the other) revolving around a central axis mirror gravitational angular momentum and the spiral arms of galaxies.</li>
      <li><strong>Hydrothermal Deep-Sea Vents:</strong> The emergence of the deadly blue toxin (Halahala) before the emergence of life and precious gems parallels deep-sea volcanic hydrothermal vents that spew toxic hydrogen sulfide and heavy metals essential for the earliest primordial life.</li>
      <li><strong>Oceanic Desalination and Mineral Extraction:</strong> The 14 Ratnas categorize fundamental resources extracted from oceanic and geological exploration: marine fauna, gems (Kaustubha), medicines (Dhanvantari/Ayurveda), and maritime trade routes.</li>
    </ul>

    <div class="image-grid">
      <img src="static/samudra1.jpg" alt="Samudra Manthan Art 1">
      <img src="static/samudra2.jpg" alt="Samudra Manthan Art 2">
      <img src="static/samudra3.jpg" alt="Samudra Manthan Art 3">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Literary & Cosmological Citations</h4>
      <p style="color:#aaa; font-size:14px;">
        • <em>Bhagavata Purana</em> (Skandha 8, Chapters 6-12).<br>
        • Frawley, David (1990). <em>Gods, Sages and Kings: Vedic Secrets of Ancient Civilization</em>.<br>
        • Journal of Marine Geosciences: <em>Prebiotic Synthesis at Hydrothermal Vents</em>.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
