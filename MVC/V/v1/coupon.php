<?php
?>
<table border="1">
  <tr>
    <td>优惠券</td>
    <td>额度/折扣</td>
    <td>商家</td>
    <td>类型</td>
  </tr>
   <?php foreach ($ret as $g)
	{?>
  <tr>
    <td><?php echo $g["title"];?></td>
    <td><?php echo $g["money"];?></td>
    <td><?php echo $g["merchant"];?></td>
    <td><a href="index.php?control=dealC&action=getCoupon&cid=<?php echo $g["id"]?>">领取</a></td>

  </tr>
  <?php }?>
	    		
</table>
