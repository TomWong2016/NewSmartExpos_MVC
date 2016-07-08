<?php
 include Url::getPath('models').'DBexpos.php';
                    $expos = new DBexpos();
                    $expos_result = $expos->getExposDetails(null,'0');
                    
?>
<div class="bodyWidth">
    <!-- Hottest Event -->
    <section id="HotEvent">
        <div class="LeftDiv">
            <div class="GlobalTitle">Hottest event</div>
            
            
             <?php
                    
                    if(sizeof($expos_result)>0){
                          echo '  <div class="Txt1"><a href="index.php?page=events_details&event_page=overview&event='.$expos_result[0]['expos_id'].'&tab=v">'.$expos_result[0]['expos_title_en'].'</a></div>';

                       $row_description = array();
                       $string_description = $expos_result[0]['expos_des_en'];
                       $row_description = explode('\r\n', $string_description);
                       
                       for($j=0;$j<sizeof($row_description);$j++){
                           echo '<div class="Txt2">'.$row_description[$j].'</div>';
                       }
                    }
                    ?>
            
            <!--
            <div class="Txt1"><a href="#">SINGAPORE 2 - 3 April 2016 • 11am - 7pm</a></div>
            <div class="Txt2">Hall B, Marina Bay Sands Convention Centre</div>
            -->
            <div class="eventDesc">
               
            	
                
               
         <script language="JavaScript" type="text/javascript">
						var cd1 = new countdown('cd1');
						cd1.Div = "count_down";
						cd1.TargetDate = "<?php echo $expos_result[0]['expos_start_date'] ?>";
						cd1.DisplayFormat = "%%D%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%H%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%M%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%S%%";
						cd1.Setup();		
	</script>
        
             
          <script language="JavaScript" type="text/javascript">
						var cd2 = new countdown('cd2');
						cd2.Div = "count_down2";
						cd2.TargetDate = "<?php echo $expos_result[0]['expos_start_date'] ?>";
						cd2.DisplayFormat = "%%D%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%H%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%M%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%S%%";
						cd2.Setup();	
	</script>
                <div class="ImgDiv"  style=" background-image:url(<?php echo Url::imagesFolderPath();?>smartexpos_03.jpg)">
                <div class="count_down">
                    <h2>Countdown Until Expo</h2>
                    <div  class="row">
                        <!--
                        <div class="column">67<br>Days</div>
                        <div class="column">01<br>Hrs</div>
                        <div class="column">08<br>Min</div>
                        <div class="column">06<br>Sec</div>
                        -->
                       
                        <div class="column"></div>
                        <div class="column"></div>
                        <div class="column"></div>
                        <div class="column"></div>
                        </div>
                   <!-- <div class="row"><div id="countdown_bottom" style="font-size:15px;">Days&nbsp;&nbsp;&nbsp;Hrs&nbsp;&nbsp;&nbsp;&nbsp;Min&nbsp;&nbsp;&nbsp;Sec</div></div>-->
                    <span class="arrowDown"></span>
                </div>
                   <div class="count_down2">
                    <div class="txt">
                        <h2>Countdown Until Expo</h2>
                        <div class="row">
                            <div class="column">67<br>Days</div>
                            <div class="column">01<br>Hrs</div>
                            <div class="column">08<br>Min</div>
                            <div class="column">06<br>Sec</div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="clearFix"></div>
            <div class="EventBtn">
                <div class="left">
                    <div class="txt fltLft"><a href="index.php?page=events_details&event_page=booth&event=<?php echo $expos_result[0]['expos_id']?>&tab=e">Reserve your booth now &raquo;</a></div>
                </div>
                <div class="right">
                    <div class="txt fltLft">Hotline +852 2944 6430</div>
                    <a href="#" class="icon-skype fltLft"></a>
                    <a href="#" class="icon-fb2 fltLft"></a>
                </div>
                <div class="clearFix"></div>
            </div>
        </div>
        <div class="RightDiv">
    		<div class="row">
            	<!-- small Event Slider -->
                <div id="smallEvent">
                    <ul class="unslider-wrap">
                    	<li>
                        	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/featureImg01.jpg);">
                            	<div class="txtBg">
                            		<div class="txt">Small Event 1</div>
                            	</div>
                            </div>
                        </li>
                        <li></li>
                    </ul>
                    <ol class="flex-control-nav">
                        <li><a class="active">1</a></li>
                        <li><a>2</a></li>
                        <li><a>3</a></li>
                        <li><a>4</a></li>
                        <li><a>5</a></li>
                    </ol>
                </div>
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
                    <a class="format">
                        Webinar
                        <div class="btn">Learn More &raquo;</div>
                    </a>
                    <div class="details">
                        Friday, January 29, 2016<br>
                        2:00 PM HKT - 3.00PM HKT
                    </div>
                </div>
            </div>
   		</div>
    </section>
    <!-- Latest Features -->
    <section id="latestFeatures">
    	<div class="LeftDiv listing">
        	<div class="GlobalTitle">
            	Latest Features
            	<div class="search">
                    <input>
                    <span class="button icon-search-2"></span>
                </div>
            </div>
            <a href="#" class="row eachArticle">
                <div class="imgBorder">
                    <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/featureImg01.jpg);"></div>
                </div>
                <span class="details">
                <h2>Japan Property - T's Square Osakajo Exhibition & Seminar 22-24 January 2016, Hong Kong</h2>
                <p>Held at the Sands Expo & Convention Centre – Singapore's newest exhibition venue featuring the island's largest hotel, casino, entertainment and shopping complex (Marina Bay Sands).</p>
                <p>Easily accessible location for show visitors with the new opening of the Bayfront MRT station, which leads directly to the expo hall.</p>
                <div class="remarks"><span onClick="#">#Overseas Properties</span> | April 11, 2016</div>
                </span>
            </a>
            <a href="#" class="row eachArticle">
       	    	<div class="imgBorder">
                	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/featureImg02.jpg);"></div>
                </div>
                <span class="details">
                <h2>Special Feature – Financial Investment Pavilion, 2-3 April 2016. Hall B, Marina Bay Sands Convention Centre</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie nulla ultrices, posuere turpis vel, congue lectus.</p>
				<p>Suspendisse commodo elit nibh, ut volutpat leo cursus ut.</p>
                <div class="remarks"><span onClick="#">#News</span> | April 10, 2016</div>
                </span>
            </a>
            <a href="#" class="row eachArticle">
       	    	<div class="imgBorder">
                	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/featureImg03.jpg);"></div>
                </div>
                <span class="details">
                <h2>DBS Bank Limited Time Offer to promptly apply for a Credit Card!</h2>
                <p>Suspendisse velit sem, fermentum quis mattis nec, egestas ultricies sem. Nam ornare, lacus nec pulvinar blandit, mi neque condimentum orci, eget lobortis lectus sapien ut justo.</p>
				<p>Proin sollicitudin mollis magna. Nulla maximus nisl eu arcu mollis.</p>
                <div class="remarks"><span onClick="#">DBS Bank Sponsored</span></div>
                </span>
            </a>
            <a href="#" class="row eachArticle">
       	    	<div class="imgBorder">
                	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/01.jpg);"></div>
                </div>
                <span class="details">
                <h2>Japan Property - T's Square Osakajo Exhibition & Seminar 22-24 January 2016, Hong Kong</h2>
                <p>Held at the Sands Expo & Convention Centre – Singapore's newest exhibition venue featuring the island's largest hotel, casino, entertainment and shopping complex (Marina Bay Sands).</p>
				<p>Easily accessible location for show visitors with the new opening of the Bayfront MRT station, which leads directly to the expo hall.</p>
                <div class="remarks"><span onClick="#">#Overseas Properties</span> | April 11, 2016</div>
                </span>
            </a>
            <a href="#" class="row eachArticle">
       	    	<div class="imgBorder">
                	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/02.jpg);"></div>
                </div>
                <span class="details">
                <h2>Special Feature – Financial Investment Pavilion, 2-3 April 2016. Hall B, Marina Bay Sands Convention Centre</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas molestie nulla ultrices, posuere turpis vel, congue lectus.</p>
				<p>Suspendisse commodo elit nibh, ut volutpat leo cursus ut.</p>
                <div class="remarks"><span onClick="#">#News</span> | April 10, 2016</div>
                </span>
            </a>
            <a href="#" class="row eachArticle">
       	    	<div class="imgBorder">
                	<div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>property/03.jpg);"></div>
                </div>
                <span class="details">
                <h2>DBS Bank Limited Time Offer to promptly apply for a Credit Card!</h2>
                <p>Suspendisse velit sem, fermentum quis mattis nec, egestas ultricies sem. Nam ornare, lacus nec pulvinar blandit, mi neque condimentum orci, eget lobortis lectus sapien ut justo.</p>
				<p>Proin sollicitudin mollis magna. Nulla maximus nisl eu arcu mollis.</p>
                <div class="remarks"><span onClick="#">DBS Bank Sponsored</span></div>
                </span>
            </a>
      </div>
        <div class="RightDiv">
        	<div class="row">
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
                <!-- banner 1 -->
                <div class="rollingBox_300_260 faqBox marginBottom">
                    <ul class="unslider-wrap">
                    	<li>
                            <h2>Frequently Asked Questions</h2>
                            <div class="eachQuestion">
                                What are the pros and cons to consider when buying, renting or building a new home?<br>
                                <button>GET THE ANSWER</button>
                            </div>
                            <div class="eachQuestion">
                                What's the best way to sell and buy at the same time?<br>
                                <button>GET THE ANSWER</button>
                            </div>
                        </li>
               		</ul>
                    <ol class="flex-control-nav">
                        <li><a>1</a></li>
                        <li><a class="active">2</a></li>
                        <li><a>3</a></li>
                    </ol>
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
    <!-- Profile -->
    <section id="profile">
        <div class="GlobalTitle">Profile</div>
        <div class="row">
        	<div class="column">
				<div class="logo"><a href="#"><img src="<?php echo Url::imagesFolderPath();?>logos/logo_complete.jpg"></a></div>
				<div class="Name"><a href="#">Complete Ltd.</a></div>
				<p>With an extensive sales network of 257 offices around Japan, making us the No.1 directly-managed brokerage firm nationwide, we always have a large number of properties on our books. We also have an extensive network 65 offices ...</p>
              <div class="GlobalTitle3">Next Upcoming Event : SMART Expo - Singapore</div>
              <div class="Txt2">24 - 25 September 2016. Hall A, Marina Bay Sands Convention Centre</div>
              <button>Book an Appointment <div class="icon-right-1"></div></button>
            </div>
            <div class="column">
                <div class="logo"><a href="#"><img src="<?php echo Url::imagesFolderPath();?>logos/logo_sumitomo.jpg"></a></div>
                <div class="Name"><a href="#">Sumitomo Real Estate Sales Co., Ltd.</a></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt nisi at dui lacinia vulputate. Curabitur elementum vehicula metus vitae fermentum. Pellentesque hendrerit elementum neque nec sodales...</p>
                <div class="GlobalTitle3">Next Upcoming Event : SMART Expo - Hong Kong</div>
              	<div class="Txt2">29 - 31 August 2016. Hall A-C, Hong Kong Convention and Exhibition Centre</div>
                <button>Book an Appointment <div class="icon-right-1"></div></button>
            </div>
        </div>
    </section>
    <!-- who we are -->
    <section id="who">
        <div class="LeftDiv">
            <div class="GlobalTitle2">Who we are</div>
            <p>SMART Expo Ltd. specializes in property and investment related events, conferences and exhibitions. We are a member of the iProperty Group Limited, an ASX Listed company (ASX:IPP).</p>
        </div>
        <div class="RightDiv">
            <button>Exhibitions : <img src="<?php echo Url::imagesFolderPath();?>icon_smart.png"></button>
            <button>Email Marketing : <img src="<?php echo Url::imagesFolderPath();?>icon_smartdata.png"></button>
        </div>
    </section>
    <!-- banner 2 -->
    <div class="companyAds">
        <ul class="unslider-wrap">
            <li>
                <div class="img" style="background-image: url(<?php echo Url::imagesFolderPath();?>ad_320_150.jpg);"></div>
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
    <div class="clearFix"></div>
</div>