    <!--------------------------------PDO  NAV_MENU IN INCLUDES====================== -->
<!-- 
<ul class="navbar-nav ml-auto">
         <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>

          </ul> -->



<ul class="navbar-nav ml-auto">
<?php
    //Convert above static menu to a dynamic menu using an array of labels and pages
    //to allow us to dynamically set the active menu item based on the current page the user 
    //is currently visiting

    $pages = array(
        'Home'=>'/InClassPDODemo/index.php',
        'Categories'=>'/InClassPDODemo/categories.php',
        'Articles'=>'/InClassPDODemo/articles.php',
        'About'=>'/InClassPDODemo/about.php',
        'Services'=>'/InClassPDODemo/services.php',
        'Contact'=>'/InClassPDODemo/contact.php',
        
        
    );
    
    //Find out which page user is viewing==========================================================
    $this_page = $_SERVER['REQUEST_URI']; //  'REQUEST_URI LOOKS FOR THE '/inclassbootstrapdemo/index.php ==================
    // =========== test =================//
    //echo $this_page;
    //exit();
    // ========= end test ===============//
    
    //loop the array and check if array page matches $this_page
    foreach($pages as $key=>$value):
        echo '<li class="nav-item';
              
            if($this_page==$value){
                echo ' active">'; // YOU NEED A SPACE BEFORE THE  ACTIVE SO YOU WONT GET NAV_ITEMACTIVE
            }else{
                echo '">';
            }
        echo '<a class="nav-link" href="'.$value.'">'. $key.'</a>
            </li>';
    endforeach;
?>
 </ul>