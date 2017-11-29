<!--      ======  PDO  ARTICLE PAGE  IN THE TEMPLATE===============-->



<div class ="article">
    <div class ="row">
        <h1 class = "mt-4 mb-3">article</h1>
    </div>
   
<?php

    //var_dump($_GET);
    // 1- retrieve the id parameter from the url  ( querystring )

    if (  isset($_GET['id']) && is_numeric($_GET ['ID'])  ){
    $id = $_GET('id');
    
    
    //2- GET THE DATABASE CONFIGURATION FILES
    require './includes/config.php';
    
    //3- CONNECT TO DATABASE
    require MYSQL;
    
    //4- BUILD THE SQL QUERY USING A PREPARED STATEMENT
    $stmt = $dbc->prepare("select id, title, content from pages where id =:id");
    
    // USING PDO PREPARED STATMENT WITH THE FOLLOWING NAMED PARAMETER
    // :id
    //BIND THE PARAMETER
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    
    //5- EXECUTE THE QUERY
    $stmt->execute();
    
    //6- FETCH THE RECORDS
     $article_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
     
     //var_dump($article);
     
     //7- DISPLAY THE ARCTICLE
     foreach($article as $row){
         echo "<ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
            <li class='breadcrumb-item'><a href='articles.php'>Articles</a></li> 
            <li class='breadcrumb-item active'>{$row['title']}</li>
    </ol>";
            
            
            echo "<h2 class='mt-3 mb-3'>{$row['title']}</h2>";
            echo $row['content'];
            
            
     }
    
    }
?>

</div>