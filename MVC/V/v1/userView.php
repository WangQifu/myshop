<div class="container">
	<div class="row clearfix">
		<div class="col-md-4 column">
		</div>
		<div class="col-md-4 column">
		<?php 
		      foreach ($dt as $t)
		      {
		?>
			<div class="text-center"><img alt="140x140" src="<?php echo $t["icons"];?>" class="img-circle" /></div>
			<h3 class="text-danger text-center">
				<?php echo $t["user_name"];?>
			</h3>
			<?php 
			 if ($t["phone"])
			 {
			?>
			<blockquote>
				<p>
					<span class='glyphicon glyphicon-phone-alt'></span>
				</p> <small><?php echo $t["phone"];?></small>
			</blockquote>
			<?php }
			    else 
			    {
			        echo "<p><a href='index.php?control=manage&action=addusers&type=phone' class='btn btn-danger' type='button'><span class='glyphicon glyphicon-phone-alt'></span> 添加手机</a></p>";
			    }
			?>
			<?php 
			 if ($t["email"])
			 {
			?>
			<blockquote>
				<p>
					<span class='glyphicon glyphicon-envelope'></span>
				</p> <small><?php echo $t["email"];?></small>
			</blockquote>
			<?php }
			    else 
			    {
			        echo "<p><a href='index.php?control=manage&action=addusers&type=email' class='btn btn-danger' type='button'><span class='glyphicon glyphicon-envelope'></span> 添加邮箱</a></p>";
			    }
			?>
			<?php 
		      }
			?>
			<blockquote>
				<p>
					<span class='glyphicon glyphicon-lock'></span>
				</p> 
				<small> 
				<a href="index.php?control=query_c&action=changePassword&type=cpas" class="btn" type="button">修改密码</a>
				</small>
			</blockquote>
		</div>
		<div class="col-md-4 column">
		</div>
	</div>
</div>
