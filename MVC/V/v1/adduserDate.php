<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php if ($views == "email")
			     {
			         echo "<span class='glyphicon glyphicon-envelope'></span>";
			     }
			     elseif ($views == "phone")
			     {
			         echo "<span class='glyphicon glyphicon-phone-alt'></span>";
			     }
			     else 
			     {
			         echo "已";
			     }
			    ?>添加</div>
			<div class="panel-body">
			<?php 
			     if ($views == "email")
			     {
			         echo "<form id='ff' method='post' action='index.php?control=manage&action=upusers&type=email'>
		                   <input name='title' type='hidden' value='email'>
		                   <div class='form-group'>
                           <label>添加邮箱 <small>(联系邮箱)</small></label>
                           <input name='email' type='email' class='form-control' placeholder='添加邮箱'>
                           </div>
		                   <button type='submit' class='btn btn-default'>确认</button>
		                   </form>";
			     }
			     elseif ($views == "phone")
			     {
			         echo "<form id='ff' method='post' action='index.php?control=manage&action=upusers&type=email'>
		                   <input name='title' type='hidden' value='phone'>
		                   <div class='form-group'>
                           <label>手机号 <small>(联系电话)</small></label>
                           <input name='phone' type='text' class='form-control' placeholder='添加手机'>
                           </div>
		                   <button type='submit' class='btn btn-default'>确认</button>
		                   </form>";
			     }
			     else 
			     {
			         echo $views;
			         foreach ($user as $u)
			         {
			             if (!$u["identityp1"])
			             {
			                 echo '<a href="index.php?control=manage&action=realName" class="btn btn-warning" type="button">图片认证</a>';
			             }
			         }
			     }
			     
			?>
			</div>
		</div>
		</div>
	</div>
</div>
