<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mythology | Visual Documentaries & Science Videos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/videos.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #000; color: #fff; font-family: 'Inter', sans-serif; }

    .hero {
      padding: 130px 80px 30px;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .hero h1 {
      font-family: 'Cinzel', serif;
      font-size: 46px;
      color: #d4af37;
      margin-bottom: 12px;
    }

    .hero p {
      color: #aaa;
      font-size: 16px;
      max-width: 700px;
      margin: 0 auto;
    }

    .video-categories {
      display: flex;
      justify-content: center;
      gap: 12px;
      padding: 30px 80px;
      flex-wrap: wrap;
    }

    .video-grid {
      padding: 0 80px 100px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
      max-width: 1360px;
      margin: 0 auto;
    }

    .video-card {
      position: relative;
      text-decoration: none;
      border: 1px solid #1c1c1c;
      background: #0b0b0b;
      border-radius: 10px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
    }

    .video-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(212,175,55,0.25);
      border-color: #d4af37;
    }

    .thumbnail-box {
      position: relative;
      height: 200px;
      overflow: hidden;
    }

    .thumbnail-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.85;
      transition: transform 0.4s ease;
    }

    .video-card:hover .thumbnail-box img {
      transform: scale(1.05);
      opacity: 1;
    }

    .play-btn {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      background: rgba(0,0,0,0.7);
      border: 2px solid #d4af37;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #d4af37;
      font-size: 20px;
      transition: all 0.25s;
    }

    .video-card:hover .play-btn {
      background: #d4af37;
      color: #000;
      transform: translate(-50%, -50%) scale(1.15);
    }

    .video-info {
      padding: 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .video-info span {
      font-size: 11.5px;
      color: #d4af37;
      letter-spacing: 1.5px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .video-info h3 {
      font-family: 'Cinzel', serif;
      margin-top: 8px;
      color: #ffffff;
      font-size: 17px;
      line-height: 1.4;
    }

    @media (max-width: 768px) {
      .hero, .video-grid, .video-categories { padding-left: 25px; padding-right: 25px; }
      .hero h1 { font-size: 34px; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<!-- HERO -->
<section class="hero">
  <h1>Visual Documentaries</h1>
  <p>Watch video documentaries, satellite mapping analyses, and archaeological field surveys exploring ancient India.</p>
</section>

<!-- CATEGORY FILTER -->
<div class="video-categories">
  <button class="video-filter-btn active" data-filter="all">All Documentaries</button>
  <button class="video-filter-btn" data-filter="archaeology">Archaeology & Ruins</button>
  <button class="video-filter-btn" data-filter="astronomy">Vedic Astronomy</button>
  <button class="video-filter-btn" data-filter="engineering">Engineering & Aviation</button>
</div>

<!-- VIDEO GRID -->
<section class="video-grid">

  <!-- Video 1: Ram Setu -->
  <a class="video-card" href="https://www.youtube.com/watch?v=3yKw8Qmtj7g" target="_blank" data-cat="archaeology">
    <div class="thumbnail-box">
      <img src="static/Ram setu.jpg" alt="Ram Setu">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Archaeology & Marine Geology</span>
      <h3>The Ram Setu Mystery Explained: Satellite Imagery & Shoals</h3>
    </div>
  </a>

  <!-- Video 2: Mahabharata -->
  <a class="video-card" href="https://www.youtube.com/watch?v=aWFZELIwXpU" target="_blank" data-cat="astronomy">
    <div class="thumbnail-box">
      <img src="static/Mahabhart.jpg" alt="Mahabharata">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Astronomical Dating</span>
      <h3>Mahabharata Chronology: Planetarium Software Simulation</h3>
    </div>
  </a>

  <!-- Video 3: Samudra Manthan -->
  <a class="video-card" href="https://www.youtube.com/watch?v=mouy6ZdwPos" target="_blank" data-cat="astronomy">
    <div class="thumbnail-box">
      <img src="static/Samudra manthan.jpg" alt="Samudra Manthan">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Cosmology</span>
      <h3>Samudra Manthan: Symbolism of Cosmic Creation</h3>
    </div>
  </a>

  <!-- Video 4: Vimanas -->
  <a class="video-card" href="https://www.youtube.com/watch?v=Z5bY0YI6b2g" target="_blank" data-cat="engineering">
    <div class="thumbnail-box">
      <img src="static/vimans.jpg" alt="Vimanas">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Ancient Aeronautics</span>
      <h3>Vimanas: Ancient Flying Machines Described in Sanskrit Texts</h3>
    </div>
  </a>

  <!-- Video 5: Hanuman & Sun -->
  <a class="video-card" href="https://www.youtube.com/watch?v=hOBrdKiKp7Q" target="_blank" data-cat="astronomy">
    <div class="thumbnail-box">
      <img src="static/Hanuman.jpg" alt="Hanuman">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Astronomy Calculation</span>
      <h3>Hanuman Chalisa & The Calculation of Earth-Sun Distance</h3>
    </div>
  </a>

  <!-- Video 6: Saraswati River -->
  <a class="video-card" href="https://www.youtube.com/watch?v=rHq0uCcQh2s" target="_blank" data-cat="archaeology">
    <div class="thumbnail-box">
      <img src="static/Saraswati.jpg" alt="Saraswati River">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Paleochannel Mapping</span>
      <h3>The Lost Saraswati River: ISRO Satellite Radar Mapping</h3>
    </div>
  </a>

  <!-- Video 7: Dwarka Underwater -->
  <a class="video-card" href="https://www.youtube.com/watch?v=H2kk3DwScAg" target="_blank" data-cat="archaeology">
    <div class="thumbnail-box">
      <img src="static/dwarka.jpg" alt="Dwarka Ruins">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Marine Archaeology</span>
      <h3>The Underwater City of Dwarka: NIO Excavations</h3>
    </div>
  </a>

  <!-- Video 8: Kailasa Temple -->
  <a class="video-card" href="https://www.youtube.com/watch?v=VkG5dZua_qMS" target="_blank" data-cat="engineering">
    <div class="thumbnail-box">
      <img src="static/temple.jpg" alt="Kailasa Temple">
      <div class="play-btn">▶</div>
    </div>
    <div class="video-info">
      <span>Megalithic Engineering</span>
      <h3>Kailasa Temple: The Monolithic Marvel Carved from Top to Bottom</h3>
    </div>
  </a>

</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
const filterBtns = document.querySelectorAll('.video-filter-btn');
const videoCards = document.querySelectorAll('.video-card');

filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.getAttribute('data-filter');

    videoCards.forEach(card => {
      if (filter === 'all' || card.getAttribute('data-cat') === filter) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
</script>

</body>
</html>
