# Full stack stage opdracht

De bestanden in deze map bevatten de NC-Websites stage opdracht voor een stagiair full stack development. Door het uitvoeren van deze opdracht willen we graag peilen waar jouw kennis en kunnen liggen zodat we weten of we jou verder kunnen helpen. We willen daarom ook zien of je HTML kan schrijven, PHP code van een ander kan lezen, en zelf natuurlijk ook wat logica kan schrijven. De taken variëren van de juiste functie zoeken en aanroepen tot het zelfstandig uitlezen van door de gebruiker opgestuurde data.

Kom je er niet helemaal uit? Geen probleem we verwachten niet dat iedereen het zal afronden. Ook al is het niet succesvol afgerond betekend dit niet meteen dat we jou niet als stagiair willen hebben. We willen hiermee graag inzicht krijgen in jouw kennen en kunnen, dus willen we graag horen hoe het ging, wat je wel en niet gedaan kreeg, en hoe je dat gedaan hebt.

## De applicatie

De applicatie moet een todo lijst kunnen weergeven waarmee de gebruiker items kan toevoegen aan een lijst. Deze lijst word in een sessie bijgehouden (er is al een class die dit kan bijhouden). 

Hierin is het niet relevant dat de taken weer aangepast of verwijderd kunnen worden (we houden het graag kort en simpel: het moet je immers geen uren tijd kosten om dit te kunnen doen).

## De code

We hebben alvast wat code voor jou opgezet dat het [MVC model](https://nl.wikipedia.org/wiki/Model-view-controller-model) volgt, wellicht al op school geleerd, wellicht nog niet. Hierin wordt de applicatie in mooie stukjes opgedeeld zodat je dit gemakkelijk kan hergebruiken en een aanpassing maken maar even werk is. De bestanden zijn als volgt in de mappen ingedeeld:

- Controllers, hier staat de code om de data van de applicatie te beheren.
- Routes, hier staat de logica in van de pagina's die de gebruiker kan bezoeken.
- Services, hier staat code in voor de applicatie dat niet direct bij data hoort.
- Views, hier staat de code voor het weergeven van de data.

Als je de pagina bezoekt zul je zien dat het nog niet helemaal werkt, we hebben namelijk nog wat code eruit gehaald om alles goed te laten functioneren. In de volgende bestanden hebben we wat open eindes staan:

1. `Views/ItemView.php::one()`, hier willen we graag zien of je een item goed kan weergeven.
2. `Routes/Item/CreateRoute.php::get()`, hier willen we graag zien of je een formulier kan maken waarmee een item kan worden toegevoegd.
3. `Routes/Item/CreateRoute.php::post()`, hier willen we graag zien of je nadat een formulier opgestuurd is dat juist kan afhandelen: waarbij dit aan de sessie word toegevoegd.
4. `Controllers/ItemController.php::add()`, hier willen we graag zien of je gebruik kan maken van de sessie service.

We raden aan dat je de problemen in de volgorde hierboven aanpakt. Na het eerste punt opgelost te hebben zal je al zien dat zich standaard al een punt in laadt in plaats van de "Hello item!" tekst. 

Verder moet het er ook een beetje mooi uit zien, we hebben daarom  alvast [Bootstrap 4](https://getbootstrap.com/docs/4.6/getting-started/introduction/) voor je in geladen, maar hierin laten we je verder helemaal vrij.