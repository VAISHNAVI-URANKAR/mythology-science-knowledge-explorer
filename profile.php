<?php
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = (int)$_SESSION['user_id'];
$userName = $_SESSION['name'] ?? 'Explorer';
$userEmail = $_SESSION['email'] ?? '';

$activities = [];
$totalTime = 0;
$quizHistory = [];
$userBadges = [];
$avgScore = 0;
$storiesCount = 0;
$locationsCount = 0;

try {
    $pdo = Database::getInstance();

    // Fetch user activities
    $actStmt = $pdo->prepare("SELECT page AS content_name, created_at AS activity_date, seconds AS time_spent FROM user_activity WHERE user_id = :uid ORDER BY created_at DESC LIMIT 25");
    $actStmt->execute([':uid' => $userId]);
    $activities = $actStmt->fetchAll();

    // Total time spent
    $timeStmt = $pdo->prepare("SELECT SUM(seconds) as total_time FROM user_activity WHERE user_id = :uid");
    $timeStmt->execute([':uid' => $userId]);
    $timeRow = $timeStmt->fetch();
    $totalTime = intval($timeRow['total_time'] ?? 0);

    // Count distinct stories explored
    $storiesStmt = $pdo->prepare("SELECT COUNT(DISTINCT page) FROM user_activity WHERE user_id = :uid AND page NOT LIKE 'Location: %'");
    $storiesStmt->execute([':uid' => $userId]);
    $storiesCount = (int)$storiesStmt->fetchColumn();

    // Count distinct locations explored
    $locStmt = $pdo->prepare("SELECT COUNT(DISTINCT page) FROM user_activity WHERE user_id = :uid AND page LIKE 'Location: %'");
    $locStmt->execute([':uid' => $userId]);
    $locationsCount = (int)$locStmt->fetchColumn();

    // Fetch quiz results
    $quizStmt = $pdo->prepare("SELECT id, score, total, percentage, time_taken, created_at, analysis FROM quiz_results WHERE user_id = :uid ORDER BY created_at DESC");
    $quizStmt->execute([':uid' => $userId]);
    $quizHistory = $quizStmt->fetchAll();

    if (count($quizHistory) > 0) {
        $totalPct = array_sum(array_column($quizHistory, 'percentage'));
        $avgScore = round($totalPct / count($quizHistory), 1);
    }

    // Fetch earned badges from PostgreSQL
    $badgeStmt = $pdo->prepare("SELECT badge_name, awarded_at FROM badges WHERE user_id = :uid ORDER BY awarded_at DESC");
    $badgeStmt->execute([':uid' => $userId]);
    $rawBadges = $badgeStmt->fetchAll();
    $earnedBadgeNames = array_column($rawBadges, 'badge_name');

} catch (Exception $e) {
    // Handled gracefully in UI
}

// Master Badge Definition List (Feature 15 Gamification)
$masterBadges = [
    [
        'name' => 'Mythology Explorer',
        'icon' => '📜',
        'desc' => 'Attempted a quiz connecting epic lore with scientific discoveries.',
        'criteria' => 'Complete your first quiz evaluation.'
    ],
    [
        'name' => 'Location Explorer',
        'icon' => '🏛️',
        'desc' => 'Explored archaeological and mythological sites on the interactive map.',
        'criteria' => 'Explore 3 or more locations on the map.'
    ],
    [
        'name' => 'Science Seeker',
        'icon' => '🔬',
        'desc' => 'Demonstrated 70%+ accuracy on ancient astronomy, surgery, or engineering.',
        'criteria' => 'Score 70%+ on a science-specific quiz.'
    ],
    [
        'name' => 'Quiz Master',
        'icon' => '🏆',
        'desc' => 'Achieved mastery level with 90%+ score on an empirical evaluation.',
        'criteria' => 'Score 90%+ on any quiz.'
    ],
    [
        'name' => 'Voice Explorer',
        'icon' => '🎙️',
        'desc' => 'Utilized browser Web Speech recognition to answer or read questions.',
        'criteria' => 'Answer a question or read aloud via voice.'
    ],
    [
        'name' => 'Knowledge Hunter',
        'icon' => '📚',
        'desc' => 'Demonstrated persistent inquiry through multiple quiz attempts.',
        'criteria' => 'Complete 3 or more knowledge evaluations.'
    ]
];

$storyProgress = min(100, round(($storiesCount / 12) * 100));
$locationProgress = min(100, round(($locationsCount / 18) * 100));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Progress Dashboard & Analytics | Mythology</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="static/style.css">
<link rel="stylesheet" href="static/chatbot.css">

