<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mythology | Myth vs Fact</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/myth-fact.css">
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

    .filters-bar {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin: 35px auto 40px;
      flex-wrap: wrap;
      max-width: 900px;
      padding: 0 20px;
    }

    .filter-pill {
      background: #111;
      border: 1px solid #282828;
      color: #aaa;
      padding: 8px 20px;
      border-radius: 25px;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.25s;
    }

    .filter-pill:hover,
    .filter-pill.active {
      background: #d4af37;
      color: #000;
      border-color: #d4af37;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
    }

    .card-grid {
      padding: 0 80px 100px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 35px;
      max-width: 1360px;
      margin: 0 auto;
    }

    .flip-card {
      perspective: 1000px;
      height: 380px;
    }

    .flip-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transform-style: preserve-3d;
      transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      cursor: pointer;
    }

    .flip-card:hover .flip-inner {
      transform: rotateY(180deg);
    }

    .flip-front,
    .flip-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 12px;
      padding: 28px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }

    .flip-front {
      background: #0d0d0d;
      border: 1px solid rgba(255, 71, 87, 0.3);
    }

    .flip-back {
      background: #0d0d0d;
      border: 1px solid rgba(46, 213, 115, 0.4);
      transform: rotateY(180deg);
    }

    .card-title {
      font-family: 'Cinzel', serif;
      color: #fff;
      font-size: 20px;
      margin-bottom: 12px;
    }

    .card-badge {
      display: inline-block;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: 14px;
      margin-bottom: 12px;
      letter-spacing: 1px;
      width: fit-content;
    }

    .badge-myth {
      background: rgba(255, 71, 87, 0.15);
      color: #ff4757;
      border: 1px solid rgba(255, 71, 87, 0.3);
    }

    .badge-science {
      background: rgba(46, 213, 115, 0.15);
      color: #2ed573;
      border: 1px solid rgba(46, 213, 115, 0.3);
    }

    .card-desc {
      font-size: 14px;
      color: #bbb;
      line-height: 1.6;
    }

    .flip-hint {
      font-size: 12px;
      color: #d4af37;
      display: flex;
      align-items: center;
      gap: 6px;
      margin-top: 15px;
    }

    @media (max-width: 768px) {
      .hero, .card-grid { padding-left: 25px; padding-right: 25px; }
      .hero h1 { font-size: 34px; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<section class="hero">
  <h1>Myths vs Scientific Facts</h1>
  <p>Hover or tap any card to reveal empirical scientific explanations behind ancient traditions, geological events, and cosmological lore.</p>
</section>

<!-- Filter Bar -->
<div class="filters-bar">
  <button class="filter-pill active" data-filter="all">All Topics</button>
  <button class="filter-pill" data-filter="health">Health & Bio-Science</button>
  <button class="filter-pill" data-filter="astronomy">Astronomy & Physics</button>
  <button class="filter-pill" data-filter="geology">Geology & Engineering</button>
</div>

<section class="card-grid">

  <!-- Card 1: Floating Stones -->
  <div class="flip-card" data-cat="geology">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Stones Floated on Ocean Water</h3>
          <p class="card-desc">During the Ramayana epic, stones with Lord Rama's name written on them miraculously floated on seawater to build the bridge to Lanka.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">Pumice Stone Porosity & Coral Shoals</h3>
          <p class="card-desc">Porous volcanic pumice rock contains thousands of trapped air pockets, giving it lower density than salt water. Geological core samples also confirm ancient coral limestone shoals bridging the strait.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 2: Solar Eclipse -->
  <div class="flip-card" data-cat="astronomy">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Demons Swallowing the Sun</h3>
          <p class="card-desc">During solar eclipses, demon Rahu swallows the Sun, making cooked food toxic, requiring ritual bathing and fasting.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">UV Radiation & Microbial Shifts</h3>
          <p class="card-desc">Eclipses block natural broad-spectrum solar UV rays, which normally suppress microbial growth. The sudden temperature drop accelerates bacterial fermentation in prepared food.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 3: Copper Water Storage -->
  <div class="flip-card" data-cat="health">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Sacred Copper Vessels (Tamra Jal)</h3>
          <p class="card-desc">Ancient Ayurvedic texts mandated storing drinking water overnight in pure copper pots to balance all three doshas (Vata, Pitta, Kapha).</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">Oligodynamic Anti-Microbial Effect</h3>
          <p class="card-desc">Microbiological research proves copper ions leach into water in trace amounts, disrupting cell membranes and killing 99.9% of harmful bacteria including E. coli and Salmonella.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 4: Peepal Tree -->
  <div class="flip-card" data-cat="health">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Sacred Abode of the Trimurti</h3>
          <p class="card-desc">The Peepal tree (Ficus religiosa) is worshipped as the divine home of Brahma, Vishnu, and Shiva, and cutting it is strictly forbidden.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">CAM Photosynthesis & 24/7 Oxygen</h3>
          <p class="card-desc">Peepal trees utilize Crassulacean Acid Metabolism (CAM), allowing them to absorb CO₂ and release oxygen even at night, making them exceptional natural air purifiers.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 5: Temple Bell Resonance -->
  <div class="flip-card" data-cat="geology">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Bells Waking the Deities</h3>
          <p class="card-desc">Ringing massive bronze bells at temple entrances is believed to awaken the deity and ward off negative evil spirits.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">432 Hz Acoustic Frequency</h3>
          <p class="card-desc">Panchaloha bell metallurgy produces a sustained echo lasting 7+ seconds, touching brain alpha waves (432 Hz) and harmonizing both left and right cerebral hemispheres.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 6: Sleep Direction -->
  <div class="flip-card" data-cat="health">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Never Sleep Head Pointing North</h3>
          <p class="card-desc">Ancient folklore warns that sleeping with your head toward the north invites nightmares, misfortune, and illness.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">Geomagnetic Field & Blood Flow</h3>
          <p class="card-desc">The Earth's magnetic pole creates magnetic flux lines. The human body has positive polarity at the head; aligning North-North creates repulsive magnetic pressure on iron-rich hemoglobin.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 7: Rust-free Iron Pillar -->
  <div class="flip-card" data-cat="geology">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Indestructible Divine Iron</h3>
          <p class="card-desc">The 1600-year-old Iron Pillar of Delhi was thought to be forged from divine celestial meteor iron that can never rust.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">High-Phosphorus Passive Film (Misawite)</h3>
          <p class="card-desc">IIT Kanpur metallurgists proved ancient blacksmiths used charcoal forging producing high phosphorus content, creating a protective microscopic film of iron hydrogen phosphate hydrate.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

  <!-- Card 8: Nataraja & Particle Dance -->
  <div class="flip-card" data-cat="astronomy">
    <div class="flip-inner">
      <div class="flip-front">
        <div>
          <span class="card-badge badge-myth">TRADITIONAL BELIEF</span>
          <h3 class="card-title">Dance of Cosmic Destruction</h3>
          <p class="card-desc">Lord Shiva's Tandava is the divine cosmic dance destroying old universes to make way for new creation cycles.</p>
        </div>
        <div class="flip-hint"><span>🔄 Hover to flip for Science</span></div>
      </div>
      <div class="flip-back">
        <div>
          <span class="card-badge badge-science">SCIENTIFIC REALITY</span>
          <h3 class="card-title" style="color:#2ed573;">Quantum Field Fluctuations at CERN</h3>
          <p class="card-desc">Theoretical physicists like Fritjof Capra showed that quantum fields continuously undergo spontaneous creation and annihilation of matter, directly paralleling the Nataraja icon at CERN.</p>
        </div>
        <div class="flip-hint" style="color:#2ed573;"><span>✓ Empirical Explanation</span></div>
      </div>
    </div>
  </div>

</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
const pills = document.querySelectorAll('.filter-pill');
const cards = document.querySelectorAll('.flip-card');

pills.forEach(pill => {
  pill.addEventListener('click', () => {
    pills.forEach(p => p.classList.remove('active'));
    pill.classList.add('active');
    const filter = pill.getAttribute('data-filter');

    cards.forEach(card => {
      if (filter === 'all' || card.getAttribute('data-cat') === filter) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
</script>

</body>
</html>
