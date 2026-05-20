# PHP News

Jednoduchý PHP zpravodajský web s administračním rozhraním. Umožňuje přidávat, upravovat a mazat články, spravovat autory a kategorie.

## Funkce

- Zobrazení nejnovějších článků na hlavní stránce
- Detail článku s plným textem
- Filtrování článků podle autora nebo kategorie
- Administrační panel (přidávání, editace, mazání článků, autorů a kategorií)
- WYSIWYG editor článků (TinyMCE 5)
- Registrace a přihlášení autorů se zahashovaným heslem (bcrypt)
- Responzivní design (mobil, tablet, desktop)
- JS animace (fade-in karet, ripple efekt tlačítek, scroll efekt headeru)

## Technologie

- **Backend:** PHP, PDO
- **Databáze:** MySQL
- **Frontend:** HTML, CSS (vlastní, bez frameworku), vanilla JavaScript
- **Editor:** TinyMCE 5

## Struktura projektu

```
PHP news/
├── index.php           # Hlavní stránka — seznam článků
├── articledetail.php   # Detail článku
├── articleadd.php      # Přidání článku
├── articleedit.php     # Editace článku
├── articledelete.php   # Smazání článku
├── administration.php  # Administrační panel
├── author.php          # Seznam autorů
├── authoradd.php       # Registrace / editace autora
├── authordelete.php    # Smazání autora
├── authorfilter.php    # Články podle autora
├── category.php        # Seznam kategorií
├── categoryadd.php     # Přidání / editace kategorie
├── categorydelete.php  # Smazání kategorie
├── categoryfilter.php  # Články podle kategorie
├── login.php           # Přihlášení
├── logout.php          # Odhlášení
├── database.php        # Připojení k databázi (PDO)
├── style.css           # Styly
├── main.js             # Animace a interaktivita
└── js/tinymce/         # WYSIWYG editor
```

## Přihlášení

Administrace je dostupná po přihlášení. Nový účet lze vytvořit přes odkaz **Registrace** na hlavní stránce (bez nutnosti být přihlášen).
