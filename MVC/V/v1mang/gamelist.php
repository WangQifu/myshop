<?php
?>
<table border="1">
  <tr>
    <td>id</td>
    <td>图标</td>
    <td>名称</td>
    <td>平台</td>
    <td>添加运营商</td>
    <td>添加服务器</td>
    <td>账号信息</td>
    <td>预览</td>
  </tr>
   <?php foreach ($tbSet as $g)
	{?>
  <tr>
    <td><?php echo $g["id"];?></td>
    <td><?php echo "<img src='".$g["icon720"]."' width='80px' />";?></td>
    <td><?php echo $g["appname"];?></td>
    <td><?php echo $g["game_type"];?></td>
    <td><a href="index.php?control=addDB&action=addtitleview&rowid=1&gid=<?php echo $g["id"]?>">添加</a></td>
    <td><a href="index.php?control=addDB&action=addtitleview&rowid=2&gid=<?php echo $g["id"]?>">添加</a></td>
    <td><a href="index.php?control=addDB&action=addtitleview&rowid=3&gid=<?php echo $g["id"]?>">添加</a></td>
    <td><a href="index.php?control=addDB&action=preview&rowid=4&gid=<?php echo $g["id"]?>">预览</a></td>
  </tr>
  <?php }?>
	    		
</table>