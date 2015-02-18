% Digitaalinen HOPS järjestelmä – Ryhmän 6 esitys
% Jesse Jaara     <Jaara.Jesse.J@student.uta.fi>
  Sami Voutilanen <Voutilainen.Sami.J@student.uta.fi>



# ER-kaavion entiteetit

### Käyttäjä - Opiskelija - Opettaja
\insertDiagram{ER-entiteetti-kayttaja}
\insertDiagram{ER-entiteetti-opiskelija}
\insertDiagram{ER-entiteetti-opettajatuutori}

- Ominaisuus 1: Kuvaus ominaisuudesta


### Ryhmä
\insertDiagram{ER-entiteetti-ryhma}

- ID


### Opintojakso
\insertDiagram{ER-entiteetti-opintojakso}

- Ominaisuus 1
- Ominaisuus 2
- Ominaisuus 3,
    jolla on pitkäseselite,
    joka ei mahdu yhdelle riville


### Oppiaine
\insertDiagram{ER-entiteetti-oppiaine}

- ID:
- Nimi:



# ER-kaavio kokonaisuudessaan

\insertDiagram{ER-kokonaisuus}

Pitkät pätkät selitystä ER-kaavion sisällöstä,
ja kaikesta muusta mahdollisesta



# Tietokantakaavion graafinen esitys

Paljon kohinaa ja staattista televisio lumisadetta,
joka kuvastaa kaavion syvintä olemusta.



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
