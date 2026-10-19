<?php
require_once __DIR__ . '/config/db.php';

$pdo = Database::getInstance();
$topics = [];
$sourcesByTopic = [];

try {
    $evStmt = $pdo->query("SELECT * FROM myth_evidence ORDER BY id ASC");
    $topics = $evStmt->fetchAll();

    $srcStmt = $pdo->query("SELECT * FROM topic_sources ORDER BY id ASC");
    $allSources = $srcStmt->fetchAll();

    foreach ($allSources as $s) {
        $sourcesByTopic[$s['topic_slug']][] = $s;
    }
} catch (Exception $e) {
    // Handled gracefully in UI
}

$activeTopicSlug = trim($_GET['topic'] ?? ($topics[0]['topic_slug'] ?? 'ramsetu'));
$currentEvidence = null;
foreach ($topics as $t) {
    if ($t['topic_slug'] === $activeTopicSlug) {
        $currentEvidence = $t;
        break;
    }
}
if (!$currentEvidence && !empty($topics)) {
    $currentEvidence = $topics[0];
    $activeTopicSlug = $currentEvidence['topic_slug'];
}

$currentSources = $sourcesByTopic[$activeTopicSlug] ?? [];
$groupedSources = [
    'Textual / Primary Sources' => [],
    'Archaeological & Epigraphic Sources' => [],
    'Academic & Peer-Reviewed Scientific Research' => [],
    'Other Historical References' => []
];

