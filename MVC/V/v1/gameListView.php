<div class="container">
        <div class="row clearfix">
				<div class="col-md-12 column">
					<div class="panel panel-default">
					  <div class="panel-heading">
					    <h3 class="panel-title">游戏列表</h3>
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
					        
                            			<a href="index.php?control=gameC&action=gameListView&zm=<?php echo $zs_id;?>&type=<?php echo $typeg;?>" class="btn btn-default" type="button"><?php echo $zm;?></a>
								
								<?php 
					               }
								?>
								    </div>
                            	</div>
                            </div>

						    <div class="row" id="mt">
							<?php foreach ($viewD as $d){
							    
							    ?>
								<div class="col-md-2">
									<div class="thumbnail">
										<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>">
										<img class="img-thumbnail img-rounded" title="爱游商店|<?php echo $d["appname"];?>" data-content="爱游商店" alt="<?php echo $d["appname"];?>" src="<?php echo $d["icon720"];?>" width="100" height="100"  />
										</a>
										<div class="caption arow">
											<h6>
												<a href="index.php?control=sell_query&action=setGame_sell&pid=<?php echo $d["id"];?>"><?php echo $d["appname"];?></a>
											</h6>
										</div>
									</div>
								</div>
								<?php 
							       
                			         } 
								?>
							</div>
					  </div>
					</div>
				</div>
			</div>
</div>
