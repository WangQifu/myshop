<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		{foreach:setRet name="tb"}
		<div class="panel panel-default">
          <div class="panel-heading">订单号：{tb.number}</div>
          <div class="panel-body">
        
    		<div class="col-md-7 column">
    		  <div class="media shop_row">
        			  <a href="#" class="pull-left"><img src="{tb.image}" width="120px" class="media-object" alt='' /></a>
            			<div class="media-body">
            				<h4 class="media-heading shop_titles">
            					{tb.product_name}
            				</h4>
            				<p>
            				    <span>¥ {tb.price}</span>
            				</p>
            				
            			</div> 
            		</div>
    		</div>
    		<div class="col-md-5 column">
    		  <div >
            		<?php if ($kefu) {
            		    foreach ($kefu as $kf){
            		?>
            				<p>
            				    <span>客服：<?php echo $kf["kefunick"];?></span>
            				</p>
            				<p>
            				    <span>电话：<?php echo $kf["phone"];?></span>
            				</p>
            				<p>
            				    <span>QQ：<?php echo $kf["QQ"];?></span>
            				</p>
            				<p>
            				    <span>微信：<?php echo $kf["weixin"];?></span>
            				</p>
            				<?php }}?>
            		</div>
    		</div>
            		<div>
            			<form role="form" action="index.php?control=buyC&action=mibao_m" method="post">
            				<input type="hidden" name="did" value="{tb.id}" />
            				
            				<h4>发货时请填写账号绑定信息/者密保问题等（若没绑定注明清楚）</h4>
            				<div class="form-group">
            					 <textarea rows="6" cols="100" name="mibao">
            					 </textarea>
            				</div>
            				
            				<button type="submit" class="btn btn-default">确认发货</button>
            			</form>
            		</div>
          </div>
        </div>
		{/endforeach}
		</div>
		
	</div>
</div>