<!-----------  ADDCATEGORY  IN THE TEMPLATE -->

<!-- mwilliams:  breadcrumb navigation -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Add Category</li>            
</ol>
<!-- end breadcrumb -->
<?php

    //1 - CHECK IF FORM WAS SUBMITTED
    if($_SERVER['REQUEST_METHOD']=='POST'){
    var_dump($_POST);
$category = trim( filter_var($_POST['category'],FILTER_SANITIZE_STRING)  );
       
        //Test if user enterd something
       if(!empty($category)) {
           //1. get our configuration files and connect to database
        require './includes/config.php';

       
        require MYSQL;
        
        // BUILD OUR INSERT STATMENT
        $stmt = $dbc->prepare("INSERT INTO categories(categories)
                                VALUES (:category");
        
        
        // BIND OUR NAMED PARAMETER :CATEGORY TO USER INPUT VALUE
        $stmt->bindValue(':category',$category,PDO::PARAM_STR);
        
        try{
            //TRY TO EXECUTE THE QUERY
            $stmt->execute();
            echo"<div class='alert alert-success' role='alert'>
                This category <strong>$category</strong> has been inserted! <br>
                    <a href=''>Add another</a>
                </div>";
        } catch (Exception $ex) {
            $code=$ex->getCode();
            
            $message ='Unknown syntax error!';
            if($code ==23000){
                
            }
            
            //IF AN ERROR OCCURS IT WILL BE TRAPPED HERE
            
            echo"<div class='alert alert-danger' role='alert'>
                This category <strong>$category</strong> was not inserted!
                 due to a system error!<br>".
                 $ex->getmessage().
                  "<p><a href=''>Please try again</a></p>  
                    </div>";
            
                
        }  // END OF TRY CATCH BLOCK
       

       }

    } else{
        
    
?>

<form class="form-inline" method="post" action="addcategory.php">
    <div class="form-group mx-sm-3">
        <label for="category" class="sr-only">category</label>
        <input type="text" class="form-control" 
               id="category" name ="category"
               placeholder="Enter the category">
    </div>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>

<?php

    }
 ?>

