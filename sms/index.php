<?php
if(isset ($_POST['send'])){
	$baseUrl="http://bulksms.mobitechtechnologies.com/api/sendsms";

	$ch = curl_init($baseUrl);
	$data= array('api_key' =>'60e02e17bb610' ,
	'username' =>'angelica' ,
	'sender_id' =>'UNICOMM' ,
	'message' =>$_POST['message'] ,
	'phone' =>$_POST['phone'] );
	$payload = json_encode($data);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	echo "Result ".$result;
	curl_close($ch);
}
?>

<!Doctype html>
<html>
<head>
	<title>Sms publication site</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width,initial-scale=1">
	<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1> Send message</h1>
		<form action="index.php" method="POST">
			<div class="form-group">
				<label for="text">Phone number</label>
				<input type="text" class="form-control" name="phone">
			</div>
			<div class="form-group">
				<label for="comment"Message></label>
				<textarea class="form-control" rows="10" name="message"></textarea>
			</div>
			<button type="Submit" class="btn btn-primary" name="send" value="send">Submit</button>
				</form>
			</div>
			</body>
</html>