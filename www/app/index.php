<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

require_once('./utils/db.php');

if(isset($_GET['slug'])&&!empty($_GET['slug'])){
    $slug = $_GET['slug'];
    $slug = strtolower(trim($slug));
}else{
    $slug="home";
}

try {
    $pagesPrep = $db->prepare("SELECT * FROM pages WHERE slug='$slug'");
    $pagesPrep->execute();
    $pages = $pagesPrep->fetchAll(PDO::FETCH_OBJ);

    if(count($pages)>0){
        foreach ($pages as $page){
            echo "<h1>$page->title<h1>";
            echo $page->content;
        }
    }else{
        http_response_code(404);
        print(http_response_code(404));
        die();
    }

}catch(PDOException $e){
    var_dump($e->getMessage());
}
?>
</body>
</html>
