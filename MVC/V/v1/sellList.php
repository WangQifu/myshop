<div class="container">
        <div class="row clearfix">
				<div class="col-md-12 column">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">出售</h3>
					  </div>
					  <div class="panel-body">
					       <div class="row clearfix">
                                <div class="col-md-12 column">
                            	   <div class="btn-group">
					           <?php 
					               $aryAZ=alphabet_AZ();
					               foreach ($aryAZ as $zm)
					               {
					                   $zs_id = "";
					                   if ($zm == "热")
					                   {
					                       $zs_id = "1";
					                   }
					                   else 
					                   {
					                       $zs_id = $zm;
					                   }
					           ?>
					        
                            			<a href="index.php?control=gameC&action=selectSellGame&rowid=4&zm=<?php echo $zs_id;?>" class="btn btn-default" type="button"><?php echo $zm;?></a>
								
								<?php 
					               }
								?>
								    </div>
                            	</div>
                            </div>

						    <div class="row" id="mt">
							<?php foreach ($list as $g){?>
								<div class="col-md-2">
									<div class="thumbnail">
										<a href="index.php?control=addDB&action=preview&rowid=4&gid=<?php echo $g["id"]?>"><img class="prodimg"  data-toggle="popover" data-trigger="click" title="爱游商店" data-content="And here's some amazing content. It's very engaging. Right?" alt="爱游|<?php echo $g["appname"];?>" src="<?php echo $g["icon720"];?>" width="100"  /></a>
										<div class="caption text-center arow">
											<h5>
												<a href="index.php?control=addDB&action=preview&rowid=4&gid=<?php echo $g["id"]?>"><?php echo $g["appname"];?></a>
											</h5>
										</div>
									</div>
								</div>
								
								<?php } 
								
								?>
							</div>
					  </div>
					</div>
				</div>
			</div>
</div>