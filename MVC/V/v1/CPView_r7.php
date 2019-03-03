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
                $cnum = 1;
                $redCounrAry = array();
                $cred1 = array(); $cred2 = array(); $cred3 = array(); $cred4 = array(); $cred5 = array(); $cred6 = array();
                $cred7 = array();
                for ($i = 0; $i < $count_json; $i++)
                {   
                    $ary_json = $de_json[$i];
                    $strCode = $ary_json->openCode;
                    $ballNum=cpRedCode($strCode);
                    
                    if ($cnum == 1)
                    {
                        $ary1 = $ballNum;
                        $cnum++;
                    }
                    elseif ($cnum == 2)
                    {
                        $ary2 = $ballNum;
                        $equalNum = countMinus($ary2, $ary1);
                        //初始化
                        $ary1 = $ary2;
                        $ary2 = "";
                        //$cnum=2;
                    }
                
                ?>
                
                <?php if ($equalNum){?>
                <div class="lottery_wrap2">
                                                                           差值    
                    <div id="checkBall">
                      <button type="button" class="btn" data-toggle="popover" data-placement="bottom" title="合值、平均值" data-content="<?php $str=computeZu(array_sum($equalNum), null, 7, 0); echo $str;?>">
                                                                            差值计算
                    </button>
                    </div>
                    <p id="p0"><?php $cred1[] =abs($equalNum[0]); echo $equalNum[0];?></p>
                    <p id="p1"><?php $cred2[] =abs($equalNum[1]); echo $equalNum[1];?></p>
                    <p id="p2"><?php $cred3[] =abs($equalNum[2]); echo $equalNum[2];?></p>
                    <p id="p3"><?php $cred4[] =abs($equalNum[3]); echo $equalNum[3];?></p>
                    <p id="p4"><?php $cred5[] =abs($equalNum[4]); echo $equalNum[4];?></p>
                    <p id="p5"><?php $cred6[] =abs($equalNum[5]); echo $equalNum[5];?></p>
                    <p id="p6"><?php $cred7[] =abs($equalNum[6]); echo $equalNum[6];?></p>
                </div>
                <?php }?>
                <div class="lottery_wrap" id="lotteryWrap"> 
                    开奖
                    <div id="checkBall">
                    <button type="button" class="btn" data-toggle="popover" data-placement="bottom" title="合值、平均值" data-content="<?php $str=computeZu(array_sum($ballNum), null, 7, 0); echo $str;?>">
                    <?php echo $ary_json->expect;?>期-计算 
                    </button>
                    </div>
                    <p id="p0"><?php echo $ballNum[0];?></p>
                    <p id="p1"><?php echo $ballNum[1];?></p>
                    <p id="p2"><?php echo $ballNum[2];?></p>
                    <p id="p3"><?php echo $ballNum[3];?></p>
                    <p id="p4"><?php echo $ballNum[4];?></p>
                    <p id="p5"><?php echo $ballNum[5];?></p>
                    <p id="p6"><?php echo $ballNum[6];?></p>
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
                    $red1 = array(); $red2 = array(); $red3 = array(); $red4 = array(); $red5 = array(); $red6 = array();$red7 = array();
                    for ($i = 0; $i < $count_json; $i++)
                    {
                        $ary_json = $de_json[$i];
                        $strCode = $ary_json->openCode;
                        $redAry=cpRedCode($strCode);

                        $red1[] = $redAry[0];
                        $red2[] = $redAry[1];
                        $red3[] = $redAry[2];
                        $red4[] = $redAry[3];
                        $red5[] = $redAry[4];
                        $red6[] = $redAry[5];
                        $red7[] = $redAry[6];
                     
  
                   }
                   $redOutNum1 = numberCount2($red1);
                   $redOutNum2 = numberCount2($red2);
                   $redOutNum3 = numberCount2($red3);
                   $redOutNum4 = numberCount2($red4);
                   $redOutNum5 = numberCount2($red5);
                   $redOutNum6 = numberCount2($red6);
                   $redOutNum7 = numberCount2($red7);
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
                          <td class="active">6号球的和</td>
                          <td class="active">7号球的和</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($red1);?></td>
                          <td class="active"><?php echo array_sum($red2);?></td>
                          <td class="active"><?php echo array_sum($red3);?></td>
                          <td class="active"><?php echo array_sum($red4);?></td>
                          <td class="active"><?php echo array_sum($red5);?></td>
                          <td class="active"><?php echo array_sum($red6);?></td>
                          <td class="active"><?php echo array_sum($red7);?></td>
                        </tr>
                    </table>
                    
                    <table class="table table-condensed">

                        <tr>
                          <td class="active">1球差和</td>
                          <td class="active">2球差和</td>
                          <td class="active">3球差和</td>
                          <td class="active">4球差和</td>
                          <td class="active">5球差和</td>
                          <td class="active">6球差和</td>
                          <td class="active">7球差和</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($cred1);?></td>
                          <td class="active"><?php echo array_sum($cred2);?></td>
                          <td class="active"><?php echo array_sum($cred3);?></td>
                          <td class="active"><?php echo array_sum($cred4);?></td>
                          <td class="active"><?php echo array_sum($cred5);?></td>
                          <td class="active"><?php echo array_sum($cred6);?></td>
                          <td class="active"><?php echo array_sum($cred7);?></td>
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
                          <td class="active">1球和的平均数</td>
                          <td class="active">2球和的平均数</td>
                          <td class="active">3球和的平均数</td>
                          <td class="active">4球和的平均数</td>
                          <td class="active">5球和的平均数</td>
                          <td class="active">6球和的平均数</td>
                          <td class="active">7球和的平均数</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($red1)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red2)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red3)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red4)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red5)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red6)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($red7)/$count_json;?></td>
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
                          <td class="active">6球差的平均数</td>
                          <td class="active">7球差的平均数</td>
                        </tr>
                        <tr>
                          <td class="active"><?php echo array_sum($cred1)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred2)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred3)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred4)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred5)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred6)/$count_json;?></td>
                          <td class="active"><?php echo array_sum($cred7)/$count_json;?></td>
                        </tr>
                    </table>
                     </div>
                    </div>
                    
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">最近<?php echo $count_json;?>期开奖号码出现的次数</h3>
                      </div>
                      <div class="panel-body">
                      <?php 
                          $nball=explode("+",$numball);
                          if ($cpName="qxc")
                          {
                      ?>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">一</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum1))
                                            		  {
                                            		    echo $redOutNum1[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">二</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum2))
                                            		  {
                                            		    echo $redOutNum2[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">三</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum3))
                                            		  {
                                            		    echo $redOutNum3[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">四</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum4))
                                            		  {
                                            		    echo $redOutNum4[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">五</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum5))
                                            		  {
                                            		    echo $redOutNum5[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">六</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum6))
                                            		  {
                                            		    echo $redOutNum6[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                      <div class="lottery_wrap3">
                      <ul class="fs_red_area"> 
                      <li><span class="predNum">七</span><div class="text-center">次数</div></li>
                      <?php 
                		  for ($i = 0; $i <= $nball[0]; $i++) {
                		      $number=$i;
                		  
                		?>
                        <li>
                        
                        <span class="predNum"><?php echo $number;?></span>
                        <div class="text-center">
											
												<?php if (array_key_exists($number, $redOutNum7))
                                            		  {
                                            		    echo $redOutNum7[$number]."次"; 
                                            		  }
                                            		  else 
                                            		  {
                                            		      echo "0次";
                                            		  }
                                            		  ?>
										
                        
                		  </div>
                		  
                		  </li>
                	 <?php } ?>
                      </ul>
                      </div>
                        <?php
                          }?>
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

