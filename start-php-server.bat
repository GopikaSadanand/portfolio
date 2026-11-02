@echo off
title Gopika Sadanand - Portfolio (PHP Server)
cd /d "%~dp0"

echo ========================================================
echo   Gopika Sadanand - Portfolio with PHP Authentication
echo ========================================================
echo.

:: Locate PHP executable
set PHP_BIN=
where php >nul 2>nul
if %errorlevel% equ 0 (
    set PHP_BIN=php
) else if exist "C:\xampp\php\php.exe" (
    set PHP_BIN=C:\xampp\php\php.exe
)

if "%PHP_BIN%"=="" (
    echo [ERROR] PHP executable was not found on your system.
    echo Please install XAMPP or add PHP to your PATH.
    echo.
    echo Opening static HTML portfolio as fallback...
    start "" "index.html"
    pause
    exit /b 1
)

echo PHP found at: %PHP_BIN%
echo.
echo ========================================================
echo   DEFAULT DEMO CREDENTIALS:
echo   - Username: gopika   | Password: gopika123
echo   - Username: admin    | Password: password123
echo ========================================================
echo.
echo Starting PHP server at: http://localhost:8000
echo Opening web browser...
echo.

:: Open browser
start "" "http://localhost:8000"

:: Start PHP Built-in Server
echo (Press Ctrl + C in this window to stop the server when done)
echo.
"%PHP_BIN%" -S localhost:8000
