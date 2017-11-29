<!--------------- articlesbycategory in the template ------------------------------>

<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];
}else{
    $name = 'Articles by Category';
}
    

?>


<div class ="article">
    
        <h1 class = "mt-4 mb-3"><?php echo $name;?></h1>
        
        
    <!-- mwilliams:  breadcrumb navigation -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href='categories.php'>categories</li>
        <li class="breadcrumb-item active"><?php echo $name;?></li>
    </ol>
    <!-- end breadcrumb -->
    
    
<?php

    if (  isset($_GET['id']) && is_numeric($_GET ['id'])  ){
    $catid = $_GET['id'];
    
    
    //2- GET THE DATABASE CONFIGURATION FILES
    require './includes/config.php';
    
    //3- CONNECT TO DATABASE
    require MYSQL;
    
    //4- BUILD THE SQL QUERY USING PDO PREPARED STATMENT
    $stmt = $dbc->prepare("select id, title, description  
                            from pages
                            where category_id=:id");
    
    //BIND THE PARAMETER
    $stmt->bindValue(':catid',$catid,PDO::PARAM_INT);
    
    
    //5- EXECUTE THE QUERY
    $stmt->execute();
    
    
    //6- FETCH THE RECORDS
    $articles = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    //var_dump($articles);
    
  echo  '<div class="row">';
  //LOOP THE ARTICLES ARRAY AND DISPLAY EACH AS A CARD WITHIN 3 COLUMN GRID
  foreach($articles as $row){
      ?>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header"><?php echo $row['title']?></h4>
            <div class="card-body">
              <p class="card-text"><?php echo $row['description']?></p>
            </div>
            <div class="card-footer">
              <a href="articles.php?id=<?php echo $row['id']?>" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>
    <?php
  }
    echo '</div>';
       

    }else{
    
    
    ?>
    <div class="alert alert-warning" role="alert">
        This page has been access in error! <br>
        <a class='btn btn-warning' href ='categories.php'>View all catetories</a>
    </div>
    
    <?php
    }
?>
    
</div>

