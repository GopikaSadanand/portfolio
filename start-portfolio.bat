@echo off
title Gopika Sadanand - Portfolio Launcher
cd /d "%~dp0"

echo ========================================================
echo   Gopika Sadanand - Portfolio Website
echo ========================================================
echo.
echo Select which version you would like to run:
echo   [1] PHP Backend with Login Page (Recommended)
echo   [2] Node.js Server
echo   [3] Open Static HTML directly
echo.
set /p choice="Enter choice [1, 2, or 3] (default is 1): "

if "%choice%"=="2" goto :run_node
if "%choice%"=="3" goto :run_static
goto :run_php

:run_php
call start-php-server.bat
goto :end

:run_node
start "" "http://localhost:8000"
node server.js
goto :end

:run_static
start "" "%~dp0index.html"
goto :end

:end
