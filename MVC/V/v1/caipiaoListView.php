<?php
$cpJson = json_decode($cpJson);
$date = $cpJson->showapi_res_body;
$jsdate = $date->result;
$de_json=$jsdate;
$count_json = count($jsdate);
//var_dump($de_json);
//
$deleAry = array('六场半全场','四场进球彩','十四场胜负彩(任9)','快乐8','快乐十分','快乐十分(幸运农场)','快乐十分(动物总动员)','快乐十二','赛车(pk10)','百变王牌','幸运赛车',
    '快乐扑克3','群英会','时时乐','泳坛夺金','喜乐彩'
);
$listn=0;
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
		  <div class="row"  id="mt">
			<?php for ($i = 0; $i < 65; $i++)
                {   
                    $ary_json = $de_json[$i];
                    if (!in_array($ary_json->descr, $deleAry))
                    {
                    ?>
				<div class="col-md-2 prod">
					<div class="thumbnail">
					<?php $cpimgurl = "uploadimg/cpimg/".$ary_json->code.".jpg"; 
					if (strpos($cpimgurl,$ary_json->code)) {
					    if (strpos($ary_json->code,"11x5"))
					    {
					        $cpimgurl = "uploadimg/cpimg/11x5.jpg";
					    }
					    elseif (strpos($ary_json->code,"k3"))
					    {
					        $cpimgurl = "uploadimg/cpimg/k3.jpg";
					    }
					    else if (strpos($ary_json->code,"ssc"))
					    {
					        $cpimgurl = "uploadimg/cpimg/ssc.jpg";
					    }
    				    else 
    				    {
    				       $cpimgurl = "uploadimg/cpimg/".strstr($cpimgurl,$ary_json->code);
    				    }
					   
					    ?>
						<a href="index.php?control=caipiaoC&action=cpView&type=<?php echo $ary_json->code;?>&cpname=<?php echo $ary_json->descr;?>">
						<img class="prodimg img-rounded" src="<?php echo $cpimgurl;?>" width="100" height="100"  />
						</a>
						<?php }?>
						<div class="caption text-center">
							<h5>
								<a href="index.php?control=caipiaoC&action=cpView&type=<?php echo $ary_json->code;?>&cpname=<?php echo $ary_json->descr;?>"><?php echo $ary_json->descr;?></a>
							</h5>
							<p>
							<?php echo $ary_json->area;?><span class="label label-default"><?php echo $ary_json->issuer;?></span>
							</p>
						</div>
					</div>
				</div>
				<?php
                    }
			         } 
				?>
			</div>
		</div>
	</div>
</div>
