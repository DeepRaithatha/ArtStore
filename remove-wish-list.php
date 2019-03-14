<?php
include 'functions.php';


sessionSet();


$wishlist = $_SESSION['wishlist'];
    
   
if (isset($_GET) && !empty($_GET)){
        
    if (($_GET['id'])){

        $pID = $_GET['id'];
        $total = false;
    }
}
    else{
        $total = true;
    }

    
    if ($total){
        $_SESSION['wishlist'] = array();
    
        
    }
    else{
        $counter =0;
        
        while ($counter < count($wishlist)){
            if ($wishlist[$counter][0] == $pID ){
                unset($wishlist[$counter]);
                break;
                
            }
            $counter++;
        }
 
            
            
            
            
        
        $wishlist = array_values($wishlist);
        
        $_SESSION['wishlist']= $wishlist;
        
    }




    
    
    


    
        

header('Location: view-wish-list.php');

