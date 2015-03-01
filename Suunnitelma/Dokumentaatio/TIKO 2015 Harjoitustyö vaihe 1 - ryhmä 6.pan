% Digitaalinen HOPS järjestelmä – Ryhmän 6 esitys
% Jesse Jaara     <Jaara.Jesse.J@student.uta.fi>
  Sami Voutilanen <Voutilainen.Sami.J@student.uta.fi>



# ER-kaavio

Tässä luvussa esitellään digitaalisessa HOPS-järjestelmässä tarvittava tietokanta ER-kaaviona.
Ensimmäiseksi käsitellään kaavion entiteetit ja sen jälkeen niiden väliset suhteet.

\insertDiagram{ER-kaavio}{ER-kaavio}

Kaaviossa \ref{fig:ER-kaavio} on esiteltynä kaikki projektiin liittyvät
ER-entiteetit ja niiden keskinäiset suhteet. Sama kaavio löytyy koko sivun kokoisena
ja käännettynä tämän dokumentin lopusta.



## ER-kaavion entiteetit

Esittelyssä ER-kaaviossa esiintyvät entiteetit.


### Käyttäjä

Sähköisen HOPS-järjestelmän käyttäjä, opiskelija tai tuutori.

\insertDiagram{ER-entiteetti-käyttäjä}{Käyttäjä entiteetti}

- ID: Numeerinen tunnus viiteavaimia varten.
- PPT: Varsinainen käyttäjän tunniste, jota käytetään sisäänkirjausuttaessa.
- Tyyppi: Onko käyttäjä opiskelija, tutori vai ylituutori.
- Salasana: Suolattu ja hash-funtionläpi viety salasana.
- Puhelin: Käyttäjän puhelinnumero.
- Sposti:  Käyttäjän sähköpostiosoite, käytetään esimerkiksi ryhmäläisille
  tapaamiskutsua lähetettäessä.
- Nimi
    * etu-: Käyttäjän etunimi.
    * toinen-: Käyttäjän muut mahdolliset nimet, kuten toinen etunimi.
    * suku-: Käyttäjän sukunimi.


#### Opiskelija
Käyttäjän aliluokka. Kuvaa tietoja ja suhteita jotka liittyvät opiskelijoihin,
mutteivät tuutoreihin.

\insertDiagram{ER-entiteetti-opiskelija}{Opiskelija entiteetti}

- Aloitusvuosi: Nykyisen tutkintorakenteen suorittamisen aloitusvuosi.


#### Tuutori

\insertDiagram{ER-entiteetti-opettajatuutori}{Tuutori entiteetti}

Käyttäjän aliluokka, tuutori. Esitettynä vain selkeyden vuoksi.
Relaatio kaavion puolella tuutori entiteetti putoaa pois ja
jäljelle jää vain käyttäjä entiteetti jonka tyyppi kertoo onko käyttäjä
tuutori tai ylituutori.


### Ryhmä

Ryhmä, johon kuuluu tuutori sekä opiskelijoita.

\insertDiagram{ER-entiteetti-ryhmä}{Ryhmä entiteetti}

- ID: Ryhmän tunnus.
- Koko: Ryhmän koko, johdettu opiskelija-taulusta.


### Opintojakso

Tampereen yliopistossa suoritettavissa oleva kurssi.

\insertDiagram{ER-entiteetti-opintojakso}{Opintojakso entiteetti}

- ID: Numeerinen tunniste viiteavaimia varten, yksilöi kurssin.
- Nimi: Kurssin nimi, muodossa "KURSSITUNNUS Kurssin nimi kokonaisuudessaan".
- Vuosi: Vuosi, jolloin kurssi on järjesttetty ensimmäisen kerran.
  Kurssin laajuus voi muuttua, jonka seurauksena opintopistemäärä muuttuu,
  vuoden avulla voidaan tietokannasta etsiä tuoreimman kurssin tiedot.
- OP-pisteet: Kurssista saatavien opintopisteiden määrä.


### TK-Rakenne

Tampereen yliopistossa suoritettavissa oleva tutkintorakenne, koostuu opintojaksoista.

\insertDiagram{ER-entiteetti-tk-rakenne}{TK-rakenne entiteetti}

