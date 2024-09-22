@echo off

:CONFIRM
echo Co chcesz zrobic? 
echo 1) Uruchom strone silnika plemion(plemiona-silnik.zz.mu)
echo 2) Uruchom stronê do gry(localhost) i uruchom silnik plemiona!
echo install) Rozpocznij instalacjê silnika plemiona!
set/p "cho="
if %cho%==1 goto PAGE
if %cho%==2 goto START
if %cho%==install goto INSTALL
if %cho%==end goto END
if %cho%==END goto END
echo Blad. Napisz 1, 2 lub END.
goto CONFIRM
:PAGE
echo Otwieranie strony silnika PL-Lan By Bartekst221
start http://plemiona-silnik.ZZ.MU
goto End
:START
start Start.exe
echo Serwer wystartowal!Mozesz juz go uruchomic!
echo W razie bledów powiadom programistow, uruchom aplikacje Strona_silnika.bat
echo Nacisnij dowolny klawisz, aby przejsc do strony twojego silnika!(Localhost)

:INSTALL
@ECHO OFF
COPY apache\bin\php5ts.dll php
if "%1" == "sfx" (
    cd xampplite
)
if exist php\php.exe GOTO Normal
if not exist php\php.exe GOTO Abort

:Abort
echo Przepraszam ... nie mo¿e znaleŸæ php cli!
echo Musi przerwaæ ten proces!
pause
GOTO END

:Normal
set PHP_BIN=php\php.exe
set CONFIG_PHP=install\install.php
%PHP_BIN% -n -d output_buffering=0 %CONFIG_PHP%
GOTO END

:END
pause
start http://localhost