<style>
body { margin: 0; font-family: 'Inter', sans-serif; background: #000; color: #fff; }
.container { max-width: 1100px; margin: 0 auto; padding: 120px 30px 60px; }

/* PROFILE HEADER */
.profile-header {
  display: flex;
  align-items: center;
  gap: 25px;
  background: #0b0b0b;
  padding: 30px;
  border-radius: 12px;
  border: 1px solid #222;
  margin-bottom: 30px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.5);
}
.avatar {
  width: 75px;
  height: 75px;
  border-radius: 50%;
  background: linear-gradient(135deg, #d4af37, #f1d46b);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 32px;
  color: black;
  font-weight: bold;
  box-shadow: 0 4px 15px rgba(212,175,55,0.4);
  text-transform: uppercase;
}
.profile-info h2 { font-family: 'Cinzel', serif; font-size: 26px; color: #fff; margin-bottom: 4px; }

/* STATS GRID */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  margin-bottom: 30px;
}
.stat-card {
  background: #0b0b0b;
  padding: 22px;
  border-radius: 12px;
  border: 1px solid #222;
  text-align: center;
  transition: transform 0.2s;
}
.stat-card:hover { border-color: #d4af37; transform: translateY(-3px); }
.stat-card .val { color: #d4af37; font-size: 28px; font-weight: 700; margin-bottom: 5px; }
.stat-card .lbl { color: #888; font-size: 13px; }

/* PROGRESS */
.progress-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  margin-bottom: 30px;
}
.progress-box {
  background: #0b0b0b;
  padding: 22px;
  border-radius: 12px;
  border: 1px solid #222;
}
.progress-bar {
  width: 100%;
  height: 12px;
  background: #1c1c1c;
  border-radius: 10px;
  overflow: hidden;
  margin-top: 10px;
}
.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, #d4af37, #2ed573);
  transition: width 0.8s ease;
}

/* BADGES SECTION */
.badges-container {
  background: #0b0b0b;
  padding: 25px;
  border-radius: 12px;
  border: 1px solid #222;
  margin-bottom: 30px;
}
.badge-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 15px;
  margin-top: 15px;
}
.badge-item {
  background: #141414;
  border: 1px solid #282828;
  padding: 14px 18px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  gap: 14px;
  transition: all 0.25s;
}
.badge-item.unlocked {
  border-color: rgba(212,175,55,0.4);
  background: rgba(212,175,55,0.04);
}
.badge-item.locked {
  opacity: 0.45;
  filter: grayscale(80%);
}
.badge-item .icon { font-size: 28px; }
.badge-item .b-name { font-size: 14px; color: #f1d46b; font-weight: 600; margin-bottom: 2px; }
.badge-item.locked .b-name { color: #888; }
.badge-item .b-desc { font-size: 12px; color: #aaa; line-height: 1.4; }

/* TABLES & HISTORY */
.data-box {
  background: #0b0b0b;
  padding: 25px;
  border-radius: 12px;
  border: 1px solid #222;
  margin-bottom: 30px;
}
.data-box h3 {
  font-family: 'Cinzel', serif;
  color: #d4af37;
  font-size: 18px;
  margin-bottom: 18px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.table-responsive { overflow-x: auto; }
table { width: 100%; border-collapse: collapse; font-size: 13.5px; }
th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #1a1a1a; }
th { color: #d4af37; font-weight: 600; background: #111; }
tr:hover td { background: #121212; }
.score-badge {
  background: rgba(46, 213, 115, 0.15);
  color: #2ed573;
  padding: 4px 10px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 12px;
}

.activity-item {
  padding: 12px 0;
  border-bottom: 1px solid #1a1a1a;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.activity-item:last-child { border-bottom: none; }
.activity-type-icon { margin-right: 8px; font-size: 16px; }
</style>
</head>

<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container">

    <!-- PROFILE HEADER -->
    <div class="profile-header">
        <div class="avatar"><?= strtoupper(substr($userName, 0, 1)) ?></div>
        <div class="profile-info">
            <h2><?= htmlspecialchars($userName) ?></h2>
            <p style="color:#aaa; font-size:14px;"><?= htmlspecialchars($userEmail) ?></p>
            <p style="color:#666; font-size:12px; margin-top:4px;">Explorer Status: Active Scholar • PostgreSQL Database</p>
        </div>
    </div>

    <!-- STATS OVERVIEW (Feature 14) -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="val"><?= $storiesCount ?></div>
            <div class="lbl">Stories Explored (<?= $storiesCount ?> / 12)</div>
        </div>

        <div class="stat-card">
            <div class="val"><?= $locationsCount ?></div>
            <div class="lbl">Locations Explored (<?= $locationsCount ?> / 18)</div>
        </div>

        <div class="stat-card">
            <div class="val"><?= count($quizHistory) ?></div>
            <div class="lbl">Quizzes Completed</div>
        </div>

        <div class="stat-card">
            <div class="val"><?= $avgScore ?>%</div>
            <div class="lbl">Average Quiz Score</div>
        </div>

        <div class="stat-card">
            <div class="val">
                <?php if ($totalTime >= 60): ?>
                    <?= round($totalTime / 60, 1) ?> <span style="font-size:16px;">min</span>
                <?php else: ?>
                    <?= $totalTime ?> <span style="font-size:16px;">sec</span>
                <?php endif; ?>
            </div>
            <div class="lbl">Total Exploration Time</div>
        </div>
    </div>

    <!-- PROGRESS BARS -->
    <div class="progress-grid">
        <div class="progress-box">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <strong style="color:#f1d46b; font-size:13.5px;">📜 Stories Exploration</strong>
                <span style="color:#aaa; font-size:12.5px;"><?= $storiesCount ?> / 12 (<?= $storyProgress ?>%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?= $storyProgress ?>%;"></div>
            </div>
        </div>

        <div class="progress-box">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <strong style="color:#f1d46b; font-size:13.5px;">📍 Map Locations Explored</strong>
                <span style="color:#aaa; font-size:12.5px;"><?= $locationsCount ?> / 18 (<?= $locationProgress ?>%)</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?= $locationProgress ?>%;"></div>
            </div>
        </div>
    </div>

    <!-- SCHOLAR BADGES & GAMIFICATION (Feature 15) -->
    <div class="badges-container">
        <h3 style="font-family:'Cinzel', serif; color:#d4af37; font-size:18px;">
            Scholar Badges & Achievements (<?= count($earnedBadgeNames) ?> / <?= count($masterBadges) ?> Unlocked)
        </h3>
        <div class="badge-grid">
            <?php foreach ($masterBadges as $mb): 
                $unlocked = in_array($mb['name'], $earnedBadgeNames);
            ?>
                <div class="badge-item <?= $unlocked ? 'unlocked' : 'locked' ?>" title="<?= htmlspecialchars($mb['criteria']) ?>">
                    <span class="icon"><?= $mb['icon'] ?></span>
                    <div>
                        <div class="b-name">
                            <?= htmlspecialchars($mb['name']) ?>
                            <?= $unlocked ? ' <span style="font-size:10px; color:#2ed573;">✓ UNLOCKED</span>' : ' <span style="font-size:10px; color:#666;">🔒 LOCKED</span>' ?>
                        </div>
                        <div class="b-desc"><?= htmlspecialchars($unlocked ? $mb['desc'] : $mb['criteria']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- QUIZ ATTEMPTS HISTORY -->
    <div class="data-box">
        <h3>
            <span>Quiz Performance History</span>
            <a href="quiz.php" style="font-size:13px; color:#d4af37; text-decoration:none; font-family:'Inter', sans-serif;">Take Smart Quiz ➔</a>
        </h3>

        <?php if (count($quizHistory) === 0): ?>
            <p style="color:#777; font-size:13.5px;">No quizzes taken yet. <a href="quiz.php" style="color:#d4af37;">Start your first quiz now!</a></p>
        <?php else: ?>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Evaluation / Topic</th>
                            <th>Score</th>
                            <th>Accuracy</th>
                            <th>Time</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quizHistory as $q): ?>
                            <tr>
                                <td>
                                    <strong><?= htmlspecialchars($q['analysis'] ?? 'Quiz Evaluation') ?></strong>
                                </td>
                                <td><?= intval($q['score']) ?> / <?= intval($q['total']) ?></td>
                                <td><span class="score-badge"><?= floatval($q['percentage']) ?>%</span></td>
                                <td><?= intval($q['time_taken']) ?>s</td>
                                <td style="color:#888;"><?= htmlspecialchars(substr($q['created_at'], 0, 19)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- RECENT ACTIVITY LOG -->
    <div class="data-box">
        <h3>Recent Activity Log</h3>
        <?php if (count($activities) === 0): ?>
            <p style="color:#777; font-size:13.5px;">No recent exploration activity. Dive into the <a href="stories.php" style="color:#d4af37;">Stories Library</a> or <a href="map.php" style="color:#d4af37;">Interactive Map</a>!</p>
        <?php else: ?>
            <?php foreach ($activities as $a): 
                $isLocation = (strpos($a['content_name'], 'Location:') !== false);
                $cleanName = str_replace('Location: ', '', $a['content_name']);
            ?>
                <div class="activity-item">
                    <div>
                        <span class="activity-type-icon"><?= $isLocation ? '📍' : '📜' ?></span>
                        <strong style="color:#fff;"><?= htmlspecialchars($cleanName) ?></strong>
                        <span style="font-size:11px; color:#666; margin-left:6px;"><?= $isLocation ? '[Map Site]' : '[Story]' ?></span>
                        <div style="font-size:12px; color:#777; margin-left: 24px;"><?= htmlspecialchars(substr($a['activity_date'], 0, 19)) ?></div>
                    </div>
                    <div style="font-size:13px; color:#d4af37;">
                        <?= intval($a['time_spent']) ?>s explored
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
