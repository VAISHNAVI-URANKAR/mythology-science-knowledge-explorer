<?php
require_once __DIR__ . '/config/db.php';
$initialQuery = trim((string)($_GET['q'] ?? ''));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Global Knowledge Search | Mythology Science Explorer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: #050505; color: #f0f0f0; font-family: 'Inter', sans-serif; }

    .search-hero {
      padding: 130px 30px 30px;
      max-width: 950px;
      margin: 0 auto;
      text-align: center;
    }
    .search-hero h1 {
      font-family: 'Cinzel', serif;
      font-size: 38px;
      color: #d4af37;
      margin-bottom: 12px;
    }
    .search-hero p {
      color: #aaa;
      font-size: 15px;
      margin-bottom: 25px;
    }

    .search-box-large {
      position: relative;
      max-width: 700px;
      margin: 0 auto 20px;
    }
    .search-box-large input {
      width: 100%;
      padding: 16px 24px;
      padding-right: 60px;
      background: #0f0f0f;
      border: 1px solid #333;
      border-radius: 30px;
      color: #fff;
      font-size: 16px;
      outline: none;
      transition: all 0.3s;
    }
    .search-box-large input:focus {
      border-color: #d4af37;
      box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
    }
    .search-icon-btn {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
      color: #d4af37;
    }

    .quick-chips {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 8px;
      margin-bottom: 30px;
    }
    .quick-chip {
      background: #111;
      border: 1px solid #282828;
      color: #999;
      padding: 6px 14px;
      border-radius: 16px;
      font-size: 12px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .quick-chip:hover {
      border-color: #d4af37;
      color: #d4af37;
    }

    /* TYPE TABS */
    .type-tabs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }
    .type-tab {
      background: transparent;
      border: 1px solid #333;
      color: #888;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .type-tab.active, .type-tab:hover {
      background: #d4af37;
      color: #000;
      font-weight: 600;
      border-color: #d4af37;
    }

    /* RESULTS CONTAINER */
    .results-container {
      max-width: 850px;
      margin: 0 auto 80px;
      padding: 0 20px;
      min-height: 250px;
    }
    .result-card {
      background: #0d0d0d;
      border: 1px solid #222;
      border-radius: 8px;
      padding: 20px 24px;
      margin-bottom: 16px;
      transition: all 0.25s;
      display: block;
      text-decoration: none;
    }
    .result-card:hover {
      border-color: #d4af37;
      transform: translateX(4px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.5);
    }
    .result-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 6px;
    }
    .result-title {
      font-family: 'Cinzel', serif;
      font-size: 18px;
      color: #fff;
    }
    .result-badge {
      background: rgba(212, 175, 55, 0.15);
      color: #d4af37;
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 11px;
      font-weight: 600;
      border: 1px solid rgba(212, 175, 55, 0.3);
    }
    .result-snippet {
      font-size: 13.5px;
      color: #aaa;
      line-height: 1.6;
    }
    .result-link-text {
      color: #d4af37;
      font-size: 12px;
      font-weight: 600;
      margin-top: 8px;
      display: block;
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #666;
    }
  </style>
