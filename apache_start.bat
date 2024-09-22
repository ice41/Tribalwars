@echo off
echo Nu inchideti apache pe durata functionarii
echo Pentru a inchide apache deschideti apache_stop
echo Please close this command only for Shutdown
echo Apache 2 functioneaza ...

apache\bin\apache.exe

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Apache nu poate fi pornit
echo Apache could not be started
pause

:finish
