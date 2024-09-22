@echo off
echo Wymóg ten wpis nie zatrzymaæ w czasie trwania
echo Proszê do³aczyc tylko celowe wylaczenie
echo Prosze zamknonc polecenie do zamykania
echo Apache2 startuje ...

apache\bin\apache.exe

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Apache nie mo¿e zostaæ uruchomiona
echo Apache nie mo¿e zostaæ uruchomiona
pause

:finish
