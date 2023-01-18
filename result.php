
<?php
$customer = htmlspecialchars($_POST['customer'], ENT_QUOTES);
$choices = htmlspecialchars($_POST['choices'], ENT_QUOTES);
$orders = htmlspecialchars($_POST['orders'], ENT_QUOTES);
?>
<p>私の名前は、<?php echo $customer; ?></p>
<p>ご希望商品は、 <?php echo $choices; ?></p>
<p>注文数は、<?php echo $orders; ?></p>
</body>
