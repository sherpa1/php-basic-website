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
            echo $page->title;
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
