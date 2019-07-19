@ECHO OFF
REM Determine where this script is so it can 'watch' the right place and autocompile.
PUSHD %~dp0.
SET RUBY_BIN=%CD%
POPD
ECHO Starting SASS Compiler for %RUBY_BIN%
ECHO. 
ECHO.
set PATH=C:\Ruby200-x64\bin\;%PATH%
sass.bat --watch scss:.
PAUSE