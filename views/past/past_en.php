    <?php
 include_once Url::getPath('models').'DBexposcat.php';
 
 $expo_cat = new DBexposcat();
 $result_expocat = $expo_cat->getExposCat();
    
      $expos_past = new DBexpos();
      
 ?>
 <?php  
    if (sizeof($result_expocat)>0){
     for($i=0;$i<sizeof($result_expocat);$i++){
         
        echo '<div class="pastlist">';
            echo '<div class="expotitle">';            
            echo $result_expocat[$i]['expo_catname_en'];
            echo '</div>';
            
            echo '<table cellspacing="10px">';
            echo '<tr>';
            //echo '<td class="expolink half" valign="top"></td>';
            //echo '<td class="expolink half" valign="top"></td>';
            
            $result_past = $expos_past->getPastExpos($result_expocat[$i]['expo_catid'],1);
             $total = sizeof($result_past);
            if($total>0){
                
                if ($total %2 !=0){
                $left_num = intval($total / 2) + 1;
                } else{
                   $left_num = intval($total / 2);
                }
                $count = 0;
                
                
                // first half
                echo '<td class="expolink half" valign="top">';
                for(;$count<$left_num;$count++){
                        echo '<a href="index.php?page=events_details&event_page=overview&event='.$result_past[$count]['expos_id'].'&tab=v">'.$result_past[$count]['expos_past_title_en'].'</a>';
                        echo '<br/><br/>';  
                }
                echo '</td>';
            
                // second half
                echo '<td class="expolink half" valign="top">';
                 for(;$count<$total;$count++){
                        echo '<a href="index.php?page=events_details&event_page=overview&event='.$result_past[$count]['expos_id'].'&tab=v">'.$result_past[$count]['expos_past_title_en'].'</a>';
                        echo '<br/><br/>';  
                }
                echo '</td>';
            }
           
            
            echo '</tr>';
            echo '</table>';
        echo '</div>';
        
         
     }
 }
 ?>
<!--
<div class="pastlist">
    
 
						
	<div class="expotitle">
		Past HONG KONG Shows
	</div>

	<table cellspacing="10px">
		<tr>
			<td class="expolink half" valign="top">
                                <a href="http://www.smartexpos.com/2016/JunHK/en/overview.php" target="_blank">
					Hong Kong Jun 2016
				</a><br><br>
				<a href="http://www.smartexpos.com/2015/JunHK/en/overview.php" target="_blank">
					Hong Kong Jun 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2014/JunHK/en/overview.php" target="_blank">
					Hong Kong Jun 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/2013/JunHK/en/overview.php" target="_blank">
					Hong Kong Jun 2013
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2012/hkJune/why_visit.htm" target="_blank">
					Hong Kong Jun 2012
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2011/hkjun/why_exhibit.htm" target="_blank">
					Hong Kong Jun 2011
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2008/HKSEP/why_visit.htm" target="_blank">
					Hong Kong Sep 2008
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2007/hkSite/why_visit.htm" target="_blank">
					Hong Kong Jun 2007
				</a><br><br>
				<a href="http://www.3c-ltd.com/smart/expo/index_hk.asp" target="_blank">
					Hong Kong Jun 2005
				</a><br><br>
                <a href="http://www.3c-ltd.com/smart/2004/visitor.asp" target="_blank">
                    Hong Kong Aug 2004
                </a><br><br>
			</td>
			<td class="expolink half" valign="top">
                <a href="http://www.smartexpos.com/2015/NovHK/en/overview.php" target="_blank">
                    Hong Kong Nov 2015
                </a><br><br>
				<a href="http://www.smartexpos.com/2014/NovHK/en/overview.php" target="_blank">
					Hong Kong Nov 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/2013/NovHK/en/overview.php" target="_blank">
					Hong Kong Nov 2013
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2012/hknov/why_visit.htm" target="_blank">
					Hong Kong Nov 2012
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2011/hkdec/why_exhibit.htm" target="_blank">
					Hong Kong Dec 2011
				</a><br><br>
				<a href="http://www.smartexpos.com/2010/JunHK/en/overview.php" target="_blank">
					Hong Kong Jun 2010
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2008/HKJUN/why_visit.htm" target="_blank">
					Hong Kong Jun 2008
				</a><br><br>
				<a href="http://www.3c-ltd.com/v2/2006_hksite/why_visit.htm" target="_blank">
					Hong Kong Jun 2006
				</a><br><br>
			</td>
		</tr>
	</table>