- ID: Numeerinen tutkintorakenteen tunnus.
- Nimi: Tutkinnon nimi.
- Vuosi: Tutkinnon alkamisvuosi.
- Vaatimukset: TK-rakenteeseen "ohjelmoituja" opintopiste vaatimuksia.
  Tutkintoon kuuluu joitakin kaille pakollisia kursseja, mutta esimerkiksi
  kieliopintoja saa valita vapaasti, kunhan opintopisetemäärällisesti niitä
  tulee tarpeeksi. Tutkiintoon voidaan esimerkiksi ohjelmoida 20p kieliopintoja.
  Toinen simerkki voisi olla vaikka 30p matematiikan aineopintoja.


### Kurssityyppi

Opintojaksoon liitettävä tarra (tägi), joka antaa lisätietoja opintojaksosta,
esimerkiksi minkä oppiaineen alle opintojakso kuuluu, onko se perus vai maisteritason
opinto ja/tai onko se vapaa valintainen Kieliopinto. Tyypitysjärjestelmä tuo
tekee "löyhien" TK-rakenteiden ohjelmoimisen tietokantaan mahdolliseksi.

\insertDiagram{ER-entiteetti-kurssityyppi}{Kurssityyppi entiteetti}

- ID: Numeerinen kurssityypin tunnus.
- Nimi: Tägin nimi esim perusopinto, matematiikanopinto, kieliopinto


### Palaveri

Kokous, jossa opiskelijat ja tuutori keskustelevat. Palaveri voi olla joko
ryhmä palaveri tai yksityispalaveri.

\insertDiagram{ER-entiteetti-palaveri}{Palaveri entiteetti}

- ID: Numeerinen palaverin tunnus.
- Palaverityyppi: Ryhmä-/Henkilökohtainen palaveri, johdettu osallistuvien
  opiskelijoiden määrästä.
- Päivämäärä: Milloj palaveri on pidetty.
- Raportti: Mitä palaverissa on käsitelty.


### Täytetty lomake {#form}

Opiskelijan täyttämä ja tuutorin tarkastama jokavuotinen HOPS-lomake.
Lomaketta voi "muokata" jälkikäteen, mutta silloin järjestelmään
tallentuu kokonaan uusi lomake.

\insertDiagram{ER-entiteetti-täytetty_lomake}{TK-rakenne täytetty lomake}

- ID: Numeerinen lomakkeen tunnus.
- On töissä: Työskenteleekö opiskelija?
- Työ selite: Miksi/miksei töissä?
- Työtunnit: Viikottaiset työtunnit.
- Kiinnostukset: Pääaineen kiinnostavat aiheet.
- Valinnaiset kiinnostukset: Muut kiinnostavat aineet.
- Viime vuosi: Viime vuoden...
    * Plussat: ...myönteiset asiat.
    * Miinukset: ...kielteiset asiat.
- Päivämäärä/aika: Lomakkeen palautusajankohta



## ER-kaavion suhteet

Seuraavaksi kuvataan entiteettien välisiä suhteita.


### Opintojaksolla on kurssityyppejä {#kurssi-tyyppi}

\insertDiagram{ER-suhde-opintojakso-kuuluu-kurssityyppiin}{Opintojakso kuuluu kurssityyppiin -suhde}

Opintojaksoon täytyy olla liitettynä vähintään yksi kurssityyppi,
käytänössä suurimmalla osalla opintojaksoja on vähintään kaksi tyyppiä
opintojakson taso ja oppiaine.


### Opintojakso kuuluu TK-rakenteeseen {#kurssi-tkr}

\insertDiagram{ER-suhde-opintojakso-kuuluu-tk-rakenteeseen}{Opintojakso kuuluu TK-rakenteeseen -suhde}

Opintojakso voi kuulua pakollisena kurssina joihinkin tutkintorakenteisiin.


### Opiskelija aikoo suorittaa opintojakson {#opiskelija-kurssi}

\insertDiagram{ER-suhde-opiskelija-aikoo_suorittaa-opintojakson}{Opiskelija aikoo suorittaa opintojakson -suhde}

