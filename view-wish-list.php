<?php
include 'functions.php';



sessionSet();


$wishlist = $_SESSION['wishlist'];






?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 5</title>
    <link href="css/reset.css" type=text/css rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">



</head>

<body>

    <main style="overflow:auto;" style="width=600px;">

        <?php include 'include/art-header.php';?>






        <h2>Wish List Items</h2>

        <table>

            <tr>

                <th> Image </th>
                <th> Title </th>
                <th> Action </th>









            </tr>
            


            <?php 
            
            
                                
                            
                                
        foreach ($wishlist as $wishitem){
                                    
                                    ?>
            <tr>

                <td>

                    <img src="images/square-medium/<?php echo $wishitem[1];?>.jpg">






                </td>

                <td>
                    <a href="single-painting.php?id=<?php echo $wishitem[0]?>">
                        <?php echo urldecode( $wishitem[2])?></a>
                </td>
                <td>
                    <a class="removeLinkStyle" href="remove-wish-list.php?id=<?php echo $wishitem[0]?>"> Remove </a>
                </td>

                <?php
                            
                            }
                            ?>



            </tr>
            
            

            
            








        </table>

        



        <table>
            
            <br>
            
            <tr>
            <a style="margin-top: 600px;" class="removeLinkStyle" href="remove-wish-list.php"> Remove All items from wish list </a>
            </tr>
</table>    




    </main>
    

</body>

</html>
