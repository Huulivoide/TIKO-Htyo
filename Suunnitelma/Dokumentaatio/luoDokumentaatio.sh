#!/usr/bin/bash

DOKUMENTTI="TIKO 2015 Harjoitustyö vaihe 1 - ryhmä 6"

function dia2png()
{
    DIAFILE="$(basename $1)"
    PNGFILE="kuvat/${DIAFILE//dia/png}"

    # Muunna vain jos dia kaaviota on muutettu tai
    # png kuvaa ei ole jo olemassa
    if [ "${1}" -nt "${PNGFILE}" ] || [ ! -f "${PNGFILE}"  ]; then
        dia -t png -e "${PNGFILE}" "${1}"
        # Optimoi png kuva
        optipng -o9 "${PNGFILE}"
    else
        echo "Tiedosto ${1} ei ole muuttunut."
    fi
}

export -f dia2png

if [ -e "${DOKUMENTTI}.pan" ]; then
    # Muunna dia kaaviot png kuviksi kuvat/ kansioon
    # Etsi kaikkia .dia loppuiset tiedostot ja vie ne dia2png
    # funktion läpi. -j4 suorita neljä muunnosta yhtäaikaisesti
    find ../ -name '*dia'  | parallel -j4 dia2png {}

    pandoc -V papersize:a4paper \
           -V geometry:margin=2cm \
           -V fontfamily:cantarell \
           -V documentclass:scrreprt \
           -V lang:finnish \
           --table-of-contents \
           -o "${DOKUMENTTI}.pdf" \
           "${DOKUMENTTI}.pan"
else
    echo "Tiedostoa ${DOKUMENTTI}.pan ei löydy."
fi