Kurssit jotka opiskelija aikoo suorittaa kuluvan lukuvuoden aikana.
Seuraavana vuonna järjestelmä kysyy opiskelijalta, että mitkä kaikki
kurssit opiskelija on saanut suoritetuksi.

- Suoritettu: Onko opintojakso suoritettu vai ei?
- Milloin: Suoritusajankohta.


### Opiskelija kuuluu ryhmään

\insertDiagram{ER-suhde-opiskelija-kuuluu-ryhmään}{Opiskelija kuuluu ryhmään -suhde}

Jokainen opiskelija kuuluu johonkin ryhmään.


### Tutor ohjaa ryhmää

\insertDiagram{ER-suhde-tutor-ohjaa-ryhmää}{Tutor ohjaa ryhmää -suhde}

Jokaisella ryhmällä on ohjaava opettajatuutori.


### Opiskelija osallistuu palaveriin {#opikskelija-palaveri}

\insertDiagram{ER-suhde-opiskelija-osallistuu-palaveriin}{Opiskelija osallistuu palaveriin -suhde}

Opiskelijat osallistuvat sekä ryhmä että yksityispalavereihin. Palaveriin osallistuu
aina vähintään yksi opiskelija, jolloin kyseessä on yksityispalaveri.


### Tutor osallistuu palaveriin

\insertDiagram{ER-suhde-tutor-osallistuu-palaveriin}{Tutor osallistuu palaveriin -suhde}

Palaveria on aina vetämässä yksi tuutori.


### Opiskelija suorittaa tutkintorakenteen

\insertDiagram{ER-suhde-opiskelija-suorittaa-tutkintorakenteen}{Opiskelija suorittaa tutkintorakenteen -suhde}

Opiskelijoiden on tarkoitus suorittaa jokin tutkintorakenne.


### Opiskelija täyttää lomakkeen

\insertDiagram{ER-suhde-opiskelija-täyttää-lomakkeen}{Opiskelija täyttää lomakkeen -suhde}

Opiskelijat vastaavat sähköisissä HOPS-lomakkeissa esitettyihin kysymyksiin.


### Ryhmä palaveeraa palaverissa

\insertDiagram{ER-suhde-ryhmä-palaveeraa-palaverissa}{Ryhmä palaveeraa palaverissa -suhde}

Ryhmät käyvät palavereissa.


### Tutor tarkastaa lomakkeen

\insertDiagram{ER-suhde-tutor-tarkastaa-lomakkeen}{Tutor tarkastaa lomakkeen -suhde}

Tutorit tarkastavat mitä heidän tuutoroitavansa ovat kirjoittaneet HOPS:eihinsa


### Tutor tuutoroi opiskelijaa

\insertDiagram{ER-suhde-tutor-tuutoroi-opiskelijaa}{Tutor tuutoroi opiskelijaa -suhde}

Opiskelijalla on oma opettajatuutori.



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

Kaavion selitteet:
* ♦: Pääavain.
* ●: __NULL__ arvot eivät ole sallittuja.
* ○: __NULL__ arvot ovat sallittuja.
* ■: __UNIQUE__ määrä on voimassa, eivätkä __NULL__ arvot ole sallittuja.
* □: __UNIQUE__ määre on voimassa ja __NULL__ arvot ovat sallittuja.


## Access_levels

