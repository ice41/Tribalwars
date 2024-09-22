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
