Leesmij-bestand
Dit is het leesmij bestand. Hier vinden we alle opdrachten terug die nodig zijn voor de inzendopgave.

Beschrijving van de bestanden die u gemaakt of geraakt hebt.

Alle models, views en controllers die ik heb aangemaakt zijn als PDF toegevoegd als bijlage. 
Hier staat een duidelijk overzicht van alle aangemaakte bestanden en ook een korte beschrijving over wat alles doet.

Bronbestanden

Volledige project heb ik geupload naar Github zodat dit project opgestart kan worden.
In de vorige inzendopgaven is gebleken dat ik mijn project niet kan inpakken en als bijlage kan toevoegen zodat deze weer geopend kan worden. 
Meerdere opties geprobeerd, Winrar, 7-zip, Windows maar de docent kreeg deze telkens niet geopend. 
Alle bestanden staan op Github.
Een verslag waarin u vermeldt wat de feedback op de vorige feedback opdracht was en wat u daarmee hebt gedaan.

‘’Ik moet mijn beroordeling alleen op visueel materiaal opstellen doordat u het project zelf niet hebt toegevoegd (-3). Kunt u dat de volgende keer wel doen?’’

Volledige project geüpload naar Github.
“De applicatie is netjes geprogrammeerd, maar weinig tot geen commentaar (-3).”

Commentaar toegevoegd aan alle Models, Views en Controllers.
Bij views vind je gemakkelijk commentaar bovenaan in de pagina. Bij Controllers en Modellen staat commentaar bij de functies over hetgeen wat deze functie doet.

“U laat in de video alleen de buitenkant van de applicatie zien (-5).”

Volledige project geüpload naar Github. Daarnaast heb ik in de video meer aandacht besteed aan de backend.
Een korte video (max. 3 min.) waarin u uw applicatie zowel vanbinnen als vanbuiten van een toelichting voorziet.

Video van mijn project met uitleg geupload naar Youtube. Overschrijd de max. 3 min maar in een kortere tijd kan ik het project niet fatsoenlijk laten zien met uitleg.
Uitwerking oefenopdracht 'Geavanceerde applicatieontwikkeling'

Stand van Zaken – Commodum Copia

1. Samenvatting werking applicatie

De Commodum Copia webapplicatie is een moderne Laravel webshop waarmee klanten eenvoudig boodschappen kunnen bestellen en thuis laten bezorgen. De applicatie is dynamisch ingericht en is gemakkelijk te beheren alsmede gemakkelijk te navigeren voor de gebruiker. Zowel klanten als admins kunnen inloggen; admins beheren producten, categorieën en bestellingen. De applicatie is beveiligd met authenticatie, autorisatie en CSRF-bescherming. Alle belangrijke CRUD-functionaliteiten zijn aanwezig en getest.


2. Testverslag

Geteste onderdelen en resultaten:


Functionaliteit 
Getest 
Resultaat 
Registratie en login
Ja
WErkt correct
Categorieën CRUD
Ja
Werkt correct
Producten CRUD
Ja
Werkt correct
Productdetails
Ja
Werkt correct
Winkelwagen
Ja
Werkt correct
Bestelling plaatsen
Ja
Werkt correct
Bestellingen beheren
Ja
Werkt correct
Admin beveiliging
Ja
Werkt correct
CSRF-protection
Ja
Werkt correct









Testmethode: 
Alle functionaliteiten zijn handmatig getest door in te loggen als admin en als gebruiker, producten toe te voegen, te bewerken, te verwijderen, bestellingen te plaatsen en te beheren. Ook is geprobeerd zonder inloggen adminpagina’s te bezoeken (toegang geweigerd).


3. Beschouwing beveiligingsrisico's

- Authenticatie & autorisatie: Alleen ingelogde gebruikers kunnen bestellingen plaatsen; alleen admins kunnen beheer pagina's bezoeken.
- CSRF-bescherming: Alle formulieren zijn voorzien van CSRF-tokens.
- Input Validatie: Alle gebruikersinvoer wordt gevalideerd op de server.
- Wachtwoord Beveiliging: Wachtwoorden worden gehasht opgeslagen.
- Bestand Uploaden: Alleen afbeeldingen zijn toegestaan bij uploaden, met validatie op extensie en grootte.
- Risico’s:  
  - SQL-injectie is afgevangen door gebruik van Eloquent ORM.
  - XSS wordt beperkt door gebruik van Blade-escaping.
  - Sessions worden ongeldig gemaakt bij uitloggen.

