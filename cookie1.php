<?php
setcookie('value', 100 );
?>
<html>

<body>
  <?php
  $cookie = $_COOKIE['value'];
  echo "クッキーの値は" . $cookie . "です<br />";
  ?>
  <a href="cookie2.php">ページ2へ</a>
</body>

</html>