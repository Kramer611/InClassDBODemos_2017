
<!----------------- PDO      articles template  --------------------------->

<div class="container">
    <h1 class="mt-4 mb-3">Articles</h1>

    <!-- mwilliams:  breadcrumb navigation -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Articles</li>            
    </ol>
    <!-- end breadcrumb -->
    
    <?php
    //1. get the configuration file (holds the connection info)
        require './includes/config.php';

        //2.connect to the database
        require MYSQL;
        
         //3- get the total of number of records in categories table
              $sql='SELECT COUNT(*) FROM pages';
              $stmt=$dbc->query($sql); //execute the query
             
              
              //get first colum from first row in resultset
              $cnt=$stmt->fetchColumn(); // get one column result

        //4.  BUILD THE SQL QUERY TO RETRIEVE ALL ARTICLES
        $q = "SELECT id, title, description FROM pages;";

        //6.  Execute the query
        $stmt = $dbc->query($q);
        
        //7- fetch all records from the satement above
        $article_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        //8- loop and display the article pages in html table
        //start table
        
        echo "<table class='table table-striped table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>";
        
        foreach ($article_list as $row){
            echo "<tr>
                      
                      <td><a href='article.php?id={$row['id']}'>{$row['title']}</a></td>
                      <td>{$row['description']}</td>
                  </tr>";
        }
        
        // hyperlink will look this this:
        // <a href='article.php?id={$row['id']}'>{$row['title']}</a>
        // 
            //end the table
        echo "</tbody>"
    
    ?>
</DIV>