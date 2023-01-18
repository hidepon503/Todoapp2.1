<?php
session_start();
$_SESSION["language"] = "PHP";
?>
<html>

<body>
  <p>セッション開始</p>
  <p>代入した値は<?php echo $_SESSION["language"] ?>です</p>
  <p><a href="session2.php">次のページ</a>へ</p>
</body>

</html>