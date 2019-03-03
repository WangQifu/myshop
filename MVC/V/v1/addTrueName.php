<?php
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="panel panel-default">
			<div class="panel-heading">实名登记</div>
			<div class="panel-body">
			       <form id='ff' method='post'' action='index.php?control=manage&action=upusers&type=names'>
                   <div class='form-group'>
                   <label>姓名 <small></small></label>
                   <input name='names' type='text' class='form-control' placeholder='请输入姓名'>
                   </div>
                   <div class='form-group'>
                   <label>身份证号 <small></small></label>
                   <input name='user_identity_num' type='text' class='form-control' placeholder='请输入身份证号'>
                   </div>
                   <button type='submit' class='btn btn-block btn-success'>确认</button>
                   </form>
			</div>
		</div>
		</div>
	</div>
</div>