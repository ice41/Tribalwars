@echo off
:Normal
set PHP_BIN=php\php.exe
set CONFIG_PHP=install\program.php
%PHP_BIN% -n -d output_buffering=0 %CONFIG_PHP%
GOTO END

:END
pause
