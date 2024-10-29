#!/bin/bash

CONTAINERS="boulangerie_app boulangerie_db boulangerie_phpmyadmin"

echo "Stopping containers..."
docker stop $CONTAINERS
docker container rm $CONTAINERS 
