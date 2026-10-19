<?php
/**
 * Mythology Science Knowledge Explorer - PHP-only application router.
 * The actual page files are PHP and retain their existing frontend markup.
 */

if (php_sapi_name() === 'cli-server') {
    $reqPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file(__DIR__ . $reqPath)) {
        return false;
    }
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$route = '/' . trim($requestUri, '/');
$route = preg_replace('/\.(html|php)$/i', '', $route);
if ($route === '/') $route = '/home';

$routes = [
    '/home' => 'home.php',
    '/login' => 'login.php',
    '/signup' => 'signup.php',
    '/forgot-password' => 'forgot-password.php',
    '/stories' => 'stories.php',
    '/quiz' => 'quiz.php',
    '/profile' => 'profile.php',
    '/myth-fact' => 'myth-fact.php',
    '/mythfact' => 'myth-fact.php',
    '/videos' => 'videos.php',
    '/dwarkaread' => 'dwarkaread.php',
    '/hamunaread' => 'hamunaread.php',
    '/mahabharatread' => 'mahabharatread.php',
    '/ramseturead' => 'ramseturead.php',
    '/samudramanthan' => 'samudramanthan.php',
    '/samudramanthanread' => 'samudramanthan.php',
    '/saraswatiread' => 'saraswatiread.php',
    '/vimansread' => 'vimansread.php',
    '/kailasaread' => 'kailasaread.php',
    '/suryaread' => 'suryaread.php',
    '/ayurvedaread' => 'ayurvedaread.php',
    '/natarajaread' => 'natarajaread.php',
    '/brahmastraread' => 'brahmastraread.php',
    '/map' => 'map.php',
    '/timeline' => 'timeline.php',
    '/evidence' => 'evidence.php',
    '/search' => 'search.php',
    '/api/locations' => 'api/locations.php',
    '/api/evidence' => 'api/evidence.php',
    '/api/timeline' => 'api/timeline.php',
    '/api/search' => 'api/search.php',
    '/api/chat' => 'api/chat.php',
    '/api/track' => 'api/track.php',
    '/track' => 'api/track.php',
    '/api/submit-quiz' => 'api/quiz.php',
    '/api/quiz' => 'api/quiz.php',
];

if (isset($routes[$route])) {
    require __DIR__ . '/' . $routes[$route];
    exit;
}

http_response_code(404);
echo '<!doctype html><html><head><meta charset="utf-8"><title>404</title></head><body style="background:#050505;color:#fff;font-family:Arial;padding:40px"><h1>404 Not Found</h1><p>The requested page could not be found.</p></body></html>';
