@echo off
title Mythology Science Knowledge Explore Server
color 0E

echo ========================================================
echo   MYTHOLOGY SCIENCE KNOWLEDGE EXPLORE (PHP SERVER)
echo ========================================================
echo.
echo Starting local PHP server at http://localhost:8000 ...
echo.

:: Check if XAMPP PHP exists
if exist "C:\xampp\php\php.exe" (
    set "PHP_EXE=C:\xampp\php\php.exe"
) else (
    where php >nul 2>nul
    if %ERRORLEVEL% equ 0 (
        set "PHP_EXE=php"
    ) else (
        echo [ERROR] PHP was not found in C:\xampp\php\php.exe or PATH.
        echo Please ensure XAMPP is installed or PHP is in your system PATH.
        pause
        exit /b 1
    )
)

:: Automatically open browser after 2 seconds
start "" cmd /c "timeout /t 2 /nobreak >nul & start http://localhost:8000/login"

:: Launch PHP Built-in Server with index.php router
"%PHP_EXE%" -S localhost:8000 index.php

pause
