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


# ER-kaavio kokonaisuudessaan

\insertDiagram{ER-kaavio}{ER-kaavio}

Pitkät pätkät selitystä ER-kaavion sisällöstä,
ja kaikesta muusta mahdollisesta



# Tietokantakaavion graafinen esitys

Tietokannan relaatiot on nimetty [CakePHP](http://cakephp.org/)
ohjelmistokehyksen suositusten mukaisesti, joten esimerkiksi monen suhde moneen
relaatioiden nimet eivät ole kovin selkeitä. CakePHP:n nimeämis tekniikoiden
käyttäminen kuitenkin mahdollistaa kaikkien CakePHP:n 
tietokanta-automatisointiominaisuuksien käyttämisen, helpottaen varsinaista
toteutusvaihetta. Viitteavainviivojen väreiällä ei ole merkitystä, ne ovat vain
helpottamassa havainnollistamista kohdissa, joissa useampi viiva risteää.

\insertDiagram{Relaatio-kaavio}{Relaatio-kaavio}

Kaaviossa \ref{fig:Relaatio-kaavio} on esiteltynä kaikki projektiin liittyvät
relaatiot ja niiden keskinäiset suhteet. Sama kaavio löytyy koko sivun kokoisena
tämän dokumentin lopusta.

Salmiakkikuviolla ♦ merkityt attribuuttit ovat pääavaimia.
Avoin ympyrä ○ vasemlla tarkoittaa että __NULL__ arvot ovat sallittuja. Suljettu
ympyrä ● taas puolestaan tarkoittaa, että __NULL__ arvot eivät olesallittuja.


## User

_User_ relaatio vastaa ER-kaavion [käyttäjä](#käyttäjä) entiteettiä

\insertRelation{Relaatio-user}{User ralaatio}

- id: Numeerinen automaattisesti kasvava pääavain.
    * 0
    * 134
    * 975858975858
- login: Uniikki tunnus, jota käytetään siisänkirjausuttaessa. == __PPT__
  Koska käyttäjä tauluun ja/tai sen aliluokkiin viitataan useista paikoista
  ei login-attribuuttia ole valittu pääavaimeksi.
  säästämään tilaa lukuisissa viiteavaimissa.
    * ab76895
    * jk97452
    * nl99912
- password: Suolattu ja hash-funtionläpi viety salasana.
    * 'Vahva salalause nro 78' => $2970968|dfas879da7g908u98adf7hg89fd897h8fd9h^
    * 'salasana' => $9892194|jlksdg86afga897d9a8hadfhdgmleälwäfioo49^
- phone: Käyttäjän puhelinnumero. Uniikki.
    * +3580476581
    * 0451766895
    * 0316727672
- email: Käyttäjän sähköpostiosoite, käytetään esimerkiksi ryhmäläisille
  tapaamiskutsua lähetettäessä.
    * Erkki.Esimerkki.E@student.uta.fi
    * Saila.Anttila.K@uta.fi
    * Alisa.Seleznjova.I@student.uta.fi
- firs_name: Käyttäjän etunimi.
    * Erkki
    * Wēn
    * Anna-Kaisa
- last_name: Käyttäjän sukunimi
    * Postinen
    * Salmela
    * Nakata
- other_name: Moniselitteinen kenttä, johon voi tallettaa kaikki muut henkilön
  nimet, kuten toisen etunimen.
    * Alviira
    * Oiva
    * Aku


### Tutor
_Tutor_ relaatio on [_user_](#user) relaation aliluokka. Vastaa ER-kaavion
[opettajatuutori](#opettajatuutori) opettajatuutori entiteettiä.

\insertRelation{Relaatio-tutor}{Tutor relaatio}

- _user_id_: Pääavaimena toimiva viiteavain [_user_](#user) relaatioon
  id-attribuuttiin.
    * 0
    * 123
    * 975858
- is_god: Kertoo onko tuutori ylituutori
    * __TRUE__
    * __FALSE__


### Student

_Student_ relaatio on [_user_](#user) relaation aliluokka. Vastaa ER-kaavion
[opiskelija](#opiskelija) entiteettiä.

\insertRelation{Relaatio-student}{Student relaatio}

- _user_id_: Pääavaimena toimiva viiteavain [_user_](#user) relaatioon
  id-attribuuttiin.
    * 0
    * 123
    * 975858
- entry_year: Opintojen aloitusvuosi kokonaislukuna
    * 2012
    * 2000
    * 2037
- _tutor_id_: Viiteavain [_tutor_](#tutor) relaatoon id attribuuttiin.
    * 198
    * 88790
    * __NULL__: Käyttäjällä ei ole vielä määritelty opettajatuutoria.
- _program_structure_id_: Viiteavain [_program_structure_](#program_structure)
  relaatioon, kertoo opiskelijan pääaineen.
    * 1
    * 7
    * 14
- _group_id_: Viiteavain [_group_](#group) relaatioon, kertoo mihin ryhmään
  käyttäjä kuuluu.
    * 676
    * 12
    * __NULL__: Opiskelijaa ei ole vielä lisätty mihinkään ryhmään


## Group
_Group_ relaatio vastaa ER-kaavion [ryhmä](#ryhmä) entiteettiä.

\insertRelation{Relaatio-group}{Group relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _tutor_id_: Viiteavain [_tutor_](#tutor) entiteettin id-atribuuttiin.
    * 0
    * 123
    * 975858


## Meeting

_Meeting_ relaatio vastaa ER-kaavion [palaveri](#palaveri) entiteettiä.

\insertRelation{Relaatio-meeting}{Meeting relaatio}

* id: Automaattisesti kasvava numeerinen pääavain.
    * 1
    * 2
    * 123
* date: Päivämäärä, jolloin palveri on pidetty
    * 12.9.2013
    * 10.1.2015
    * 29.11.2016
* _group_id_: Viiteavain [_group_](#group) relaation id-attribuuttiin. Kertoo
  minkä ryhmän jäsenet(iä) osallistui palaveriin.
    * 1
    * 123
    * __NULL__: Palaveri oli henkilökohtainen palveri opiskelijan ja hänen
      tuutorinsa kanssa.
* _tutor_id_: Viiteavain [_tutor_](#tutor) relaation id-attribuuttiin, kertoo
  kuka on pitänyt palverin.
    * 1
    * 123
    * 975858
* report: Raportti palaverissa käsitellyistä asioista.
    * Keskusteltiin opiskelijan laatiman HOPS:in sisälllöstä ja ensivuoden
      suunnitelmista.


## Meetings_students
_Meetings_students_ relaatio vastaa ER-kaavion
[opiskelija kuuluu ryhmään](#opiskelija-ryhmä) suhdetta.

\insertRelation{Relaatio-meetings-students}{Meetings{\_}students relaatio}

* _student_id_: Viiteavain [_student_](#student) relaation id-attribuuttiin
  osittaisena pääavaimena.
    * 1
    * 123
    * 975858
* _meeting_id_: Viiteavain [_meeting_](#meeting) relaation id-attribuuttiin
  osittaisena viiteavaimena.
    * 1
    * 2
    * 3


## Course

_Course_ relaatio vastaa ER-kaavion [kurssi](#kurssi) entiteettiä.

\insertRelation{Relaatio-course}{Course relaatio}

- id: Numeerinen automaattisesti kasvava pääavain.
    * 100
    * 101
    * 102
- name: Kurssin nimi, muodossa "KURSSITUNNUS Kurssin nimi kokonaisuudessaan".
    * TIETA12 WWW-ojelmointi
    * VENP4 Venäjän historian ja kirjallisuuden perusteet
    * KKSULUK Tieteellinen kirjoittaminen
- year: Vuosi, jolloin kurssi on järjesttetty ensimmäisen kerran. Uniikki.
  Kurssin laajuus voi muuttua, jonka seurauksena opintopistemäärä muuttuu,
  vuoden avulla voidaan tietokannasta etsiä tuoreimman kurssin tiedot.
    * 2005
    * 2009
    * 2011
- credits: Kurssista saatavien opintopisteiden märä.
    * 3
    * 5
    * 10


## Course_type

_Course_type_ relaatio vastaa ER-kaavion [kurssityyppi](#kurssityyppi) entiteettiä.

\insertRelation{Relaatio-course-type}{Course{\_}type relaatio}

* id: Automaattisesti kasvava numeerinen pääavain.
    * 1
    * 2
    * 123
* name: Uniikki nimi
    * Perusopinto
    * Kieliopinto
    * Tietojenkäsittelytieteiden opinto

## courses_course_types

_Courses_course_types_ relaatio vastaa ER-kaavion
[kurssin ja kurssityypin](#kurssi-kurssityyppi) välistä suhdetta.

\insertRelation{Relaatio-courses-course-types}{Courses{\_}course{\_}types relaatio}

* _course_id_: Osittaisena pääavaimena toimiva viiteavain [_course_](#course)
  relaation.
* _course_type_id_: Osittaisena pääavaimena toimiva viiteavain
  [_course_type_](#course_type) relaation.


## Form

_Form_ relaatio vastaa ER-Kaavion [lomake](#lomake) entiteettiä.

\insertRelation{Relaatio-form}{Form relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _student_id_: Viiteavain [_student_](#student) relaation id-attribuuttiin.
  Kertoo lomakkeen täyttäjän.
    * 0
    * 123
    * 98765
* time: Lomakkeen palautus aika
    * 10.10.2010 20:00:10
    * 1.9.2014 15:45:02
    * 30.5.2015 08:07:57
* works: Työskenteleekö opiskelija
    * __TRUE__
    * __FALSE__
* weekly_hours: Viikottaiset työ tunnit
    * 0: Jos ei aio käydä töissä opiskelin aikana
    * 45
    * 25
* working_reason: Miksi/miksei töissä
    * "Aion keskittyä opiskeluun"
    * "En tahdo ottaa opintolainaa ja tarvitsen lisätienestejä"
    * "Ei jaksa. XD"
* interests: Pääaineen kiinnostavat aiheet
    * "": Ei kiinnostuksen kohteita
    * "Ohjelmointi kurssit ovat olleet hyvin miellekkäitä."
    * "Käännös kurssit on ihan kivoja, mutta kirjallisuuden kurssit ei oikein
      iske."
* secondary_interests: Muut kiinnostavat aineet
    * "Venäjän kurssit kiinnostavat kovasti, mutta harmillisesti eivät mahdu
      lukujärjestykseen."
    * "Matematiikan kurssit ovat parantaneet elämönlaatuani huomattavasti."
    * "Johtamiskorkeakoulun kurssitarjonta vaikuttaa tosi kiintoisalta."
* last_year_positive: Viimevuoden plussat
    * "Tuutorit olivat hyvin tehtäviensä tasalla ja ovat olleet suureksi avuksi"
    * "On tullut opittua kaikkea uutta ja jännää"
* last_year_negative: Viimevuoden miinukset
    * "Liian pitkät päivät"
    * "Ei saanut kaikkia sivuaineita mahtumaan kalenteriin"


## Courses_students

_Courses_students_ relaatio vastaa ER_kaavion
[opiskelija-suorittaa-kurssin](#opiskelija-suorittaa-kurssin) suhdetta.

\insertRelation{Relaatio-courses-students}{Courses{\_}students relaatio}

* _course_id_: Viiteavain relaation [_course_](#course) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 0
    * 2
    * 123
* _form_id_: Viiteavain relaation [_form_](#form) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* _student_id_: Viiteavain relaation [_student_](#student) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 0
    * 1
    * 98765
* planned_finishing_date: Milloin aikoo suorittaa kurssin
    * 1.4.2015: Lukuovuoden 2014-2015 kolmas periodi
    * 1.6.2015: Lukuovuoden 2014-2015 neljäs periodi
* finishing_date: Milloin kurssi on suoritettu
    * 12.12.2015
    * 10.6.2016
    * __NULL__: Kurssia ei ole suoritettu


## Program_structure

_Program_structure_ relaatio vastaa ER-kaavion [TK-rakenne](#tk-rakenne)
entiteettiä.

\insertRelation{Relaatio-program-structure}{Program{\_}structure relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* name: Tutkinnon nimi
    * "Tietojenkäsittelytieteiden kandinaatin tutkonto-ohjelma"
    * "Venäjän kielen, kulttuurin ja kääntämisen tutkinto-ohjelma"
    * "Tietojenkäsittelyopin maisterin tutkinto-ohjelma"
* year: Tutkinnon alkamisvuosi
    * 2000
    * 2005
    * 2020


## Courses_program_structures

_Courses_program_structures_ relaatio vastaa ER-kaavion
[kurssi-kuuluu-tutkintoon](#kurssi-kuuluu-tutkintoon) suhdetta.

\insertRelation{Relaatio-courses-program-structures}{Courses{\_}program{\_}structures relaatio}

* _course_id_: Viiteavain relaation [_course_](#course) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* _program_structure_: Viiteavain relaation [_program_structure_](#program_structure)
  id-attribuuttiin, toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* credits: vaadittu opintopistemäärä kyseisestä kurssi tyypistä
    * 10
    * 60
    * 30


## Program_requirement

_Program_requirement_ relaatio vastaa ER-kaavion [TK-rakenne](#tk-rakenne)
moniarvoista vaatimus-attribuuttia.

\insertRelation{Relaatio-program-requirement}{Program{\_}requirement relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _course_type_id_: Viiteavain relaation [_course_type_](#course_type)
  id-attribuuttiin, kertoo vaditun kurssi tyypin.
    * 1
    * 2
    * 123
* _program_structure_id_: Viiteavain relaation
  [_program_structure_](#program_structure)
  id-attribuuttiin, kertoo vaditun kurssi tyypin.

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

## User

~~~~~~ {#SQL-user .sqlpostgresql}
CREATE TABLE user
(
    id SERIAL PRIMARY KEY,
    login TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    phone TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    first_name TEXT NOT NULL,
    other_name TEXT,
    last_name TEXT NOT NULL
);
~~~~~~


## Tutor

~~~~~~ {#SQL-tutor .sqlpostgresql}
CREATE TABLE tutor
(
    user_id INTEGER PRIMARY KEY REFERENCES user(id),
    is_god BOOLEAN NOT NULL
);
~~~~~~


## Student

~~~~~~ {#SQL-student .sqlpostgresql}
CREATE TABLE student
(
    user_id INTEGER PRIMARY KEY REFERENCES user(id),
    entry_year INTEGER NOT NULL,
    tutor_id INTEGER REFERENCES tutor(user_id),
    program_structure_id INTEGER NOT NULL REFERENCES program_structure(id),
    group_id INTEGER REFERENCES group(id)
);
~~~~~~


## Group

~~~~~~ {#SQL-group .sqlpostgresql}
CREATE TABLE group
(
    id SERIAL PRIMARY KEY,
    tutor_id INTEGER NOT NULL REFERENCES tutor(user_id)
);
~~~~~~


## Meeting

~~~~~~ {#SQL-meeting .sqlpostgresql}
CREATE TABLE meeting
(
    id SERIAL PRIMARY KEY,
    date DATE NOT NULL,
    group_id INTEGER REFERENCES group(id),
    tutor_id INTEGER REFERENCES tutor(user_id),
    report TEXT NOT NULL
);
~~~~~~


## Meetings_students

~~~~~~ {#SQL-meeting_students .sqlpostgresql}
CREATE TABLE meeting_students
(
    student_id INTEGER REFERENCES student(user_id),
    meeting_id INTEGER REFERENCES meeting(id),
    PRIMARY KEY(student_id, meeting_id)
);
~~~~~~


## Course

~~~~~~ {#SQL-course .sqlpostgresql}
CREATE TABLE course
(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    year INTEGER NOT NULL,
    credits INTEGER NOT NULL,
    CONSTRAINT UNIQUE(name, year)
);
~~~~~~


## Course_type

~~~~~~ {#SQL-course_type .sqlpostgresql}
CREATE TABLE course_type
(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE
);
~~~~~~


## Courses_course_types

~~~~~~ {#SQL-courses_course_types .sqlpostgresql}
CREATE TABLE courses_course_types
(
    course_id INTEGER REFERENCES course(id),
    course_type_id INTEGER REFERENCES course_type(id),
    PRIMARY KEY(course_id, course_type_id)
);
~~~~~~


## Program_structure

~~~~~~ {#SQL-program_structure .sqlpostgresql}
CREATE TABLE program_structure
(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL,
    year INTEGER NOT NULL,
    CONSTARINT UNIQUE(name, year)
);
~~~~~~


## Courses_program_structures

~~~~~~ {#SQL-courses_program_structures .sqlpostgresql}
CREATE TABLE courses_program_structures
(
    course_id INTEGER REFERENCES course(id),
    program_structure_id INTEGER REFERENCES program_structure(id),
    PRIMARY KEY(course_id, program_structure_id)
);
~~~~~~


## Program_requirement

~~~~~~ {#SQL-program_requirement .sqlpostgresql}
CREATE TABLE program_requirement
(
    course_type_id INTEGER REFERENCES course_type(id),
    program_structure_id INTEGER REFERENCES program_structure(id),
    credits INTEGER NOT NULL,
    PRIMARY KEY(course_type_id, program_structure_id)
);
~~~~~~


## Courses_students

~~~~~~ {#SQL-courses_students .sqlpostgresql}
CREATE TABLE courses_students
(
    course_id INTEGER REFERENCES course(id),
    form_id INTEGER REFERENCES form(id),
    student_id INTEGER REFERENCES student(user_id),
    planned_finishing_date DATE NOT NULL,
    finishing_date DATE NOT NULL,
    PRIMARY KEY(course_id, form_id, student_id)
);
~~~~~~


## Form

~~~~~~ {#SQL-form .sqlpostgresql}
CREATE TABLE form
(
    id SERIAL PRIMARY KEY,
    student_id INTEGER NOT NULL REFERENCES student(user_id),
    time TIMESTAMP NOT NULL,
    works BOOLEAN NOT NULL,
    weekly_hours INTEGER NOT NULL,
    working_reason TEXT NOT NULL,
    interest TEXT NOT NULL,
    secondary_interest TEXT NOT NULL,
    last_year_positive TEXT NOT NULL,
    last_year_negative TEXT NOT NULL
);
~~~~~~



# Koko sivun kokoiset kaaviot

ER-kaavio on seuraavalla sivulla ja Relaatio-kaavio sitä seuraavalla.

\insertFullPageDiagram{ER-kaavio}{ER-kaavio}
\insertFullPageDiagram{Relaatio-kaavio}{Relaatio-kaavio}