</div><div class="pastlist">

	<div class="expotitle">
		Past SINGAPORE Shows
	</div>

	<table cellspacing="10px">
		<tr>
			<td class="expolink half" valign="top">
                            <a href="http://www.smartexpos.com/2016/AprSG/overview.php" target="_blank">
					Singapore Apr 2016
				</a><br><br>
				<a href="http://www.smartexpos.com/2015/SepSG/overview.php" target="_blank">
					Singapore Sep 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2014/SepSG/overview.php" target="_blank">
					Singapore Sep 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/2013/SepSG/overview.php" target="_blank">
					Singapore Sep 2013
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2012/sgsep/expo_highlights.htm" target="_blank">
					Singapore Sep 2012
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2011/sgoct/why_exhibit.htm" target="_blank">
					Singapore Oct 2011
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2010/sgoct/why_visit.htm" target="_blank">
					Singapore Oct 2010
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2009/SGOCT/why_visit.htm" target="_blank">
					Singapore Oct 2009
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2008/SGOCT/why_visit.htm" target="_blank">
					Singapore Oct 2008
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2007/octSG/why_visit.htm" target="_blank">
					Singapore Oct 2007
				</a><br><br>
				<a href="http://www.3c-ltd.com/v2/expo/Why_visit.htm" target="_blank">
					Singapore Oct 2006
				</a><br><br>
				
			</td>
			<td class="expolink half" valign="top">
				<a href="http://www.smartexpos.com/2015/MarSG/overview.php" target="_blank">
					Singapore Mar 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2014/MarSG/overview.php" target="_blank">
					Singapore Mar 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/2013/MarSG/overview.php" target="_blank">
					Singapore Mar 2013
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2012/sgmar/expo_highlights.htm" target="_blank">
					Singapore Mar 2012
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2011/sgmar/why_exhibit.htm" target="_blank">
					Singapore Mar 2011
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2010/sgmar/why_exhibit.htm" target="_blank">
					Singapore Mar 2010
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2009/SGMAR/why_visit.htm" target="_blank">
					Singapore Mar 2009
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2008/SGMAR/why_visit.htm" target="_blank">
					Singapore Mar 2008
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2007/SGsite/Why_visit.htm" target="_blank">
					Singapore May 2007
				</a><br><br>
				<a href="http://www.3c-ltd.com/v2/2006_sgsite/Why_visit.htm" target="_blank">
					Singapore May 2006
				</a><br><br>
                                <a href="http://www.3c-ltd.com/smart/sg/" target="_blank">
					Singapore Nov 2005
				</a><br><br>
			</td>
		</tr>
	</table>

</div>

<div class="pastlist">

	<div class="expotitle">
		Past CHINA Shows
	</div>

	<table cellspacing="10px">
		<tr>
			<td class="expolink half" valign="top">
                                 <a href="http://www.smartexpos.com/2016/AprBJ/booth.php" target="_blank">
					Beijing Apr 2016
				</a><br><br>
				<a href="http://www.smartexpos.com/2015/OctCD/booth.php" target="_blank">
					Chengdu Oct 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2015/JulSH/cn/advertise.php" target="_blank">
					Shanghai Jul 2015
				</a><br><br>
				<a href="mailto:info@smartexpos.com?subject=Website%20Inquire%20for%20SHANGHAI%2024-26%20October%202014">
					Shanghai Oct 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2013/chisep/roadshow.htm" target="_blank">
					Shanghai Sep 2013
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2013/gznov/gold_key.htm" target="_blank">
					Guangzhou Nov 2013
				</a><br><br>
			</td>
			<td class="expolink half" valign="top">
				<a href="http://www.smartexpos.com/2015/OctGZ/booth.php" target="_blank">
					Guangzhou Oct 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2015/AprBJ/booth.php" target="_blank">
					Beijing Apr 2015
				</a><br><br>
				<a href="http://www.smartexpos.com/2014/AprBJ/booth.php" target="_blank">
					Beijing Apr 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2013/chisep/roadshow.htm" target="_blank">
					Beijing Sep 2013
				</a><br><br>
			</td>
		</tr>
	</table>

</div><div class="pastlist">

	<div class="expotitle">
		OTHER Destination Shows
	</div>

	<table cellspacing="10px">
		<tr>
			<td class="expolink large" valign="top">
				<a href="http://www.smartexpos.com/2015/JanThai/booth.php" target="_blank">
					Phuket Jan 2015
				</a><br><br>
				<a href="mailto:info@smartexpos.com?subject=Website%20Inquire%20for%20KUALA%20LUMPUR%20April%202014">
					Kuala Lumpur Apr 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/2014/JanPK/booth.php" target="_blank">
					Phuket Jan 2014
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2012/hktdec/why_visit.htm" target="_blank">
					Phuket Dec 2012
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2008/KLNOV/why_visit.htm" target="_blank">
					Kuala Lumpur Nov 2008
				</a><br><br>
				<a href="http://www.smartexpos.com/smartexpo2007/klSite/why_visit.htm" target="_blank">
					Kuala Lumpur Nov 2007
				</a><br><br>
			</td>
			<td class="expolink small" valign="top">
				<span>Thailand</span><br><br>
				<span>Malaysia</span><br><br>
				<span>Thailand</span><br><br>
				<span>Thailand</span><br><br>
				<span>Malaysia</span><br><br>
				<span>Malaysia</span><br><br>
			</td>
		</tr>
	</table>
			
</div><div class="pastlist">

    <div class="expotitle">
        OTHER Summit
    </div>

    <table cellspacing="10px">
        <tr>
            <td class="expolink large" valign="top">
                <a href="http://www.smartexpos.com/frontline/2015" target="_blank">
                    Frontline Summit 2015
                </a><br><br>
            </td>
        </tr>
    </table>
            
</div><div class="pastlist" id="past_private_event">

    <div class="expotitle"">
        Past Private Event
    </div>

    <table cellspacing="10px">
        <tr>
            <td class="expolink large" valign="top">
                 <a href="http://www.smartexpos.com/silkwood/" target="_blank">
                    Silkwood (Australia Property)
                </a><br><br>
                <a href="http://www.smartexpos.com/richmore/" target="_blank">
                    Richmore (Malaysia Property)
                </a><br><br>
                <a href="http://www.smartexpos.com/acchoir/" target="_blank">
                    Acchoir (Australia Property)
                </a><br><br>
                <a href="http://www.smartexpos.com/tssquare/">
                    Fargo (Japan Property) 
                </a><br><br>
            </td>
            <td class="expolink small" valign="top">
                    Apr 2016
                <br><br>
                    Oct 2015
                <br><br>
                    Dec 2015
                <br><br>
                    Jan 2016
                <br><br>
            </td>
        </tr>
    </table>
            
</div>
-->