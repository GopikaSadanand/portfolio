@echo off
title Gopika Sadanand - Portfolio & Login System
cd /d "%~dp0"

echo ========================================================
echo   Gopika Sadanand - Portfolio Website & Login System
echo ========================================================
echo.

:: Locate PHP executable (Check PATH or XAMPP)
set PHP_BIN=
where php >nul 2>nul
if %errorlevel% equ 0 (
    set PHP_BIN=php
) else if exist "C:\xampp\php\php.exe" (
    set PHP_BIN=C:\xampp\php\php.exe
)

if not "%PHP_BIN%"=="" (
    echo [PHP Backend Detected]
    echo Starting PHP Server at http://localhost:8000 ...
    echo.
    echo ========================================================
    echo   LOGIN CREDENTIALS:
    echo   - Username: gopika   ^| Password: gopika123
    echo   - Username: admin    ^| Password: password123
    echo ========================================================
    echo.
    
    :: Launch browser
    start "" "http://localhost:8000"
    
    :: Keep PHP server running
    "%PHP_BIN%" -S localhost:8000
    exit /b 0
)

:: If PHP is not found, fallback to static HTML version
echo PHP not found. Launching static version directly in your browser...
start "" "%~dp0index.html"
exit /b 0
