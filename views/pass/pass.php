<?php 
date_default_timezone_set("Hongkong");
 include Url::getPath('models').'DBregistration.php';
 include Url::getPath('models').'DBexposEmail.php';
 include Url::getPath('assets/email').'sendmail.php';

 
 
 
 $type = 'pass';
 $error = "";
 //$error = "";
 $expos_id = $event_id;
 
 $db_registraion = new DBregistration();
 $db_exposEmail = new DBexposEmail();
 $result_exposEmail = $db_exposEmail->getExposEmail($expos_id);
 
 $db_expos  = new DBexpos();
 $result_expos = $db_expos->getExposDetails($expos_id);
 
 $expos_name = '';
 if ( $result_expos[0]['expos_title_en'] !=""){
     $expos_name = $result_expos[0]['expos_title_en'];
 };
 
 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //var_dump($_POST);
if(isset($_POST['first'])){
    $first = $_POST['first'];
} else{
    $first='';
}

if(isset($_POST['last'])){
    $last = $_POST['last'];
} else{
    $last='';
}

if(isset($_POST['job'])){
    $job =$_POST['job'];
} else{
    $job='';
}

if(isset($_POST['company'])){
    $company =$_POST['company'];
} else{
    $company='';
}

if(isset($_POST['country'])){
    $country =$_POST['country'];
} else{
    $country='';
}

if(isset($_POST['email'])){
    $email =$_POST['email'];
} else{
    $email='';
}

if(isset($_POST['tel'])){
    $tel =$_POST['tel'];
} else{
    $tel='';
}

if(isset($_POST['hearfrom'])){
    $hearfrom =$_POST['hearfrom'];
} else{
    $hearfrom='';
}

if(isset($_POST['subscribe'])){
    $subscribe =$_POST['subscribe'];
} else{
    $subscribe='';
}

