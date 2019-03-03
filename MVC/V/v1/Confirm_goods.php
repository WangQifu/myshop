<?php
?>
<style>
	.intr{border:solid 1px #ddd;border-radius: 5px; background: #ddd;text-indent:2em;line-height: 28pt;}
</style>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<p class="intr">
			注！请确认修改绑定信息后收货
	    </p>
		
		{foreach:setRet name="tb"}
		<?php foreach ($gname as $g){?>
		<div class="panel panel-default">
          <div class="panel-heading">订单号：{tb.number}<?php if ($g["longname"]){?><button type="button" class="btn btn-default" data-toggle="popover" data-placement="bottom" title="账号：<?php echo $g["longname"];?>" data-content="密码：<?php echo $g["longpass"]; ?>_修改密码后收货">账号</button><?php }?></div>
          <div class="panel-body"> 
            <div class="media shop_row">
				  <a href="#" class="pull-left"><img src="{tb.image}" width="120px" class="media-object" alt='' /></a>
				<div class="media-body">
					<h4 class="media-heading shop_titles">
						{tb.product_name}
					</h4>
					<p>
					    
					</p>
					<p>
					    <span>¥ {tb.price}</span>
					</p>
					<p>
					    
					</p>
				</div>
			</div>
          </div>
           <div class="panel-footer"><a  href="index.php?control=buyC&action=Confirm_goods&bid={tb.id}" class="btn btn-block">确认收货</a></div>
        </div>
        <?php }?>
			{/endforeach}
		</div>
	</div>
</div>
<script type="text/javascript">
$(function () {
	  $('[data-toggle="popover"]').popover()
	})
</script>