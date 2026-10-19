<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mythology | Stories Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #000; color: #fff; font-family: 'Inter', sans-serif; }

    .search-box input {
      padding: 8px 16px;
      border-radius: 20px;
      border: 1px solid #333;
      background: #111;
      color: #eee;
      outline: none;
      font-size: 13.5px;
      width: 200px;
      transition: all 0.2s;
    }

    .search-box input:focus {
      border-color: #d4af37;
      width: 240px;
      box-shadow: 0 0 10px rgba(212, 175, 55, 0.2);
    }

    .hero {
      padding: 130px 80px 40px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .hero h1 {
      font-family: 'Cinzel', serif;
      font-size: 46px;
      color: #d4af37;
      margin-bottom: 10px;
    }

    .hero p {
      color: #aaa;
      font-size: 16px;
    }

    .grid {
      padding: 0 80px 100px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
      max-width: 1360px;
      margin: 0 auto;
    }

    .card {
      background: #0b0b0b;
      border: 1px solid #1c1c1c;
      border-radius: 10px;
      overflow: hidden;
      transition: all 0.35s ease;
      display: flex;
      flex-direction: column;
    }

    .card img {
      width: 100%;
      height: 210px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .card-content {
      padding: 22px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(212,175,55,0.25);
      border-color: #d4af37;
    }

    .card:hover img {
      transform: scale(1.04);
    }

    .tag {
      color: #d4af37;
      font-size: 11px;
      letter-spacing: 1.5px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .card h3 {
      font-family: 'Cinzel', serif;
      margin: 10px 0 8px;
      font-size: 19px;
      color: #fff;
    }

    .card p {
      font-size: 13.5px;
      color: #aaa;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .card a {
      display: inline-block;
      color: #d4af37;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: transform 0.2s;
    }

    .card a:hover {
      transform: translateX(4px);
    }

    @media (max-width: 768px) {
      .hero, .grid { padding-left: 25px; padding-right: 25px; }
      .hero h1 { font-size: 34px; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<section class="hero">
  <h1>Mythology & Science Stories</h1>
  <p>Explore ancient epics, archaeological discoveries, and scientific investigations that bridge faith and truth.</p>
  <div style="margin-top:20px;">
    <input type="text" id="searchInput" placeholder="🔍 Search 12 ancient stories..." style="padding:12px 20px; background:#141414; border:1px solid #333; color:#fff; border-radius:25px; width:300px; outline:none;" />
  </div>
</section>

<section class="grid">

  <!-- Story 1: Ram Setu -->
  <div class="card story">
    <img src="static/Ram setu.jpg" alt="Ram Setu">
    <div class="card-content">
      <div>
        <span class="tag">Marine Engineering</span>
        <h3>Ram Setu: The Bridge to Lanka</h3>
        <p>Satellite imagery, carbon-dated coral limestone shoals, and ancient civil engineering descriptions.</p>
      </div>
      <a href="ramseturead.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 2: Mahabharata -->
  <div class="card story">
    <img src="static/Mahabhart.jpg" alt="Mahabharata War">
    <div class="card-content">
      <div>
        <span class="tag">Vedic Chronology</span>
        <h3>The Mahabharata War</h3>
        <p>Planetary alignments, solar eclipses, and archaeological excavations at Hastinapur dating the epic.</p>
      </div>
      <a href="mahabharatread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 3: Dwarka -->
  <div class="card story">
    <img src="static/dwarka.jpg" alt="Dwarka">
    <div class="card-content">
      <div>
        <span class="tag">Marine Archaeology</span>
        <h3>The Lost City of Dwarka</h3>
        <p>National Institute of Oceanography's marine excavations revealing submerged fort walls and stone anchors.</p>
      </div>
      <a href="dwarkaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 4: Kailasa Temple -->
  <div class="card story">
    <img src="static/temple.jpg" alt="Kailasa Temple">
    <div class="card-content">
      <div>
        <span class="tag">Megalithic Engineering</span>
        <h3>Kailasa Temple at Ellora</h3>
        <p>World's largest monolithic marvel sculpted from the top down by removing 200,000 tons of solid basalt.</p>
      </div>
      <a href="kailasaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 5: Surya Siddhanta -->
  <div class="card story">
    <img src="static/god.jpg" alt="Surya Siddhanta">
    <div class="card-content">
      <div>
        <span class="tag">Vedic Astronomy</span>
        <h3>Surya Siddhanta & Light Speed</h3>
        <p>Ancient calculations of the sidereal year (within 1.4 seconds), gravity, and Sayana's speed of light.</p>
      </div>
      <a href="suryaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 6: Hanuman and the Sun -->
  <div class="card story">
    <img src="static/Hanuman.jpg" alt="Hanuman and the Sun">
    <div class="card-content">
      <div>
        <span class="tag">Astronomical Distance</span>
        <h3>Hanuman and the Sun</h3>
        <p>Decoding the mathematical computation of Earth-to-Sun distance (149.6 Million km) in the Hanuman Chalisa.</p>
      </div>
      <a href="hamunaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 7: Vimanas -->
  <div class="card story">
    <img src="static/vimans.jpg" alt="Vimanas">
    <div class="card-content">
      <div>
        <span class="tag">Ancient Aviation</span>
        <h3>Vimanas: Ancient Aircraft</h3>
        <p>Multi-tier flight craft, mercury vortex engines, and aerodynamic principles found in Sanskrit texts.</p>
      </div>
      <a href="vimansread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 8: Sushruta Samhita / Surgery -->
  <div class="card story">
    <img src="static/saras1.jpg" alt="Ancient Surgery">
    <div class="card-content">
      <div>
        <span class="tag">Ancient Bio-Medicine</span>
        <h3>Sushruta: Father of Surgery</h3>
        <p>Ancient rhinoplasty forehead flap techniques, cataract couching, and 121 surgical instruments.</p>
      </div>
      <a href="ayurvedaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 9: Nataraja & CERN -->
  <div class="card story">
    <img src="static/god.jpg" alt="Nataraja at CERN">
    <div class="card-content">
      <div>
        <span class="tag">Quantum Physics</span>
        <h3>Nataraja & Cosmic Particles</h3>
        <p>Why a 2-meter bronze statue of Lord Shiva stands at CERN in Geneva honoring quantum field dynamics.</p>
      </div>
      <a href="natarajaread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 10: Brahmastra -->
  <div class="card story">
    <img src="static/mahabhart2.jpg" alt="Brahmastra">
    <div class="card-content">
      <div>
        <span class="tag">Ancient Ballistics</span>
        <h3>Brahmastra & Plasma Energy</h3>
        <p>Textual descriptions of radioactive fallout, thermal flashes, and Dr. Oppenheimer's reflections.</p>
      </div>
      <a href="brahmastraread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 11: Saraswati River -->
  <div class="card story">
    <img src="static/Saraswati.jpg" alt="Saraswati River">
    <div class="card-content">
      <div>
        <span class="tag">Paleohydrology</span>
        <h3>The Lost Saraswati River</h3>
        <p>ISRO satellite radar discovery of subterranean river channels flowing through Rajasthan & Haryana.</p>
      </div>
      <a href="saraswatiread.php">READ STORY →</a>
    </div>
  </div>

  <!-- Story 12: Samudra Manthan -->
  <div class="card story">
    <img src="static/Samudra manthan.jpg" alt="Samudra Manthan">
    <div class="card-content">
      <div>
        <span class="tag">Cosmological Metaphor</span>
        <h3>Samudra Manthan</h3>
        <p>The cosmic churning of the ocean, extraction of planetary elements, and medicinal herbs.</p>
      </div>
      <a href="samudramanthan.php">READ STORY →</a>
    </div>
  </div>

</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
// Live Search Filter
const searchInput = document.getElementById("searchInput");
const stories = document.querySelectorAll(".story");

searchInput.addEventListener("keyup", function () {
  const value = this.value.toLowerCase();
  stories.forEach((story) => {
    const text = story.innerText.toLowerCase();
    story.style.display = text.includes(value) ? "" : "none";
  });
});
</script>

</body>
</html>
