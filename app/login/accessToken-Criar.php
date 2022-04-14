<?php
session_start();
require_once __DIR__ . '/../config/settings.php';
require_once __DIR__ . '/class/google-login-api.php';

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) 
{
	
	try 
	{
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		if( isset($data['access_token']) )
		{
			$_SESSION['access_token'] = $data['access_token'];
			header("Location: /v/6.01/teste/CalendarAPI/app/home.php");
		}
		else
		{
			throw new Exception("Erro: Não foi possivel fazer o login, token inexistente.");
		}
		
	}
	catch(Exception $e) 
	{
		echo $e->getMessage();
		exit();
	}
	
}