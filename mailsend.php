<?php
	$sendto   = "sales@sinocar.ru";
	
	if(isset($_POST['hidden'])){
		$hidden = $_POST['hidden'];
	}
	// Формирование заголовка письма
	switch ($hidden) {
		case 100:
			$subject = "Заявка на оптовый прайс с сайта Автовинил-Оптом.РФ";
			break;
		case 200:
			$subject = "Заявка на оптовый прайс с зоны первого экрана Автовинил-Оптом.РФ";
			break;
		case 300:
			$subject = "Заказ обратного звонка с сайта Автовинил-Оптом.РФ";
			break;
		case 400:
			$subject = "Заявка на оптовый прайс с сайта  Автовинил-Оптом.РФ";
			break;
		case 500:
			$subject = "Заявка на партнерство с сайта Автовинил-Оптом.РФ";
			break;
		case 600:
			$subject = "Вопрос  с сайта  Автовинил-Оптом.РФ";
			break;
	}
	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$question = $_POST['question'];
	
	// Формирование заголовка письма
	//$subject = "Пришла заявка с сайта";
	$headers  = "From: Avtovinil-Optom.RF " . strip_tags($usermail) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
	
	$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
	$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>$subject</h2>\r\n";
	
	if ($hidden == '600'){
	// Формирование тела письма
	$msg .= "<p><strong>Имя: </strong> ".$name."</p>\r\n";
	$msg .= "<p><strong>Телефон: </strong> ".$phone."</p>\r\n";
	$msg .= "<p><strong>E-Mail: </strong> ".$email."</p>\r\n";
	$msg .= "<p><strong>Вопрос: </strong> ".$question."</p>\r\n";
	$msg .= "</body></html>";
	}
	
	if ($hidden == '200'){
	// Формирование тела письма
	$msg .= "<p><strong>Имя: </strong> ".$name."</p>\r\n";
	$msg .= "<p><strong>Телефон: </strong> ".$phone."</p>\r\n";
	$msg .= "<p><strong>E-Mail: </strong> ".$email."</p>\r\n";
	$msg .= "</body></html>";
	}
	
	if ($hidden == '300'){
	// Формирование тела письма
	$msg .= "<p><strong>Телефон: </strong> ".$phone."</p>\r\n";
	$msg .= "</body></html>";
	}
	
	if ($hidden == '100' or $hidden == '400' or $hidden == '500'){
	// Формирование тела письма
	$msg .= "<p><strong>Имя: </strong> ".$name."</p>\r\n";
	$msg .= "<p><strong>Телефон: </strong> ".$phone."</p>\r\n";
	$msg .= "</body></html>";
	}

$link='https://optom.envycrm.com/crm/api/v1/lead/set/?api_key=fd3b5bee1587e3d9dc2d15e2b9e000a423fb0d16';
$curl=curl_init();
$data=array(
'method' => 'create',
'pipeline_id' => 817,
'stage_id' => 4404,
'inbox_type_id' => 4963,
'values' => array(
'name' => $_POST['name'] ? $_POST['name'] : 'Заявка с сайта ' . ($_POST['phone'] ? $_POST['phone'] : $_POST['email']),
'phone' => $_POST['phone'],
'email' => $_POST['email'],
'comment' => $_POST['question'],
'utm_source' => $_GET['utm_source'],
'utm_medium' => $_GET['utm_medium'],
'utm_campaign' => $_GET['utm_campaign'],
'utm_content' => $_GET['utm_content'],
'utm_term' => $_GET['utm_term']
)
);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode(array('request' => $data)));
curl_setopt($curl,CURLOPT_HEADER,false);

$out=curl_exec($curl);
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);

	// отправка сообщения
	if(@mail($sendto, $subject, $msg, $headers)){
		$_POST['hidden'] = "";
		echo "true";
	}
?>