4. Beschouwing privacy

- Persoonsgegevens: Alleen noodzakelijke gegevens (naam, e-mail, adres) worden opgeslagen. En NAW gegevens voor de bestellingen.
- Privacybeleid: Er is een privacy policy beschikbaar voor gebruikers.
- Gegevensdeling: Gebruikersgegevens worden niet gedeeld met derden.
- Rechten gebruiker: Gebruikers kunnen hun gegevens inzien en aanpassen.
- Cookies: Alleen functionele cookies worden gebruikt (voor sessies en winkelwagen).

---

5. Reflectie

Wat ging goed?
1. De basisfunctionaliteit (producten, categorieën, bestellingen) werkt stabiel.
2. De beveiliging met middleware en CSRF is goed geïmplementeerd.
3. De code is overzichtelijk en grotendeels voorzien van commentaar.

Wat kan beter?
1. De gebruikersinterface kan nog gebruiksvriendelijker.

Wat moet beter?
1. Documentatie uitbreiden met meer technische details.
2. Privacybeleid aanpassen.
3. Meer aandacht voor foutafhandeling in de backend.

Uitwerking oefenopdracht 'Unittest in Laravel en Vue'

--------------
Goedendag hierbij de inzendopgaven.

Vele uren voor het opbouwen ben ik nu klaar om deze inzendopgaven te voltooien. Hoor graag of er nog verbeter punten zijn voordat ik de laatste inzendopgaven inzend. 
Hier is de video (link naar youtube) (als hyperlink niet werkt: https://youtu.be/3TQfzFwqB2E).
Verder heb ik weer een PDF toegevoegd met alle bestanden die zijn aangeraakt.
Zie graag reactie tegenmoet!
Danku

---------------

# README - Commodum Copia Frontend
## Inhoudsopgave
1. Inleiding
2. Projectstructuur
3. Beschrijving van de Bestanden
4. Functionaliteiten
5. Toekomstige Verbeteringen
---
## 1. Inleiding
Goedendag,
Bij deze de inzendopgave 32760FA2. Hopende dat ik feedback kan krijgen
die ik kan gebruiken voor de verplichte en laatste inzendopgaven.
We hebben vele stappen gemaakt sinds de eerste inzendopgaven. Alles
wordt dynamisch weergegeven op de website en alles wordt netjes
bijgehouden in databases.
Verder hebben wij autorisaties en authenticaties, winkelwagen
functionaliteiten en gedetailleerde product pagina.
Verder bieden wij onder andere ook CSRF bescherming en worden bepaalde
routes afgeschermed door middlewares.
---
## 2. Projectstructuur
```
ecommerce/
│── app/
│ ├── Http/
│ │ ├── Controllers/
│ │ │ ├── Backend/
│ │ │ │ ├── AdminProfileController.php
│ │ │ │ ├── BrandController.php
│ │ │ │ ├── CategoryController.php
│ │ │ │ ├── ProductController.php
│ │ │ │ ├── SliderController.php
│ │ │ │ ├── SubCategoryController.php
│ │ │ ├── Frontend/
│ │ │ │ ├── CartController.php
│ │ │ │ ├── IndexController.php
│ ├── Models/
│ │ ├── Admin.php
│ │ ├── Brand.php
│ │ ├── Category.php
│ │ ├── MultiImg.php
│ │ ├── Order.php
│ │ ├── OrderItem.php
│ │ ├── Product.php
│ │ ├── Slider.php
│ │ ├── SubCategory.php
│ │ ├── SubSubCategory.php
│ │ └── User.php
├── public/
│ ├── assets/
│ ├── css/
│ ├── frontend/
│ ├── js/
│
├── resources/
│ ├── views/
│ │ ├── backend/
│ │ │ ├── product/
│ │ │ │ ├── product_edit.blade.php
│ │ │ │ ├── product_view.blade.php
│ │ │ ├── category/
│ │ │ │ ├── subcategory_view.blade.php
│ │ │ │ ├── sub_subcategory_view.blade.php
│ │ │ ├── slider/
│ │ │ │ ├── slider_view.blade.php
│ │ │ │ ├── slider_edit.blade.php
│ │ ├── frontend/
│ │ │ ├── index.blade.php
│ │ │ ├── main_master.blade.php
│ │ │ ├── producten.blade.php
│ │ │ ├── checkout/
│ │ │ │ ├── checkout_view.blade.php
│ │ │ └── body/
│ │ │ ├── footer.blade.php
│ │ │ ├── header.blade.php
│ │ │ ├── subcategory_products.blade.php
│ │ │ └── subsubcategory_products.blade.php
├── routes/
│ ├── web.php
│
└── README.md
```
---
## 3. Beschrijving van de Bestanden
Backend Controllers
AdminProfileController.php: Beheert de functionaliteiten voor het
profiel van de admin, zoals het bekijken en bewerken van
profielgegevens.
BrandController.php: Beheert merken (brands), inclusief toevoegen,
bewerken, en verwijderen van merken.
CategoryController.php: Beheert categorieën, inclusief
CRUD-functionaliteiten voor categorieën.
ProductController.php: Beheert producten, inclusief toevoegen,
bewerken, verwijderen en het uploaden van meerdere afbeeldingen.
SliderController.php: Beheert sliders op de homepage, inclusief het
toevoegen, bewerken en verwijderen van sliders.
SubCategoryController.php: Beheert subcategorieën en
sub-subcategorieën, inclusief CRUD-functionaliteiten.
Frontend Controllers
CartController.php: Beheert winkelwagenfunctionaliteiten, zoals
producten toevoegen, verwijderen en het toepassen van kortingscodes.
IndexController.php: Beheert de homepage en algemene
frontend-functionaliteiten, zoals het ophalen van categorieën, sliders
en producten.
Models
Admin.php: Model voor admin-gebruikers, inclusief authenticatie en
profielbeheer.
Brand.php: Model voor merken (brands).
Category.php: Model voor categorieën.
MultiImg.php: Model voor het beheren van meerdere afbeeldingen per
product.
Order.php: Model voor bestellingen.
OrderItem.php: Model voor items in een bestelling.
Product.php: Model voor producten.
Slider.php: Model voor sliders op de homepage.
SubCategory.php: Model voor subcategorieën.
SubSubCategory.php: Model voor sub-subcategorieën.
User.php: Model voor gebruikers.
Blade Templates
main_master.blade.php: Hoofdlayout van de website, bevat gedeelde
componenten zoals de header en footer.
index.blade.php: Bevat de homepage van de website.
producten.blade.php: Bevat de productenpagina.
product_edit.blade.php: Bevat de pagina voor het bewerken van producten
in de backend.
product_view.blade.php: Bevat de weergave van producten in de backend.
subcategory_view.blade.php: Bevat de weergave van subcategorieën in de
backend.
sub_subcategory_view.blade.php: Bevat de weergave van
sub-subcategorieën in de backend.
slider_view.blade.php: Bevat de weergave van sliders in de backend.
slider_edit.blade.php: Bevat de pagina voor het bewerken van sliders in
de backend.
checkout_view.blade.php: Bevat de weergave van de checkoutpagina.
header.blade.php: Bevat de header van de website.
footer.blade.php: Bevat de footer van de website.
cart.blade.php: Bevat de weergave van de winkelwagen.
wishlist.blade.php: Bevat de weergave van de verlanglijst.
product_details.blade.php: Bevat de weergave van productdetails.
subcategory_products.blade.php: Bevat de weergave van producten in een
subcategorie.
subsubcategory_products.blade.php: Bevat de weergave van producten in
een sub-subcategorie.
Routes
web.php: Bevat alle routes voor zowel de frontend als de backend van de
applicatie.
---
## 4. Functionaliteiten
- **Navigatiestructuur** volgens de specificaties.
- **Dynamische Blade-template** voor herbruikbare componenten.
- **Responsive Design** voor desktops en mobiele apparaten.
- **CRUD-functionaliteiten** voor producten, categorieën, merken en
sliders.
- **Winkelwagenfunctionaliteiten**
---
## 5. Toekomstige Verbeteringen
- Zoals deze in de aankomende opdrachten worden aangegeven.
---
"# -Commodum_Copia-_LOI"