if(isset($_POST['policy'])){
    $policy =$_POST['policy'];
} else{
    $policy='';
}



		if ( $first != "" || $last != "" || $job != "" || $company != "" ||
		$country != "" || $email != "" || $tel != "" || $hearfrom != "" ||
		$subscribe != "" ) {

			$first = trim($first);
			$last = trim($last);
			$job = trim($job);
			$company = trim($company);
			$email = trim($email);
			$tel = trim($tel);
			if ( $first == "" ) {																			// Check First Name
				 $error['first'] = 1;
                                $errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[a-zA-Z ']{2,}$", $first) ) {
					$error['first'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $last == "" ) {																			// Check Last Name
				$error['last'] = 1;
				$errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[a-zA-Z ']{2,}$", $last) ) {
					$error['last'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $job == "" ) {																			// Check Job
				$error['job'] = 1;
				$errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[a-zA-Z '-]{2,}$", $job) ) {
					$error['job'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $company == "" ) {																		// Check Company
				$error['company'] = 1;
				$errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[a-zA-Z0-9 ]{2,}$", $company) ) {
					$error['company'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $country == "" ) {																		// Check Country
				$error['country'] = 1;
				$errmsg = "Please fill in the form correctly.";
			}

			if ( $email == "" ) {																			// Check Email
				$error['email'] = 1;
				$errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[a-zA-Z0-9._-]+\@[a-zA-Z0-9_.]+\.[a-zA-Z]{2,}$", $email) ) {
					$error['email'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $tel == "" ) {																			// Check Tel
				$error['tel'] = 1;
				$errmsg = "Please fill in the form correctly.";
			} else {
				if ( !ereg("^[0-9+ ]{8,}$", $tel) ) {
					$error['tel'] = 1;
					$errmsg = "Please fill in the form correctly.";
				}
			}

			if ( $hearfrom == "" ) { $hearfrom = "N/A"; }											// Change Hearfrom

			if ( $subscribe  == "on" ) {																	// Change subscribe
				$subscribe = "yes"; 
			} else { $subscribe = "no"; }

			if ( $policy == "" ) {														 					// Check Policy
				$error['policy'] = 1; 
				$errmsg = "Please accept our privacy policy to continue.";
			}

		}
                

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  

		if ( $expos_id == "" || $type == "" ) {
			echo "No Event Detected. Process Denied.";
			exit;
		}
                //var_dump($error);
                
                if ( $first !="" && $error == "" ) {	
                   
                    $reg_date = date("Y-m-d H:i:s");																		// Set Date
/*
			$first = $mysqli->real_escape_string($first);
			$last = $mysqli->real_escape_string($last);
			$job = $mysqli->real_escape_string($job);
			$company = $mysqli->real_escape_string($company);
			$country = $mysqli->real_escape_string($country);
			$email = $mysqli->real_escape_string($email);
			$tel = $mysqli->real_escape_string($tel);
			$hearfrom = $mysqli->real_escape_string($hearfrom);
			$subscribe = $subscribe;
                        */
                        
                        $ok  = $db_registraion->AddRegistration($first, $last, $job, $company, $country, $email, $tel, $hearfrom, $subscribe,$type,$expos_id,$reg_date);
                        
                        /*
                        $mail_subject = "SMART Booth Reservation - " . $expos_name;
                        $mail_content = "<font face='Arial'>SMART Investment & International Property Expo " . $expos_name . " - Booth Reservation<br>";
                                
                        $mail_content .= "-------------------------------------------------------------------------------<br>";
			$mail_content .= "<strong>[First Name:]</strong>" . $first ."<br>";
			$mail_content .= "<strong>[Last Name:]</strong>" . $last ."<br>";
			$mail_content .= "<strong>[Job:]</strong>" . $job ."<br>";
			$mail_content .= "<strong>[Company:]</strong>" . $company ."<br>";
			$mail_content .= "<strong>[Country:]</strong>" . $country ."<br>";
			$mail_content .= "<strong>[Email:]</strong>" . $email ."<br>";
			$mail_content .= "<strong>[Tel:]</strong>" . $tel ."<br>";
			$mail_content .= "<strong>[Hear From:]</strong>" . $hearfrom ."<br>";
			$mail_content .= "<strong>[Subscribe:]</strong>" . $subscribe ."<br>";
			$mail_content .= "<br><br><strong>Thank You for Your Attention.</strong></font>";
			
			$mail_to_name = "";
			$mail_to_email = "";
			$mail_type = "1";
                        */
                        
                        $mail_from_name = "SMART Property Expo 2016";
                        $mail_subject = "[New SmartExpos Testing]SMART Booth Reservation Downloaded Brochure - ";
                        
                        
                        $mail_subject.= $result_exposEmail[0]['mail_subject_en'];
                        
                        $mail_content = "<font face='Arial'><img src='https://s3-ap-southeast-1.amazonaws.com/smartexpos-new/index/smart_logo_2016.jpg'/><br>";
                        $mail_content .= "Dear Sir / Madame,<br><br>Thank you for downloading the SMART Expo ";
                        $mail_content .= "Booth Reservation brochure!<br><br>";
                        $mail_content .= '<a href="'.$result_exposEmail[0]['booth_url'].'" target="_blank">Click here for the brochure</a><br><br>';
			$mail_content .= "If you have any problems, questions or feedback, please e-mail us at <a href='mailto:info@smartexpos.com&subject=" . $mail_subject . "'>info@smartexpos.com</a>.<br>";
			$mail_content .= "Our friendly staff will be happy to respond to you as soon as possible.<br><br>";
                        $mail_content .= "Hope to see you at SMART Expos 2016!<br><br>";
                        $mail_content .= "SMART Expos  Ltd.<br>Asia's longest running international Property Showcase.";
			$mail_content .= "</font>";
                        
                        $mail_to_name = "";
			$mail_to_email = $email;
			$mail_type = "2";
                        
                        sendmail($mail_subject, $mail_content, $mail_from_name, $mail_to_email, $mail_to_name, $mail_type);
                        
                        echo '<div class="salesleft">';
			echo '<a href="'.$result_exposEmail[0]['booth_url'].'" target="_blank">';
				echo '<img src="https://s3-ap-southeast-1.amazonaws.com/smartexpos-new/brochure/pdf.jpg"/>';
			echo '</a>';
                        echo '</div>';
                        
                        echo '<div class="salesright">';
                        echo 'Thank you for submitting your details.<br/>';
                        echo 'Please click on icon to download your SMART Brochure and Booking Form.<br/>';
                        echo '</div>';
                } else{
                
                
                
?>
<form id="form_booth" method="post" action="">
    <div class="tabContent">
                <div class="GlobalTitle">Free Expo Pass</div>
                ﻿ Please fill in the form below to get your FREE EXPO PASS!
                
                <div class="sectionDiv">
                   
                    <div class="formBox">
                         (* indicate required field)
                         <br/><br/>
                         <div class="row">
                        	<div class="label">Title</div>
                                        <label><input type="radio" name="title" value="Mr." required/>Mr.</label>&emsp;
					<label><input type="radio" name="title" value="Mrs."/>Mrs.</label>&emsp;
					<label><input type="radio" name="title" value="Ms."/>Ms.</label>&emsp;
                        </div>
                        <div class="row">
                        	<div class="label">First Name</div>
                                <input type="text" name="first" required="" value="<?php echo $first; ?>">
                        </div>
                        <div class="row">
                        	<div class="label">Last Name</div>
                    		<input type="text" name="last" required="" value="<?php echo $last; ?>">
                        </div>
                         <div class="row">
                        	<div class="label">Age</div>
                    		
						<label><input type="radio" name="age" value="19-25" required/>19-25</label>
                                                <label><input type="radio" name="age" value="26-30"/>26-30</label>
						<label><input type="radio" name="age" value="31-55"/>31-55</label>
						<label><input type="radio" name="age" value="56+"/>56 or above</label>
					
                        </div>
                         
                        <div class="row">
                        	<div class="label">Occupation</div>
						<label><input type="radio" name="job" value="General Staff" required/>General Staff</label>
                                                <label><input type="radio" name="job" value="Mid Management"/>Mid Management</label>
						<label><input type="radio" name="job" value="Senior Management"/>Senior Management</label>
						<label><input type="radio" name="job" value="C-level Management"/>C-level Management</label>
				
                        </div>
                        <div class="row">
                        	<div class="label">Email</div>
                    		<input type="email" name="email" required="" value="<?php echo $email; ?>">
                        </div>
                        <div class="row">
                        	<div class="label">Telephone</div>
                                <input type="tel" name="tel" required="" value="<?php echo $tel; ?>">
                        </div>
                         
                           <div class="row">
                        	<div class="label">Education Level</div>
						<label><input type="radio" name="job" value="General Staff" required/>School Certificate</label>
                                                <label><input type="radio" name="job" value="Mid Management"/>Non-degree Tertiary</label>
						<label><input type="radio" name="job" value="Senior Management"/>Degree</label>
						<label><input type="radio" name="job" value="C-level Management"/>Post Graduate or Above</label>
				
                        </div>
                         
                           <div class="row">
                        	<div class="label">Occupation</div>
						<label><input type="radio" name="job" value="General Staff" required/>HK$25K-40K</label>
                                                <label><input type="radio" name="job" value="Mid Management"/>HK$41K-60K</label>
						<label><input type="radio" name="job" value="Senior Management"/>HK$61K-100K</label>
						<label><input type="radio" name="job" value="C-level Management"/>More than HK$100K</label>
				
                        </div>
                        <div class="row">
                        	<div class="label">How did you hear about SMART Expo?</div>
                    		<select class="inputbox" name="hearfrom">
						<option value="">Please Select</option>
						<option value="Apple Daily">Apple Daily</option>
						<option value="Australian Property Investor">Australian Property Investor</option>
						<option value="Chooze2Move">Chooze2Move</option>
						<option value="Cold Call">Cold Call</option>
						<option value="Direct mailer">Direct mailer</option>
						<option value="DM-Asia">DM-Asia</option>
						<option value="Economic Digest">Economic Digest</option>
						<option value="Email from Organiser">Email from Organiser</option>
						<option value="Enrich Publishing">Enrich Publishing</option>
						<option value="Expat Living SG">Expat Living SG</option>
						<option value="FifthPerson.com">FifthPerson.com</option>
						<option value="Finet">Finet</option>
						<option value="Headline Daily">Headline Daily</option>
						<option value="HK Economic Journal">HK Economic Journal</option>
						<option value="HK Economic Times">HK Economic Times</option>
						<option value="HK magazine">HK Magazine</option>
						<option value="i-audience">i-Audience</option>
						<option value="Infocast">Infocast</option>
						<option value="Landscope - Christies">Landscope - Christies</option>
						<option value="Loft Magazine">Loft Magazine</option>
						<option value="LP Magazine">LP Magazine</option>
						<option value="Millionaire Asia">Millionaire Asia?</option>
						<option value="Ming Pao">Ming Pao</option>
						<option value="Online banner">Online Banner</option>
						<option value="Oriental Daily">Oriental Daily</option>
						<option value="PropertyInfo">PropertyInfo</option>
						<option value="Quamnet">Quamnet</option>
						<option value="search engine">Search Engine</option>
						<option value="SG Young Investment">SG Young Investment (SGYI)</option>
						<option value="Singapore Stocks Investing">Singapore Stocks Investing (SSI)</option>
						<option value="Sing Tao Daily">Sing Tao Daily</option>
						<option value="SMART Investments &amp; Properties magazine">SMART Investments &amp; Properties magazine</option>
						<option value="SMS Dome">SMS Dome</option>
						<option value="South China Morning Post">South China Morning Post</option>
						<option value="Squarefoot">Squarefoot</option>
						<option value="StockMarketMindGames">StockMarketMindGames (SMMG)</option>
						<option value="The Edge Markets Singapore">The Edge Markets Singapore</option>
						<option value="The Standard">The Standard</option>
						<option value="The Sun Newspaper">The Sun Newspaper</option>
						<option value="Vigers">Vigers</option>
						<option value="Vproperty">Vproperty</option>
						<option value="Word of Mouth">Word of Mouth</option>
						<option value="Other">Other</option>
					</select>
                        </div>
                         
                             <div class="row">
				<div class="salestitle">
					* Which country are you most interested to invest in property ?
				</div><div class="salesbox">
					<select name="country" required>
						<option value="">Please Select</option>
						<option value="Austria">Austria</option>
						<option value="Germany">Germany</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Afghanistan">Afghanistan</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Antigua and Barbuda">Antigua and Barbuda</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Australia">Australia</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="Brunei Darussalam">Brunei Darussalam</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burma">Burma</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands">Canary Islands</option>
						<option value="Cape Verde">Cape Verde</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Colombia">Colombia</option>
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote d'Ivoire">Cote d'Ivoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic">Czech Republic</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guinea">Guinea</option>
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="India">India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Korea, North">Korea, North</option>
						<option value="Korea, South">Korea, South</option>
						<option value="Kosovo">Kosovo</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Laos">Laos</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia">Macedonia</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mexico">Mexico</option>
						<option value="Micronesia">Micronesia</option>
						<option value="Moldova">Moldova</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montenegro">Montenegro</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherlands Antilles">Netherlands Antilles</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Norway">Norway</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau">Palau</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines">Philippines</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Qatar">Qatar</option>
						<option value="Romania">Romania</option>
						<option value="Russia">Russia</option>
						<option value="Rwanda">Rwanda</option>
						<option value="Samoa">Samoa</option>
						<option value="San Marino">San Marino</option>
						<option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>
						<option value="Serbia">Serbia</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="South Africa">South Africa</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
						<option value="St. Lucia">St. Lucia</option>
						<option value="St. Vincent and The Grenadines">St. Vincent and The Grenadines</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Syria">Syria</option>
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="The Netherlands">The Netherlands</option>
						<option value="Togo">Togo</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad and Tobago">Trinidad and Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States of America">United States of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican City">Vatican City</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands">Virgin Islands</option>
						<option value="Western Sahara">Western Sahara</option>
						<option value="Yemen">Yemen</option>
						<option value="Yugoslavia">Yugoslavia</option>
						<option value="Zaire">Zaire</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
					</select>
				</div>
			</div>
                        <div class="row">
                        	<div class="item">
                                <div class="checkbox"><input type="checkbox" name="subscribe" checked=""></div>
                                I would like to receive emails from the organiser about other property / real estate related opportunities.
                            </div>
                            <div class="item">
                                <div class="checkbox"><input type="checkbox" id="policy" name="policy" required="" <?php if( $policy != "" )echo "checked"; ?>></div>
                                I agree to the Privacy Policy Mentioned. Please <a href="#">CLICK HERE</a> to view the Privacy Policy.
                            </div>
                        </div>
                        <div style="width: 210px; margin: auto"><button type="submit" form="form_booth" value="Submit">Submit</button></div>
                        <div class="clearFix"></div>
                    </div>
                </div>
            </div>
</form>

                <?php }?>
            <!-- content details / -->