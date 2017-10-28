# Examenopdracht Web Development

# Periode 1

Je maakt een wedstrijd voor een bekend merk. De wedstrijd loopt in 4
periodes die automatisch door je applicatie geregeld worden.

- Periode 1: xx/xx/xx 00:00:00 tot xx/xx/xx 00:00:
- Periode 2: xx/xx/xx 00:00:00 tot xx/xx/xx 00:00:
- Periode 3: xx/xx/xx 00:00:00 tot xx/xx/xx 00:00:
- Periode 4: xx/xx/xx 00:00:00 tot xx/xx/xx 00:00:

Het systeem zal ook op het einde van elke periode afhankelijk van het
wedstrijd mechanisme (votes / random / ...) een winnaar selecteren en
op de homepage plaatsen, hiervan wordt ook een mail gestuurd naar de
wedstrijd verantwoordelijke. (die ingesteld kan worden)

Het spreekt voor zich dat we moeten proberen te voorkomen dat er kan
valsgespeeld worden met de wedstrijd.

De Wedstrijdvorm mag je zelf creatief invullen, enkele voorbeelden:

- Vraag en antwoord + schiftingsvraag
- Vraag en antwoord op tijd -> snelste wint
- Code die (zogezegd) van op de verpakking hebt, elke code heeft 1
kans en mag 1x gebruikt worden. Op voorhand is bepaald welke
codes winnen en mensen krijgen die feedback direct
- Foto uploaden, foto met meeste votes wint
- Maak een moodboard met 1 of meerdere foto's die je bvb op flickr
kan selecteren
- Spelletje (je mag hier bestaande code van een spelletje gebruiken
die je in je wedstrijd implementeert)

Het spreekt voor zich dat de moeilijkheid van het wedstrijd mechanisme
ook een invloed op de punten gaat hebben.


Je maakt de opdracht op voorhand, levert deze in en zorgt voor
mondelinge toelichting op het examen. Je gebruikt Laravel om een
backend te schrijven. Voor frontend mag je gebruik maken van een
framework zoals bootstrap.

## Specificaties

Alle basis zaken moeten vervuld zijn om te kunnen slagen. **Let op** , dit
betekent niet dat je enkel de basis zaken moet uitvoeren om geslaagd te
zijn.

### Basis

- Homepage met uitleg over de wedstrijd en de prijzen die
gewonnen kunnen worden :white_check_mark:
- Duidelijke call to action naar pagina om deel te nemen :white_check_mark:
- Lijst met de winnaars van de vorige periodes (automatisch
gegenereerd) :white_check_mark:
- Als je deelneemt, moet je NAW + email gegevens ingeven. :white_check_mark:
- Hou het IP adres van de deelnemers bij :white_check_mark:
- Best practices in zaken formulier validatie (zowel front als backend
validatie!) / security etc... :white_check_mark:
- Een simpele backend waar je de lijst met de deelnemers kan
raadplegen met al hun gegevens en waar je mensen kan
diskwalificeren/verwijderen. (soft delete) :white_check_mark:
- Personaliseer je front-end door tweaks toe te voegen om het
geheel eigenheid te geven. Probeer de branding van je gekozen
merk wat te integreren. :white_check_mark:
### Extra

- Gebruik een externe provider om mails te versturen zoals Mandrill
of Mailgun :white_check_mark:
- Facebook connect ipv ingeven gegevens van deelnemer(Github Connect) :white_check_mark:
- Nodig een vriend uit voor extra win kansen
- Verstuur elke nacht een excel naar de wedstrijdverantwoordelijke
met de mensen die hebben meegedaan :white_check_mark:
- Export naar excel functionaliteit op de backend :white_check_mark:
- Maak de periodes e.d. configureerbaar via de admin :white_check_mark:
- Zorg ervoor dat elke deelname uniek is
- Je mag gerust creatief zijn en er extra zaken insteken / speciale
wedstrijd van maken

## Deadline

+/- 5 dagen voor het examen om 23:59. Exacte tijdstip komt op BB eens
examendag is gekend.

Project moet van in het begin al op git, elke keer je er op werkt
commit je ook daadwerkelijk.
Project wordt ook op C9 gedeployed en je geeft full access aan
sam.serrien@kdg.be

Je stuurt me per mail (sam.serrien@kdg.be):
- De link van je git project
- De link van je C9 project (IDE)
- de URL van een versie die online toegankelijk is
- Een link (dropbox/wetransfer/...) van een screencast/filmpje van
iemand die deelneemt aan het spel. Zie het als usability test en
demofilmpje + mocht je code op de examendag niet werken om
duistere redenen heb je alsnog een bewijs dat het wel zou moeten
werken
- Een deploy document, dit is een document dat kort uitlegt hoe je
project in elkaar zit, wat het nodig heeft, hoe je het op een server
moet deployen (= installeren) dus specifieke settings, cronjobs of
andere taken die er nog ingesteld moeten worden. Via dit
document zou een sysadmin in staat moeten zijn om je project op
te zetten zonder tussenkomst van de developer.

**Geen bestanden als e-mail attachment**

Op de dag van het examen breng je je laptop mee. Hier kan je de
opdracht en code op tonen en bepaalde delen toelichten.


