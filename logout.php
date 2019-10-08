<?php
session_start();
if (isset($_SESSION['login'])) {
    unset ($_SESSION);
    session_destroy();
    echo "<script>
		alert('Anda Telah Logout!');
		document.location.href = 'index.php';
		</script>";
}
else{
    echo "<script>
		alert('Anda Telah Logout!');
		document.location.href = 'index.php';
		</script>";
} 
?>