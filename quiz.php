<?php
require_once __DIR__ . '/config/db.php';
$selectedCategoryParam = trim($_GET['category'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Knowledge Quiz & Score Analytics | Mythology Science</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/quiz.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    /* Customization configuration bar */
    .config-bar {
      background: #0d0d0d;
      border: 1px solid #222;
      border-radius: 12px;
      padding: 24px 30px;
      max-width: 900px;
      margin: 25px auto 35px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .config-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .config-group label {
      font-size: 12px;
      color: #d4af37;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 600;
    }
    .config-select {
      background: #141414;
      border: 1px solid #333;
      color: #fff;
      padding: 10px 14px;
      border-radius: 6px;
      font-size: 13.5px;
      outline: none;
      transition: border-color 0.2s;
    }
    .config-select:focus { border-color: #d4af37; }

    .diff-badge {
      display: inline-block;
      font-size: 11px;
      padding: 2px 8px;
      border-radius: 10px;
      font-weight: 600;
      margin-left: 8px;
    }
    .diff-easy { background: rgba(46, 213, 115, 0.2); color: #2ed573; border: 1px solid rgba(46, 213, 115, 0.4); }
    .diff-medium { background: rgba(255, 165, 2, 0.2); color: #ffa502; border: 1px solid rgba(255, 165, 2, 0.4); }
    .diff-hard { background: rgba(255, 71, 87, 0.2); color: #ff4757; border: 1px solid rgba(255, 71, 87, 0.4); }

    .voice-badge-active {
      background: rgba(46, 213, 115, 0.15);
      color: #2ed573;
      border: 1px solid rgba(46, 213, 115, 0.3);
      padding: 4px 12px;
      border-radius: 14px;
      font-size: 12px;
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="quiz-container">

  <!-- Header -->
  <section class="quiz-header">
    <p class="tag">✦ ADAPTIVE KNOWLEDGE TESTING</p>
    <h1>Mythology & Science Smart Quiz</h1>
    <p>Test your knowledge of ancient texts, astronomical calculations, and archaeological discoveries. Select your topic, difficulty, and question count below.</p>
  </section>

  <!-- Configuration & Category Selection Section -->
  <section id="categorySection">

    <!-- Smart Quiz Filter Selectors (Feature 13) -->
    <div class="config-bar">
      <div class="config-group">
        <label for="topicSelect">📚 Topic</label>
        <select id="topicSelect" class="config-select">
          <option value="all">All Topics (Comprehensive)</option>
          <option value="ramayana" <?= ($selectedCategoryParam === 'ramayana') ? 'selected' : '' ?>>Ramayana & Marine Engineering</option>
          <option value="mahabharata" <?= ($selectedCategoryParam === 'mahabharata') ? 'selected' : '' ?>>Mahabharata & Ancient Astras</option>
          <option value="astronomy" <?= ($selectedCategoryParam === 'astronomy') ? 'selected' : '' ?>>Vedic Astronomy & Physics</option>
          <option value="architecture" <?= ($selectedCategoryParam === 'architecture') ? 'selected' : '' ?>>Ancient Architecture & Civilizations</option>
          <option value="surgery" <?= ($selectedCategoryParam === 'surgery') ? 'selected' : '' ?>>Ancient Bio-Medicine & Surgery</option>
        </select>
      </div>

      <div class="config-group">
        <label for="difficultySelect">⚡ Difficulty</label>
        <select id="difficultySelect" class="config-select">
          <option value="all">All Difficulties</option>
          <option value="easy">Easy (Foundational)</option>
          <option value="medium" selected>Medium (Analytical)</option>
          <option value="hard">Advanced / Expert (Scholarly)</option>
        </select>
      </div>

      <div class="config-group">
        <label for="countSelect">🎯 Number of Questions</label>
        <select id="countSelect" class="config-select">
          <option value="5" selected>5 Questions (Quick Test)</option>
          <option value="10">10 Questions (Standard Quiz)</option>
          <option value="15">15 Questions (Deep Evaluation)</option>
        </select>
      </div>
    </div>

    <!-- Visual Category Cards Grid -->
    <div class="category-grid">
      
      <div class="category-card <?= ($selectedCategoryParam === '' || $selectedCategoryParam === 'ramayana') ? 'selected' : '' ?>" data-category="ramayana">
        <div class="category-icon">🌉</div>
        <h3>Ramayana & Marine Engineering</h3>
        <p>Ram Setu coral core drilling, shoals of Palk Strait, and ancient architectural descriptions.</p>
        <div class="category-meta">
          <span>Verified Questions</span>
          <span>⚡ Multi-Level</span>
        </div>
      </div>

      <div class="category-card <?= ($selectedCategoryParam === 'mahabharata') ? 'selected' : '' ?>" data-category="mahabharata">
        <div class="category-icon">🏹</div>
        <h3>Mahabharata & Ancient Astras</h3>
        <p>Astronomical dates of the Kurukshetra war, PGW pottery at Hastinapur, and ancient ballistics.</p>
        <div class="category-meta">
          <span>Verified Questions</span>
          <span>⚡ Multi-Level</span>
        </div>
      </div>

      <div class="category-card <?= ($selectedCategoryParam === 'astronomy') ? 'selected' : '' ?>" data-category="astronomy">
        <div class="category-icon">☀️</div>
        <h3>Vedic Astronomy & Physics</h3>
        <p>Surya Siddhanta solar year calculations, Hanuman Chalisa distance, and light speed formulas.</p>
        <div class="category-meta">
          <span>Verified Questions</span>
          <span>⚡ Multi-Level</span>
        </div>
      </div>

      <div class="category-card <?= ($selectedCategoryParam === 'architecture') ? 'selected' : '' ?>" data-category="architecture">
        <div class="category-icon">🏛️</div>
        <h3>Architecture & Archaeology</h3>
        <p>Monolithic excavation of Kailasa Temple, underwater Dwarka anchors, and Saraswati paleochannels.</p>
        <div class="category-meta">
          <span>Verified Questions</span>
          <span>⚡ Multi-Level</span>
        </div>
      </div>

    </div>

    <div style="text-align: center; margin-top: 25px;">
      <button class="btn-gold" id="startQuizBtn" style="padding: 15px 45px; font-size: 16px;">
        START CUSTOMIZED QUIZ ➔
      </button>
    </div>
  </section>

  <!-- Active Quiz Arena -->
  <section id="quizArena" class="quiz-arena" style="display: none;">
    <div class="arena-top">
      <div>
        <span class="question-count" id="questionCounter">Question 1 of 5</span>
        <span id="diffDisplay" class="diff-badge diff-medium">Medium</span>
      </div>
      <div class="quiz-timer">
        <span>⏱️</span> <span id="timerDisplay">00:00</span>
      </div>
    </div>

    <h2 class="question-text" id="questionText">Loading question...</h2>

    <!-- Voice Control Bar (Feature 12) -->
    <div style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap; margin:14px 0 18px;">
      <button type="button" class="btn-gold" id="speakQuestionBtn" style="padding:9px 16px; font-size:12px;">🔊 Read Question</button>
      <button type="button" class="btn-gold" id="voiceAnswerBtn" style="padding:9px 16px; font-size:12px;">🎙️ Answer by Voice</button>
    </div>
    <div id="voiceAssistantStatus" style="text-align:center; color:#888; font-size:12px; min-height:18px; margin-bottom:8px;"></div>

    <div class="options-list" id="optionsList"></div>

    <div id="explanationBox" class="explanation-box" style="display: none;"></div>

    <div class="quiz-action-bar">
      <button class="btn-gold" id="nextBtn" style="display: none;">Next Question →</button>
    </div>
  </section>

  <!-- Score & Analytics Dashboard -->
  <section id="analyticsSection" class="score-analytics-box" style="display: none;">
    <div class="score-badge-circle">
      <span class="score-num" id="finalScoreVal">0/5</span>
      <span class="score-total" id="percentageVal">0%</span>
    </div>

    <h2 class="score-title" id="analysisTitle">Scholar Inquirer</h2>
    <p style="color: #aaa; max-width: 600px; margin: 0 auto 20px;" id="analysisFeedback">
      Analyzing your performance...
    </p>

    <div class="accuracy-bar-container">
      <div class="accuracy-bar-fill" id="accuracyFill" style="width: 0%;"></div>
    </div>

    <div class="score-summary-grid">
      <div class="score-stat">
        <div class="val" id="correctCount">0</div>
        <div class="lbl">Correct Answers</div>
      </div>
      <div class="score-stat">
        <div class="val" id="timeSpentVal">0s</div>
        <div class="lbl">Time Taken</div>
      </div>
      <div class="score-stat">
        <div class="val" id="badgeAwarded">🏅 Explorer</div>
        <div class="lbl">Badge Earned</div>
      </div>
    </div>

    <div style="display: flex; justify-content: center; gap: 15px; margin-top: 30px; flex-wrap: wrap;">
      <button class="btn-gold" onclick="restartQuiz()">Try Another Configuration</button>
      <button class="btn-gold" style="background: transparent; border: 1px solid #d4af37; color: #d4af37;" onclick="window.location.href='profile.php'">View Saved Profile Analytics →</button>
      <button class="btn-gold" style="background: transparent; border: 1px solid #d4af37; color: #d4af37;" onclick="window.location.href='map.php'">Explore Sites on Map 🗺️</button>
    </div>
  </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<!-- Comprehensive Verified Question Bank with Topics & Difficulties -->
<script>
const verifiedQuestionBank = [
  // RAMAYANA & MARINE
  {
    cat: "ramayana",
    diff: "easy",
    q: "In ancient Indian texts, who were the master architects credited with designing the causeway across the ocean?",
    options: [
      "Sugriva and Angada",
      "Nala and Nila",
      "Vibhishana and Jambavan",
      "Hanuman and Lakshmana"
    ],
    answer: 1,
    exp: "Valmiki Ramayana names Nala and Nila (sons of divine architect Vishwakarma) as the lead engineers overseeing construction of the causeway."
  },
  {
    cat: "ramayana",
    diff: "medium",
    q: "What length is recorded for the Ram Setu shoal chain stretching across the Palk Strait?",
    options: [
      "Approx. 48 Kilometers (30 Miles)",
      "Approx. 250 Kilometers",
      "Approx. 12 Kilometers",
      "Approx. 500 Kilometers"
    ],
    answer: 0,
    exp: "Satellite imagery from ISRO and NASA confirms the chain of limestone shoals stretches approximately 48 km across the Palk Strait."
  },
  {
    cat: "ramayana",
    diff: "medium",
    q: "Historical records in Rameswaram confirm that the causeway was entirely above sea level until which event?",
    options: [
      "A severe cyclone in 1480 CE breached the causeway",
      "An earthquake in 1950",
      "Rising tides in 500 BCE",
      "A tsunami in 2004"
    ],
    answer: 0,
    exp: "Epigraphical chronicles at Rameswaram temple note that the causeway was walkable on foot until severed by a powerful cyclone in 1480 CE."
  },
  {
    cat: "ramayana",
    diff: "hard",
    q: "What did marine geological core sampling and OSL studies reveal regarding the stones and sandbank of Ram Setu?",
    options: [
      "The stones and sandbank have completely identical carbon ages",
      "The coral limestone boulders (approx. 7,000 years old) overlie a younger sandbank (approx. 4,000 years old)",
      "The entire structure is modern concrete from the British era",
      "It is a basalt volcanic formation from the Jurassic era"
    ],
    answer: 1,
    exp: "Geological investigations noted an age difference between the upper limestone boulders (~7,000 years) and the underlying marine sand ridge (~4,000 years), suggesting stones were positioned atop the ridge."
  },
  {
    cat: "ramayana",
    diff: "easy",
    q: "Which volcanic rock phenomenon explains how porous volcanic stones naturally float on water?",
    options: [
      "Quantum Levitation",
      "Pumice Stone Porosity with Trapped Gas Bubbles",
      "Magnetic Repulsion",
      "Static Electricity"
    ],
    answer: 1,
    exp: "Pumice stone forms during explosive eruptions when rapidly cooling lava traps gas bubbles, creating rock whose bulk density is lower than water."
  },

  // MAHABHARATA & ASTRAS
  {
    cat: "mahabharata",
    diff: "easy",
    q: "According to ancient astronomical texts, Kali Yuga is traditionally calculated to have commenced in which year?",
    options: [
      "3102 BCE",
      "1000 BCE",
      "500 CE",
      "1500 BCE"
    ],
    answer: 0,
    exp: "Aryabhata's Aryabhatiya and the Surya Siddhanta state that Kali Yuga began at the planetary conjunction of February 3102 BCE."
  },
  {
    cat: "mahabharata",
    diff: "medium",
    q: "Which archaeological culture was documented by Prof. B.B. Lal at Hastinapur matching the Mahabharata geographic horizon?",
    options: [
      "Painted Grey Ware (PGW) culture",
      "Roman Arretine Ware",
      "Neolithic Jade Culture",
      "Paleolithic Quartzite tools"
    ],
    answer: 0,
    exp: "Excavations at Hastinapur and Kurukshetra yielded continuous settlements of the Painted Grey Ware (PGW) culture with early iron artifacts dating to the early first millennium BCE."
  },
  {
    cat: "mahabharata",
    diff: "hard",
    q: "How have modern researchers like Prof. Narahari Achar proposed dates for the Kurukshetra War around 3067 BCE?",
    options: [
      "By guessing randomly",
      "By matching over 140 planetary configurations, eclipses, and retrograde motions recorded in the epic using ephemeris software",
      "By measuring tree rings in England",
      "Through modern mythology novels"
    ],
    answer: 1,
    exp: "The critical edition of the Mahabharata meticulously records planetary positions and eclipses which modern astronomers simulate backwards using ephemeris software."
  },
  {
    cat: "mahabharata",
    diff: "medium",
    q: "What archaeological finding at Hastinapur coincides with the epic account of the Kurus abandoning the capital for Kaushambi?",
    options: [
      "A massive alluvial Ganges flood silt layer terminating Period II",
      "A meteor impact crater",
      "A sudden volcanic ash layer",
      "An earthquake fissure only"
    ],
    answer: 0,
    exp: "ASI excavations revealed a heavy alluvial flood layer that eroded parts of the PGW settlement at Hastinapur, matching the Puranic record that King Nichakshu moved to Kaushambi after a flood."
  },
  {
    cat: "mahabharata",
    diff: "hard",
    q: "What protective chemical layer prevents the 1,600-year-old Iron Pillar of Delhi from rusting?",
    options: [
      "Iron hydrogen phosphate hydrate (misawite)",
      "Electroplated zinc",
      "Synthetic Teflon coating",
      "Stainless chromium"
    ],
    answer: 0,
    exp: "Metallurgists at IIT Kanpur found that high phosphorus content in the ancient forge-welded wrought iron created a passive catalytic protective film called misawite."
  },

  // ASTRONOMY & PHYSICS
  {
    cat: "astronomy",
    diff: "easy",
    q: "Which ancient treatise accurately stated that Earth is spherical and rotates on its axis, causing day and night?",
    options: [
      "Aryabhatiya by Aryabhata (499 CE)",
      "Arthashastra",
      "Manusmriti",
      "Kamasutra"
    ],
    answer: 0,
    exp: "Aryabhata explicitly formulated 'Bhumi Bhramana' (Earth's daily axial rotation) and calculated the Earth's circumference with impressive accuracy."
  },
  {
    cat: "astronomy",
    diff: "medium",
    q: "The Hanuman Chalisa verse 'Yug Sahastra Yojan Par Bhanu' computes to approximately what distance?",
    options: [
      "149.6 Million Kilometers (96 Million Miles)",
      "10 Million Kilometers",
      "384,400 Kilometers",
      "1 Billion Kilometers"
    ],
    answer: 0,
    exp: "1 Yug (12,000) × 1 Sahastra (1,000) × 1 Yojan (8 miles) = 96,000,000 miles ≈ 149.6 Million km, virtually identical to the Earth-Sun mean distance measured by modern astronomy!"
  },
  {
    cat: "astronomy",
    diff: "hard",
    q: "The Surya Siddhanta estimated the length of a sidereal solar year as 365.25636 days. How close is this to modern atomic measurements?",
    options: [
      "Within approximately 1.4 seconds",
      "Off by two weeks",
      "Off by three days",
      "Off by 5 hours"
    ],
    answer: 0,
    exp: "The Surya Siddhanta calculated the sidereal year as 365.25636 days, with an error of barely 1.4 seconds compared to modern atomic clock calculations."
  },
  {
    cat: "astronomy",
    diff: "medium",
    q: "Why is a 2-meter bronze statue of Lord Shiva as Nataraja permanently installed at CERN in Geneva?",
    options: [
      "It represents the cosmic dance of creation and destruction as a metaphor for quantum field fluctuations",
      "It was a tourist souvenir",
      "It marks the location of an ancient temple",
      "It is a lightning rod"
    ],
    answer: 0,
    exp: "Physicists like Fritjof Capra and CERN leaders drew a parallel between Shiva's continuous cosmic dance (Ananda Tandava) and the continuous creation and dissolution of subatomic particles in quantum field theory."
  },
  {
    cat: "astronomy",
    diff: "hard",
    q: "Which ancient Indian city served as the prime meridian (0° longitude) in classical astronomy?",
    options: [
      "Ujjain (Avanti)",
      "Pataliputra",
      "Kanchipuram",
      "Taxila"
    ],
    answer: 0,
    exp: "Classical Indian astronomers, including Varahamihira and the authors of the Surya Siddhanta, established Ujjain as the prime meridian of ancient India."
  },

  // ARCHITECTURE & CIVILIZATIONS
  {
    cat: "architecture",
    diff: "easy",
    q: "What makes Cave 16 (Kailasa Temple at Ellora) an extraordinary achievement of world architecture?",
    options: [
      "It was excavated from the top-down out of a single solid basalt cliff removing 200,000+ tons of rock",
      "It was built using modern concrete blocks",
      "It was constructed entirely from timber",
      "It is an artificial island"
    ],
    answer: 0,
    exp: "Unlike conventional buildings constructed from the foundation up, Kailasa Temple was excavated downwards from the cliff top with zero architectural margin for error."
  },
  {
    cat: "architecture",
    diff: "medium",
    q: "What did marine excavations by the National Institute of Oceanography (NIO) discover off Bet Dwarka?",
    options: [
      "Submerged stone walls, bastions, and Bronze Age three-hole triangular stone anchors",
      "A modern shipwreck from World War II",
      "Natural coral formations only",
      "Roman coin hoards only"
    ],
    answer: 0,
    exp: "Dr. S.R. Rao and NIO marine archaeologists found submerged stone bastions, Late Harappan pottery sherds, and three-holed stone anchors matching Bronze Age Mediterranean port designs."
  },
  {
    cat: "architecture",
    diff: "medium",
    q: "How did ISRO satellite radar mapping confirm the physical existence of the ancient Saraswati River?",
    options: [
      "By detecting buried subterranean paleochannels beneath the sands of the Thar Desert",
      "By taking aerial photos of flowing surface water",
      "By detecting magnetic fields only",
      "By reading medieval maps"
    ],
    answer: 0,
    exp: "Synthetic Aperture Radar (SAR) imagery revealed extensive subsurface paleochannels in Haryana and Rajasthan where the glacier-fed Saraswati flowed before tectonic shifts diverted its tributaries."
  },
  {
    cat: "architecture",
    diff: "hard",
    q: "Under which royal dynasty and monarch was the monolithic Kailasa Temple at Ellora sculpted in the 8th century CE?",
    options: [
      "Rashtrakuta Dynasty under King Krishna I",
      "Chola Dynasty under Rajaraja I",
      "Gupta Dynasty under Chandragupta II",
      "Maurya Dynasty under Ashoka"
    ],
    answer: 0,
    exp: "Inscriptional copper plates confirm that Kailasa Temple was commissioned in the 8th century CE under Rashtrakuta King Krishna I (reigned c. 756–773 CE)."
  },

  // SURGERY & MEDICINE
  {
    cat: "surgery",
    diff: "easy",
    q: "Maharshi Sushruta (Sushruta Samhita) is internationally recognized in medical history as the pioneer of:",
    options: [
      "Plastic Surgery (Forehead Flap Rhinoplasty) & Cataract Surgery",
      "Steam Engines",
      "Telescopes",
      "Electric Dynamos"
    ],
    answer: 0,
    exp: "Sushruta codified the forehead flap technique for nose reconstruction, cataract couching, and over 120 precision surgical tools, founding classical surgery."
  },
  {
    cat: "surgery",
    diff: "medium",
    q: "How many precision surgical instruments (Yantras and Shastras) were classified in the classical Sushruta Samhita?",
    options: [
      "Over 120 precision instruments forged from hardened steel",
      "Only 5 wooden sticks",
      "Zero surgical tools",
      "Over 5,000 instruments"
    ],
    answer: 0,
    exp: "The Sushruta Samhita describes 101 blunt instruments (Yantras) and 20 sharp instruments (Shastras) modeled after the beaks and jaws of animals and birds."
  },
  {
    cat: "surgery",
    diff: "hard",
    q: "In which ancient metropolis on the Ganges did Maharshi Sushruta teach the surgical science (Shalya Tantra)?",
    options: [
      "Kashi (Varanasi)",
      "Hastinapur",
      "Dwarka",
      "Ujjain"
    ],
    answer: 0,
    exp: "According to the classical text, Sushruta received training from King Divodasa Dhanvantari in ancient Kashi (Varanasi)."
  }
];

let activeQuestions = [];
let currentQIdx = 0;
let userScore = 0;
let quizTimer = null;
let secondsElapsed = 0;
let voiceUsedInSession = false;

// Card click synchronizes with Topic dropdown
document.querySelectorAll('.category-card').forEach(card => {
  card.addEventListener('click', () => {
    document.querySelectorAll('.category-card').forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
    const cat = card.getAttribute('data-category');
    document.getElementById('topicSelect').value = cat;
  });
});

document.getElementById('topicSelect').addEventListener('change', (e) => {
  const cat = e.target.value;
  document.querySelectorAll('.category-card').forEach(c => {
    if (c.getAttribute('data-category') === cat) c.classList.add('selected');
    else c.classList.remove('selected');
  });
});

document.getElementById('startQuizBtn').addEventListener('click', startCustomizedQuiz);

function startCustomizedQuiz() {
  const selectedTopic = document.getElementById('topicSelect').value;
  const selectedDiff = document.getElementById('difficultySelect').value;
  const countRequested = parseInt(document.getElementById('countSelect').value) || 5;

  // Filter verified bank
  let filtered = verifiedQuestionBank.filter(q => {
    const matchTopic = (selectedTopic === 'all' || q.cat === selectedTopic);
    const matchDiff = (selectedDiff === 'all' || q.diff === selectedDiff);
    return matchTopic && matchDiff;
  });

  // If strict filter yielded fewer than requested, expand difficulty to fill
  if (filtered.length < countRequested && selectedDiff !== 'all') {
    filtered = verifiedQuestionBank.filter(q => selectedTopic === 'all' || q.cat === selectedTopic);
  }

  // Shuffle questions
  filtered.sort(() => Math.random() - 0.5);
  activeQuestions = filtered.slice(0, countRequested);

  if (activeQuestions.length === 0) {
    alert('No questions found for this specific combination. Please choose "All Difficulties".');
    return;
  }

  currentQIdx = 0;
  userScore = 0;
  secondsElapsed = 0;
  voiceUsedInSession = false;

  document.getElementById('categorySection').style.display = 'none';
  document.getElementById('analyticsSection').style.display = 'none';
  document.getElementById('quizArena').style.display = 'block';

  clearInterval(quizTimer);
  quizTimer = setInterval(() => {
    secondsElapsed++;
    const mins = String(Math.floor(secondsElapsed / 60)).padStart(2, '0');
    const secs = String(secondsElapsed % 60).padStart(2, '0');
    document.getElementById('timerDisplay').innerText = `${mins}:${secs}`;
  }, 1000);

  renderQuestion();
}

function renderQuestion() {
  const qObj = activeQuestions[currentQIdx];
  document.getElementById('questionCounter').innerText = `Question ${currentQIdx + 1} of ${activeQuestions.length}`;
  
  // Difficulty badge
  const diffBadge = document.getElementById('diffDisplay');
  diffBadge.className = `diff-badge diff-${qObj.diff}`;
  diffBadge.innerText = qObj.diff.toUpperCase();

  document.getElementById('questionText').innerText = qObj.q;

  const optionsList = document.getElementById('optionsList');
  optionsList.innerHTML = '';
  document.getElementById('explanationBox').style.display = 'none';
  document.getElementById('nextBtn').style.display = 'none';

  qObj.options.forEach((opt, idx) => {
    const btn = document.createElement('button');
    btn.className = 'option-btn';
    btn.innerHTML = `<span style="font-weight:700; color:#d4af37;">${String.fromCharCode(65 + idx)}.</span> ${escapeHtml(opt)}`;
    btn.addEventListener('click', () => selectAnswer(idx, btn));
    optionsList.appendChild(btn);
  });
}

function selectAnswer(selectedIdx, btnElement) {
  const qObj = activeQuestions[currentQIdx];
  const allOptionBtns = document.querySelectorAll('.option-btn');
  allOptionBtns.forEach(b => b.classList.add('disabled'));

  if (selectedIdx === qObj.answer) {
    userScore++;
    btnElement.classList.add('correct');
  } else {
    btnElement.classList.add('incorrect');
    allOptionBtns[qObj.answer].classList.add('correct');
  }

  const expBox = document.getElementById('explanationBox');
  expBox.innerHTML = `<strong>Scientific & Empirical Context:</strong> ${escapeHtml(qObj.exp)}`;
  expBox.style.display = 'block';

  const nextBtn = document.getElementById('nextBtn');
  nextBtn.innerText = (currentQIdx === activeQuestions.length - 1) ? 'View Score Analysis ➔' : 'Next Question ➔';
  nextBtn.style.display = 'inline-block';
}

document.getElementById('nextBtn').addEventListener('click', () => {
  currentQIdx++;
  if (currentQIdx < activeQuestions.length) {
    renderQuestion();
  } else {
    finishQuiz();
  }
});

function finishQuiz() {
  clearInterval(quizTimer);
  document.getElementById('quizArena').style.display = 'none';
  document.getElementById('analyticsSection').style.display = 'block';

  const total = activeQuestions.length;
  const percentage = Math.round((userScore / total) * 100);

  document.getElementById('finalScoreVal').innerText = `${userScore}/${total}`;
  document.getElementById('percentageVal').innerText = `${percentage}%`;
  document.getElementById('correctCount').innerText = `${userScore} / ${total}`;
  document.getElementById('timeSpentVal').innerText = `${secondsElapsed}s`;

  setTimeout(() => {
    document.getElementById('accuracyFill').style.width = `${percentage}%`;
  }, 150);

  const topicLabel = document.getElementById('topicSelect').options[document.getElementById('topicSelect').selectedIndex].text;
  const diffLabel = document.getElementById('difficultySelect').options[document.getElementById('difficultySelect').selectedIndex].text;

  // Send score and parameters to PHP backend API (PostgreSQL quiz_results & badges)
  fetch('api/quiz.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      topic: topicLabel,
      score: userScore,
      total_questions: total,
      time_taken: secondsElapsed,
      difficulty: diffLabel,
      used_voice: voiceUsedInSession
    })
  })
  .then(res => res.json())
  .then(data => {
    if (data && data.analysis) {
      document.getElementById('analysisTitle').innerText = data.analysis.title;
      document.getElementById('analysisFeedback').innerText = data.analysis.feedback;
      document.getElementById('badgeAwarded').innerText = data.analysis.badge;
    }
  })
  .catch(() => {
    let title = "Mythology & Science Explorer";
    let feedback = "Great job testing your understanding of ancient texts and empirical discoveries!";
    let badge = percentage >= 80 ? "🏆 Grand Scholar" : "📜 Knowledge Seeker";
    document.getElementById('analysisTitle').innerText = title;
    document.getElementById('analysisFeedback').innerText = feedback;
    document.getElementById('badgeAwarded').innerText = badge;
  });
}

// =========================================================
// VOICE ASSISTANT (FEATURE 12) - WEB SPEECH APIS
// =========================================================
const voiceSpeakBtn = document.getElementById('speakQuestionBtn');
const voiceAnswerBtn = document.getElementById('voiceAnswerBtn');
const voiceStatus = document.getElementById('voiceAssistantStatus');
const SpeechRecognitionAPI = window.SpeechRecognition || window.webkitSpeechRecognition;

function speakQuizText(text) {
  if (!('speechSynthesis' in window)) {
    voiceStatus.innerText = 'Text-to-speech is not supported in this browser.';
    return;
  }
  voiceUsedInSession = true;
  window.speechSynthesis.cancel();
  const utterance = new SpeechSynthesisUtterance(text);
  utterance.lang = 'en-IN';
  utterance.rate = 0.95;
  utterance.pitch = 1;
  window.speechSynthesis.speak(utterance);
}

function readCurrentQuestion() {
  if (!activeQuestions.length) return;
  const q = activeQuestions[currentQIdx];
  const optionText = q.options.map((o, i) => `${String.fromCharCode(65+i)}. ${o}`).join('. ');
  speakQuizText(`Question ${currentQIdx + 1}. ${q.q}. Options: ${optionText}`);
  voiceStatus.innerText = 'Sage is reading the question aloud…';
}

if (voiceSpeakBtn) voiceSpeakBtn.addEventListener('click', readCurrentQuestion);

if (voiceAnswerBtn) {
  if (!SpeechRecognitionAPI) {
    voiceAnswerBtn.disabled = true;
    voiceAnswerBtn.title = 'Voice input is not supported in this browser.';
  } else {
    voiceAnswerBtn.addEventListener('click', () => {
      voiceUsedInSession = true;
      const recognition = new SpeechRecognitionAPI();
      recognition.lang = 'en-IN';
      recognition.interimResults = false;
      recognition.maxAlternatives = 3;
      voiceStatus.innerText = '🎙️ Listening… say A, B, C, D or your answer.';
      recognition.onresult = (event) => {
        const spoken = event.results[0][0].transcript.trim().toLowerCase();
        const q = activeQuestions[currentQIdx];
        const words = {
          'a':0, 'option a':0, 'answer a':0, 'first':0, 'one':0,
          'b':1, 'option b':1, 'answer b':1, 'second':1, 'two':1,
          'c':2, 'option c':2, 'answer c':2, 'third':2, 'three':2,
          'd':3, 'option d':3, 'answer d':3, 'fourth':3, 'four':3
        };
        let selected = Object.prototype.hasOwnProperty.call(words, spoken) ? words[spoken] : -1;
        if (selected < 0) {
          selected = q.options.findIndex(option => spoken.includes(option.toLowerCase().slice(0, Math.min(28, option.length))));
        }
        if (selected >= 0 && selected < q.options.length) {
          const buttons = document.querySelectorAll('.option-btn');
          buttons[selected]?.click();
          voiceStatus.innerText = `Voice answer detected: Option ${String.fromCharCode(65 + selected)}.`;
        } else {
          voiceStatus.innerText = 'Could not match that. Say A, B, C, or D.';
        }
      };
      recognition.onerror = () => { voiceStatus.innerText = 'Microphone error. Please try again.'; };
      recognition.onend = () => { if (voiceStatus.innerText.includes('Listening')) voiceStatus.innerText = ''; };
      try { recognition.start(); } catch (_) {}
    });
  }
}

function restartQuiz() {
  document.getElementById('analyticsSection').style.display = 'none';
  document.getElementById('categorySection').style.display = 'block';
}

function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text || '';
  return div.innerHTML;
}
</script>

</body>
</html>
