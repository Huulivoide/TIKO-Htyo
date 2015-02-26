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
           -V mainfont:"Noto Serif" \
           -V sansfont:"Noto Sans" \
           -V monofont:"Liberation Mono" \
           -V documentclass:scrreprt \
           -V lang:finnish \
           -f markdown+raw_tex+auto_identifiers \
           --template=tiko.latex \
           --latex-engine=xelatex \
           --table-of-contents \
           --toc-depth=6 \
           -o "${DOKUMENTTI}.pdf" \
           "${DOKUMENTTI}.pan"
else
    echo "Tiedostoa ${DOKUMENTTI}.pan ei löydy."
fi

