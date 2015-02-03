% Digitaalinen HOPS järjestelmä – Ryhmän 6 esitys
% Jesse Jaara     <Jaara.Jesse.J@student.uta.fi>
  Sami Voutilanen <Voutilainen.Sami.J@student.uta.fi>
% 2015.02.03



# ER-kaavion entiteetit

* Entitteeti 1
    - Ominaisuus 1: Kuvaus ominaisuudesta

  ![Entitteeti 1](kuvat/Testi-kuva.png)\


* Entiteetti 2
    - Ominaisuus 1
    - Ominaisuus 2
    - Ominaisuus 3,
      jolla on pitkäseselite,
      joka ei mahdu yhdelle riville

  ![Entiteetti 2](kuvat/Testi-kuva.png)\
    


# ER-kaavio kokonaisuudessaan

![ER-kaavio](kuvat/Testi-kuva.png)\

Pitkät pätkät selitystä ER-kaavion sisällöstä,
ja kaikesta muusta mahdollisesta



# Tietokantakaavion graafinen esitys

![SQL-kaavio](kuvat/Testi-kuva.png)\

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

~~~~~~ {#SQL-lauseet .sql .numberLines}
CREATE TABLE HOPS
(
    ID SERIAL PRIMARY KEY,
    ATTR1 VARCHAR(100) UNIQUE,
    ATTR2 INT
);
~~~~~~
