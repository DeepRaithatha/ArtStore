<?php error_reporting(E_ERROR|E_PARSE);

include 'functions.php';

sessionSet();

$con = getDB();
if (isset($_GET['artist']) && isset($_GET['museum']) && isset($_GET['shape'])){
    $artist = $_GET['artist'];
    $museum = $_GET['museum'];
    $shape = $_GET['shape'];



if ($artist == 0 ){
    if ($museum == 0){
        if ($shape == 0){
            $new_sql = "";
        }
        else{
            $new_sql = " WHERE p.ShapeID = '".$shape."'";
        }
    }
    else{
        $new_sql = " WHERE p.GalleryID = '".$museum."'";
        if ($shape != 0){
             $new_sql = $new_sql . " AND p.ShapeID = '".$shape."'";
        }
        
    }
    
    
    
}
else{
        $new_sql = " WHERE p.ArtistID = '".$artist."'";
        if ($shape != 0){
             $new_sql = $new_sql . " AND p.ShapeID = '".$shape."'";
        }
        if ($museum != 0){
             $new_sql = $new_sql . " AND p.GalleryID = '".$museum."'";
        }
    }

}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment 5</title>
        <link href="css/reset.css" type = text/css rel="stylesheet">
        <link href="css/styles.css" type = "text/css" rel="stylesheet">
	    <link href="css/style.css" type = "text/css" rel="stylesheet">



    </head>
    <body>

        <main style="overflow:auto;">

	    <?php include 'include/art-header.php';?>


            <section class="leftsection" style="width=600px;  margin-right:100px;">
                <form class="ui form" method="get" action="browse-paintings.php">
                    <h3>Filters</h3>

                    <div >
                        <label style=" padding-right:22px;">Artist</label>
                        <select name="artist">
                            <option value='0'>Select Artist</option>  
                            <?php  
                                $sql = "SELECT ArtistID, LastName FROM Artists";
                                $result = runQuery($con, $sql);
//                                
                                
                                echo mysqli_num_rows($result);
                                for ($x = 0; $x < mysqli_num_rows($result)-1; $x++) {
                                    $rows = mysqli_fetch_array($result);
                            ?>
                            <option value="<?php echo $rows[0] ?>"><?php echo utf8_encode ($rows[1]); ?> </option>
                            <?php
                                    
                                }
                                
                            ?>
                            
                            
                        </select>
                    </div>  
                    <div >
                        <label>Museum</label>
                        <select  name="museum">
                            <option value='0'>Select Museum</option>  
                            <?php  
                                $sql = "SELECT GalleryID, GalleryName FROM Galleries";
                                $result = runQuery($con, $sql);
//                                
                                
                                echo mysqli_num_rows($result);
                                for ($x = 0; $x < mysqli_num_rows($result)-1; $x++) {
                                    $rows = mysqli_fetch_array($result);
                            ?>
                            <option value="<?php echo $rows[0] ?>"><?php echo utf8_encode ($rows[1]); ?> </option>
                            <?php
                                    
                                }
                                
                            ?>
                        </select>
                    </div>   
                    <div >
                        <label style="padding-right:14px;">Shape</label>
                        <select  name="shape">
                            <option value='0'>Select Shape</option>  

                            <?php  
                                $sql = "SELECT ShapeID, ShapeName FROM Shapes";
                                $result = runQuery($con, $sql);
//                                
                                echo mysqli_num_rows($result);
                                for ($x = 0; $x < mysqli_num_rows($result)-1; $x++) {
                                    $rows = mysqli_fetch_array($result);
                            ?>
                            <option value="<?php echo $rows[0] ?>" ><?php echo utf8_encode ($rows[1]); ?> </option>
                            <?php
                                    
                                }
                                
                            ?>

                        </select>
                    </div>   
                    <p> &nbsp; &nbsp;  &nbsp;   &nbsp; </p>
                    <button type="submit" id="buttons"> Filter  </button>    

                </form>   </section>


            <section class="rightsection">
                <h1>Paintings</h1>
                <h3>All Paintings [Top 20]</h3>
                <ul id="paintingsList">

                    <?php
                    
                    
                    
                    
                    $sql = "SELECT PaintingID, ImageFileName, FirstName, LastName, Excerpt, MSRP, Title FROM Paintings p INNER JOIN Artists a ON a.ArtistID = p.ArtistID" . $new_sql. " LIMIT 20";
                    
            
                    $result = runQuery($con, $sql);
                    
                    $i = 0;
                    
                    while ($i < mysqli_num_rows($result)){
                        
                        $rows = mysqli_fetch_array($result);
                        $i++;
                        
                    ?>
                    
		            
                    
                    
                    <li class="item">

                        <div class="figure">
                            
                            <a href="single-painting.php?id=<?php  echo $rows[0]; ?>">
                                <img src="images/square-medium/<?php echo $rows[1]; ?>.jpg">
                            </a>
                        </div>
                        <div class="itemright">
                            <a href="single-painting.php?id=<?php echo $rows[0]; ?>">
                                <?php echo $rows[6]; ?></a>

                            <div><span><?php echo $rows[2] . " " . $rows[3]; ?></span></div>        


                            <div class="description">
                                <p><?php echo $rows[4]; ?></p>
                            </div>

                            <div class="meta">     
                                <strong>$<?php echo $rows[5]; ?></strong>        
                            </div>        

                            <div class="extra" >
                                <a class="favorites" href="cart.php?id=<?php echo $rows[0]; ?>">Add to Shopping Cart</a>
                                <span> &nbsp; &nbsp; &nbsp;    </span>
                                <a  class="favorites"   href="addToWishList.php?id=<?php echo $rows[0]; ?>&ImageFileName=<?php echo $rows[1];?>&Title=<?php echo urlencode($rows[6]);?>">	Add to Wish List
                                </a>         
                                <p>&nbsp;</p>
                            </div>       

                        </div>      
                    </li>
                    <?php
                    }
            
                    ?>

                    
                </ul>
            </section>
            

        </main>
    </body>
</html>
