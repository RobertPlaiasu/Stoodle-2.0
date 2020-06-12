# Documentatie Stoodle

### Limbaje de programare folosite
- PHP
- HTML(limbaj de tag-uri)
- CSS(limbaj de tag-uri)
- Javascript

### API-uri folosite
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
    > Cum se seteaza PHPMailer?(se găsește în createphp.php și în resetphp.php)
    Ca PHPMailerul să funcționeze trebuie să se atribuie lui $mail->Username o adresă de mail validă,și trebuie pusă și parola corespunzatoare mail-ului în $mail->Password.După trebuie sa primți un mail în legatură cu securitatea contului in care ii spuneți că dumneavoastră ați accesat acel ip.In acelasi timp trebuie să vă asigurați că sunt permise  aplicațiile mai puțin [sigure](https://myaccount.google.com/security).


### Libraries
- [Jquery](https://jquery.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Font-awesome](https://fontawesome.com/)

### Provocările întâlnită pe parcursul acestui proiect

Pentru noi cea mai grea parte a proiectului __Stoodle__ a fost creeare unui „AI” care să găsească cea mai potrivită facultate pentru user, dar și creeare posibilității de a adauga și a scoate anumite facultați de la favorite. Cateva dintre obstacolele intâlnite au fost:

#### Crearea unui formular
> Cert aceasta a fost cea mai dificilă parte a întregului proiect deoarece nu a constat în alegerea unui tehnici de programare ci în găsirea unui set de întrebări psihologici care să determine personalitatea __unică__ a fiecărui user.
### Găsirea unui mod optim de si precis de a utiliza informația
> Dacă la crearea formularului problema a fost că nu știam ce întrebări ar trebuii adresate la un astfel de formular aici problema a stat cu totul altfel. Având acces la atâtea tehnici de programare a trebuit să alegem una. Aici proiectul a început să se zdruncine. Pur și simplu aveam idei diferite de aplicare a „AI”. Unul voia cu backtracking altul cu creearea unui șlabon al cadidatului ideal pentur fiecare facultate. Am pierdut o zi de lucru pentru a realiza că __A fără B nu se poate și nici B fără A__.
### Determinarea compabilității de tip user facultate
> Ultimul hop înainte de a intra pe linie dreaptă ca să terminăm Stoodle(așa creadeam noi). După ce am folosit psihologie și informatică acum este timpul matematicii din noi să strălucească.
A trebuit să venim cu formulă care să determine compabilitatea de tip user facultate. După altă zi în care ne-am bătut capul am reușit: `(suma_compatibila_user/suma_compatibila_facultate) * 100`. Dacă doriți să vedeți tot codul îl puteți găsi în `./pages/functii/functii.php`
### Adaugarea și scoatere facultăților de la favorite
> Față de ceea ce a trebuit să înfruntăm la crearea „AI-ului”, acum trebuie să creeăm această funcție de favorite. Două lucruri de precizat:
1. Noi când am ales să adaugăm aceasta funcție site-ului nu am știut că cel mai bine favorabil este de facut cu __AJAX__, pentru că dă refresh la baza de date fără se de-a refresh la pagină.
2. Niciunul nu știe __AJAX__.
Să înceapă distracția! Cum reușim sa facem asta eficient fără AJAX? CUM FACEM BAZA DE DATE?? Exact în acel moment de cumpănă pe Robert(Back-end Developer) l-a lovit: __un tabel care salvează id-ul userului, indexul facultății și tip-ul de user(ar puteam să se conecteze cu Google). Principala problemă cu această abordare este faptul că este neeficient, însă cu sort și o mică căutare binară chiar ar putea fi decent. Zis și făcut am trecut și această idee în cod și trbuie sa recunosc este chiar eficient... _oarecum_.

### Ce am învățat din acest proiect?
- faptul că AJAX este foarte relevant.
- diferite tehnici de refactorizare
- am aprofundat limbajule de programare folosite
- lucru în echipă
- să lucrăm sub ceas
Am învățat atât de multe lucruri încât nici nu am cum să le înșir pe toate

### Cum am continua dezvoltarea Stoodle
- Optimizări, multe optimizări
- Mărirea bazei de date cu facultăți
- Mici modificări de design

### Cum să intalezi proiectul
1. Downloadați stoodle-master.
2. Dezarhivați-l în XAMPP/htdocs/.
3. Redenumiți-l în Stoodle.
4. Adaugați baza de date cu numele stoodle în phpmyadmin.
5. Intrati in pages\foldereset\resetphp.php si in pages\folderlogin\signupphp.php schimbati la liniile 75,76,77 (resetphp.php), respectiv 185,186,187(signupphp.php) si schimbati adresa si parola adresei de email.