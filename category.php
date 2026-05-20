<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
    
<?php 
require_once 'database.php';
//-------------------------------------------------------------------------------------------------------------------------
    $sql = 'SELECT * FROM category';

    $stmt = $conn->query($sql);

    $category = $stmt->fetchALl();
//-------------------------------------------------------------------------------------------------------------------------


?>

<header>
    <div>
        <a class="odkazy" href="index.php">Zprávy</a>
        <a class="odkazy" href="category.php">Kategorie</a>
        <a class="odkazy" href="author.php">Autoři</a>
        <a class="odkazy" href="administration.php">Administrace článků</a>
        <a class="odkazy" href="articleadd.php">Přidat článek</a>
    </div>
</header>

<?php foreach ($category as $c): ?>

    <div class="CategoryAuthor">
   
        <h3><?= $c['name'] ?></h3>
        <a class="CategoryAuthorA" href="categoryfilter.php?id=<?= $c['id'] ?>">Zobrazit články</a>
    </div>   

  
<?php endforeach; ?>

</body>
</html>