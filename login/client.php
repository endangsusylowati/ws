<?php
	//memlai session
	session_start();
	//panggil library
	require_once('nusoap/lib/nusoap.php');
	//mendefinisikan alamat url service yang disediakan oleh client
	$client = new nusoap_client('http://localhost/ws.git/login/server.php?wsdl','WSDL');
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result  =  $client->call('login_ws',
	array('username'=>$username,
	'password'=>$password));
	if($result == "Login Berhasil"){
	$_SESSION['username'] = $username;
	header ("location:index.php");
	} else{
	header ("location:login.php");
	}
	?>