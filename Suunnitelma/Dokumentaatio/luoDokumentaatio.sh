#!/usr/bin/bash

DOKUMENTTI="TIKO 2015 Harjoitustyö vaihe 1 - ryhmä 6"

function dia2tikz()
{
    DIAFILE="$(basename "$1")"
    TIKZFILE="kaaviot/${DIAFILE//dia/tikz}"

    # Muunna vain jos dia kaaviota on muutettu tai
    # tikz tiedostoa ei ole jo olemassa
    if [ "${1}" -nt "${TIKZFILE}" ] || [ ! -f "${TIKZFILE}"  ]; then
        dia -t pgf-tex -e "${TIKZFILE}" "${1}"
    else
        echo "Tiedosto ${1} ei ole muuttunut."
    fi
}

export -f dia2tikz

if [ -e "${DOKUMENTTI}.pan" ]; then
    find ../ -name '*dia' | parallel -j4 dia2tikz {}

    pandoc -V papersize:a4paper \
           -V geometry:margin=2cm \
           -V fontfamily:cantarell \
           -V documentclass:scrreprt \
           -V lang:finnish \
           -f markdown+raw_tex \
           --template=tiko.latex \
           --table-of-contents \
           -o "${DOKUMENTTI}.pdf" \
           "/tmp/${DOKUMENTTI}.pan"
else
    echo "Tiedostoa ${DOKUMENTTI}.pan ei löydy."
fi

