<?php
session_start();
?>
<html>

<body>
  <p>再びセッション開始</p>
  <p>受け取ったセッション変数の値は<?php echo $_SESSION["language"] ?>です</p>
  <p><a href="session_destroy.php">セッションを破棄</a>する</p>
</body>

</html>