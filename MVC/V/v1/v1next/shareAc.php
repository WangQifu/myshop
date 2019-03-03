<div class="container">
<div class="row clearfix">
	<div class="col-md-12 column">
	  <?php 
	      foreach ($share as $d)
	      {
	  ?>
	    <div class="panel panel-default">
          <div class="panel-heading"><span class="label label-default"><?php if ($d["price"]<1) echo "免费";?></span> <?php echo $d["a_title"];?></div>
          <div class="panel-body">
                <p>
				    <?php echo $d["game_name"];?><?php if ($d["g_servers"])echo "【".$d["g_servers"]."】";?>
				</p>

				<div class="well">
				<?php echo $d["desc_ribe"];?>
				</div>
				<p>
                    <?php if ($d["price"]>1) echo "¥ ".$d["price"]."/天";?>
				</p>
          </div>
          <div class="panel-footer">
          <?php if (!the_user()){?>
            <a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' class="btn btn-block" type="button">登录才能申请使用</a>
            <?php 
            }
            else 
            {
            ?>
            <a href="index.php?control=query_c&action=share_account&sid=<?php echo $d["id"];?>" class="btn btn-block" type="button">申请使用</a>
            <?php }?>
          </div>
        </div>
		
		<?php 
            }
		?>
	</div>
</div>
</div>
