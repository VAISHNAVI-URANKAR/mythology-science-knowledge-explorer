<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Brahmastra & Ancient Ballistics</title>
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
    .comparison-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 30px 0; }
    .comparison-card { background: #121212; border: 1px solid #222; padding: 20px; border-radius: 8px; }
    .comparison-card h4 { color: #d4af37; margin-bottom: 10px; }
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
    @media(max-width:768px) { .comparison-grid { grid-template-columns: 1fr; } }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Brahmastra & Ancient Ballistics</h2>
    <h4>The Celestial Astras — Textual Descriptions & Modern Energy Parallels</h4>
    <img src="static/mahabhart2.jpg" alt="Ancient Astras in Battle" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="brahmastra">
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

    <h3 class="section-title">Mythological Description of the Brahmashira Astra</h3>
    <p>
      In the Mahabharata (specifically the <em>Sauptika Parva</em> and <em>Drona Parva</em>), the Brahmastra and Brahmashira Astra are described as ultimate weapons created by Brahma, invocable only through intense mental concentration, mantra vibration, and focused intentionality. When Ashwatthama and Arjuna unleashed their astras against each other, sages Narada and Vyasa intervened, commanding both warriors to withdraw the weapons to prevent planetary catastrophe.
    </p>

    <h3 class="section-title">Parallels Between Ancient Verses & Nuclear Physics</h3>

    <div class="comparison-grid">
      <div class="comparison-card">
        <h4>📜 Ancient Sanskrit Verses</h4>
        <p>
          "A blazing column of fire and smoke as bright as 10,000 suns rose in all its splendour... The corpses were burned so that they were unrecognizable. Hair and nails fell out; pottery broke without cause; the birds turned white... For several seasons, rain did not fall, and the earth became barren."
        </p>
      </div>

      <div class="comparison-card">
        <h4>🔬 Modern Physics Phenomenon</h4>
        <p>
          • <strong>Thermal Flash:</strong> The blinding radiance corresponds to high-temperature fireball radiation.<br>
          • <strong>Acute Radiation Sickness (ARS):</strong> Rapid hair loss, nail shedding, and internal tissue decay are primary clinical symptoms of ionizing radiation exposure.<br>
          • <strong>Nuclear Winter & Fallout:</strong> Atmospheric particulate blockage disrupting rain cycles.
        </p>
      </div>
    </div>

    <h3 class="section-title">Oppenheimer's Quote from the Bhagavad Gita</h3>
    <p>
      During the Trinity nuclear test in 1945, Dr. J. Robert Oppenheimer famously recalled the verse from chapter 11 of the <em>Bhagavad Gita</em>: <em>"Divi surya-sahasrasya bhaved yugapad utthita..."</em> ("If the radiance of a thousand suns were to burst at once into the sky, that would be like the splendor of the Mighty One... Now I am become Death, the destroyer of worlds.")
    </p>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Literary & Historical References</h4>
      <p style="color:#aaa; font-size:14px;">
        • Mahabharata (Critical Edition, Bhandarkar Oriental Research Institute, Pune)<br>
        • Oppenheimer, J. Robert (1965 interview, NBC News Archives)<br>
        • Roy, Pratap Chandra (1883-1896). <em>The Mahabharata Translated into English Prose</em>
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
