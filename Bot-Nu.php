<?php
	function send_back($txtin,$replyToken)
	{
		$access_token = 'd7CCCoAUOR6vaIw/BU7v0YcB4VupSJawiR5C8NT21t+1cxcPz/hwSOtca42GZMQLPonJmgeixJX67XqM9XWTbWtMxPyPcdfuQVP8E1JHKndd0Q2X26k92/uCEYubht3wBpLo9tlY2o0/MT87OV1UggdB04t89/1O/w1cDnyilFU=';
		$messages = ['type' => 'text','text' => $txtin];//สร้างตัวแปร 
		$url = 'https://api.line.me/v2/bot/message/reply';
		$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
		$post = json_encode($data);
		$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result . "\r\n";
	}
     $content = file_get_contents('php://input');//รับข้อมูลจากไลน์
     $events = json_decode($content, true);//แปลง json เป็น php
	 if (!is_null($events['events'])) //check ค่าในตัวแปร $events
     {
		 foreach ($events['events'] as $event) 
		 {
			 if ($event['type'] == 'message' && $event['message']['type'] == 'text')
			 {
				 $replyToken = $event['replyToken'];
                 $txtin = $event['message']['text'];//เอาข้อความจากไลน์ใส่ตัวแปร $txtin
				 if($txtin =="คิดถึงนะ"
				 {
					 $txtback ="คิดถึงเหมือนกัน"
				 }
				 send_back($txtin,$replyToken);
			 }
		 }
	 }
?>	 