<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | The Mahabharata War & Astronomy</title>
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
    <h2>The Mahabharata War</h2>
    <h4>Astronomical Dating, Hastinapur Excavations & Metallurgical Chronology</h4>
    <img src="static/Mahabhart.jpg" alt="Mahabharata War" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="mahabharata">
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

    <h3 class="section-title">Mythological Context</h3>
    <p>
      The <em>Mahabharata</em>, composed by Sage Vyasa, recounts the colossal battle of Kurukshetra fought between the Pandavas and Kauravas. Spanning 18 days of catastrophic combat involving millions of warriors, astras, and divine chariots, the epic concludes with the dawn of Kali Yuga following the departure of Lord Krishna.
    </p>

    <h3 class="section-title">Astronomical & Archaeological Dating</h3>
    <p>
      Unlike vague folklore, the Mahabharata contains over 140 precise astronomical observations regarding planetary positions, retrograde motions, solar/lunar eclipse pairs occurring within a 13-day interval (<em>Trayodashi Tithi</em>), and planetary conjunctions:
    </p>
    <ul>
      <li><strong>Ephemeris Planetarium Software:</strong> Astronomers backward-simulated astronomical configurations recorded in the Udyoga and Bhishma Parvas, identifying a unique match on <strong>November 22, 3067 BCE</strong> or ~3139 BCE.</li>
      <li><strong>Painted Grey Ware (PGW) Culture:</strong> Archaeologist Prof. B.B. Lal excavated Hastinapur, discovering high-temperature metallurgical smelting kilns, iron spearheads, and evidence of a massive flood on the Ganga river that caused the capital to relocate to Kaushambi, matching Puranic accounts.</li>
      <li><strong>Marine Excavation of Dwarka:</strong> S.R. Rao's underwater findings in Gujarat date the marine city's submergence to the terminal phase of the late Harappan era, contemporaneous with the astronomical dates of the epic.</li>
    </ul>

    <div class="image-grid">
      <img src="static/mahabhart3.jpg" alt="Kurukshetra Battlefield Art">
      <img src="static/mahabhart5.jpg" alt="Ancient Weapons & Chariots">
      <img src="static/mahabhart6.jpg" alt="Hastinapur Pottery and Relics">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Academic Sources</h4>
      <p style="color:#aaa; font-size:14px;">
        • Lal, B. B. (1955). <em>Excavation at Hastinapura and other explorations in the Upper Ganga and Sutlej Basins</em>. Ancient India.<br>
        • Achar, B. N. Narahari (2003). <em>Astronomical Dating of the Mahabharata War</em>. Annals of the Bhandarkar Oriental Research Institute.<br>
        • Gupta, S. P., & Ramachandran, K. S. (1976). <em>Mahabharata: Myth and Reality</em>. Agam Prakashan.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
