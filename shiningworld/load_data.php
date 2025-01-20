<?php  
 include('Connection.php');
 $output = '';  
 if(isset($_POST["sub_category_id"]))  
 {  
      if($_POST["sub_category_id"] != '')  
      {  
           $sql = "SELECT * FROM product WHERE categoryID = '".$_POST["sub_category_id"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM product";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
            $output .=  '<div class="col-md-4 col-sm-6"> ';
            $output .=  '<form action="lighting.php" method="GET" enctype="multipart/form-data">';
            $output .=  '<input type="hidden" name="Action" value="buy">';
            $output .=  '<input type="hidden" name="txtProductID" value='.$row["productID"].'>';
            $output .=  '<div class="product-item">';
            $output .=  '<div class="product-item-image">';
            $output .=  '<a href="product-details.php?productID='.$row["productID"].'"><img src="adminPanel/'.$row["productImage1"].'" alt="Product Name"
                                                    class="img-fluid"></a>';
            $output .=  '<div class="cart-icon">';
            $output .=  '<a href="add_to_wishlist.php?productID='.$row["productID"].'"><i class="far fa-heart"></i></a>';
            $output .=  '<input type="hidden" name="txtBuyQty" value="1" min="1" max='.$row["stock"].'>';
            $output .=  '<button type="submit" name="buy" class="bg-opacity" min="1">';
            $output .=  '<a>';
            $output .=  '<svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75" viewBox="0 0 16.75 16.75">';
            $output .=  '<g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                            <g id="Icon" transform="translate(0 1)">
                            <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                            rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                            fill="none" stroke="#1a2224" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" />
                            <path id="Path_3" data-name="Path 3"
                            d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                            transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                            stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5" />
                         </g>
                         </g>';
            $output .=   '</svg>';
            $output .=   '</a>';
            $output .=   '</button>';
            $output .=   '</div>';
            $output .=   '</div>';
            $output .=   '</form>';
            $output .=   '<div class="product-item-info">';
            $output .=   '<a href="product-details.php?productID='.$row['productID'].'">'.$row['productName'].'</a>';
            $output .=   '<span>'.$row['price'].'MMK</span>';
            $output .=   '</div>';
            $output .=   '</div>';
            $output .=   '</div>';

      }  
      echo $output;  
 }  
 ?>  