@echo off
rem Public domain
rem http://unlicense.org/
rem Created by Grigore Stefan <g_stefan@yahoo.com>

if exist release\ rmdir /Q /S release

set XUI_VERSION=3.0.0
7zr x dependency/xui-%XUI_VERSION%.7z
move xui-%XUI_VERSION% release

del /Q release\config\xyo-cloud.46.xui-build-tpl.php

xcopy /E /H /K /Y source release

xyo-version --no-bump --version-file=xyo-cloud.version.ini --file-in=release/config/xyo-cloud.80.php --file-out=release/config/xyo-cloud.80.php.version xyo-cloud
move /Y release\config\xyo-cloud.80.php.version release\config\xyo-cloud.80.php
