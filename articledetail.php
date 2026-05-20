<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body >
    
<?php 
require_once 'database.php';

if(isset($_GET['id'])){
//-------------------------------------------------------------------------------------------------------------------------
    $sql = 'SELECT  article.title, article.perex, article.created_at, article.text, author.name, author.surname,author.id FROM article
    INNER JOIN author on article.author_id = author.id
    INNER JOIN article_category on article_category.article_id = article.id
    WHERE article.id = :id 
    ';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);

    $article = $stmt->fetch();
//-------------------------------------------------------------------------------------------------------------------------

    $acsql = 'SELECT article_category.article_id, article_category.category_id, category.name FROM article_category
    INNER JOIN category on category.id = article_category.category_id
    ';
    $acstmt = $conn->query($acsql);

    $ac = $acstmt->fetchall();
//-------------------------------------------------------------------------------------------------------------------------
}
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
<div class="main">
<h1 class="articleTitle"><?= $article['title'] ?></h1>
<p><?= $article['perex'] ?></p>
<p><?= date_format(date_create($article['created_at']),'d.m.Y H:i') ?> <a class="articleHREF" href="authorfilter.php?id=<?= $article['id'] ?>"><?= $article['name'] ?> <?= $article['surname'] ?></a></p>
<p>Kategorie:   
<?php foreach ($ac as $a): ?>
    <?php if ($_GET['id']==$a['article_id']): ?>
            
        <a class="articleHREF" href="categoryfilter.php?id=<?= $a['category_id'] ?>"><?= $a['name'] ?></a>
        
    <?php endif; ?>        
<?php endforeach; ?>    
</p>
<hr>

<div class="article"><?= $article['text'] ?></div>

</div>

</body>
</html>