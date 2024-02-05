#!/usr/bin/env bash
artemis_war_path="Artemis.war"
if [ -z ${1+x} ];
    then
        echo "No paramter provided. Defaulting to $(realpath Artemis.war) as the archive containing Artemis."
    else
        artemis_war_path="$1"
fi

artemis_war_path=$(realpath "$artemis_war_path")

if [ -f "$artemis_war_path" ];
    then
        echo "Starting Artemis $artemis_war_path"
        java -jar -Dspring.profiles.active=dev,jenkins,gitlab,artemis,scheduling,local $artemis_war_path
    else
        echo $(realpath $artemis_war_path) does not exist. Aborting..
fi
