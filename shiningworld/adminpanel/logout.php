<!DOCTYPE html>
<html>
<body>
 
<?php
 
    echo "<script>alert('Logout successful!')</script>";
    echo "<script>window.location = 'adminAccount.php'</script>";
    session_start();
    session_destroy();

?>
 
</body>
</html>