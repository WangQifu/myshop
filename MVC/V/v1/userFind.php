<?php
$findArray = array("我的小学校名是？","我的爱人姓名是","我的工号是？","我的偶像是谁","我最喜欢吃什么");

?>

<div class="container col-md-12">
		<div class="col-md-12 column">
	
					 <label class="col-sm-2 control-label">问题一：</label>
						<div>
							<select name="issue1"  class="easyui-combobox" >
								<?php
								foreach ($findArray as $t)
								echo "<option value='".$t."'>".$t."</option>"
								?>
								
							</select>
						</div>
						<input type="text" class="form-control" id="inputUserName" placeholder="请设置问题"/>
				
				<div class="form-group">
					 <label for="inputPass" class="col-sm-2 control-label">问题二：</label>
					<div>
							<select name="issue1"  class="easyui-combobox" >
								<?php
								foreach ($findArray as $t)
								echo "<option value='".$t."'>".$t."</option>"
								?>
								
							</select>
						</div>
						<input type="text" class="form-control" id="inputPass" placeholder="请设置问题"/>
				</div>
				
				<div class="form-group">
					 <label for="inputPass" class="col-sm-2 control-label">问题三：</label>
					<div>
							<select name="issue1"  class="easyui-combobox" >
								<?php
								foreach ($findArray as $t)
								echo "<option value='".$t."'>".$t."</option>"
								?>
								
							</select>
						</div>
						<input type="text" class="form-control" id="inputPass2" placeholder="请设置问题"/>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <button type="submit" class="btn btn-info">确认</button>
					</div>
				</div>
		</div>
</div>