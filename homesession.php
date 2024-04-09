 else {
    echo "You should log in first";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 1000); // 1000 milliseconds = 1 second
          </script>";
    exit();
}
?>
