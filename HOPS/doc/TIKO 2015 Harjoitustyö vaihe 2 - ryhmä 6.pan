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
| Raportti __R2__                               |    __X__   |                     |
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


### Uuden HOPS-lomakkeen täyttäminen

![Opiskelijan kotisivu](img/addHOPS/Omat-tiedot.png)

Uuden HOPS-lomakkeen täyttäminen aloitetaan opiskieljan kotisilta,
klikkaamalla vasemmanlaidan toimintopalkin __Lisää HOPS__ linkkiä.

\clearpage

![HOPS-lomake](img/addHOPS/HOPS-lomake.png)

\clearpage

1. Ensimmäisenä lomakkeella on näkyvissä lista kursseista, jotka olet aiemmin ilmoittanut
   aikovasi suorittaa. Merkitse kurssi suoritetuksi klikkaamalla kurssin nimen oikealla puolella
   olevaa tekstikenttää, jolloin sinulle aukeaa kalenteri, josta voit valita suoritus päivän.
   Kurssien suoritus ajankohtien ei tarvitse olla täysin tarkkoja, kunhan valittu päivämäärä osuu
   kuitenkin oikean periodin kohdalle. Jos et ole suorittanut jotakin kurssi, niin jätä sen ajankohta
   tyhjäksi.
2. Toisena askeleena on listata sellaiset suorittamasi kurssit, joita et ollut aiemmassa HOPS:issasi
   ilmoittanut aikovasi suorittaa. Lisää kurssi kenttiä klikkaamalla vihreää plussan näköistä
   __Lisää kurssi__ painiketta. Lisää kenttiä vain sen verran mitä tarvitset, yksikään kenttä ei saa
   jäädä tyhjäksi.
3. Aloita kirjoittamaan vasemman puoleiseen kenttään kurssin tunnusta tai nimeä, jolloin järjestelmä
   antaa listan ehdoksia kursseista. Kurssi tulee valita avautuvasta listasta, nimen kirjoittaminen
   käsin ei tule toimimaan oikein, vaikka nimi olisi kirjoitettu juuri kuten listassa.
4. Valitse suoritusajankohta kohdan *1.* tapaan.
5. Listaa kurssit jotka aioit suorittaa tänä lukuvuonna. Klikkaamalla vihreää plussa symbolia
   saat esiin uuden kentän, johon voit taas alkaa kirjoittamaan kurssin nimeä tai tunnusta.
   Kurssi tulee jälleen valita listasta klikkaamalla. Toisinkin kohdassa *3-4.* niin ei nyt ole
   tarpeellista antaa mitään tarkkaa ajankohtaa.
6. Kerro aiotko työskennellä lukuvuoden aikana. Kun valitsen kohdan __Kyllä__, niin tulevat kohdat
   *7.* ja *8.* näkyviin. Jos valitset kohdan __EI__ niin tulee näkyviin vain kohta *8.*
7. Kerro kokonaislukuna kuinka monta tuntia keskimäärin aiot työskennellä viikossa tulevan vuoden aikana.
8. Kerro lyhyesti miksi tai mikset aio työskennellä ja minkälaista työtä aiot mahdollisesti tehdä.
9. Tähän kohtaan voit listata aihealueita, kursseja tai mitätahansa muita pääaineeseesi liittyviä
   asioita jotka koet eritoten kiinnostaviksi.
10. Kerro lyhyesti mitkä muut Tampereen yliopiston tarjoamat opinnot siinua kinnostavat tai
    minkälaisia opintoja toivoisit tarjottavan.
11. Tähän kohtaan voit listata opiskeluun liittyviä asioita jotka koit positiivisiksi ja hyvin
    onnistuneiksi viimevuoden aikana.
12. Lopuksi kerro vielä mitkä asiat eivät sujuneet odotustesi mukaisesti. Muista antaa myös
    parannus ehdotuksia.
13. Kun olet täyttänyt kaikki kohdat, niin klikkaa __Tallenna__ painiketta.

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

1. Anna päivämäärä, jolloin tapaaminen pidettiin
2. Kerro mitä asioita palaverissa käsiteltiin
3. Jos joku ryhmäläinen ei ollut paikkalla tapaamisessa, niin poista merkkintä hänen
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

Työssä ei ollut tiettyä jakoa jäsenien kesken. Statistiikkaa voi katsoa projektin Github-sivulta. Lukujen tulkinnassa
kannattaa ehkä ottaa huomioon, että tiedostot on luotu frameworkilla automaattisesti vain toisen osallistujan
toimesta.

