@echo off
echo Wym�g ten wpis nie zatrzyma� w czasie trwania
echo Prosz� do�aczyc tylko celowe wylaczenie
echo Prosze zamknonc polecenie do zamykania
echo Apache2 startuje ...

apache\bin\apache.exe

if errorlevel 255 goto finish
if errorlevel 1 goto error
goto finish

:error
echo.
echo Apache nie mo�e zosta� uruchomiona
echo Apache nie mo�e zosta� uruchomiona
pause

:finish
