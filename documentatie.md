# Documentatie Stoodle

### Framework-uri utilizate
 - Laravel
 - Vue.js

### Limbaje de programare folosite
- PHP
- HTML(limbaj de tag-uri)
- CSS(limbaj de tag-uri)
- Javascript
- MySQL

### Libraries
- [Bootstrap](https://getbootstrap.com/)
- [Font-awesome](https://fontawesome.com/)
- [Axios.js](https://github.com/axios/axios)

### Packages(in afara de cele ce vin cu laravelul)
- [Laravel-cookie-consent](https://github.com/spatie/laravel-cookie-consent)
- [Socialite](https://github.com/laravel/socialite)
- [Intervention-Image](http://image.intervention.io/)
- [Iseed](https://github.com/orangehill/iseed)

### Ce este nou fata de etapa intermediare
- Crearea unui admin panel care permite intretinerea aplicatiei mult mai usor
- Utilizare framework-urilor Laravel si Vue.js
- Utilizarea unor tehnici de programare de calitate si respectarea conventiilor de naming si scris cod(PSR)
- Cum se hosteaza un website pe un VPS
- Testing
### Provocările întâlnită pe parcursul acestui proiect

Pentru noi cea mai grea parte a proiectului __Stoodle__ a fost creeare unui algoritm care să găsească cea mai potrivită facultate pentru user, dar și crearea panelului de admin care iti da posibilitatea sa administrezi aplicatia fara sa fie nevoie sa stii cod. Cateva dintre obstacolele intâlnite au fost:

#### Crearea unui formular
> Cert aceasta a fost cea mai dificilă parte a întregului proiect deoarece nu a constat în alegerea unui tehnici de programare ci în găsirea unui set de întrebări psihologici care să determine personalitatea __unică__ a fiecărui user.
### Găsirea unui mod optim de si precis de a utiliza informația
> Dacă la crearea formularului problema a fost că nu știam ce întrebări ar trebuii adresate la un astfel de formular aici problema a stat cu totul altfel. A trebuit sa ne gandim cum sa facem administrarea acestei aplicatii o placere nu o problema, asa am ajuns a crearea unui admin panel, care iti permite sa editezi toata logica din spatele aplicatiei.
### Determinarea compabilității de tip user facultate
> Ultimul hop înainte de a intra pe linie dreaptă ca să terminăm Stoodle(așa creadeam noi). După ce am folosit psihologie și informatică acum este timpul matematicii din noi să strălucească.
A trebuit să venim cu formulă care să determine compabilitatea de tip user facultate. După altă zi în care ne-am bătut capul am reușit: `(suma_compatibila_user/suma_compatibila_facultate) * 100`. Dacă doriți să vedeți tot codul îl puteți găsi în `app/Http/Controllers/SortTrait.php`
### Adaugarea și scoatere facultăților de la favorite
> Față de ceea ce a trebuit să înfruntăm la crearea algoritmului pentru compabilitatea dintre user si facultate
### RESTful resource controllers pentru facultati si univeristati
> Pentru a ne usura munca am creat 2 RESTful Resource Controllers pentru universitate si facultate ce ne usureaza mult munca pentru intretinerea aplicatiei.


### Ce am învățat din acest proiect?
- Conventii de naming si de scris cod(ca sa inteleaga si altcineva ce am vrut sa facem)
- Utilizarea framework-urilor Laravel si Vue.js
- Cum se da deploy la o aplicatie complexa scrisa intr-un framework
- Cum se configureaza un VPS 
- Cum se scrie o baza de date corect in MySQL 
- Cum functioneaza PUT/PATCH si DELETE.
- Utilizarea Ajax si Axios.js
- OOP
- Testing

### Cum am continua dezvoltarea Stoodle
- O refactorizare a codului
- Mărirea bazei de date
- Mici modificări de design
- Optimizare pentru ca aplicatia sa fie cat mai rapida posibil

### Cum să intalezi proiectul
1. Mai intai este nevoie de composer si node.js si de XAMPP/WAMPP 
2. Downloadați stoodle-master.
3. Dezarhivați-l în XAMPP/htdocs/.
4. Redenumiți-l în Stoodle.
5. Composer install si npm install pentru a instala toate dependentele 
6. Rulati php artisan migrate:fresh --seed pentru a rula migratiile si seed-urile