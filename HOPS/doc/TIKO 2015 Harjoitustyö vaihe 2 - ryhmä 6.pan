% Digitaalinen HOPS järjestelmä – Ryhmän 6 esitys
% Jesse Jaara     <Jaara.Jesse.J@student.uta.fi>
  Sami Voutilanen <Voutilainen.Sami.J@student.uta.fi>



# Ohjelman ominaisuudet

Digitaalisen HOPS-järjestelmän tarkoitus on korvata perinteiset paperilapulla palautettavat
HOPS-lomakkeet. Järjestelmässä on kolme käyttäjätyyppiä: opiskelijat, tutorit ja ylitutorit,
jotka pystyvät tekemään järjestelmässä erilaisia asioita.

## Opiskelija

Opiskelijat voivat luoda ja tarkastella järjestelmään jättämiään HOPS-lomakkeita. Opiskelijat
näkevät järjestelmässä omat oppilastietonsa.

## Tutori

Tutorin on mahdollista tutkia järjestelmässä olevia kursseja ja luoda uusia. Tutorit voivat tarkastella
tutoroitaviensa HOPS-lomakkeita. Tutori voi tarkastella tutoroimiaan ryhmiä ja lähettää heille
ilmoituksia sähköpostitse. Tutori pystyy lisäämään ja katselemaan raportteja tutoroitaviensa
kanssa käymistään yksityis- ja ryhmäpalavereista. Tutorit voivat tarkastella omia tietojaan.

## Ylitutori

Yliutorin on mahdollista tutkia järjestelmässä olevia kursseja ja luoda uusia. Ylitutori voi
tarkastella järjestelmään tallennettuja lomakkeita. Ylitutori näkee kaikki
tutorointiryhmät ja voi lisätä niitä järjestelmään. Ylitutori pystyy lisäämään ja katselemaan raportteja
yksityis- ja ryhmäpalavereista. Yliutorit voivat tarkastella kaikkia järjestelmässä olevia oppilaita.
Ylitutorit näkevät kaikki järjestelmän käyttäjät ja voivat myös lisätä tutoreita ja tarkastella
heidän tietojaan.


# Toteutetut ominaisuudet (==Lomake)

|                 Ominaisuus                    | Toteutettu | Toteutettu laajasti |
|:----------------------------------------------|:----------:|:-------------------:|
| Raportti __R1__                               |    __X__   |                     |
| Raportti __R2__                               |            |                     |
| Raportti __R3__                               |    __X__   |                     |
| Raportti __R4__                               |            |                     |
| Raportti __R5__                               |    __X__   |                     |
| Raportti __R6__                               |            |                     |
| Tuki samanaikaiselle käytölle                 |    __X__   |                     |
| Käyttäjät ja oikeudet                         |            |        __X__        |
| Käyttöliittymäominaisuudet                    |    __X__   |                     |
| Historiatietojen tallentaminen ja raportointi |            |        __X__        |
| Testiaineisto                                 |            |        __X__        |


# Kuvaus toteutuksesta

Järjestelmä on toteutettu PHP-kielisenä CakePHP-frameworkissa.


# Ohjelman käyttö

Järjestelmää käytetään web-selaimella. Järjestelmää voi käyttää ainoastaan sisäänkirjautuneena, eli
ensimmäiseksi käyttäjän täytyy kirjautua järjestelmään sisään. Kirjauduttuaan käyttäjä voi navigoida
profiilisivultaan hänelle sallittuihin toimintoihin.

## Opiskelija

Opiskelijan on mahdollista luoda uusi HOPS-lomake 'Lisää lomake' -linkin kautta. Muuten hän
näkee vain oman profiilinsa. Opiskelija voi aina palata alkunäkymään oikean klikkaamalla
nimeään oikeasta yläreunasta.


\clearpage

## Tutor

Tutor näkee omat ryhmänsä 'Ryhmät' -linkin kautta. Edelleen valitsemalla tietyn ryhmän hän voi
raportoida palaverin kyseisen ryhmän kesken. Valitsemalla ryhmästä yhden oppilaan, hän pääsee
tämän profiiliin, jonka kautta tutorin on mahdollista raportoida yksityispalaveri kyseisen oppilaan
kanssa. Hän voi tarkastella tapaamisia 'Tapaamiset' -linkin kautta. Tutor pystyy myös lisäämään
kursseja. Tutor voi aina palata alkunäkymään oikean klikkaamalla
nimeään oikeasta yläreunasta.

### Uuden ryhmätaapaamisen raportointi

![Ryhmän tietosivu](img/newGroupMeeting/Ryhmän-tiedot.png)

Uuden tapaamisen raportointi aloitetaan ryhmän tietosivulta.
(Kuvattuna yllä) Tieto-sivulta klikataan linkkiä "Raportoi uusi tapaaminen".

\clearpage

![Ryhmätaapaamisen raportointisivu](img/newGroupMeeting/Lisäys-sivu.png)

1. Anna päivämäärä, jolloin taoaaminen pidettiin
2. Kerro mitä asioita palaverissa käsiteltiin
3. Jos joku ryhmäläinen ei ollut paikkalla tapaamisessa niin poista merkkintä hänen
   kohdaltansa.
4. Jos oppilas on ilmoittanut poissaololleen syyn, niin kirjoita se ilmestyneeseen kenttään.
5. Pana __Raportoi__ painiketta tallentaaksesi tapaamisen järjestelmään.


\clearpage

### Uuden henkilökohtaisen tapaamisen raportointi

![Tuutorin omat tiedot sivu](img/newPrivateMeeting/Omat-tietoni.png)

Klikkaa haluamasi opiskelijan opiskelijanumeroa tai nimeä, jotta pääset hänen sivullensa.

\clearpage

![Oppilaan tietod sivu](img/newPrivateMeeting/Oppilaan-tiedot.png)

Oppilaan sivulle päästyäsi klikkaa __Raportoi palaveri__ linkkiä vasemmanlaidan
toiminto paneelista.

\clearpage

![Henkilökohtaisen tapaamisen raportointisivu](img/newPrivateMeeting/Raportointi-sivu.png)

1. Anna päivämäärä, jolloin palaveri pidettiin.
2. Kerro mitä asioita käsittellitte palaverissa.
3. Lopuksi paina __Raportoi__ painiketta tallentaaksesi tapaamisen.

\clearpage

## Ylitutor

Ylitutor näkee järjestelmässä olevat tutorointiryhmät 'Ryhmät' -linkin kautta. Ylitutor voi
raportoida yksityis- ja ryhmäpalavereja aivan kuten tutorikin. Ylitutor näkee järjestelmässä olevat
tutorit ja oppilaat. Ylitutor voi lisätä tutoreita Tutorit-linkin kautta, valitsemalla 'Lisää tutor'.
Ylitutor voi aina palata alkunäkymään oikean klikkaamalla nimeään oikeasta yläreunasta.


# Jäsenten välinen työnjako

Jotain tuli tehtyä.


# Muutokset 1. vaiheeseen

Jotain pienii.


# Oma arvio työstä

Aika vaikee.
