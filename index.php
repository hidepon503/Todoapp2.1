
  <form action="result.php" method="POST">
   お名前:
   <input type="text" name="customer"/>
    <br />
    ご希望商品:
    <input type="radio" name="choices" value="Aセット"/>Aセット
    <input type="radio" name="choices" value="Bセット"/>Bセット
    <input type="radio" name="choices" value="Cセット"/>Cセット
    <br />
    注文数:
    <select name="orders" id="">
      <?php for($i=1; $i<=10; $i++){ ?> 
      <option value="<?php echo $i; ?>">
      <?php echo $i; ?>
      </option>
      <?php } ?>
    </select>
    <br />
    <input type="submit"  value="送信する" />
  </form>
