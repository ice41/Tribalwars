@echo off
echo Nu inchideti MySQL cand este pornit
echo Please dont close Window while MySQL is running
echo MySQL se deschide
echo Asteptati  ...
echo MySQL functioneaza cu mysql\bin\my.cnf (console)

mysql\bin\mysqld --defaults-file=mysql\bin\my.cnf --standalone --console

if errorlevel 1 goto error
goto finish

:error
echo.
echo MySQL nu poate fi pornit
echo MySQL could not be started
pause

:finish
