<?php
// config---------------------------
$spilt = 3;
$numOfImage = 5;
// config---------------------------

 include Url::getPath('models').'DBexpos.php';
 include Url::getPath('models').'DBexposOverview.php';
 include Url::getPath('models').'DBexposSponsorPartner.php';
if(isset($_GET['event'])){
    $event_id = $_GET['event'];
} else{
    $event_id = "";
}

                    $expos = new DBexpos();
                    $expos_result = $expos->getExposDetails($event_id);
                    
                    $expos_overview = new DBexposOverview();
                    $expos_overview_result = $expos_overview->getExposOverview($event_id);
                    
                    $expos_sp_cat = new DBexposSponsorPartner();
                    $expos_sp_cat_result =$expos_sp_cat->getExposSponsorCat($event_id);
                    
                    
                    $expo_sp = new DBexposSponsorPartner();
                    
                    $num_of_cat = sizeof($expos_sp_cat_result);
                    
                    
                    $cat_column = array();
                    for($i=0;$i<$spilt;$i++){
                        $cat_column[$i] = 0;
                    }
                  
                    $count = 0;
                    for($i=0;$i<$num_of_cat;$i++){
                        if($count % $spilt ==0){
                            $count = 0 ;
                        }
                        $cat_column[$count]= $cat_column[$count] + 1;
                        $count++;
                    }
              
                    
    
