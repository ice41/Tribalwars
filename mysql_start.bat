@echo off
echo Diese Eingabeforderung nicht waehrend des Running beenden
echo Please dont close Window while MySQL is running
echo MySQL is trying to start
echo Prosze czekac ...
echo MySQL is starting with \mysql\bin\my.cnf (console)

mysql\bin\mysqld --defaults-file=mysql\bin\my.cnf --standalone --console

if errorlevel 1 goto error
goto finish

:error
echo.
echo MySQL konnte nicht gestartet werden
echo MySQL could not be started
pause

:finish
