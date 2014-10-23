#!/bin/bash

export CURRENT_DIR=$(dirname $0)

if (test "$1" != ""); then
    FROM_ENV=$1
else
    echo "Missing From Environment"
    exit
fi

source $CURRENT_DIR/.config.$FROM_ENV

FROM_FOLDER="$BASE_SYSTEM_DIR/public/wp-content/uploads"

if(test "$BASE_SYSTEM_DIR" == ""); then
    echo "No environment system dir found for $FROM_ENV";
    exit
fi

if (test "$2" != ""); then
    TO_ENV=$2
else
    echo "Missing To Environment"
    exit
fi

source $CURRENT_DIR/.config.$TO_ENV

TO_FOLDER="$BASE_SYSTEM_DIR/public/wp-content"

if(test "$FROM_FOLDER" == "$TO_FOLDER/uploads"); then
    echo "No environment system dir found for $TO_ENV";
    exit
fi

echo "Copying: $FROM_FOLDER To: $TO_FOLDER/uploads"

sudo -g developers cp -r $FROM_FOLDER $TO_FOLDER

