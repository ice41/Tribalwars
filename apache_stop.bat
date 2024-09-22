@echo off
apache\bin\pv -f -k apache.exe -q
if not exist apache\logs\httpd.pid GOTO exit
del apache\logs\httpd.pid

:exit
