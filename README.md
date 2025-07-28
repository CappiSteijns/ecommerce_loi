# README - Commodum Copia Frontend

## Inhoudsopgave
1. Inleiding
2. Projectstructuur
3. Functionaliteiten

---

## 1. Inleiding
Goedendag,


Bij deze de inzendopgave 32760FA2. Hopende dat ik feedback kan krijgen die ik kan gebruiken voor de verplichte en laatste inzendopgaven.

We hebben vele stappen gemaakt sinds de eerste inzendopgaven. Alles wordt dynamisch weergegeven op de website en alles wordt netjes bijgehouden in databases. 

Verder hebben wij autorisaties en authenticaties, winkelwagen functionaliteiten en gedetailleerde product pagina. 

Verder bieden wij onder andere ook CSRF bescherming en worden bepaalde routes afgeschermed door middlewares. 


---

## 2. Projectstructuur
```
ecommerce/
app/
│
├── Http/
│   ├── Controllers/
│   │   ├── Backend/
│   │   │   ├── AdminProfileController.php # Beheren van de admin pagina.
│   │   │   ├── BrandController.php # CRUD voor de brands
│   │   │   ├── CategoryController.php #  CRUD voor de categorieen
│   │   │   ├── ProductController.php # CRUD coor de producten
│   │   │   ├── SliderController.php # CRUD voor de sliders
│   │   │   ├── SubCategoryController.php # CRUD voor de sub categorieen
│   │   ├── Frontend/
│   │   │   ├── CartController.php # Winkelwagen functionaliteiten
│   │   │   ├── IndexController.php # Homepage, profiel, wachtwoord, productdetails, categorie-weergave
│   │   ├── User/
│   │   │   ├── AllUserController.php # Overzicht van de bestellingen voor gebruikers
│   │   │   ├── CartPageController.php # Weergave en beheren van de winkelwagenpagina
│   │   │   ├── CheckoutController.php # Checkout en betaalmethode selectie
│   │   │   ├── StripeController.php # Afhandelen van betaling
│   │   ├── AdminController.php # Admin login en logout
│
├── Models/
│   ├── Admin.php # Model voor admin-gebruikers
│   ├── Brand.php # Model voor brands
│   ├── Category.php # Model voor categorieen
│   ├── MultiImg.php # Model voor meerde afbeeldingen
│   ├── Order.php # Model voor bestellingen
│   ├── OrderItem.php # Model voor items in een bestelling
│   ├── Product.php # Model voor producten
│   ├── Slider.php # Model voor sliders
│   ├── SubCategory.php # Model voor subcategorieen
│   ├── SubSubCategory.php # Model voor sub-subcategorieen
│   └── User.php # Model voor gebruikers
resources/
│
├── views/
│   ├── backend/ # backend is voor de admin only
│   │   ├── product/
│   │   │   ├── product_edit.blade.php # Pagina voor het bewerken van producten
│   │   │   ├── product_view.blade.php # Pagina om de producten te zien.
│   │   ├── category/
│   │   │   ├── subcategory_view.blade.php # pagina om subcategorieen te zien
│   │   │   ├── sub_subcategory_view.blade.php # pagina om de sub-sub categorieen te zien
│   │   ├── slider/
│   │      ├── slider_view.blade.php # Pagina om sliders te zien
│   │      ├── slider_edit.blade.php # Pagina om de sliders te bewerken.
│   │   
│   ├── frontend/ # Pagina's voor de gebruikers
│      ├── index.blade.php # Home pagina
│      ├── main_master.blade.php # Bevat de layout voor alle pagina's. Header en footer
│      ├── producten.blade.php # Toont de producten
│      ├── checkout/
│      │   └── checkout_view.blade.php # De checkout pagina
│      └── body/
│          ├── footer.blade.php # Footer van de website
│          ├── header.blade.php # Header van de webbbsite
│          ├── cart.blade.php # Winkelwagen pagina
│          ├── product_details.blade.php # detailspagina van een product
│          ├── subcategory_products.blade.php # Producten van subcategorie
│          └── subsubcategory_products.blade.php # Producten van sub-sub categorieen
routes/
│   └── web.php # Alle routes voor front en backend
│
└── README.md
```


## 3. Functionaliteiten
- **Navigatiestructuur** volgens de specificaties.
- **Dynamische Blade-template** voor herbruikbare componenten.
- **Responsive Design** voor desktops en mobiele apparaten.
- **CRUD-functionaliteiten** voor producten, categorieën, merken en sliders.
- **Winkelwagenfunctionaliteiten**

---