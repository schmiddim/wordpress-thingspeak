#!/bin/bash


svn co https://plugins.svn.wordpress.org/widgets-for-thingspeak/ /tmp/widgets-for-thingspeak/
cp -R * /tmp/widgets-for-thingspeak/trunk/
rm /tmp/widgets-for-thingspeak/trunk/svn-deploy.sh
cd /tmp/widgets-for-thingspeak/trunk/
svn  --username schmiddim ci -m "new release"