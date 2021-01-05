<?php
    session_destroy();
    echo "<script>alert('Logout berhasil!')</script>";
    echo "<script>location='login.php'</script>";
?>