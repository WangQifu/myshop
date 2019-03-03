<?php
$cpJson = json_decode($cpJson);
$date = $cpJson->showapi_res_body;
$jsdate = $date->result;
$de_json=$jsdate;
$count_json = count($jsdate);
//

?>
<link href="MVC/V/v1/css/caipiaoview.css" rel="stylesheet" />
<div class="container">
	<div class="row clearfix">
		<div class="col-md-7 column">
		      <h2><?php $qname = $de_json[0]; echo $qname->name;?>开奖</h2>
                <?php 
                $ary1 = "";
                $ary2 = "";
                $blueMin1 = "";
                $blueMin2 = "";
                $cnum = 1;
                $redCounrAry = array();
                $blueCounrAry = array();
                $cred1 = array(); $cred2 = array(); $cred3 = array(); $cred4 = array(); $cred5 = array(); $cred6 = array();
                $cblue1 = array();$cblue2 = array();
                for ($i = 0; $i < $count_json; $i++)
                {   
                    $ary_json = $de_json[$i];
                    $strCode = $ary_json->openCode;
                    $ballNum=dltCode($strCode);
                    $redAry = $ballNum[0];
                    $blueNum = $ballNum[1];
              
                    $equalNum = "";
                    $equalNBlue ="";
                    if ($cnum == 1)
                    {
                        $ary1 = $ballNum[0];
                        $blueMin1 = $ballNum[1];
                        $cnum++;
                    }
                    elseif ($cnum == 2)
                    {
                        $ary2 = $ballNum[0];
                        $blueMin2 = $ballNum[1];
                        $equalNum = countMinus($ary2, $ary1);
                        $equalNBlue = countMinus($blueMin2, $blueMin1);
                        //初始化
                        $ary1 = $ary2;
                        $ary2 = "";
                        $blueMin1 = $blueMin2;
                        $blueMin2 = "";
                        //$cnum=2;
                    }
                
                ?>
                
                <?php if ($equalNum){?>
                <div class="lottery_wrap2">
                                                                           差值    
                    <div id="checkBall">
                      <button type="button" class="btn" data-toggle="popover" data-placement="bottom" title="合值、平均值" data-content="<?php $str=dlt_computeZu(array_sum($equalNum), array_sum($equalNBlue), 5, 2, 7); echo $str;?>">
                                                                            差值计算
                    </button>
                    </div>
                    <p id="p0"><?php $cred1[] =abs($equalNum[0]); echo $equalNum[0];?></p>
                    <p id="p1"><?php $cred2[] =abs($equalNum[1]); echo $equalNum[1];?></p>
                    <p id="p2"><?php $cred3[] =abs($equalNum[2]); echo $equalNum[2];?></p>
                    <p id="p3"><?php $cred4[] =abs($equalNum[3]); echo $equalNum[3];?></p>
                    <p id="p4"><?php $cred5[] =abs($equalNum[4]); echo $equalNum[4];?></p>
                
                    <?php if ($equalNBlue) {
                        
                    ?>
                    <p id="pb"><?php $cblue1[] =abs($equalNBlue[0]); echo $equalNBlue[0];?></p>
                    <p id="pb"><?php $cblue2[] =abs($equalNBlue[1]); echo $equalNBlue[1];?></p>
                    <?php 
                    }?>
                </div>
                <?php }?>
                <div class="lottery_wrap" id="lotteryWrap"> 
                    开奖
                    <div id="checkBall">
                    <button type="button" class="btn" data-toggle="popover" data-placement="bottom" title="合值、平均值" data-content="<?php $str=dlt_computeZu(array_sum($redAry), array_sum($blueNum), 5, 2, 7); echo $str;?>">
                    <?php echo $ary_json->expect;?>期-计算 
                    </button>
                    </div>
                    <p id="p0"><?php echo $redAry[0];?></p>
                    <p id="p1"><?php echo $redAry[1];?></p>
                    <p id="p2"><?php echo $redAry[2];?></p>
                    <p id="p3"><?php echo $redAry[3];?></p>
                    <p id="p4"><?php echo $redAry[4];?></p>
                    <p id="pb"><?php echo $blueNum[0];?></p>
                    <p id="pb"><?php echo $blueNum[1];?></p>
                </div>
                <?php 
                }
                // $rc = numberCount($redCounrAry);
                // //$bc = numberCount($blueCounrAry);
                // var_dump($rc);
                ?>
		</div>
		<div class="col-md-5 column">
		<?php 
                    $red1 = array(); $red2 = array(); $red3 = array(); $red4 = array(); $red5 = array(); $red6 = array();
                    $blue1 = array();$blue2 = array();
                    for ($i = 0; $i < $count_json; $i++)
                    {
                        $ary_json = $de_json[$i];
                        $strCode = $ary_json->openCode;
                        $ballNum=dltCode($strCode);
                        $redAry = $ballNum[0];
                        $blueNum = $ballNum[1];
                        
                        $red1[] = $redAry[0];
                        $red2[] = $redAry[1];
                        $red3[] = $redAry[2];
                        $red4[] = $redAry[3];
                        $red5[] = $redAry[4];
                        
                        $blue1[] = $blueNum[0];
                        $blue2[] = $blueNum[1];
                        foreach ($redAry as $obj)
                        {
                            $redCounrAry[] = $obj;
                        }
                        foreach ($blueNum as $obj)
                        {
                            $blueCounrAry[] = $obj;
                        }
                        
                   }
                   $redOutNum = numberCount2($redCounrAry);
                   $blueOutNum = numberCount2($blueCounrAry);
                    ?>
		<h2>统计</h2>
		      <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">最近<?php echo $count_json;?>期开奖号码统计</h3>
              </div>
              <div class="panel-body">
                    
                    <table class="table table-condensed">
                        <tr>
                          <td class="active">1号球的和</td>
                          <td class="active">2号球的和</td>
                          <td class="active">3号球的和</td>
                          <td class="active">4号球的和</td>
                          <td class="active">5号球的和</td>
                          <td class="danger">蓝球1的和</td>
                          <td class="danger">蓝球2的和</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($red1)?></td>
                          <td class="active"><?php echo array_sum($red2)?></td>
                          <td class="active"><?php echo array_sum($red3)?></td>
                          <td class="active"><?php echo array_sum($red4)?></td>
                          <td class="active"><?php echo array_sum($red5)?></td>
                          <td class="danger"><?php echo array_sum($blue1)?></td>
                          <td class="danger"><?php echo array_sum($blue2)?></td>
                        </tr>
                    </table>
                    
                    <table class="table table-condensed">

                        <tr>
                          <td class="active">1球差和</td>
                          <td class="active">2球差和</td>
                          <td class="active">3球差和</td>
                          <td class="active">4球差和</td>
                          <td class="active">5球差和</td>
                          <td class="danger">蓝球1差和</td>
                          <td class="danger">蓝球2差和</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($cred1)?></td>
                          <td class="active"><?php echo array_sum($cred2)?></td>
                          <td class="active"><?php echo array_sum($cred3)?></td>
                          <td class="active"><?php echo array_sum($cred4)?></td>
                          <td class="active"><?php echo array_sum($cred5)?></td>
                          <td class="danger"><?php echo array_sum($cblue1)?></td>
                          <td class="danger"><?php echo array_sum($cblue2)?></td>
                        </tr>
                    </table> 
              </div>
            </div>
            
            <?php if (!the_user()){?>
                    <a href="#" onclick='showWindow("用户登陆", "index.php?control=member&action=login", 380);' class="btn btn-block btn-danger" type="button">登录可查看更多统计</a>
                    <?php 
                    }
                    else 
                    {
                    ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">最近<?php echo $count_json;?>期开奖号码位数和的平均数</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-condensed">
                        <tr>
                          <td class="active">1红球和的平均数</td>
                          <td class="active">2红球和的平均数</td>
                          <td class="active">3红球和的平均数</td>
                          <td class="active">4红球和的平均数</td>
                          <td class="active">5红球和的平均数</td>
                          <td class="danger">1蓝球和的平均数</td>
                          <td class="danger">2蓝球和的平均数</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo round(array_sum($red1)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($red2)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($red3)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($red4)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($red5)/$count_json);?></td>
                          <td class="danger"><?php echo round(array_sum($blue1)/$count_json);?></td>
                          <td class="danger"><?php echo round(array_sum($blue2)/$count_json);?></td>
                        </tr>
                    </table>
                     </div>
                    </div>
                    
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">最近<?php echo $count_json;?>期开奖号码位数差的平均数</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-condensed">
                        <tr>
                          <td class="active">1球差的平均数</td>
                          <td class="active">2球差的平均数</td>
                          <td class="active">3球差的平均数</td>
                          <td class="active">4球差的平均数</td>
                          <td class="active">5球差的平均数</td>
                          <td class="danger">1蓝球差的平均数</td>
                          <td class="danger">2蓝球差的平均数</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo round(array_sum($cred1)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($cred2)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($cred3)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($cred4)/$count_json);?></td>
                          <td class="active"><?php echo round(array_sum($cred5)/$count_json);?></td>
                          <td class="danger"><?php echo round(array_sum($cblue1)/$count_json);?></td>
                          <td class="danger"><?php echo round(array_sum($cblue2)/$count_json);?></td>
                        </tr>
                    </table>
                     </div>
                    </div>
                    
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">最近<?php echo $count_json;?>期开奖号码出现的次数</h3>
                      </div>
                      <div class="panel-body">
                      <ul class="fs_red_area">
                      
                      <?php 
                      $nball=explode("+",$numball);
                     
                		  for ($i = 1; $i <= $nball[0]; $i++) {
                		      if ($i < 10) { //判断数字如果是个位数则前面添加0
                		         $number = '0'.$i;
                		      }
                		      else 
                		      {
                		          $number = $i;
                		      }
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum))
                                            		  {
                                            		    echo $redOutNum[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                		  <?php 
                               }
                    		?>
                      </ul>
                      <hr>
                      <?php 
                      if (count($nball)>=2)
                      {
                      ?>
                      <div>
                      <ul class="fs_blue_area">
                      <?php 
                      
                		  for ($i = 1; $i <= $nball[1]; $i++) {
                		      if ($i < 10) { //判断数字如果是个位数则前面添加0
                		         $number = '0'.$i;
                		      }
                		      else 
                		      {
                		          $number = $i;
                		      }
                		  
                		?>
                        <li>
                        
                        <span class="pblueNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $blueOutNum))
                                            		  {
                                            		    echo $blueOutNum[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                		  <?php 
                               }
                    		?>
                      </ul>
                      </div>
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

