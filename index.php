<?php 
	include_once 'config/config.php';
	include_once 'helpers/url_helper.php';
	include_once 'helpers/assets_helper.php';
	include_once 'helpers/session_helper.php';
	include_once 'helpers/cookie_helper.php';
	include_once 'helpers/content_helper.php';
	include_once 'helpers/footer_helper.php';
	include_once 'helpers/json_helper.php';
	include_once 'controllers/PageController.php';
	
	//session_start();
	
	define('ENVIRONMENT', 'development');
	if (defined('ENVIRONMENT')) {
		switch (ENVIRONMENT) {
			case 'development':
				ini_set('display_errors', 1);
				error_reporting(E_ALL);
				break;
			case 'production':
				error_reporting(0);
				break;
			case 'maintenance':
				$page_controller = new PageController();
				$page_controller->show('maintenance.php', Session::get("lang"));
				return;
			default:
				exit('The application environment is not set correctly.');
		}
	}
	//$_SERVER["REQUEST_URI"]
	if (strpos($_SERVER["REQUEST_URI"], '/en/') !== false) {
		Session::set("lang", "en");
	} else if (strpos($_SERVER["REQUEST_URI"], '/sc/') !== false) {
		Session::set("lang", "sc");
	} else {
		Session::set("lang", "tc");
	}
	if(Cookie::get("GoHome_Member")!="" && Cookie::getValue("GoHome_Member", "Status")=="true") {
		$userinfo = array();
		$userinfo['uid'] = Cookie::getValue("GoHome_Member", "ID");
		$userinfo['isloggedin'] = true;
		$userJson = JSON::decode("login", "/GetMemberData", "Member_ID", array("UserName", "TotalAlert", "ShortListNum", "AlertNum", "ListingNum", "LeadNum"), "memberid=".$userinfo['uid']);
		$userinfo["UserName"] = $userJson[$userinfo['uid']]["UserName"];
		$userinfo["TotalAlert"] = $userJson[$userinfo['uid']]["TotalAlert"];
		$userinfo["ShortListNum"] = $userJson[$userinfo['uid']]["ShortListNum"];
		$userinfo["AlertNum"] = $userJson[$userinfo['uid']]["AlertNum"];
		$userinfo["ListingNum"] = $userJson[$userinfo['uid']]["ListingNum"];
		$userinfo["LeadNum"] = $userJson[$userinfo['uid']]["LeadNum"];
		Session::set("userinfo", $userinfo);
	} else {
		Session::unSetSess("userinfo");
	}
        
        if(isset($_GET['page'])){
            // event_details page
               $target_page = $_GET['page'].'.php';
               /*
                    if(strcmp($_GET['page'],'event_details') == 0){
                        if(isset($_GET['event'])){
                          //  $target_page.='?event='.$_GET['event'];
                        }
                        // oversea properties details page
                    }elseif(strcmp($_GET['page'],'oversea_properties_details') == 0){
                         if(isset($_GET['propertyid'])){
                        $target_page.='?propertyid='.$_GET['propertyid'];
                         }
                    }
                    */
                   
        } else{
            $target_page = 'index.php';
        }

	$page_controller = new PageController();
	//$page_controller->show('index.php', Session::get("lang"));        
        $page_controller->show($target_page, Session::get("lang"));        
?>