?>
<div class="bodyWidth">
    <!-- Events -->
    <section id="events" class="details">
    	<div class="LeftDiv">
        	<!-- content details -->
            <div class="boxes event">
                
                <?php
                    
                    if(sizeof($expos_result)>0){
                          echo '  <div class="Txt1"><a href="#">'.$expos_result[0]['expos_title_en'].'</a></div>';

                       $row_description = array();
                       $string_description = $expos_result[0]['expos_des_en'];
                       $row_description = explode('\r\n', $string_description);
                       
                      // for($j=0;$j<sizeof($row_description);$j++){
                      //     echo '<div class="Txt2">'.$row_description[$j].'</div>';
                      //  }
                       echo '<div class="Txt2">';
                       for($j=0;$j<sizeof($row_description);$j++){
                          echo $row_description[$j].'<br/>';
                       }
                       echo '</div>';
                    }
                    ?>
                <!--
                <div class="Txt1"><a href="#">SINGAPORE 2 - 3 April 2016 • 11am - 7pm</a></div>
                <div class="Txt2">Hall B, Marina Bay Sands Convention Centre</div>
                -->
                
                <!--
            	<div class="Txt1"><a href="#">SINGAPORE 2 - 3 April 2016 • 11am - 7pm</a></div>
                <div class="Txt2">Hall B, Marina Bay Sands Convention Centre</div>
                -->
                <div class="img" style="background-image:url(<?php echo Url::imagesFolderPath();?>events/details_eventImg.jpg)">
                    <div class="count_down">
                    	<h2>Countdown Until Expo</h2>
                        <div class="row">
                            <div class="column"></div>
                            <div class="column"></div>
                            <div class="column"></div>
                            <div class="column"></div>
                        </div>
                    </div>
                      <script language="JavaScript" type="text/javascript">
						var cd1 = new countdown('cd1');
						cd1.Div = "count_down";
						cd1.TargetDate = "<?php echo $expos_result[0]['expos_start_date'] ?>";
						cd1.DisplayFormat = "%%D%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%H%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%M%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%S%%";
						cd1.Setup();		
	</script>
                    <div class="contact">
                    	<div class="txt fltLft">Hotline +852 2944 6430</div>
                        <a href="#" class="icon-skype fltLft"></a>
                        <a href="#" class="icon-fb2 fltLft"></a>
                    </div>
                </div>
                <div class="contactMobile">
                    	<div class="txt fltLft">Hotline +852 2944 6430</div>
                        <a href="#" class="icon-skype fltLft"></a>
                        <a href="#" class="icon-fb2 fltLft"></a>
                    </div>
            </div>
            <!-- tab -->
           	<ul class="nav-tabs">
                <li id="tabv" <?php if((isset($_GET['tab']) && $_GET['tab'] =='v')|| !isset($_GET['tab']) ){echo 'class="active"';}?>><a href="index.php?page=events_details&event_page=overview&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Visitor</a></li>
                <li id="tabe" <?php if(isset($_GET['tab']) && $_GET['tab'] =='e'){echo 'class="active"';}?>><a href="index.php?page=events_details&event_page=booth&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Exhibitor</a></li>
                <div class="clearFix"></div>
            </ul>
            
            
            <?php if((isset($_GET['tab']) && $_GET['tab'] =='v')|| !isset($_GET['tab']) ){ ?>
                    <ul class="sub-tab">
                        <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='overview')){echo 'class="active"';}?>>
                            <a href="index.php?page=events_details&event_page=overview&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Overview</a>
                        </li>
                        
                        <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='pass')){echo 'class="active"';}?>>
                            <a href="index.php?page=events_details&event_page=pass&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Free Expo Pass</a>
                        </li>
                        
                        <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='vistor_venue')){echo 'class="active"';}?>>
                            <a href="index.php?page=events_details&event_page=vistor_venue&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Venue</a>
                        </li>
                        
                        <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='gallery')){echo 'class="active"';}?>>
                            <a href="index.php?page=events_details&event_page=gallery&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Gallery</a>
                        </li>
                        
                        <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='past_expos')){echo 'class="active"';}?>>
                            <a href="index.php?page=events_details&event_page=past_expos&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">Past Expos</a>
                        </li>
                    </ul>
            <?php } else {?>
                        <ul class="sub-tab">
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='booth')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=booth&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Booth Reservation</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='database_rental')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=database_rental&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Database Rental</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='advertising')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=advertising&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Advertising</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='vistor_profile')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=vistor_profile&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Visitor Profile</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='seminars')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=seminars&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Seminars</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='expo_marketing')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=expo_marketing&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Expo Marketing</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='expo_partners')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=expo_partners&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Expo Partners</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='exhibitor_venue')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=exhibitor_venue&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Venue</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='gallery')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=gallery&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Gallery</a>
                           </li>
                           
                           <li <?php if((isset($_GET['event_page']) && $_GET['event_page'] =='past_expos')){echo 'class="active"';}?>>
                               <a href="index.php?page=events_details&event_page=past_expos&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Past Expos</a>
                           </li>
                       </ul>
            <?php }?>
            <?php 
           if(isset($_GET['event_page'])){
               $event_page = $_GET['event_page'];
           } else{
               $event_page = 'overview';
           }
                include Url::getPath("views/event_details_sub") .$event_page.'.php';
            ?>
            
            
            
            <div class="sectionDiv">
            	<div class="GlobalTitle">Hot Current Issue</div>
                <div class="webView">
                	<a href="#">
                    	<div class="icon-left-1 disable"></div>
                    </a>
                    <div class="unslider">
                    	<div class="logo-slider unslider-horizontal">
                        	<ul class="unslider-wrap unslider-carousel">
                            	<!-- actived 3 logos -->
                                <li class="unslider-active">
                                	<div class="main">
                                    	<a href="#">
                                        	<div class="hotDiv">
                                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>profile/profile_pic1.jpg)"></div>
                                            </div>
                                        </a>
                                        <a href="#">
                                        	<div class="hotDiv">
                                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>profile/profile_pic2.jpg)"></div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <!-- actived 3 logos / -->
                                <!-- another 3 logos -->
                                <!-- another 3 logos / -->
                            </ul>
                        </div>
                    </div>
                    <a href="#">
                    	<div class="icon-right-1"></div>
                    </a>
                </div>
                <div class="mobileView hotDiv">
                	<div class="realDiv">
                    	<a href="#">
                            <div class="propDiv">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>profile/profile_pic1.jpg)"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="propDiv">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>profile/profile_pic2.jpg)"></div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="propDiv">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>profile/profile_pic2.jpg)"></div>
                            </div>
                        </a>
                    </div>
            </div>
      	</div>
            <!-- content details / -->
      	</div>
        <div class="RightDiv">
            	<!-- webinar -->
                <div id="webinar">
                    <a href="#">
                        <div class="top">
                            <h2>Discover Real Estate Investment in Japan</h2>
                            <div class="row">
                                <img src="<?php echo Url::imagesFolderPath();?>webinar_speakerIMG.jpg">
                                <div class="speaker">
                                    <h3>Giro Katsimbrakis</h3>
                                    CEO, Imperium Investment Group
                                </div>
                            </div>
                            <div class="clearFix"></div>
                        </div>
                    </a>
                    <a href="#" class="format">
                        <span>Webinar</span>
                        <div class="btn">Learn More &raquo;</div>
                    </a>
                    <div class="details">
                        Friday, January 29, 2016<br>
                        2:00 PM HKT - 3.00PM HKT
                    </div>
                </div>
                <!-- banner 2 -->
                <div class="banner_300_600">
                    <ul class="unslider-wrap">
                        <li>
                            <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>ad_300_600.gif);"></div>
                        </li>
                    </ul>
                    <ol class="flex-control-nav">
                        <li><a>1</a></li>
                        <li><a class="active">2</a></li>
                        <li><a>3</a></li>
                        <li><a>4</a></li>
                        <li><a>5</a></li>
                    </ol>
                </div>
        </div>
    </section>
                <section id="events" class="home">
                    <div class="LeftDiv">
                        <div class="column3">
                        <?php


                        $count_cat = 0;
                        for($i=0;$i<$spilt;$i++){
                            echo '<div class="column">';
                            for($j=0;$j<$cat_column[$i];$j++){
                                echo ' <div class="boxes">';
                                echo '<h2>'.$expos_sp_cat_result[$count_cat]['sp_cat_name_en'].'</h2>';
                                echo ' <div class="bodyWidth">';
                                $expo_sp_result = $expo_sp->getExposSponsorPartner($event_id, $expos_sp_cat_result[$count_cat]['sp_cat_id']);

                                $numofsp_result = sizeof($expo_sp_result);
                                echo $numofsp_result;
                                if ($numofsp_result>$numOfImage){
                                    $fadeimages = array();
                                    $num = array();
                                    for($k=0;$k<$numOfImage;$k++){
                                        $fadeimages[$k] = array();
                                        $num[$k] = 0;
                                    }

                                    $count = 0 ;
                                     for($k=0;$k<sizeof($expo_sp_result);$k++){
                                         if($count % $numOfImage == 0){
                                             $count = 0;
                                         }
                                          //$fadeimages[$count][$num[$count]]['logo_img'] = $expo_sp_result[$k]['sp_logo_url'];
                                          //$fadeimages[$count][$num[$count]]['logo_hyperlink'] = $expo_sp_result[$k]['sp_logo_hyperlink'];
                                          //$fadeimages[$count][$num[$count]]['target'] = "_blank";
                                         if ( $expo_sp_result[$k]['sp_logo_url'] == null ){
                                             $expo_sp_result[$k]['sp_logo_url']="";
                                         }
                                         $fadeimages[$count][$num[$count]][0] = $expo_sp_result[$k]['sp_logo_url'];
                                         if ( $expo_sp_result[$k]['sp_logo_hyperlink'] == null ){
                                             $expo_sp_result[$k]['sp_logo_hyperlink']="#";
                                         }
                                         $fadeimages[$count][$num[$count]][1] = $expo_sp_result[$k]['sp_logo_hyperlink'];
                                         $fadeimages[$count][$num[$count]][2] = "_blank";
                                          $num[$count]++;
                                          $count++;

                                        }
                                       // var_dump($expo_sp_result);
                                        //var_dump($fadeimages);
                                    ?>
                                        <?php  for($k=0;$k<$numOfImage;$k++){ 
                                            ?>
                                        <div class="img" style='min-height:90px;'>

                                           <script>
                                               <?php
                                                        $php_array = $fadeimages[$k];
                                                        $js_array = json_encode($php_array);
                                                        echo "var javascript_array = ". $js_array . ";\n";
                                                        ?>                                                                       
                                            new fadeshow(javascript_array, 142, 90, 0, 3000, 0, "R");
                                            </script>
                                            <?php //echo "<br/>var javascript_array = ". $js_array . ";\n";?>
                                            </div>
                                        <?php                            
                                        }?>
                                    <?php
                                } else{
                                        for($k=0;$k<sizeof($expo_sp_result);$k++){
                                            echo ' <a href="'.$expo_sp_result[$k]['sp_logo_hyperlink'].'" target="_blank">
                                                   <div class="img" style="background-image: url('.$expo_sp_result[$k]['sp_logo_url'].')"></div>
                                                   </a>';
                                        }
                                }
                                echo '</div>';
                                echo '</div>';
                                $count_cat++;
                            }
                            echo '</div>';
                        }
                        ?>
                            </div>
                    </div>
                    <div class="RightDiv">
                    </div>
                </section>
</div>

