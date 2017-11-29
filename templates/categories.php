
<!--=============== DPO demo categories template-------------------------------


<div class="container">
        <h1 class="mt-4 mb-3">Categories</h1>
        
        <!-- mwilliams:  breadcrumb navigation -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>            
        </ol>
        <!-- end breadcrumb -->
        



        <div>

<?php

               // 1- get the configuration file that holds the connection info =======
              include './includes/config.php';
              
              // 2-============== CONNECT TO THE DATABASE +===========================
              include MYSQL;
              //var_dump($dbc);
              
              //3- get the total of number of records in categories table
              $sql='SELECT COUNT(*) FROM categories';
              $stmt=$dbc->query($sql); //execute the query
              //
  //============================ QUERY IS OBJECT ORIENTED==========================================
              $cnt=$stmt->fetchColumn(); // get one column result
              
              
              //4 display total number of categories
               echo "<h2>Total Categories: $cnt</h2>";
              
              // 5- build the SQL query to retrieve all categories
              $q="Select id, category from categories order by 1";
              
              //6- execute the query
              $stmt=$dbc->query($q);
              $category_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
              //THE LAST CODE IS AN ARRAY
              
             // var_dump($category_list);
             // start the list
             echo "<ul class='list-group'>";
             echo '<li class="list-group-item active">Select a Category</li>';
             
              // 7-loop the array and display in UL list
              foreach ($category_list as $row){
                echo "<li class='list-group-item'>
                        <a href='articlesbycategory.php?id={$row['id']}&name={$row['category']}'>{$row['category']}</a>
                        </li>";
                        
              }
            //end list
              echo "</ul>";
?>

 </DIV>