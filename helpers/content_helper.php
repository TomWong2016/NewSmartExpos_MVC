<?php

class Content {
	public static function genHeaderRow3($bigTitle, $bigTitleLink, $elements, $style="") {
		echo '<div class="menu">';
		echo '<a href="' . $bigTitleLink . '">' . $bigTitle . '</a>';
		if(is_array($elements)) {
			echo '<ul class="SubMenu' . $style . '">';
			foreach ($elements as $link=>$content) {
				echo '<li><a href="' . $link . '">' . $content . '</a></li>';
			}
			echo '</ul>';
		}
		echo '</div>';
	}
	public static function genInteriorDesignPhoto($array, $limit) {
		$tmp = 0;
		end($array);
		$last_element_key = key($array);
		echo "<ul>";
		foreach($array as $link=>$content) {
			echo '<li><a href="' . $link . '" target="_BLANK"><div class="Ltd RLBox" style="background-image:url(' . $content["ImageURL"] . '); border-radius: 0; margin: 0;">'.
				'<div class="TxtBg">'.
				'<div class="txt">'.
				'<h3>' . $content["AlbumName"] . '</h3>'.
				'<span>' . $content["CompanyName"] . '</span>'.
				'</div>'.
				'</div>'.
				'</div>'.
				'</a>'.
				'</li>';
			if(++$tmp==$limit) break;
		}
		echo "</ul>";
	}
	public static function genNewPropImages($array, $limit) {
		$tmp = 0;
		end($array);
        $last_element_key = key($array);
        foreach($array as $link=>$content) {
            echo '<a href="' . $link . '" target="_blank" title="' . $content['Name'] . '"><img src="' . $content['ImageUrl'] . '"></a>';
            if(++$tmp==$limit) break;
        }
	}
	public static function getTopStat($array, $member=false) {
		$tmp = 1;
		end($array);
		$last_element_key = key($array);
		setlocale(LC_MONETARY, 'zh_HK');
		foreach($array as $name=>$content) {
			echo '<tr onclick="window.open(\'' . $content['SEOPath'] . '\', \'_BLANK\')">';
			if($member) {
				echo '<td>' . $name . '</td><td>' . money_format('$%!i', $content["NET_PSF"]) . '</td>';
			} else {
				echo '<td>' . $tmp . '</td><td></td><td>' . $name . '</td><td>' . money_format('$%!i', $content["NET_PSF"]) . '</td><td></td>';
			}
			if($content["NET_PSF_Index"]<0) {
				echo '<td><div class="down"><span class="icon icon-down1"></span>' . $content["NET_PSF_Index"] . '%</div></td>';
			} else if($content["NET_PSF_Index"]>0) {
				echo '<td><div class="up"><span class="icon icon-up1"></span>' . $content["NET_PSF_Index"] . '%</div></td>';
			} else {
				echo '<td><div class="same"><span class="icon"></span>0</div></td>';
			}
			if($member) {
				echo '<td></td><td>' . money_format('$%!i', $content["GoHome_NET_PSF"]) . '</td>';
			}
			if($content["ListingCount"]>0) {
				echo '<td><a href="' . $content["SearchSEOPath"] . '" target="_BLANK">' . $content["ListingCount"] . '</a></td>';
			} else {
				echo '<td>-</td>';
			}
			echo '</tr>';
			$tmp++;
		}
	}
	public static function genNewsTab($array) {
		end($array);
		$last_element_key = key($array);
		foreach($array as $catName=>$content) {
			echo '<div class="Tab" onclick="changeNewsTab(this, \'' . $catName . '\')">' . $content["Name"] . '</div>';
		}
	}
	public static function genSearchDistrictArea($array) {
		echo '<div class="TabDiv">';
		foreach($array as $id=>$content) {
			echo '<div class="Tab" onClick="openDistrictList(\'districtList' . $id . '\')">' . $content["displayText"] . '</div>';
		}
		echo '<div class="clearFix"></div>';
		echo '</div>';
		echo '<div class="DisplayDiv">';
		echo '<div class="RealDiv">';
		foreach($array as $id=>$content) {
			echo '<div id="districtList' . $id . '" class="district" style="display: none">';
			foreach($content["districtList"] as $index=>$district) {
				echo '<div><label><input class="districtCheckBox" type="checkbox" value="' . $district->{'valueText'} . '">' . $district->{'displayText'} . '</label></div>';
			}
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}
	public static function genSearchOptions($array) {
		foreach ($array as $valueText=>$displayText) {
			echo '<option value="' . $valueText . '">' . $displayText . '</option>';
		}
	}
	public static function genGTS($array, $data) {
		foreach($array as $listID=>$content) {
			if($content['Ad_Type']!=3) {
				echo '<div id="listGTS" class="ListDiv GTS" onclick="#">';
				echo '<div class="Cols1">';
				echo '<h2 class="MobileView">' . $content['District'] . ' - ' . $content['PropertyName'] . '</h2>';
				echo '<div class="icon icon-left-1" onclick="moveSlider(this, \'prev\')"></div>';
				echo '<div class="gts-slider">';
				echo '<ul>';
				foreach($content['PhotoList'] as $photoPath) {
					echo '<li>';
					echo '<div class="Cols1" style="background-image:url(' . $photoPath->PhotoPath . ')">';
					echo '</li>';
				}
				echo '</ul>';
				echo '<div class="icon icon-right-1" onclick="moveSlider(this, \'next\')"></div>';
				echo '</div>';
				echo '</div>';
				echo '<div class="Cols2">';
				echo '<div class="icon-heart1"></div>';
				echo '<h2 class="WebView">' . $content['District'] . ' - ' . $content['PropertyName'] . '</h2>';
				if($data['searchType']==1) {
					if($content['Price_sale']=="0") {
						echo '<div class="left">' . $data['listing_sale'] . ' : -</div>';
					} else {
						echo '<div class="left">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_sale']) . '</div>';
					}
					if($content['Price_rent']=="0") {
						echo '<div class="right">' . $data['listing_rent'] . ' : -</div><div class="clearFix"></div>';
					} else {
						echo '<div class="right">' . $data['listing_rent'] . ' : $' . number_format($content['Price_rent']) . '</div><div class="clearFix"></div>';
					}
					echo '<div class="size">';
					if($content['Net_Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( $' . number_format($content['Price_sale']/$content['Net_Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size)']) . '呎 ( - / 呎 )</div>';
					}
					if($content['Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( $' . number_format($content['Price_sale']/$content['Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( - / 呎 )</div>';
					}
				} else {
					if($content['Price_rent']=="0") {
						echo '<div class="left">' . $data['listing_rent'] . ' : -</div>';
					} else {
						echo '<div class="left">' . $data['listing_rent'] . ' : $' . number_format($content['Price_rent']) . '</div>';
					}
					if($content['Price_sale']=="0") {
						echo '<div class="right">' . $data['listing_sale'] . ' : -</div><div class="clearFix"></div>';
					} else {
						echo '<div class="right">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_sale']) . '</div><div class="clearFix"></div>';
					}
					if($content['Net_Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( $' . number_format($content['Price_rent']/$content['Net_Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size'] ). '呎 ( - / 呎 )</div>';
					}
					if($content['Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( $' . number_format($content['Price_rent']/$content['Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( - / 呎 )</div>';
					}
				}
				echo '<div class="clearFix"></div>';
				echo '</div>';
				echo '<div class="agent" onClick="window.location=' . $content['Company_url'] . '">代理 : ' . $content['Company_name'] . '</div>';
				echo '<div class="logo"><a href="' . $content['Company_url'] . '"><img src="' . $content['Company_logo'] . '"></a></div>';
				echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="ListDiv EGTS" onclick="location.href=\'' . $content['SEOPath'] . '\'">';
				echo '<div class="Cols1" style="background-image:url(' . $content['PhotoList'][0]->PhotoPath . ')"></div>';
				echo '<div class="Cols2">';
				echo '<div class="icon-heart2"></div>';
				echo '<h2>' . $content['District'] . ' - ' . $content['PropertyName'] . '</h2>';
				if($data['searchType']==1) {
					if($content['Price_sale']=="0") {
						echo '<div class="left">' . $data['listing_sale'] . ' : -</div>';
					} else {
						echo '<div class="left">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_sale']) . '</div>';
					}
					if($content['Price_rent']=="0") {
						echo '<div class="right">' . $data['listing_rent'] . ' : -</div><div class="clearFix"></div>';
					} else {
						echo '<div class="right">' . $data['listing_rent'] . ' : $' . number_format($content['Price_rent']) . '</div><div class="clearFix"></div>';
					}
					echo '<div class="size">';
					if($content['Net_Size']!=0 && $content['Price_sale']!=0) {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( $' . number_format($content['Price_sale']/$content['Net_Size']) . ' / 呎 )</div>';
					} else if($content['Price_sale']==0) {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( $' . number_format($content['Price_rent']/$content['Net_Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( - / 呎 )</div>';
					}
					if($content['Size']!=0 && $content['Price_sale']!=0) {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( $' . number_format($content['Price_sale']/$content['Size']) . ' / 呎 )</div>';
					} else if($content['Price_sale']==0){
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( $' . number_format($content['Price_rent']/$content['Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( - / 呎 )</div>';
					}
				} else {
					if($content['Price_rent']=="0") {
						echo '<div class="left">' . $data['listing_rent'] . ' : -</div>';
					} else {
						echo '<div class="left">' . $data['listing_rent'] . ' : $' . number_format($content['Price_rent']) . '</div>';
					}
					if($content['Price_sale']=="0") {
						echo '<div class="right">' . $data['listing_sale'] . ' : -</div><div class="clearFix"></div>';
					} else {
						echo '<div class="right">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_sale']) . '</div><div class="clearFix"></div>';
					}
					if($content['Net_Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( $' . number_format($content['Price_rent']/$content['Net_Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Net_Size']) . '呎 ( - / 呎 )</div>';
					}
					if($content['Size']!=0) {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size'] ). '呎 ( $' . number_format($content['Price_rent']/$content['Size']) . ' / 呎 )</div>';
					} else {
						echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . number_format($content['Size']) . '呎 ( - / 呎 )</div>';
					}
				}
				echo '<div class="clearFix"></div>';
				echo '</div>';
				echo '<div class="agent" onClick="window.location=\'' . $content['Company_url'] . '\'">' . $data['agent'] . ' : ' . $content['Company_name'] . '</div>';
				if($content['Company_logo']!="") {
					echo '<div class="logo" onClick="window.location=\'' . $content['Company_url'] . '\'"><img src="' . $content['Company_logo'] . '"></div>';
				}
				echo '</div>';
				echo '</div>';
			}
		}
	}
	public static function genSearchList($array, $data, $searchType) {
		$tmp = 0;
		$adNumber = 1;
		$addAds = array(1, 6, 11, 16);
		foreach ($array as $listID=>$content) {
			echo '<div class="ListDiv" onclick="location.href=\'' . $content["SEOPathName"] . '\'">';
			if($content['ListingClass_ID']==30) {
				echo '<div class="ProCorner1"></div>';
			} else if($content['ListingClass_ID']==20) {
				echo '<div class="ProCorner2"></div>';
			}
			echo '<div class="Cols1" style="background-image:url(' . $content['PhotoPath'] . ')"></div>';
			echo '<div class="Cols2">';
			if($content['isFav']==0) {
				echo '<div id="' . $listID . '" class="icon-heart2" onclick="clickToAddRemoveFavouriteList(this)"></div>';
			} else {
				echo '<div id="' . $listID . '" class="icon-heart1" onclick="clickToAddRemoveFavouriteList(this)"></div>';
			}
            echo '<h2>' . $content['District'] . ' - ' . $content['PropertyName'] . '</h2>';
            if($searchType==1) {
            	if($content['Price_Sale']=="0") {
            		echo '<div class="left">' . $data['listing_sale'] . ' : -</div>';
            	} else {
            		echo '<div class="left">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_Sale']) . '</div>';
            	}
            	if($content['Price_Rent']=="0") {
            		echo '<div class="right">' . $data['listing_rent'] . ' : -</div><div class="clearFix"></div>';
            	} else {
            		echo '<div class="right">' . $data['listing_rent'] . ' : $' . number_format($content['Price_Rent']) . '</div><div class="clearFix"></div>';
            	}
            	echo '<div class="size">';
            	if($content['Net_Size']!=0) {
	            	echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Net_Size'] . '呎 ( $' . number_format($content['Price_Sale']/$content['Net_Size']) . ' / 呎 )</div>';
            	} else {
            		echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Net_Size'] . '呎 ( - / 呎 )</div>';
            	}
	            if($content['Size']!=0) {
	            	echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Size'] . '呎 ( $' . number_format($content['Price_Sale']/$content['Size']) . ' / 呎 )</div>';
	            } else {
	            	echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Size'] . '呎 ( - / 呎 )</div>';
	            }
            } else {
            	if($content['Price_Rent']=="0") {
            		echo '<div class="left">' . $data['listing_rent'] . ' : -</div>';
            	} else {
            		echo '<div class="left">' . $data['listing_rent'] . ' : $' . number_format($content['Price_Rent']) . '</div>';
            	}
            	if($content['Price_Sale']=="0") {
            		echo '<div class="right">' . $data['listing_sale'] . ' : -</div><div class="clearFix"></div>';
            	} else {
            		echo '<div class="right">' . $data['listing_sale'] . ' : $' . Content::format_num($content['Price_Sale']) . '</div><div class="clearFix"></div>';
            	}
            	echo '<div class="size">';
            	if($content['Net_Size']!=0) {
            		echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Net_Size'] . '呎 ( $' . number_format($content['Price_Rent']/$content['Net_Size']) . ' / 呎 )</div>';
            	} else {
            		echo '<div class="fltLft WebView">' . $data['gross_floor_area'] . '</div><div class="fltLft MobileView">' . $data['m_gross_floor_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Net_Size'] . '呎 ( - / 呎 )</div>';
            	}
            	if($content['Size']!=0) {
            		echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Size'] . '呎 ( $' . number_format($content['Price_Rent']/$content['Size']) . ' / 呎 )</div>';
            	} else {
            		echo '<div class="fltLft WebView">' . $data['saleable_area'] . '</div><div class="fltLft MobileView">' . $data['m_saleable_area'] . '</div><div class="fltLft">:</div><div class="fltLft">' . $content['Size'] . '呎 ( - / 呎 )</div>';
            	}
            }
            echo '<div class="clearFix"></div>';
			echo '</div>';
            echo '<div class="agent" onClick="window.location=\'' . $content['AgentUrl'] . '\'">' . $data['agent'] . ' : ' . $content['DisplayName'] . '</div>';
            if($content['LogoPath']!="") {
            	echo '<div class="logo" onClick="window.location=\'' . $content['AgentUrl'] . '\'"><img src="' . $content['LogoPath'] . '"></div>';
            }
			echo '</div>';
			echo '</div>';
			if(in_array($tmp, $addAds)) {
				echo '<div id="SlotBanner' . $adNumber . '" class="SearchListBanner"></div>';
				$adNumber++;
				if($adNumber==3) {
					echo '<div id="SlotBanner' . $adNumber . '" class="SearchListBanner"></div>';
					$adNumber++;	
				}
			}
			$tmp++;
		}
	}
	public static function genEGTS($array) {
		echo '<div id="EstateExperts" class="GlobalRightBr">';
        echo '<div class="GlobalTitle"><h2>屋苑專家</h2></div>';
        echo '<div class="DisplayDiv">';
        echo '<div class="RealDiv">';
        $tmp = 0;
        foreach ($array as $pid=>$content) {
        	echo '<div class="LtdDiv" onclick="#">';
            echo '<div class="photo" style="background-image:url(' . $content['PhotoPath'] . ')">';
			echo '<div class="title">' . $content['Property_Name'] . '</div>';
			echo '</div>';
			echo '<div class="table">';
			echo '<div class="tr">';
			echo '<div class="td1">';
			echo '<div class="PropertyNum">樓盤數量 : ' . $content['Property_Count'] . '</div>';
			echo '<a href="#"><div class="fltLft">屋苑筍盤</div><div class="icon-double-right"></div></a>';
			echo '<div class="clearFix"></div>';
			echo '</div>';
			echo '<div class="td2"><a href="#"><img src="' . $content['logoPath'] . '"></a></div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			if(++$tmp!=count($array)) {
				echo '<div class="DotLine"></div>';
			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public static function genFeaturedListing($array) {
		echo '<div id="FeaturedListing" class="GlobalRightBr">';
		echo '<div class="GlobalTitle"><h2>樓盤推介</h2></div>';
		echo '<div class="DisplayDiv">';
		echo '<div class="RealDiv">';
		foreach ($array as $index=>$content) {
			echo ' <a href="' . $content['SEOPathName'] . '">';
			echo '<div class="LtdDiv">';
            echo '<div class="Row1">' . $content['Property_Name'] . '</div>';
			echo '<div class="photo" style="background-image:url(' . $content['PhotoPath'] . ')">';
			if($content['isFeatured']==1) {
            	echo '<div class="choice">精&nbsp;選</div>';
			}
            echo '</div>';
            echo '<div class="txt">';
            echo '<div class="Row2">';
            echo '<div class="Cols1">實</div><div class="Cols2">:</div><div class="Cols3">' . $content['Net_size'] . '呎</div><div class="clearFix"></div>';
            echo '</div>';
            echo '<div class="Row3">';
            echo '<div class="Cols1">建</div><div class="Cols2">:</div><div class="Cols3">' . $content['Size'] . '呎</div><div class="clearFix"></div>';
            echo '</div>';
            echo '<div class="Row4">';
            echo '<div class="Cols1">售</div><div class="Cols2">:</div><div class="Cols3">' . $content['Price_Sale'] . '萬</div><div class="clearFix"></div>';
            echo '</div>';
            echo '<div class="Row5">';
            echo '<div class="Cols1">租</div><div class="Cols2">:</div><div class="Cols3">' . $content['Price_Rent'] . '</div><div class="clearFix"></div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="clearFix"></div>';
            echo '</div>';
			echo '</a>';
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public static function genStarAgent($array) {
		echo '<div id="StarAgent" class="GlobalRightBr">';
		echo '<div class="GlobalTitle"><h2>星級代理</h2></div>';
            	$tmp = 0;
		foreach ($array as $pid=>$content) {
			echo '<div class="agent">';
			echo '<a href="#">';
			echo '<div class="photo" style="background-image:url(' . $content['PhotoPath'] . ');"></div>';
			echo '<div class="txt">';
			echo '<div class="Row1">';
			echo '<div>' . $content['Name'] . '</div>';
			echo '<div>' . $content['AgentLicense'] . '</div>';
			echo '</div>';
			echo '<div class="Row2">' . $content['Title'] . '</div>';
			echo '</div>';
			echo '</a>';
			echo '<div class="Row3">';
			echo '<div class="fltLft" onClick="showStarAgentPhone(event, this)">';
			echo '<div class="icon-phone-1"></div>';
			echo '<div class="Cols1">' . substr($content['Phone'], 0, 6) . '...</div>';
			echo '<div class="clearFix"></div>';
			echo '</div>';
			echo '<div class="fltLft" onClick="#">';
			echo '<div class="icon-mail-2"></div>';
			echo '<div class="Cols2">電郵</div>';
			echo '<div class="clearFix"></div>';
			echo '</div>';
			echo '<div class="clearFix"></div>';
			echo '<div class="FullTel" style="display: none">';
			echo '<div class="arrow"></div>';
			echo '手機1 : ' . $content['Phone'] . '<br>手機2 : ' . $content['Mobile'] . '';
			echo '</div>';
			echo '</div>';
			echo '<div class="clearFix"></div>';
			echo '</div>';
                	if(++$tmp!=count($array)) {
                		echo '<div class="DotLine"></div>';
                	}
		}
		echo '<div class="SendBtn" onClick="#">向代理查詢</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public static function genFavouriteList($array) {
		foreach($array as $index=>$content) {
			echo '<a href="#">';
			echo '<div id="popup_' . $index . '" class="PropertyDiv" style="background-image:url(' . $content['PhotoPath'] . ');">';
            echo '<div class="txt">' . $content['District'] . ' - ' . $content['Property'] . '<br>售 : ' . Content::format_num($content['Price_Sale']) . '<br>租 : ' . number_format($content['Price_Rent']) . '</div>';
            echo '<div class="icon-trash" onClick="removeFavouriteList(' . $index . ')"></div>';
            echo '</div>';
            echo '</a>';
		}
	}
	public static function genStarAgentAll($array) {
		foreach($array as $index=>$content) {
			echo '<div class="BoxDiv2">';
			echo '<label for="FormCb1" checked>';
			echo '<div class="photo" style="background-image:url(' . $content['PhotoPath'] . ');"></div>';
            echo '<div class="txt">';
            echo '<div class="name">' . $content['Name'] . '</div>';
            echo '<div class="num">' . $content['AgentLicense'] . '</div>';
            echo '</div>';
            echo '<input type="checkbox" id="FormCb1" checked>';
			echo '</label>';
			echo '</div>';
		}
	}
	public static function format_num($num, $precision = 0) {
		if(Session::get("lang")=="en") {
			if ($num >= 1000 && $num < 1000000) {
				$n_format = number_format($num/1000,$precision).'K';
			} else if ($num >= 1000000 && $num < 1000000000) {
				$n_format = number_format($num/1000000,$precision).'M';
			} else if ($num >= 1000000000) {
				$n_format=number_format($num/1000000000,$precision).'B';
			} else {
				$n_format = $num;
			}
		} else if(Session::get("lang")=="tc") {
			if ($num >= 10000 && $num < 100000000) {
				$n_format = number_format($num/10000,$precision).'萬';
			} else if ($num >= 100000000) {
				$n_format = number_format($num/100000000,$precision).'億';
			} else {
				$n_format = $num;
			}
		}
		return $n_format;
	}
	public static function format_date($date_string) {
        $date = $date_string;
	    if (empty($date_string)){
	        return $date;
	    }
        $timestamp = strtotime("$date_string");
		if(Session::get("lang")=="en") {
			$date = date("F j, Y", $timestamp);
		} else {
			$date = date("Y年n月j日", $timestamp);
		}
		return $date;
	}
}

?>
