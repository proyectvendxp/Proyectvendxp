echo Starting...
sleep 1.5
sleep 1
BLUE="\e[34m"
RED="\e[31m"
GREEN="\e[32m"
ENDCOLOR="\e[0m"
echo -e "${RED} ██▓     █    ██  ██▓  ██████  ███▄    █ ▓█████▄▄▄█████▓${ENDCOLOR}";
echo -e "${RED}▓██▒     ██  ▓██▒▓██▒▒██    ▒  ██ ▀█   █ ▓█   ▀▓  ██▒ ▓▒${ENDCOLOR}";
echo -e "${RED}▒██░    ▓██  ▒██░▒██▒░ ▓██▄   ▓██  ▀█ ██▒▒███  ▒ ▓██░ ▒░${ENDCOLOR}";
echo -e "${RED}▒██░    ▓▓█  ░██░░██░  ▒   ██▒▓██▒  ▐▌██▒▒▓█  ▄░ ▓██▓ ░ ${ENDCOLOR}";
echo -e "${RED}░██████▒▒▒█████▓ ░██░▒██████▒▒▒██░   ▓██░░▒████▒ ▒██▒ ░ ${ENDCOLOR}";
echo -e "${RED}░ ▒░▓  ░░▒▓▒ ▒ ▒ ░▓  ▒ ▒▓▒ ▒ ░░ ▒░   ▒ ▒ ░░ ▒░ ░ ▒ ░░   ${ENDCOLOR}";
echo -e "${RED}░ ░ ▒  ░░░▒░ ░ ░  ▒ ░░ ░▒  ░ ░░ ░░   ░ ▒░ ░ ░  ░   ░    ${ENDCOLOR}";
echo -e "${RED}  ░ ░    ░░░ ░ ░  ▒ ░░  ░  ░     ░   ░ ░    ░    ░      ${ENDCOLOR}";
echo -e "${RED}    ░  ░   ░      ░        ░           ░    ░  ░        ${ENDCOLOR}";
echo -e "${RED}                                                        ${ENDCOLOR}";
sleep 5
echo -e "${GREEN} Looking for folder...${ENDCOLOR}"
sleep 2
echo "Created by: Luis9799 for Southestearn Lousiana University"
echo "Copyright all rights reserved 2022, MIT LICENSE"
echo -e "You're free to use this software for your own, you can ${RED}NOT${ENDCOLOR} distribute it by your name and generate income, otherwise, federal law will be applied."
echo -e "${BLUE}Twitter: @yt1luiscraft${ENDCOLOR}"
echo "Discord: Luis!#5902"
echo -e "${BLUE}Telegram: @L9799${ENDCOLOR}"
echo "Web: https://luisweb.cf"
sleep 3
echo Starting webserver...
sleep 1
echo WebServer iniciado en el puerto 8080
sleep 2
clear
sleep 1
php -S 0.0.0.0:8000 -t .
