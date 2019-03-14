<?php
include 'functions.php';
sessionSet();
    
if (isset($_GET) && !empty($_GET)){
        
    if (!empty($_GET['id'])){

        $pID = $_GET['id'];
    }

    if(!empty($_GET['ImageFileName'])){

        $ImageFName = $_GET['ImageFileName'];

    }
    if(!empty($_GET['Title'])){
         $Title = $_GET['Title'];
    }

    $contents = array($pID,$ImageFName,$Title);

    if(isset($_SESSION) && !empty($_SESSION)){

        $wishlist = $_SESSION['wishlist'];



    }
    else{
        $_SESSION['wishlist'] = array();
        $wishlist= $_SESSION['wishlist'];
        

    }

    array_push($wishlist,$contents);
    $_SESSION['wishlist'] = $wishlist;
    header('Location: view-wish-list.php');
        
}
else{
    echo 'No params';
}

?>