_Access_level_ relaatio vastaa ER-kaavion [käyttäjä](#käyttäjä) entiteetin
tyyppi attribuuttia. Tulevaisuudessa relaatio olisi helposti laajennettavissa
monipuolisemmaksi ja listata yksittäiset oikeudet attribuutteina, sen sijaan
että järjstelmään on kova koodattuna kolme käyttäjä tyyppiä.

\insertRelation{Relaatio-access_level}{Access{\_}levels relaatio}

* id: Pääavain
    * 1: opiskelija
    * 2: tuutori
    * 3: ylituutori
* name: Tasoa kuvaava nimike
    * opiskelija
    * tuutori
    * ylituutori

## Users

_Users_ relaatio vastaa ER-kaavion [käyttäjä](#käyttäjä) entiteettiä

\insertRelation{Relaatio-user}{User relaatio}

- id: Numeerinen automaattisesti kasvava pääavain.
    * 0
    * 134
    * 975858975858
- login: login == __PPT__ Koska käyttäjä tauluun ja/tai sen aliluokkiin viitataan useista paikoista
  ei login-attribuuttia ole valittu pääavaimeksi.
    * ab76895
    * jk97452
    * nl99912
- password: 
    * 'Vahva salalause nro 78' => $2970968|dfas879da7g908u98adf7hg89fd897h8fd9h^
    * 'salasana' => $9892194|jlksdg86afga897d9a8hadfhdgmleälwäfioo49^
- access_level_id: Viiteavain [_access_levels_](#access_levels) relaation id-attribuuttii
    * 1: opiskelija
    * 2: tuutori
    * 3: ylituutori
- phone:
    * +3580476581
    * 0451766895
    * 0316727672
- email:
    * Erkki.Esimerkki.E@student.uta.fi
    * Saila.Anttila.K@uta.fi
    * Alisa.Seleznjova.I@student.uta.fi
- first_name: 
    * Erkki
    * Wēn
    * Anna-Kaisa
- last_name:
    * Postinen
    * Salmela
    * Nakata
- other_name: 
    * Alviira
    * Oiva
    * Aku


### Students

_Students_ relaatio on [_users_](#users) relaation aliluokka. Vastaa ER-kaavion
[opiskelija](#opiskelija) entiteettiä.

\insertRelation{Relaatio-student}{Student relaatio}

- _user_id_: Pääavaimena toimiva viiteavain [_users_](#users) relaatioon
  id-attribuuttiin.
    * 0
    * 123
    * 975858
- entry_year:
    * 2012
    * 2000
    * 2037
- _tutor_id_: Viiteavain [_users_](#users) relaatoon id attribuuttiin.
    * 198
    * 88790
    * __NULL__: Käyttäjällä ei ole vielä määritelty opettajatuutoria.
- _program_structure_id_: Viiteavain [_program_structure_](#program_structure)
  relaatioon, kertoo opiskelijan pääaineen.
    * 1
    * 7
    * 14
- _group_id_: Viiteavain [_groups_](#groups) relaatioon, kertoo mihin ryhmään
  käyttäjä kuuluu.
    * 676
    * 12
    * __NULL__: Opiskelijaa ei ole vielä lisätty mihinkään ryhmään


## Groups
_Groups_ relaatio vastaa ER-kaavion [ryhmä](#ryhmä) entiteettiä.

\insertRelation{Relaatio-group}{Group relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _user_id_: Viiteavain [_tutors_](#tutors) entiteettin id-atribuuttiin.
    * 0
    * 123
    * 975858


## Meetings

_Meetings_ relaatio vastaa ER-kaavion [palaveri](#palaveri) entiteettiä.

\insertRelation{Relaatio-meeting}{Meeting relaatio}

* id: Automaattisesti kasvava numeerinen pääavain.
    * 1
    * 2
    * 123
* date: 
    * 12.9.2013
    * 10.1.2015
    * 29.11.2016
* _group_id_: Viiteavain [_groups_](#groups) relaation id-attribuuttiin. Kertoo
  minkä ryhmän jäsenet(iä) osallistui palaveriin.
    * 1
    * 123
    * __NULL__: Palaveri oli henkilökohtainen palveri opiskelijan ja hänen
      tuutorinsa kanssa.
* _user_id_: Viiteavain [_tutors_](#tutors) relaation id-attribuuttiin, kertoo
  kuka on pitänyt palverin.
    * 1
    * 123
    * 975858
* report: 
    * Keskusteltiin opiskelijan laatiman HOPS:in sisälllöstä ja ensivuoden
      suunnitelmista.


## Meetings_students
_Meetings_students_ relaatio vastaa ER-kaavion
[opiskelija-osallistuu-palaveriin](#opiskelija-palaveri) suhdetta.

\insertRelation{Relaatio-meetings-students}{Meetings{\_}students relaatio}

* _student_id_: Viiteavain [_students_](#students) relaation id-attribuuttiin
  osittaisena pääavaimena.
    * 1
    * 123
    * 975858
* _meeting_id_: Viiteavain [_meetings_](#meetings) relaation id-attribuuttiin
  osittaisena viiteavaimena.
    * 1
    * 2
    * 3


## Courses

_Courses_ relaatio vastaa ER-kaavion [opintojakso](#opintojakso) entiteettiä.

\insertRelation{Relaatio-course}{Course relaatio}

- id: Numeerinen automaattisesti kasvava pääavain.
    * 100
    * 101
    * 102
- name: 
    * TIETA12 WWW-ojelmointi
    * VENP4 Venäjän historian ja kirjallisuuden perusteet
    * KKSULUK Tieteellinen kirjoittaminen
- year: 
    * 2005
    * 2009
    * 2011
- credits: 
    * 3
    * 5
    * 10


## Course_types

_Course_types_ relaatio vastaa ER-kaavion [kurssityyppi](#kurssityyppi) entiteettiä.

\insertRelation{Relaatio-course-type}{Course{\_}type relaatio}

* id: Automaattisesti kasvava numeerinen pääavain.
    * 1
    * 2
    * 123
* name: 
    * Perusopinto
    * Kieliopinto
    * Tietojenkäsittelytieteiden opinto

## courses_course_types

_Courses_course_types_ relaatio vastaa ER-kaavion
[kurssin ja kurssityypin](#kurssi-tyyppi) välistä suhdetta.

\insertRelation{Relaatio-courses-course-types}{Courses{\_}course{\_}types relaatio}

* _course_id_: Osittaisena pääavaimena toimiva viiteavain [_courses_](#courses)
  relaation.
* _course_type_id_: Osittaisena pääavaimena toimiva viiteavain
  [_course_types_](#course_types) relaation.


## Forms

_Forms_ relaatio vastaa ER-Kaavion [lomake](#forms) entiteettiä.

\insertRelation{Relaatio-form}{Form relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _student_id_: Viiteavain [_students_](#students) relaation id-attribuuttiin.
  Kertoo lomakkeen täyttäjän.
    * 0
    * 123
    * 98765
* time: 
    * 10.10.2010 20:00:10
    * 1.9.2014 15:45:02
    * 30.5.2015 08:07:57
* works:
    * __TRUE__
    * __FALSE__
* weekly_hours: 
    * 0: Jos ei aio käydä töissä opiskelin aikana
    * 45
    * 25
* working_reason: 
    * "Aion keskittyä opiskeluun"
    * "En tahdo ottaa opintolainaa ja tarvitsen lisätienestejä"
    * "Ei jaksa. XD"
* interests: 
    * "": Ei kiinnostuksen kohteita
    * "Ohjelmointi kurssit ovat olleet hyvin miellekkäitä."
    * "Käännös kurssit on ihan kivoja, mutta kirjallisuuden kurssit ei oikein
      iske."
* secondary_interests: 
    * "Venäjän kurssit kiinnostavat kovasti, mutta harmillisesti eivät mahdu
      lukujärjestykseen."
    * "Matematiikan kurssit ovat parantaneet elämönlaatuani huomattavasti."
    * "Johtamiskorkeakoulun kurssitarjonta vaikuttaa tosi kiintoisalta."
* last_year_positive:
    * "Tuutorit olivat hyvin tehtäviensä tasalla ja ovat olleet suureksi avuksi"
    * "On tullut opittua kaikkea uutta ja jännää"
* last_year_negative:
    * "Liian pitkät päivät"
    * "Ei saanut kaikkia sivuaineita mahtumaan kalenteriin"


## Courses_students

_Courses_students_ relaatio vastaa ER_kaavion
[opiskelija aikoo suorittaa opintojakson](#opiskelija-kurssi) suhdetta.

\insertRelation{Relaatio-courses-students}{Courses{\_}students relaatio}

* _course_id_: Viiteavain relaation [_courses_](#courses) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 0
    * 2
    * 123
* _form_id_: Viiteavain relaation [_forms_](#forms) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* _student_id_: Viiteavain relaation [_students_](#students) id-attribuuttiin,
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


## Program_structures

_Program_structures_ relaatio vastaa ER-kaavion [TK-rakenne](#tk-rakenne)
entiteettiä.

\insertRelation{Relaatio-program-structure}{Program{\_}structure relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* name: 
    * "Tietojenkäsittelytieteiden kandinaatin tutkonto-ohjelma"
    * "Venäjän kielen, kulttuurin ja kääntämisen tutkinto-ohjelma"
    * "Tietojenkäsittelyopin maisterin tutkinto-ohjelma"
* year: 
    * 2000
    * 2005
    * 2020


## Courses_program_structures

_Courses_program_structures_ relaatio vastaa ER-kaavion
[kurssi-kuuluu-tutkintoon](#kurssi-tkr) suhdetta.

\insertRelation{Relaatio-courses-program-structures}{Courses{\_}program{\_}structures relaatio}

* _course_id_: Viiteavain relaation [_courses_](#courses) id-attribuuttiin,
  toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* _program_structure_: Viiteavain relaation [_program_structures_](#program_structures)
  id-attribuuttiin, toimii osittaisena pääavaimena.
    * 1
    * 2
    * 123
* credits: vaadittu opintopistemäärä kyseisestä kurssi tyypistä
    * 10
    * 60
    * 30


## Program_requirements

_Program_requirements_ relaatio vastaa ER-kaavion [TK-rakenne](#tk-rakenne)
moniarvoista vaatimus-attribuuttia.

\insertRelation{Relaatio-program-requirement}{Program{\_}requirement relaatio}

* id: Automaattisesti kasvava numeerinen pääavain
    * 1
    * 2
    * 123
* _course_type_id_: Viiteavain relaation [_course_types_](#course_types)
  id-attribuuttiin, kertoo vaditun kurssi tyypin.
    * 1
    * 2
    * 123
* _program_structure_id_: Viiteavain relaation
  [_program_structures_](#program_structures)
  id-attribuuttiin, kertoo vaditun kurssi tyypin.

# Tietokantakaavio tekstimuodossa

* access_levels(id, name)
* courses(id, name, year, credits)
* courses_course_types(course_id, course_type_id)
* courses_program_structures(course_id, program_structure_id)
* courses_students(course_id, form_id, student_id, planned_finishing_date, finishing_date)
* course_type(id, name)
* form(id, student_id, time, works, weekly_hours, working_reason, interests, secondary_interest, 
  last_year_positive, last_year_negative)
* group(id, tutor_id)
* meeting(id, date, group_id, tutor_id, report)
* meetings_students(student_id, meeting_id)
* program_requirement(id, course_type, program_structure_id, credits)
* program_structure(id, name, year)
* student(user_id, entry_year, tutor_id, program_structure, group_id)
* user(id, login, password, phone, email, first_name, other_name, last_name)



# Tapahtuma kuvaukset

* Uusien oppilaiden jakaminen ryhmiin
    - Lue entry_year relaatiosta students
    - Lue user_id relaatiosta students
    - Lue group_id relaatiosta students
    - Lue id relaatiosta groups
    - group_id = id
    - Talleta relaatioon students

* Oppilaan tietojen päivitys
    - Lue x relaatiosta students
    - x = y;
    - talleta x relaatioon students



# Tietokannan luontilauseet

## Access_levels

~~~~~~ {#SQL-user .sqlpostgresql}
CREATE TABLE "access_levels"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL
);
~~~~~~


## Users

~~~~~~ {#SQL-user .sqlpostgresql}
CREATE TABLE "users"
(
    "id" SERIAL PRIMARY KEY,
    "login" TEXT NOT NULL UNIQUE,
    "password" TEXT NOT NULL,
    "access_level_id" INTEGER REFERENCES "access_levels"("id"),
    "phone" TEXT NOT NULL UNIQUE,
    "email" TEXT NOT NULL UNIQUE,
    "first_name" TEXT NOT NULL,
    "other_name" TEXT,
    "last_name" TEXT NOT NULL
);
~~~~~~


## Groups

~~~~~~ {#SQL-group .sqlpostgresql}
CREATE TABLE "groups"
(
    "id" SERIAL PRIMARY KEY,
    "tutor_id" INTEGER NOT NULL REFERENCES "users"("id")
);
~~~~~~


## Program_structures

~~~~~~ {#SQL-program_structure .sqlpostgresql}
CREATE TABLE "program_structures"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    UNIQUE("name", "year")
);
~~~~~~


## Students

~~~~~~ {#SQL-student .sqlpostgresql}
CREATE TABLE "students"
(
    "user_id" INTEGER PRIMARY KEY REFERENCES "users"("id"),
    "entry_year" INTEGER NOT NULL,
    "turor_id" INTEGER REFERENCES "users"("id"),
    "program_structure_id" INTEGER NOT NULL REFERENCES "program_structures"("id"),
    "group_id" INTEGER REFERENCES "groups"("id")
);
~~~~~~


## Meetings

~~~~~~ {#SQL-meeting .sqlpostgresql}
CREATE TABLE "meetings"
(
    "id" SERIAL PRIMARY KEY,
    "date" DATE NOT NULL,
    "group_id" INTEGER REFERENCES "groups"("id"),
    "user_id" INTEGER REFERENCES "users"("id"),
    "report" TEXT NOT NULL
);
~~~~~~


## Meetings_students

~~~~~~ {#SQL-meeting_students .sqlpostgresql}
CREATE TABLE "meetings_students"
(
    "student_id" INTEGER REFERENCES "students"("user_id"),
    "meeting_id" INTEGER REFERENCES "meetings"("id"),
    PRIMARY KEY("student_id", "meeting_id")
);
~~~~~~


## Courses

~~~~~~ {#SQL-course .sqlpostgresql}
CREATE TABLE "courses"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    "credits" INTEGER NOT NULL,
    UNIQUE("name", "year")
);
~~~~~~


## Course_types

~~~~~~ {#SQL-course_type .sqlpostgresql}
CREATE TABLE "course_types"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL UNIQUE
);
~~~~~~


## Courses_course_types

~~~~~~ {#SQL-courses_course_types .sqlpostgresql}
CREATE TABLE "courses_course_types"
(
    "course_id" INTEGER REFERENCES "courses"("id"),
    "course_type_id" INTEGER REFERENCES "course_types"("id"),
    PRIMARY KEY("course_id", "course_type_id")
);
~~~~~~


## Courses_program_structures

~~~~~~ {#SQL-courses_program_structures .sqlpostgresql}
CREATE TABLE "courses_program_structures"
(
    "course_id" INTEGER REFERENCES "courses"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structures"("id"),
    PRIMARY KEY("course_id", "program_structure_id")
);
~~~~~~


## Program_requirements

~~~~~~ {#SQL-program_requirement .sqlpostgresql}
CREATE TABLE "program_requirements"
(
    "course_type_id" INTEGER REFERENCES "course_types"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structures"("id"),
    "credits" INTEGER NOT NULL,
    PRIMARY KEY("course_type_id", "program_structure_id")
);
~~~~~~


## Forms

~~~~~~ {#SQL-form .sqlpostgresql}
CREATE TABLE "forms"
(
    "id" SERIAL PRIMARY KEY,
    "student_id" INTEGER NOT NULL REFERENCES "students"("user_id"),
    "time" TIMESTAMP NOT NULL,
    "works" BOOLEAN NOT NULL,
    "weekly_hours" INTEGER NOT NULL,
    "working_reason" TEXT NOT NULL,
    "interest" TEXT NOT NULL,
    "secondary_interest" TEXT NOT NULL,
    "last_year_positive" TEXT NOT NULL,
    "last_year_negative" TEXT NOT NULL
);
~~~~~~


## Courses_students

~~~~~~ {#SQL-courses_students .sqlpostgresql}
CREATE TABLE "courses_students"
(
    "course_id" INTEGER REFERENCES "courses"("id"),
    "form_id" INTEGER REFERENCES "forms"("id"),
    "student_id" INTEGER REFERENCES "students"("user_id"),
    "planned_finishing_date" DATE NOT NULL,
    "finishing_date" DATE NOT NULL,
    PRIMARY KEY("course_id", "student_id")
);
~~~~~~



# Koko sivun kokoiset kaaviot

ER-kaavio on seuraavalla sivulla ja Relaatio-kaavio sitä seuraavalla.

\insertFullPageDiagram{ER-kaavio}{ER-kaavio}
\insertFullPageDiagram{Relaatio-kaavio}{Relaatio-kaavio}
