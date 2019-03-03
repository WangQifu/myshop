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
                  <?php if ($d["price"]>1){?>
                    <button type="button" class="btn btn-block" data-container="body" data-toggle="popover" title="联系电话：<?php echo $d["phone"];?>" data-placement="top" data-content="QQ：<?php echo $d["QQ"];?>、weixin：<?php echo $d["weixin"];?>">
                                                                              联系使用
                    </button>
                  <?php }else {?>
                    <button type="button" class="btn btn-block" data-container="body" data-toggle="popover" title="账号：<?php echo $d["accountnuber"];?>" data-placement="top" data-content="密码：<?php echo $password;?>">
                                                                            查看账号密码
                    </button>
                    <?php }?>
                  </div>
                </div>
        		
        		<?php 
                    }
        		?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function () {
	  $('[data-toggle="popover"]').popover()
	})
</script>
