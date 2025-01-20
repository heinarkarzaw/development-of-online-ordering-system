<?php 
    $sql = "SELECT count(wishlistID) AS totalWishlist FROM wishlist WHERE customerID='$customerID'";
    $result = mysqli_query($connect,$sql);
    $rows = mysqli_fetch_assoc($result);
    $num_wishlist_rows = $rows['totalWishlist'];
 ?>