foreach ($currentSources as $s) {
    $st = strtolower($s['source_type']);
    if (strpos($st, 'text') !== false || strpos($st, 'primary') !== false) {
        $groupedSources['Textual / Primary Sources'][] = $s;
    } elseif (strpos($st, 'archaeolog') !== false || strpos($st, 'epigraph') !== false) {
        $groupedSources['Archaeological & Epigraphic Sources'][] = $s;
    } elseif (strpos($st, 'scien') !== false || strpos($st, 'academ') !== false) {
        $groupedSources['Academic & Peer-Reviewed Scientific Research'][] = $s;
    } else {
        $groupedSources['Other Historical References'][] = $s;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Myth vs Evidence Hub | Mythology Science Explorer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #050505; color: #f0f0f0; font-family: 'Inter', sans-serif; }

    .evidence-hero {
      padding: 120px 60px 30px;
      max-width: 1300px;
      margin: 0 auto;
      text-align: center;
    }
    .evidence-hero h1 {
      font-family: 'Cinzel', serif;
      font-size: 38px;
      color: #d4af37;
      margin-bottom: 12px;
    }
    .evidence-hero p {
      color: #aaa;
      font-size: 15px;
      max-width: 850px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* TOPIC PILLS */
    .topics-nav {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 12px;
      margin: 30px auto 40px;
      max-width: 1200px;
      padding: 0 30px;
    }
    .topic-pill {
      background: #0d0d0d;
      border: 1px solid #2a2a2a;
      color: #bbb;
      padding: 10px 20px;
      border-radius: 25px;
      font-size: 13.5px;
      text-decoration: none;
      transition: all 0.25s;
    }
    .topic-pill:hover, .topic-pill.active {
      background: linear-gradient(135deg, #d4af37, #997305);
      color: #000;
      font-weight: 600;
      border-color: #d4af37;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.35);
    }

    /* MAIN CONTAINER */
    .evidence-container {
      max-width: 1150px;
      margin: 0 auto 80px;
      padding: 0 30px;
    }

    /* TOPIC CARD HEADER */
    .topic-card-header {
      background: #0b0b0b;
      border: 1px solid #222;
      border-radius: 12px 12px 0 0;
      padding: 30px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 15px;
    }
    .topic-card-header h2 {
      font-family: 'Cinzel', serif;
      font-size: 26px;
      color: #fff;
    }
    .header-links {
      display: flex;
      gap: 12px;
    }
    .btn-chip {
      background: #181818;
      border: 1px solid #333;
      color: #d4af37;
      padding: 8px 16px;
      border-radius: 20px;
      text-decoration: none;
      font-size: 12.5px;
      font-weight: 600;
      transition: all 0.2s;
    }
    .btn-chip:hover {
      background: #d4af37;
      color: #000;
    }

    /* 4-PART EVIDENCE GRID */
    .four-part-grid {
      background: #0b0b0b;
      border: 1px solid #222;
      border-top: none;
      padding: 40px;
      display: grid;
      grid-template-columns: 1fr;
      gap: 25px;
    }

    .quadrant-box {
      background: #111;
      border-radius: 8px;
      padding: 24px 28px;
      border-left: 4px solid #333;
      transition: transform 0.2s;
    }
    .quadrant-box:hover {
      transform: translateY(-2px);
    }
    .quadrant-box.tradition { border-left-color: #d4af37; }
    .quadrant-box.history { border-left-color: #3498db; }
    .quadrant-box.science { border-left-color: #2ed573; }
    .quadrant-box.status { border-left-color: #ffa502; background: rgba(255, 165, 2, 0.04); }

    .quadrant-title {
      font-family: 'Cinzel', serif;
      font-size: 15px;
      letter-spacing: 1px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .quadrant-title.tradition { color: #d4af37; }
    .quadrant-title.history { color: #3498db; }
    .quadrant-title.science { color: #2ed573; }
    .quadrant-title.status { color: #ffa502; }

    .quadrant-desc {
      font-size: 14px;
      line-height: 1.75;
      color: #ccc;
    }

    /* SOURCES SECTION */
    .sources-panel {
      background: #0b0b0b;
      border: 1px solid #222;
      border-radius: 0 0 12px 12px;
      padding: 35px 40px;
      border-top: 1px dashed #222;
    }
    .sources-panel h3 {
      font-family: 'Cinzel', serif;
      color: #d4af37;
      font-size: 18px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .sources-category {
      margin-bottom: 22px;
    }
    .sources-category h4 {
      font-size: 13px;
      color: #888;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
    }
    .source-item {
      background: #121212;
      border: 1px solid #1f1f1f;
      padding: 10px 14px;
      border-radius: 6px;
      margin-bottom: 8px;
      font-size: 13px;
      color: #ddd;
      line-height: 1.6;
    }
    .source-item .verified-tag {
      color: #2ed573;
      font-size: 11px;
      font-weight: 600;
      margin-right: 6px;
    }
    .source-item .notes {
      color: #777;
      font-size: 12px;
      margin-top: 3px;
    }

    @media (max-width: 768px) {
      .evidence-hero { padding-left: 20px; padding-right: 20px; }
      .four-part-grid, .sources-panel, .topic-card-header { padding: 25px 20px; }
      .topic-card-header h2 { font-size: 20px; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<header class="evidence-hero">
  <p class="tag">✦ EMPIRICAL SCRUTINY & SCHOLARLY SOURCES</p>
  <h1>Myth vs Evidence Hub</h1>
  <p>
    An academic investigation into ancient Indian narratives. Each topic is broken down into four distinct dimensions—Traditional Account, Historical Context, Scientific Evidence, and Current Consensus—backed by verified citations.
  </p>
</header>

<!-- TOPIC SELECTION PILLS -->
<nav class="topics-nav">
  <?php foreach ($topics as $t): ?>
    <a href="evidence.php?topic=<?= urlencode($t['topic_slug']) ?>" 
       class="topic-pill <?= ($t['topic_slug'] === $activeTopicSlug) ? 'active' : '' ?>">
      <?= htmlspecialchars($t['title']) ?>
    </a>
  <?php endforeach; ?>
</nav>

<main class="evidence-container">

  <?php if ($currentEvidence): ?>
    <!-- CARD HEADER -->
    <div class="topic-card-header">
      <div>
        <h2><?= htmlspecialchars($currentEvidence['title']) ?></h2>
        <span style="color:#777; font-size:12px;">Standardized 4-Part Evidence & Source Dossier</span>
      </div>
      <div class="header-links">
        <a href="map.php" class="btn-chip">📍 Explore on Map</a>
        <?php if (!empty($currentEvidence['story_link'])): ?>
          <a href="<?= htmlspecialchars($currentEvidence['story_link']) ?>" class="btn-chip">📖 Full Story & Research →</a>
        <?php endif; ?>
      </div>
    </div>

    <!-- 4-PART EVIDENCE GRID -->
    <div class="four-part-grid">

      <!-- 1. TRADITIONAL ACCOUNT -->
      <div class="quadrant-box tradition">
        <div class="quadrant-title tradition">
          <span>📜</span> 1. TRADITIONAL ACCOUNT
        </div>
        <p class="quadrant-desc">
          <?= nl2br(htmlspecialchars($currentEvidence['traditional_account'])) ?>
        </p>
      </div>

      <!-- 2. HISTORICAL CONTEXT -->
      <div class="quadrant-box history">
        <div class="quadrant-title history">
          <span>🏛️</span> 2. HISTORICAL CONTEXT & ARCHAEOLOGY
        </div>
        <p class="quadrant-desc">
          <?= nl2br(htmlspecialchars($currentEvidence['historical_context'])) ?>
        </p>
      </div>

      <!-- 3. SCIENTIFIC EVIDENCE -->
      <div class="quadrant-box science">
        <div class="quadrant-title science">
          <span>🔬</span> 3. SCIENTIFIC & PEER-REVIEWED EVIDENCE
        </div>
        <p class="quadrant-desc">
          <?= nl2br(htmlspecialchars($currentEvidence['scientific_evidence'])) ?>
        </p>
      </div>

      <!-- 4. CURRENT STATUS & UNCERTAINTY -->
      <div class="quadrant-box status">
        <div class="quadrant-title status">
          <span>⚖️</span> 4. CURRENT SCIENTIFIC STATUS & UNCERTAINTY
        </div>
        <p class="quadrant-desc">
          <?= nl2br(htmlspecialchars($currentEvidence['current_status'])) ?>
        </p>
      </div>

    </div>

    <!-- SOURCES & REFERENCES SECTION (Feature 8) -->
    <div class="sources-panel" id="sources">
      <h3><span>📚</span> Verified Scholarly & Primary Sources</h3>

      <?php 
      $hasAnySource = false;
      foreach ($groupedSources as $catTitle => $catSources): 
        if (!empty($catSources)):
          $hasAnySource = true;
      ?>
        <div class="sources-category">
          <h4><?= htmlspecialchars($catTitle) ?></h4>
          <?php foreach ($catSources as $src): ?>
            <div class="source-item">
              <div>
                <span class="verified-tag">✓ Verified Source</span>
                <?= htmlspecialchars($src['citation']) ?>
              </div>
              <?php if (!empty($src['notes'])): ?>
                <div class="notes">• <?= htmlspecialchars($src['notes']) ?></div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php 
        endif;
      endforeach; 

      if (!$hasAnySource): ?>
        <p style="color:#777; font-size:13px;">No external citations recorded for this topic yet.</p>
      <?php endif; ?>

    </div>

  <?php else: ?>
    <div style="text-align:center; padding:60px 20px; background:#0b0b0b; border-radius:10px;">
      <h3>No Evidence Topic Selected</h3>
      <p style="color:#777;">Please select an evidence dossier from the pills above.</p>
    </div>
  <?php endif; ?>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
