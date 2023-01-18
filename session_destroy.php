<?php
session_start();
session_destroy();
?>
<html>

<body>
  <p>セッション破棄</p>
  <p>セッションは<?php echo $_SESSION["language"] ?>です</p>
  <a href="session1.php">最初に戻る</a>
</body>

</html>