</head>
<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<header class="search-hero">
  <p class="tag">✦ UNIVERSAL KNOWLEDGE INDEX</p>
  <h1>Global Search Explorer</h1>
  <p>Search across 12 ancient stories, 18 archaeological sites, scientific evidence dossiers, chronological timelines, and quiz topics.</p>

  <div class="search-box-large">
    <input type="text" id="globalSearchInput" placeholder="Search for Ram Setu, Dwarka, Kurukshetra, Kailasa, Sushruta, Astronomy..." value="<?= htmlspecialchars($initialQuery) ?>" autofocus autocomplete="off">
    <button class="search-icon-btn" id="searchBtn">🔍</button>
  </div>

  <div class="quick-chips">
    <span style="color:#666; font-size:12px; align-self:center;">Popular:</span>
    <button class="quick-chip" onclick="applySearch('Ram Setu')">Ram Setu</button>
    <button class="quick-chip" onclick="applySearch('Dwarka')">Dwarka</button>
    <button class="quick-chip" onclick="applySearch('Kurukshetra')">Kurukshetra</button>
    <button class="quick-chip" onclick="applySearch('Kailasa Temple')">Kailasa</button>
    <button class="quick-chip" onclick="applySearch('Saraswati River')">Saraswati</button>
    <button class="quick-chip" onclick="applySearch('Surgery')">Sushruta</button>
    <button class="quick-chip" onclick="applySearch('Astronomy')">Surya Siddhanta</button>
  </div>

  <div class="type-tabs">
    <button class="type-tab active" data-type="all">All Content</button>
    <button class="type-tab" data-type="stories">Stories</button>
    <button class="type-tab" data-type="locations">Locations</button>
    <button class="type-tab" data-type="evidence">Evidence</button>
    <button class="type-tab" data-type="timeline">Timeline</button>
    <button class="type-tab" data-type="quiz">Quiz</button>
  </div>
</header>

<main class="results-container" id="resultsContainer">
  <div class="empty-state">
    <p>Type keywords above to explore verified stories, locations, and scientific evidence.</p>
  </div>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script>
let currentFilter = 'all';
const searchInput = document.getElementById('globalSearchInput');
const resultsContainer = document.getElementById('resultsContainer');

function applySearch(term) {
  searchInput.value = term;
  executeSearch();
}

async function executeSearch() {
  const q = searchInput.value.trim();
  if (q.length < 2) {
    resultsContainer.innerHTML = `
      <div class="empty-state">
        <p>Type at least 2 characters to search across stories, locations, evidence, and quizzes.</p>
      </div>`;
    return;
  }

  resultsContainer.innerHTML = '<div class="empty-state"><p>Searching verified knowledge base...</p></div>';

  try {
    const res = await fetch(`api/search.php?q=${encodeURIComponent(q)}&type=${encodeURIComponent(currentFilter)}`);
    const data = await res.json();

    if (!data.results || data.results.length === 0) {
      resultsContainer.innerHTML = `
        <div class="empty-state">
          <p>No results found for "<strong>${escapeHtml(q)}</strong>".</p>
          <p style="font-size:13px; margin-top:8px;">Try searching for <em>Ram Setu</em>, <em>Dwarka</em>, <em>Kurukshetra</em>, <em>Saraswati</em>, or <em>Surgery</em>.</p>
        </div>`;
      return;
    }

    let html = `<div style="font-size:12px; color:#888; margin-bottom:15px;">Found ${data.results.length} result(s) for "${escapeHtml(q)}":</div>`;
    data.results.forEach(r => {
      html += `
        <a href="${escapeHtml(r.link)}" class="result-card">
          <div class="result-top">
            <h3 class="result-title">${escapeHtml(r.title)}</h3>
            <span class="result-badge">${escapeHtml(r.badge || r.type)}</span>
          </div>
          <p class="result-snippet">${escapeHtml(r.snippet)}</p>
          <span class="result-link-text">Explore ${escapeHtml(r.type)} →</span>
        </a>`;
    });

    resultsContainer.innerHTML = html;
  } catch (err) {
    resultsContainer.innerHTML = '<div class="empty-state"><p style="color:#ff4757;">Search temporarily unavailable. Please try again.</p></div>';
  }
}

// Debounced live typing
let debounceTimer = null;
searchInput.addEventListener('input', () => {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(executeSearch, 250);
});

document.getElementById('searchBtn').addEventListener('click', executeSearch);

// Type tabs
document.querySelectorAll('.type-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.type-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    currentFilter = tab.getAttribute('data-type');
    executeSearch();
  });
});

function escapeHtml(text) {
  const div = document.createElement('div');
  div.textContent = text || '';
  return div.innerHTML;
}

// If initial query exists in URL, execute right away
if (searchInput.value.trim().length >= 2) {
  executeSearch();
}
</script>

</body>
</html>
