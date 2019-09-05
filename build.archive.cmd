@echo off
rem Public domain
rem http://unlicense.org/
rem Created by Grigore Stefan <g_stefan@yahoo.com>

SETLOCAL ENABLEDELAYEDEXPANSION
FOR /F "tokens=* USEBACKQ" %%F IN (`xyo-version --no-bump --get "--version-file=xyo-cloud.version.ini" xyo-cloud`) DO (
	SET VERSION=%%F
)

move release xyo-cloud-%VERSION%
7zr a -mx9 -mmt4 -r -sse -w. -y -t7z archive/xyo-cloud-%VERSION%.7z xyo-cloud-%VERSION%
move xyo-cloud-%VERSION% release
