<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Where Myth Meets Science | Mythology Science Knowledge Explore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="static/chatbot.css">
    <style>
       * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Georgia', serif; }
        body { background: #050505; color: white; }

        /* HERO SECTION */
        .hero {
            position: relative;
            min-height: 100vh;
            background: url('static/temple.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            padding-left: 8%;
            padding-right: 8%;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(0,0,0,0.92), rgba(0,0,0,0.55));
        }

        .hero-content {
            position: relative;
            max-width: 700px;
            z-index: 2;
            padding-top: 60px;
        }

        .tag {
            color: #d4af37;
            margin-bottom: 12px;
            letter-spacing: 3px;
            font-size: 13px;
            font-weight: bold;
            font-family: 'Inter', sans-serif;
        }

        h1 {
            font-size: 56px;
            line-height: 1.15;
            margin-bottom: 20px;
            font-family: 'Cinzel', 'Playfair Display', serif;
            color: #fff;
            text-shadow: 0 4px 20px rgba(0,0,0,0.8);
        }

        .desc {
            color: #ccc;
            line-height: 1.7;
            margin-bottom: 30px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            letter-spacing: 1px;
            transition: 0.3s ease;
            border-radius: 4px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .primary {
            background: linear-gradient(135deg, #d4af37, #b8860b);
            color: black;
        }

        .primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212,175,55,0.4);
        }

        .secondary {
            background: rgba(0,0,0,0.6);
            border: 1px solid #d4af37;
            color: #d4af37;
        }

        .secondary:hover {
            background: #d4af37;
            color: black;
        }

        /* CARDS SECTION */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
            padding: 90px 8%;
            background: #0a0a0a;
        }

        .card {
            padding: 35px 25px;
            border: 1px solid rgba(212,175,55,0.25);
            background: rgba(255,255,255,0.02);
            backdrop-filter: blur(6px);
            transition: all 0.4s ease;
            cursor: pointer;
            border-radius: 8px;
        }

        .card h3 {
            margin: 15px 0 10px;
            color: #fff;
            font-family: 'Cinzel', serif;
            font-size: 20px;
        }

        .card p {
            color: #aaa;
            line-height: 1.6;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
        }

        .icon {
            font-size: 34px;
            color: #d4af37;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 35px rgba(212,175,55,0.25);
            border-color: #d4af37;
            background: #111;
        }

        @media (max-width: 768px) {
            h1 { font-size: 38px; }
            .hero { padding-left: 5%; padding-right: 5%; }
            .cards { padding: 60px 5%; }
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/includes/header.php'; ?>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <p class="tag">✦ WHERE MYTHOLOGY MEETS SCIENCE</p>
            <h1>MYTHOLOGY SCIENCE<br>KNOWLEDGE EXPLORE</h1>
            <p class="desc">
                Explore the fascinating intersection of Indian ancient epics and empirical scientific knowledge. Discover satellite imagery of Ram Setu, submerged ruins of Dwarka, Vedic astronomy, and ancient surgical marvels.
            </p>
            <div class="buttons">
                <a href="stories.php" class="btn primary">BEGIN EXPLORATION</a>
                <a href="map.php" class="btn secondary">EXPLORE MAP 🗺️</a>
                <a href="quiz.php" class="btn secondary">TAKE QUIZ</a>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="login.php" class="btn secondary">LOGIN</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CARDS SECTION -->
    <section class="cards">
        <div class="card" onclick="window.location.href='stories.php'">
            <div class="icon">📜</div>
            <h3>Ancient Stories</h3>
            <p>Dive into deep-dive stories from Ramayana, Mahabharata, Vimanas, Dwarka, Kailasa Temple, and Vedic astronomy.</p>
        </div>

        <div class="card" onclick="window.location.href='map.php'">
            <div class="icon">🗺️</div>
            <h3>Mythology Map</h3>
            <p>Explore 18 archaeological sites, calculate distances from your location, and filter by evidence status.</p>
        </div>

        <div class="card" onclick="window.location.href='evidence.php'">
            <div class="icon">🔬</div>
            <h3>Myth vs Evidence</h3>
            <p>Scholarly 4-part analyses separating traditional accounts, historical context, science, and uncertainties.</p>
        </div>

        <div class="card" onclick="window.location.href='timeline.php'">
            <div class="icon">⏱️</div>
            <h3>Chronology Timeline</h3>
            <p>Compare traditional epic dates with archaeological C-14 strata and astronomical simulation models.</p>
        </div>

        <div class="card" onclick="window.location.href='myth-fact.php'">
            <div class="icon">✨</div>
            <h3>Myths vs Facts</h3>
            <p>Discover the scientific explanations behind mythological traditions with interactive 3D flip-cards.</p>
        </div>

        <div class="card" onclick="window.location.href='quiz.php'">
            <div class="icon">🎯</div>
            <h3>Adaptive Smart Quiz</h3>
            <p>Customizable by topic, difficulty, and questions count with voice input and earnable scholar badges.</p>
        </div>
    </section>

    <?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
