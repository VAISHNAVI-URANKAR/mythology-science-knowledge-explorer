# Mythology Science Knowledge Explorer — PHP-only setup

## Stack
- Frontend: existing HTML/CSS/JavaScript design retained
- Backend: PHP only
- Database: PostgreSQL only
- Authentication: PHP sessions + `password_hash()` / `password_verify()`
- Voice: browser Web Speech API (no paid voice API required)

## PostgreSQL configuration
The project defaults to:
- Host: `127.0.0.1`
- Port: `2409`
- Database: `fieldproject`
- User: `postgres`
- Password: empty

If your PostgreSQL password is not empty, set the environment variable `DB_PASS` before starting PHP. You can also override `DB_HOST`, `DB_PORT`, `DB_NAME`, and `DB_USER`.

## Required PHP extension
Enable PDO PostgreSQL (`pdo_pgsql`) in PHP. There is intentionally **no SQLite/MySQL fallback** so the app cannot silently save users to a different database.

## Run
From this project folder:

```text
php -S localhost:8000 index.php
```

Then open:

```text
http://localhost:8000/login
```

## Verify login saving
1. Open Sign Up.
2. Create a new account.
3. Check PostgreSQL database `fieldproject`, table `users`.
4. Log in with the same account.
5. Take a quiz.
6. Check `quiz_results` and `badges` for that same `user_id`.

## Voice features
- Chatbot microphone: speaks a question into Sage AI.
- Chatbot replies can be read aloud when the browser supports speech synthesis.
- Quiz: **Read Question**, **Answer by Voice**, and an optional **Voice ON/OFF** mode.
- Chrome/Edge generally provide the best Web Speech API support.
