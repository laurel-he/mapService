#!/usr/bin/env sh
# DO NOT MODIFY CODE BELOW
export CURRENT_DIR=$(cd `dirname $0` && pwd)
SHELL_FILE="/tmp/$(basename $0)"
curl "https://backend.jiapinai.com/api/jenkins/unit-test?projectName=`basename $CURRENT_DIR`" -s -o "$SHELL_FILE"
if [ ! -f "$SHELL_FILE" ]; then
    echo "download shell failed";
    exit
fi
bash "$SHELL_FILE" $@