https://github.com/Huulivoide/TIKO-Htyo/commits/master


# Muutokset 1. vaiheeseen

Jotain pienii.


# Oma arvio työstä

Työ opetti tietokantaohjelmointia, ja oli siksi hyvä kurssin lopputyöksi.


# Aineistoa

Lista tetokantaan rekisteröidyistä käyttäjistä löytyy seuraavalta sivulta.

\newpage
\newgeometry{margin=0.5cm}

\begin{landscape}


\begin{longtable}{| l | c | l | l | c | l | l | l |}
\caption{Lista tietokannasa olevista käyttäjistä} \\


\hline
    tunnus      &      salasana      &    rooli   &      puh     &           sähköposti                 &   etunimi  &   lisänimi  &  sukunimi \\
\hline
\hline \endhead
as98654         & AdhemardaSilva     & Opiskelija & 050654849    & daSilva.Adhemar.R@student.uta.fi     & Adhemar    & Rodrik      & daSilva   \\
am98583         & AlexMcLeish        & Opiskelija & 0409548234   & McLeish.Alex.D@student.uta.fi        & Alex       & Dick        & McLeish   \\
kk12349         & AnnaJokela         & Opiskelija & 041756865855 & Jokela.Anna.Alviira@student.uta.fi   & Anna       & Alviira     & Jokela    \\
ab98765         & AnnaBerg           & Opiskelija & 04175686589  & Berg.Anna.I@student.uta.fi           & Anna       & Ilona       & Berg      \\
ab98766         & AnteroBerg         & Opiskelija & 04175686590  & Berg.Antero.I@student.uta.fi         & Antero     & Ilmari      & Berg      \\
be98767         & BirgittaErkkilä    & Opiskelija & 04175686591  & Erkkilä.Birgitta.x@student.uta.fi    & Birgitta   &             & Erkkilä   \\
br99534         & BobRichardson      & Opiskelija & 0205438654   & Richardson.Bob.R@student.uta.fi      & Bob        & Rob         & Richardson\\
gd98435         & DordoniGiuseppe    & Opiskelija & 0405349869   & Giuseppe.Dordoni.M@student.uta.fi    & Dordoni    & Mario       & Giuseppe  \\
dr45932         & DougRougvie        & Opiskelija & 0509458324   & Rougvie.Doug.D@student.uta.fi        & Doug       & Didier      & Rougvie   \\
ef98768         & EetuFarback        & Opiskelija & 04175686592  & Farback.Eetu.A@student.uta.fi        & Eetu       & Antero      & Farback   \\
kk12348         & EskoJokela         & Opiskelija & 041756865854 & jokela.esko.ilmari@student.uta.fi    & Esko       &             & Jokela    \\
fg98768         & FabianaGomes       & Opiskelija & 04175686593  & Gomes.Fabiana.x@student.uta.fi       & Fabiana    &             & Gomes     \\
gh98770         & GarryHarju         & Opiskelija & 04175686594  & Harju.Garry.A@student.uta.fi         & Garry      & Aku         & Harju     \\
hp99438         & HeinoPulli         & Opiskelija & 0205439865   & Pulli.Heino.M@student.uta.fi         & Heino      & Matti       & Pulli     \\
hi98771         & HenriIlola         & Opiskelija & 04175686595  & Ilola.Henri.E@student.uta.fi         & Henri      & Eerik       & Ilola     \\
ij98772         & IlonaJoki          & Opiskelija & 04175686596  & Joki.Ilona.A@student.uta.fi          & Ilona      & Anastasia   & Joki      \\
jw97456         & JarmoWasama        & Opiskelija & 020543986    & Wasama.Jarmo.S@student.uta.fi        & Jarmo      & Seppo       & Wasama    \\
jl34594         & JimLeighton        & Opiskelija & 0456949340   & Leighton.Jim.J@student.uta.fi        & Jim        & Joseph      & Leighton  \\
jm98345         & JohnMikaelsson     & Opiskelija & 0503453459   & Mikaelsson.John.E@student.uta.fi     & John       & Erik        & Mikaelsson\\
kj98771         & JoniKuikka         & Opiskelija & 04175686597  & Kuikka.Joni.J@student.uta.fi         & Joni       & Jeremias    & Kuikka    \\
jm43593         & JosephMarrese      & Opiskelija & 0505469234   & Marrese.Joseph.A@student.uta.fi      & Joseph     & Aaron       & Marrese   \\
jl98543         & JuhaniLaitinen     & Opiskelija & 0205438934   & Laitinen.Juhani.L@student.uta.fi     & Juhani     & Lalli       & Laitinen  \\
jk12345         & KaisaJoki          & Opiskelija & 04175686586  & Joki.Kaisa.M@student.uta.fi          & Kaisa      & Maria       & Joki      \\
kl98773         & KatriLaurala       & Opiskelija & 04175686599  & Laurala.Katri.E@student.uta.fi       & Katri      & Eveliina    & Laurala   \\
kh43523         & KristiinaHanhirova & Opiskelija & 0504352349   & Hanhirova.Kristiina.x@student.uta.fi & Kristiina  &             & Hanhirova \\
lm98000         & LassiMäkelä        & Opiskelija & 0417568600   & Mäkelä.Lassi.x@student.uta.fi        & Lassi      &             & Mäkelä    \\
ll12349         & LoordiLalli        & Opiskelija & 04175686588  & Lalli.Loordi.x@student.uta.fi        & Loordi     &             & Lalli     \\
ma131313        & MarttiAhtisaari    & Opiskelija & 0456789034   & Ahtisaari.Martti.O@student.uta.fi    & Martti     & Oiva Kalevi & Ahtisaari \\
mk98654         & MattiKeinonen      & Opiskelija & 0205439658   & Keinonen.Matti.I@student.uta.fi      & Matti      & Ilpo        & Keinonen  \\
mk121212        & MaunoKoivisto      & Opiskelija & 0506996709   & Koivisto.Mauno.H@student.uta.fi      & Mauno      & Henrik      & Koivisto  \\
nc93453         & NickCohen          & Opiskelija & 0409568734   & Cohen.Nick.x@student.uta.fi          & Nick       &             & Cohen     \\
jp99534         & PeltonenJorma      & Opiskelija & 0204325489   & Jorma.Peltonen.J@student.uta.fi      & Peltonen   & Juhani      & Jorma     \\
sa23482         & ŠotaArveladze      & Opiskelija & 0459344383   & Arveladze.Sota.x@student.uta.fi      & Šota       &             & Arveladze \\
tj82543         & TarjaJokela        & Opiskelija & 0407466142   & Jokela.Tarja.A@student.uta.fi        & Tarja      & Aino        & Jokela    \\
th141414        & TarjaHalonen       & Opiskelija & 0406789012   & Halonen.Kaarina.T@student.uta.fi     & Tarja      & Kaarina     & Halonen   \\
th98345         & ToivoHyytiäinen    & Opiskelija & 0502349234   & Hyytiainen.Toivo.H@student.uta.fi    & Toivo      & Henrik      & Hyytiäinen\\
uk111111        & UrhoKekkonen       & Opiskelija & 3821191      & Kekkonen.Urho.K@student.uta.fi       & Urho       & Kalevi      & Kekkonen  \\
uy98543         & UrpoYlönen         & Opiskelija & 0209543489   & Ylonen.Urpo.V@student.uta.fi         & Urpo       & Veli        & Ylönen    \\
wd98645         & WaltDavis          & Opiskelija & 020543965    & Davis.Walt.G@student.uta.fi          & Walt       & George      & Davis     \\
wh56705         & WillHeggie         & Opiskelija & 0452349584   & Heggie.Will.x@student.uta.fi         & Will       &             & Heggie    \\
wm98647         & WillieMiller       & Opiskelija & 0409653458   & Miller.Willie.J@student.uta.fi       & Willie     & James       & Miller    \\
yw78965         & YanzhaoWen         & Opiskelija & 0451234556   & Wen.Yanzhao.X@student.uta.fi         & Yanzhao    &             & Wen       \\
tuutori6        & AskoKoivu          & Tuutori    & 0418481142   & Koivu.Asko.X@staff.uta.fi            & Asko       &             & Koivu     \\
mp95438         & MadelinePerry      & Tuutori    & 040564396    & Perry.Madeline.M@uta.fi              & Madeline   & Maria       & Perry     \\
tktope12        & MinnaPostinen      & Tuutori    & 0407486142   & Postinen.Minna.A@staff.uta.fi        & Minna      & Alviira     & Postinen  \\
tktope3         & PekkaPuolakka      & Tuutori    & 0557654912   & Puolakka.Pekka.P@staff.uta.fi        & Pekka      & Pouta       & Puolakka  \\
supremeoverlord & AnttiKoivunen      & Ylituutori & 020 612 000  & Koivunen.Antti.I@staff.uta.fi        & Antti      & Ilmari      & Koivunen  \\
\hline

\end{longtable}
\end{landscape}
\restoregeometry
