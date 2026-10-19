<?php
require_once __DIR__ . '/config/db.php';

$pdo = Database::getInstance();
$events = [];
$chronologyTypes = [];

try {
    $typesStmt = $pdo->query("SELECT DISTINCT chronology_type FROM timeline_events ORDER BY chronology_type ASC");
    $chronologyTypes = $typesStmt->fetchAll(PDO::FETCH_COLUMN);

    $typeFilter = trim($_GET['type'] ?? 'all');
    $topicFilter = trim($_GET['topic'] ?? 'all');

    $sql = "SELECT * FROM timeline_events WHERE 1=1";
    $params = [];
    if ($typeFilter !== 'all' && $typeFilter !== '') {
        $sql .= " AND chronology_type = :ctype";
        $params[':ctype'] = $typeFilter;
    }
    if ($topicFilter !== 'all' && $topicFilter !== '') {
        $sql .= " AND topic_slug = :tslug";
        $params[':tslug'] = $topicFilter;
    }
    $sql .= " ORDER BY order_num ASC, id ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $events = $stmt->fetchAll();
} catch (Exception $e) {
    // Handled gracefully in UI
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Interactive Chronology & Timeline | Mythology Science Explorer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #050505; color: #f0f0f0; font-family: 'Inter', sans-serif; }

    .timeline-hero {
      padding: 120px 40px 30px;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }
    .timeline-hero h1 {
      font-family: 'Cinzel', serif;
      font-size: 38px;
      color: #d4af37;
      margin-bottom: 12px;
    }
    .timeline-hero p {
      color: #aaa;
      font-size: 15px;
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* FILTERS BAR */
    .filter-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin: 30px auto 50px;
      max-width: 1100px;
      padding: 0 20px;
    }
    .filter-pill {
      background: #111;
      border: 1px solid #282828;
      color: #aaa;
      padding: 8px 18px;
      border-radius: 20px;
      font-size: 13px;
      text-decoration: none;
      transition: all 0.25s;
    }
    .filter-pill:hover, .filter-pill.active {
      background: #d4af37;
      color: #000;
      font-weight: 600;
      border-color: #d4af37;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
    }

    /* TIMELINE WRAPPER */
    .timeline-wrapper {
      max-width: 900px;
      margin: 0 auto 80px;
      padding: 0 20px;
      position: relative;
    }
    .timeline-wrapper::before {
      content: '';
      position: absolute;
      left: 36px;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(to bottom, #d4af37, #222);
    }

    .timeline-item {
      position: relative;
      padding-left: 80px;
      margin-bottom: 45px;
    }
    .timeline-node {
      position: absolute;
      left: 28px;
      top: 18px;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #0b0b0b;
      border: 3px solid #d4af37;
      box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
      z-index: 2;
    }

    .timeline-card {
      background: #0d0d0d;
      border: 1px solid #222;
      border-radius: 10px;
      padding: 24px 28px;
      transition: all 0.3s;
    }
    .timeline-card:hover {
      border-color: #d4af37;
      transform: translateX(4px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.5);
    }

    .timeline-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 8px;
    }
    .date-badge {
      font-family: 'Cinzel', serif;
      font-size: 17px;
      color: #d4af37;
      font-weight: 700;
    }

    .status-chip {
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 600;
    }
    .chip-established { background: rgba(46, 213, 115, 0.15); color: #2ed573; border: 1px solid rgba(46, 213, 115, 0.3); }
    .chip-approximate { background: rgba(255, 165, 2, 0.15); color: #ffa502; border: 1px solid rgba(255, 165, 2, 0.3); }
    .chip-disputed { background: rgba(255, 71, 87, 0.15); color: #ff4757; border: 1px solid rgba(255, 71, 87, 0.3); }
    .chip-traditional { background: rgba(212, 175, 55, 0.15); color: #d4af37; border: 1px solid rgba(212, 175, 55, 0.3); }

    .timeline-title {
      font-family: 'Cinzel', serif;
      font-size: 19px;
      color: #fff;
      margin-bottom: 6px;
    }
    .timeline-chronology {
      font-size: 12px;
      color: #888;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 12px;
    }
    .timeline-desc {
      font-size: 13.5px;
      color: #ccc;
      line-height: 1.7;
      margin-bottom: 12px;
    }
    .timeline-notes {
      background: #141414;
      border-left: 3px solid #d4af37;
      padding: 8px 12px;
      font-size: 12px;
      color: #aaa;
      border-radius: 0 4px 4px 0;
    }

    @media (max-width: 600px) {
      .timeline-wrapper::before { left: 16px; }
      .timeline-item { padding-left: 45px; }
      .timeline-node { left: 8px; }
      .timeline-card { padding: 18px 16px; }
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<header class="timeline-hero">
  <p class="tag">✦ MULTI-TIER CHRONOLOGICAL ANALYSIS</p>
  <h1>Interactive Chronology & Timeline</h1>
  <p>
    Explore ancient Indian events across distinct chronological lenses: <em>Traditional Chronology</em>, <em>Textual Chronology</em>, <em>Archaeological Chronology</em>, and <em>Historically Established Dates</em>.
  </p>
</header>

<!-- CHRONOLOGY FILTERS -->
<nav class="filter-bar">
  <a href="timeline.php" class="filter-pill <?= (!isset($_GET['type']) || $_GET['type'] === 'all') ? 'active' : '' ?>">All Chronologies</a>
  <?php foreach ($chronologyTypes as $ct): ?>
    <a href="timeline.php?type=<?= urlencode($ct) ?>" 
       class="filter-pill <?= (isset($_GET['type']) && $_GET['type'] === $ct) ? 'active' : '' ?>">
      <?= htmlspecialchars($ct) ?>
    </a>
  <?php endforeach; ?>
</nav>

<main class="timeline-wrapper">

  <?php if (empty($events)): ?>
    <div style="text-align:center; padding:50px; background:#0d0d0d; border-radius:10px;">
      <p style="color:#777;">No events found matching this filter.</p>
    </div>
  <?php else: ?>
    <?php foreach ($events as $idx => $ev): 
      $statusClass = 'chip-traditional';
      $dStatus = strtolower($ev['date_status']);
      if (strpos($dStatus, 'established') !== false) $statusClass = 'chip-established';
      elseif (strpos($dStatus, 'approximate') !== false || strpos($dStatus, 'proposed') !== false) $statusClass = 'chip-approximate';
      elseif (strpos($dStatus, 'disputed') !== false) $statusClass = 'chip-disputed';
    ?>
      <div class="timeline-item">
        <div class="timeline-node"></div>
        <article class="timeline-card">
          <div class="timeline-top">
            <span class="date-badge"><?= htmlspecialchars($ev['date_display']) ?></span>
            <span class="status-chip <?= $statusClass ?>"><?= htmlspecialchars($ev['date_status']) ?></span>
          </div>
          <h3 class="timeline-title"><?= htmlspecialchars($ev['title']) ?></h3>
          <div class="timeline-chronology">
            <?= htmlspecialchars($ev['chronology_type']) ?> • <?= htmlspecialchars($ev['era_label']) ?>
          </div>
          <p class="timeline-desc"><?= nl2br(htmlspecialchars($ev['description'])) ?></p>
          <?php if (!empty($ev['evidence_notes'])): ?>
            <div class="timeline-notes">
              <strong>Evidence Note:</strong> <?= htmlspecialchars($ev['evidence_notes']) ?>
            </div>
          <?php endif; ?>
        </article>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
