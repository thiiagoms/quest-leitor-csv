#!/bin/bash

reset

RED="\e[31m"
GREEN="\e[32m"
WHITE="\e[97m"
BLUE="\e[34m"
BLACK="\e[30m"
YELLOW="\e[33m"
ENDCOLOR="\e[0m"

echo -e "
${RED}
    ██      ███████ ██ ████████  ██████  ██████       ██████ ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██      ██      ██    ██ 
    ██      █████   ██    ██    ██    ██ ██████      ██      ███████ ██    ██ 
    ██      ██      ██    ██    ██    ██ ██   ██     ██           ██  ██  ██  
    ███████ ███████ ██    ██     ██████  ██   ██      ██████ ███████   ████  
${ENDCOLOR}

    ${YELLOW}=> Exercício 02 - Leitor CSV${ENDCOLOR}

    [*] Author: Thiago Silva AKA thiiagoms
    [*] E-mail: thiagom.devsec@gmail.com
"
echo -e "=> Iniciando os containers\n"

docker-compose up -d

echo -e "=> Instalando dependências da aplicação\n"
docker-compose exec app composer install
