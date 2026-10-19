<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Ancient Vimanas & Aeronautics</title>
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
    <h2>Vimanas: Ancient Aircraft & Flight Science</h2>
    <h4>Vaimanika Shastra, Mercury Vortex Propulsion & Ancient Metallurgy</h4>
    <img src="static/vimans.jpg" alt="Vimanas Ancient Aircraft" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="vimans">
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

    <h3 class="section-title">Mythological & Textual Descriptions</h3>
    <p>
      In Sanskrit epics like the <em>Ramayana</em> (the aerial Pushpaka Vimana of Ravana) and the <em>Samarangana Sutradhara</em> of King Bhoja, Vimanas are described as self-propelled celestial crafts capable of vertical takeoff, hovering, cloaking, and high-speed directional maneuvers across earth and space.
    </p>

    <h3 class="section-title">Aeronautical & Metallurgical Examination</h3>
    <p>
      Aeronautical engineers and Sanskrit scholars have analyzed the mechanical concepts described in historical treatises:
    </p>
    <ul>
      <li><strong>Mercury Vortex Turbines:</strong> Texts describe heating mercury inside an iron vessel with hot air drafts, which resembles modern experimental magnetohydrodynamic (MHD) plasma propulsion systems.</li>
      <li><strong>Heat-Absorbing Alloys (Lohas):</strong> Treatises mention 16 specialized heat-resistant alloys designed to withstand thermal friction during atmospheric entry.</li>
      <li><strong>Scientific Evaluations:</strong> While a 1974 study by aeronautical researchers at the Indian Institute of Science (IISc Bangalore) found that specific blueprints in the 20th-century <em>Vaimanika Shastra</em> could not achieve aerodynamic lift with modern propellants, the conceptual ideas of vertical takeoff, multi-propulsion stages, and gyroscopic orientation in earlier texts reflect a sophisticated ancient imagination of aeronautics.</li>
    </ul>

    <div class="image-grid">
      <img src="static/vimans1.jpg" alt="Vimana Diagram 1">
      <img src="static/vimans2.jpg" alt="Vimana Diagram 2">
      <img src="static/vimans3.jpg" alt="Vimana Diagram 3">
    </div>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Aeronautical & Historical References</h4>
      <p style="color:#aaa; font-size:14px;">
        • King Bhoja (11th Century). <em>Samarangana Sutradhara</em> (Yantra Adhyaya).<br>
        • Mukunda, H. S. et al. (1974). <em>A Critical Study of the Work "Vaimanika Shastra"</em>. Scientific Opinion, IISc Bangalore.<br>
        • Childress, David Hatcher (1991). <em>Vimana Aircraft of Ancient India & Atlantis</em>.
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
