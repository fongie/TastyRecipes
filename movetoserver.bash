#!/bin/bash

#Script to move files from a folder to the apache web server and set permissions for apache

SOURCEDIR=~/TastyRecipes/
DESTDIR=/var/www/html/

sudo rm -r $DESTDIR/*
sudo cp -r $SOURCEDIR/* $DESTDIR
sudo chmod -R 755 $DESTDIR
