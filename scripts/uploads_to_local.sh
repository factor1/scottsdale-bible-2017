#!/bin/bash

# Requires quick_sync wrapper for rsync from SPLIT Concepts

export CURRENT_DIR=$(dirname $0)

source $CURRENT_DIR/.config.production

export PROD_BASE_DIR=$BASE_SYSTEM_DIR

export LOCAL_BASE_DIR=..

export UPLOADS_PATH=/public/wp-content/uploads

#echo $PROD_BASE_DIR
#echo $LOCAL_BASE_DIR
#echo $UPLOADS_PATH

#echo "quick_sync 22 scottsda@scottsdalebible.com:$PROD_BASE_DIR$UPLOADS_PATH/ $LOCAL_BASE_DIR$UPLOADS_PATH"

quick_sync 22 scottsda@scottsdalebible.com:$PROD_BASE_DIR$UPLOADS_PATH/ $LOCAL_BASE_DIR$UPLOADS_PATH

