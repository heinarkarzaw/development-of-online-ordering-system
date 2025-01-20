<?php
require_once "connection.php";
$category_id = $_POST["category_id"];
$result = mysqli_query($connect,"SELECT * FROM category where parentID = $category_id");
?>
<option value="" hidden>Select</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["categoryID"];?>" ><?php echo $row["categoryName"];?></option>
<?php
}

?>