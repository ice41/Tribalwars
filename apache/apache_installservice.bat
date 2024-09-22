@echo off

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
echo Don't be stupid! Win9x don't know Services
echo Please use apache_start.bat instead
goto exit

:WinNT
echo Installing Apache2 as an Service
bin\apache -k install
echo Now we Start Apache2 :)
net start Apache2

:exit
pause
