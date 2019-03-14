<?php


include 'functions.php';

sessionSet();

$con = getDB();
$pID = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title> Assignment 4 - Page 1 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php include 'include/art-header.php';?>





    <div class="parea">
        <?php
        
        
        $sql = "SELECT Title, FirstName, LastName ,ImageFileName, Excerpt, MSRP, YearOfWork, Medium, Width, Height, GalleryName, GalleryCity, GalleryCountry FROM Paintings p INNER JOIN Artists a ON a.ArtistID = p.ArtistID INNER JOIN Galleries g ON p.GalleryID = g.GalleryID WHERE PaintingID = $pID";
        $result = runQuery($con, $sql);
        $rows = mysqli_fetch_array($result);
        ?>
        <h2><?php echo $rows[0];?></h2>
        <p style="font-size: 0.8em">By <a href="#"><?php echo $rows[1] ." ". $rows[2] ?></a></p>



        <div class="pimage">
            <img src="images/medium/<?php echo $rows[3]?>.jpg" alt="BigPic" width=254 height=352>
        </div>

        <div class="sidetext">
            <p><?php echo $rows[4] ?></p>

        </div>
        <div class="price">
            <strong><?php echo $rows[5] ?></strong>
        </div>


        <div class="productbuttons">
            
           
            <a  href="addToWishList.php?id=<?php echo $pID; ?>&ImageFileName=<?php echo $rows[3];?>&Title=<?php echo urlencode($rows[0]);?>">
                <button type="button" class="button1">Add to Wishlist</button> </a>
       

            <button type="button" class="button2">Add to Shopping Cart</button>

        </div>

        <br>
        <br> 








        <table class="productdetailstable">
            <caption>Product Details</caption>
            <tr>


                <td>Date:</td>


                <td><?php echo $rows[6] ?></td>

            </tr>

            <tr>

                <td>Medium:</td>


                <td><?php echo $rows[7] ?></td>

            </tr>
            <tr>

                <td>Dimensions:</td>


                <td><?php echo $rows[8] ." X " . $rows[9] ?></td>


            </tr>
            <tr>
                <td>Home:</td>
                <td><a href="#"><?php echo $rows[10] ."," . $rows[11]  . ",". $rows[12]?> </a></td>

            </tr>
            
            <?php
        
        
            $sql = "SELECT GenreName FROM Genres g INNER JOIN PaintingGenres pg ON g.GenreID = pg.GenreID INNER JOIN Paintings p ON p.PaintingID = pg.PaintingID  WHERE p.PaintingID = $pID ";
            $result = runQuery($con, $sql);
            $rows = mysqli_fetch_array($result);
            ?>
            <tr>
                <td>Genres:</td>
                <td><a href="#"><?php echo $rows[0] ?></a></td>
            </tr>
            
            <?php
        
        
            $sql = "SELECT SubjectName FROM Subjects s INNER JOIN PaintingSubjects ps ON s.SubjectID = ps.SubjectID INNER JOIN Paintings p ON p.PaintingID = ps.PaintingID WHERE p.PaintingID = $pID ";
            $result = runQuery($con, $sql);
            $rows = mysqli_fetch_array($result);
            ?>

            <tr>
                <td>Subjects:</td>
                <td><a href="#"><?php echo $rows[0] ?></a></td>
            </tr>

        </table>


        <div class="similarproducts">


            <table class="table2">

                <caption>Similar Products</caption>
            </table>
        </div>


        <div class="productrow">
            <div class="columndiv">
                <div class="columnborder">

                    <div class="columnimages">
                        <img src="images/thumbs/116010.jpg" alt="116010.jpg">
                    </div>
                    <a class="columntext" href="#">Artist Holding a Thistle</a>

                    <div class="buttondiv">
                        <button type="button">View</button>
                        <button type="button">Wish</button>
                        <button type="button">Cart</button>
                    </div>

                </div>

            </div>


            <div class="columndiv">

                <div class="columnborder">
                    <div class="columnimages">
                        <img src="images/thumbs/120010.jpg" alt="120010.jpg">
                    </div>
                    <a class="columntext" href="#">Portrait of Eleanor of Toledo</a>

                    <div class="buttondiv">
                        <button type="button">View</button>
                        <button type="button">Wish</button>
                        <button type="button">Cart</button>
                    </div>
                </div>

            </div>
            <div class="columndiv">

                <div class="columnborder">
                    <div class="columnimages">
                        <img src="images/thumbs/107010.jpg" alt="107010.jpg">
                    </div>
                    <a class="columntext" href="#">Madame de Pompadour</a>

                    <div class="buttondiv">
                        <button type="button">View</button>
                        <button type="button">Wish</button>
                        <button type="button">Cart</button>
                    </div>
                </div>

            </div>
            <div class="columndiv">

                <div class="columnborder">
                    <div class="columnimages">
                        <img src="images/thumbs/106020.jpg" alt="106020.jpg">
                    </div>


                    <a class="columntext" href="#">Girl with a Pearl Earring</a>

                    <div class="buttondiv">

                        <button type="button">View</button>
                        <button type="button">Wish</button>
                        <button type="button">Cart</button>
                    </div>


                </div>

            </div>
        </div>





    </div>










    <div class="footer">

        <p> All images are copyright to their owners. This is just a hypotheical site © 2014 Copyright Art Store</p>
    </div>



</body>

</html>
