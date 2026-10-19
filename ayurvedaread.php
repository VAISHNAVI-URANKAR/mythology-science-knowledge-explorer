<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mythology | Sushruta Samhita & Ancient Surgery</title>
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
    .sources-box { background: #111; border-left: 4px solid #d4af37; padding: 25px; border-radius: 6px; margin-top: 50px; }
  </style>
  <link rel="stylesheet" href="static/audio-reader.css">
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">
  <article class="story-hero">
    <h2>Sushruta Samhita & Ancient Surgery</h2>
    <h4>Maharshi Sushruta — The World's Father of Surgery & Rhinoplasty</h4>
    <img src="static/saras1.jpg" alt="Ancient Indian Medicine" class="hero-img">

    <!-- Multilingual AI Voice Reader Component (English, Hindi, Marathi) -->
    <div class="ai-audio-player" id="aiAudioPlayer" data-story="ayurveda">
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

    <h3 class="section-title">The Mythological Origin of Dhanvantari & Ayurveda</h3>
    <p>
      In Hindu tradition, during the legendary churning of the ocean (<em>Samudra Manthan</em>), Lord Dhanvantari emerged carrying the pot of Amrita and the sacred compendium of Ayurveda. Maharshi Sushruta, learning in the holy city of Kashi (Varanasi) under King Divodasa (an incarnation of Dhanvantari), codified surgical practices into the encyclopedic <em>Sushruta Samhita</em>.
    </p>

    <h3 class="section-title">Scientific Milestones in Modern Medicine</h3>
    <p>
      Global medical historians and the American College of Surgeons recognize Sushruta (c. 6th century BCE) as the <strong>Father of Surgery</strong>:
    </p>
    <ul>
      <li><strong>Forehead Flap Rhinoplasty:</strong> Sushruta invented the pedicle forehead flap reconstruction technique for amputated noses. In 1794, the British <em>Gentleman's Magazine</em> published the 'Indian Method', directly inspiring modern Western plastic surgery.</li>
      <li><strong>121 Surgical Instruments:</strong> Precise scalpels, forceps, speculums, trocars, and bone saws forged from carbon steel and modeled after animal jaws and beaks.</li>
      <li><strong>Cataract Couching:</strong> Using a curved needle (<em>Jabamukhi Salaka</em>) to loosen the lens and push the cataract out of the field of vision.</li>
      <li><strong>Asepsis and Anesthesia:</strong> Using burning fumes of medicinal herbs (Guggulu, Neem), wine as general sedation, and sterile dressing with turmeric and honey.</li>
    </ul>

    <div class="sources-box">
      <h4 style="color:#d4af37; margin-bottom:10px;">Medical Journal References</h4>
      <p style="color:#aaa; font-size:14px;">
        • Champaneria, M. C. et al. (2014). <em>Sushruta: Father of Plastic Surgery</em>. Annals of Plastic Surgery.<br>
        • Singhal, G. D. (1981). <em>Diagnostic and Surgical Principles in Sushruta Samhita</em>.<br>
        • World Health Organization (WHO) Traditional Medicine Global Summit Archives
      </p>
    </div>
  </article>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

  <script src="static/audio-reader.js"></script>
</body>
</html>
