<?php
session_start();
session_destroy();

echo "<script>alert('berhasil logout')</script>";
echo "<script>document.location.href = 'index.php'</script>";
