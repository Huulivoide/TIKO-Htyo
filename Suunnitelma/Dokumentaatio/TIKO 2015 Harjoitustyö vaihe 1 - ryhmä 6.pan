% Digitaalinen HOPS järjestelmä – Ryhmän 6 esitys
% Jesse Jaara     <Jaara.Jesse.J@student.uta.fi>
  Sami Voutilanen <Voutilainen.Sami.J@student.uta.fi>



# ER-kaavion entiteetit

## Käyttäjä - Opiskelija - Opettaja
\insertDiagram{ER-entiteetti-kayttaja}{Käyttäjä entiteetti}
\insertDiagram{ER-entiteetti-opiskelija}{Opiskelija entiteetti}
\insertDiagram{ER-entiteetti-opettajatuutori}{Tuutori entiteetti}

- Ominaisuus 1: Kuvaus ominaisuudesta


## Ryhmä
\insertDiagram{ER-entiteetti-ryhma}{Ryhmä entiteetti}

- ID


## Opintojakso
\insertDiagram{ER-entiteetti-opintojakso}{Opintojakso entiteetti}

- Ominaisuus 1
- Ominaisuus 2
- Ominaisuus 3,
    jolla on pitkäseselite,
    joka ei mahdu yhdelle riville


## Oppiaine
\insertDiagram{ER-entiteetti-oppiaine}{Oppiaine entiteetti}

- ID:
- Nimi:



# ER-kaavio kokonaisuudessaan

\insertDiagram{ER-kokonaisuus}{ER-kaavio}

Pitkät pätkät selitystä ER-kaavion sisällöstä,
ja kaikesta muusta mahdollisesta



# Tietokantakaavion graafinen esitys

\insertDiagram{Relaatio-kaavio}{Relaatio-kaavio}

Paljon kohinaa ja staattista televisio lumisadetta,
joka kuvastaa kaavion syvintä olemusta.


## User
\insertRelation{Relaatio-student}{Student ralaatio}

- id: Numeerinen tunniste, joka on valittu PPT-tunnuksen sijaan
  säästämään tilaa lukuisissa viiteavaimissa.
- login: PPT
- password: Suolattu ja hash-funtionläpi viety salasana
- phone: puhelinnumero


## Course
\insertRelation{Relaatio-course}{Course relaatio}

- id: Numeerinen tunniste.
- name: Kurssin nimi, muodossa "KURSSITUNNUS-Kurssin nimi kokonaisuudessaan".
- year: Vuosi, jolloin kurssi on järjesttetty ensimmäisen kerran.
- credits: Kurssista saatavien opintopisteiden märä.



# Tietokantakaavio tekstimuodossa

* Relaatio1(Attr1, attr2, attr3)
* Relaatio2(nimi, kurssi, vuosi)
* X(y, z)



# ER-kaavion muunnos tietokantakaavioksi

Kappale 1 selittää kuun liikkeiden vaikutusta dokumentaation kirjoittamiseen

Kappale 2 käy taas puolestaan itse asian kimppuun



# Tapahtuma kuvaukset

* Tapahtuma 1
    - Tapahtuma purettuna osiin esitettynä ranskalaisilla viioilla
    - Osa 2



# Tietokannan luontilauseet

~~~~~~ {#SQL-lauseet .sqlpostgresql .numberLines}
CREATE TABLE HOPS
(
    ID SERIAL PRIMARY KEY,
    ATTR1 VARCHAR(100) UNIQUE,
    ATTR2 INT
);
~~~~~~
