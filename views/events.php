<?php
 include Url::getPath('models').'DBexpos.php';
                    $expos = new DBexpos();
                    $expos_result = $expos->getExposDetails(null,"0");        
?>
<div class="bodyWidth">
    <!-- Events -->
    <section id="events">
    	<div class="LeftDiv">
        	<!-- content details -->
            <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>events/indexImg.jpg)"></div>
            <p>43 expos in 12 years, over 2,365 past exhibitors and 129,000 investors and welcomed the voice of hundreds of renowed experts to our educational driven seminars.</p>
            <div class="row event_contact">
            	<a class="contactDiv">
                	<div href="#" class="icon-fb2"></div>
                    <div class="stxt">Find us on</div>
                    <div class="text">Facebook</div>
                </a>
                <a class="contactDiv">
                	<div href="#" class="icon-skype"></div>
                    <div class="stxt">Skype</div>
                    <div class="text">SmartEpo</div>
                </a>
            </div>
            <div class="GlobalTitle">Upcoming Events</div>
            <div class="keyEvent">
            	<a class="details" href="index.php?page=events_details&event_page=overview&event=<?php echo $expos_result[0]['expos_id']?>&tab=v">
                    <?php
                    
                    if(sizeof($expos_result)>0){
                          echo '  <h2>'.$expos_result[0]['expos_title_en'].'</h2>';
                       
                       $row_description = array();
                       $string_description = $expos_result[0]['expos_des_en'];
                       $row_description = explode('\r\n', $string_description);
                       
                       echo '<ul>';
                       for($j=0;$j<sizeof($row_description);$j++){
                           echo '<li>'.$row_description[$j].'</li>';
                       }
                       echo '</ul>';
                        
                    }
                    
                    ?>
                    <!--
                	<h2>SMART Expo – Singapore</h2>
                    <ul>
                    	<li>Special Feature - Financial Investment Pavilion</li>
                        <li>2 - 3 April 2016. Hall B, Marina Bay Sands Convention Centre</li>
                    </ul>
                        -->
                    
                </a>
                <div class="countBox">
                	<h2>upcoming!</h2>
                    <div class="count_down">
                    	Countdown Until Expo
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
						//cd1.TargetDate = "06/30/2016 07:00 PM";
                                                cd1.TargetDate = "<?php echo $expos_result[0]['expos_start_date']?>";
						cd1.DisplayFormat = "%%D%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%H%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%M%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%S%%";
						cd1.Setup();		
	</script>
                </div>
           	 </div>
            <div class="sectionDiv">
                <div class="eventList">
                    <!--
                	<h2><a href="#">Beijing Int'l Property & Investment Expo</a></h2>
                    <ul>
                    	<li>14 - 17 April 2016 Beijing Exhibition Center</li>
                    </ul>
                    <h2><a href="#">SMART Expo - Hong Kong</a></h2>
                    <ul>
                    	<li>4 - 5 June 2016. Hall 3E, Hong Kong Convention & Exhibition Centre</li>
                    </ul>
                    <h2><a href="#">SMART Expo - Singapore</a></h2>
                    <ul>
                    	<li>24 - 25 September 2016. Hall A, Marina Bay Sands Convention Centre</li>
                    </ul>
                    -->
                    <?php
                   
                    for($i=1;$i<sizeof($expos_result);$i++){
                       echo '  <h2><a href="index.php?page=events_details&event_page=overview&event='.$expos_result[$i]['expos_id'].'&tab=v">'.$expos_result[$i]['expos_title_en'].'</a></h2>';
                       
                       $row_description = array();
                       $string_description = $expos_result[$i]['expos_des_en'];
                       $row_description = explode('\r\n', $string_description);
                       
                       
                       
                       // database store html or ?
                       
                       
                       echo '<ul>';
                       for($j=0;$j<sizeof($row_description);$j++){
                           echo '<li>'.$row_description[$j].'</li>';
                       }
                       echo '</ul>';
                    }
                    ?>
                    
                    
                    
                </div>
                <button  onclick="window.location.href='index.php?page=events_details&event_page=past_expos&event=<?php echo $expos_result[0]['expos_id']?>&tab=v'">Past SMART Expos <div class="icon-right-1"></div></button>
            </div>
            
            <!-- content details / -->
      	</div>
        <div class="RightDiv">
            <div class="row">
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
                <!-- banner 1 -->
                <div class="rollingBox_300_260 videoBox marginBottom">
                    <ul class="unslider-wrap">
                        <li>
                            <div class="container ">
                            	<iframe>Insert video here</iframe>
                            </div>
                            <div class="video_desc">
                            	<h2>Inspiration Asia SMART Expo HK Nov 2015</h2>
                                A clip of the SMART Expo on Hong Kong's...
                            </div>
                        </li>
                    </ul>
                    <div class="row">
                    	<ol class="flex-control-nav">
                            <li><a>1</a></li>
                            <li><a class="active">2</a></li>
                            <li><a>3</a></li>
                        </ol>
                        <button>More Videos</button>
                    </div>
                </div>
            </div>
            <!-- Feature property -->
            <div id="featureProp">
                <div class="img" style="background-image:url(<?php echo Url::imagesFolderPath();?>property/featureProperty.jpg)"></div>
                <div class="clearFix"></div>
                <a href="#" class="more">View More</a>
                <div class="desc RLBox">
                   <a class="icon-left-1" href="#"></a>
                    <div class="text">
                        <h2><a href="#">Featured Property</a></h2>
                        Manhattan Terraces @ New Zealand
                    </div>
                    <a class="icon-right-1" href="#"></a>
                </div>
            </div>
        </div>
    </section>
    <section  class="events home">
    	<div class="LeftDiv">
        	<!-- content details -->
            <div class="column3">
            	<div class="column">
                    <div class="boxes">
                        <h2>Organizers</h2>
                        <div class="bodyWidth">
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/rbi.jpg)"></div>
                            </a>
                        </div>
                    </div>
                    <div class="boxes">
                        <h2>Media Partners</h2>
                        <div class="bodyWidth">
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/logo_marinaBay.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/logo_sphere.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/logo_properT.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/logo_australia_association.jpg)"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="boxes">
                        <h2>Gold Sponsor</h2>
                        <div class="bodyWidth">
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/logo_centralEquity.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/littleProject.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/pellicano.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/perriProject.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/southKey.jpg)"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="boxes">
                        <h2>Silver Sponsor</h2>
                        <div class="bodyWidth">
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/mphBookstores.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/expLiving.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/propertyKing.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/propertyLifestyle.jpg)"></div>
                            </a>
                            <a href="#">
                                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>logos/propReport.jpg)"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content details / -->
      	</div>
        <div class="RightDiv">
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
</div>