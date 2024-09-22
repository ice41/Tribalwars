@echo off
echo "Checando portas necessarias! Aguarde..."
set PHP_BIN=..\php\php.exe
set CONFIG_PHP=portcheck.php -80,443,3306
%PHP_BIN% -n -d output_buffering=0 %CONFIG_PHP%
