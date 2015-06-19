#!/bin/bash
#execute as . build_deb.sh  to retain proper directory locations (./build_deb.sh lets the cmd wander around directories without actually properly changing)
VERSION=0.1-a
APPNAME=prettyripper
PATHTO=/root/$APPNAME
#This script assumes there's an existing repository in which git pull(s) can be made.


if [ -d "$PATHTO-$VERSION" ]; then
	#executed if the directory exists
	cd $PATHTO-$VERSION
fi

if [ ! -d "$PATHTO-$VERSION" ]; then
	#executed if the directory does not exist
	mkdir $PATHTO-$VERSION
	mkdir $PATHTO-$VERSION/files
	cp -r $PATHTO/* $PATHTO-$VERSION/files
	cd $PATHTO-$VERSION
fi

echo "Now in the $(pwd) directory"

if [ ! -d "$PATHTO-$VERSION/debian" ]; then
	mkdir $PATHTO-$VERSION/debian
	cp -r $PATHTO/debian $PATHTO-$VERSION
	rm $PATHTO-$VERSION/files/README.md
fi

echo "Creating the binary"
mv $PATHTO-$VERSION/files/README.md /tmp
cd $PATHTO-$VERSION #just to be sure we're in the right directory
rm -rf $PATHTO-$VERSION/files/debian

debuild -us -uc


find $(pwd)/.. -name $APPNAME-$VERSION.deb


