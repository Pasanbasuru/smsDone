<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: /error.php' ) );

    }

require_once(__DIR__.'/user_model.php');
require_once(__DIR__.'/db_model.php');
class GoogleAuth
{
	protected $db;
	
	function __construct(DB $db, Google_Client $googleClient = null )
	{
		$this->db = $db;
		$this->client = $googleClient;

		if($this->client){
			
			$this->client->setClientId('1052956449818-4kepfekionm9s1v2918rc4nf3ubp7n1n.apps.googleusercontent.com');
			$this->client->setClientSecret('2anveGb67UBW96OKH7J60oyU');
			$this->client->setRedirectUri('http://127.0.0.1/dashboard/sms_final2/controller/google_controller.php');
			$this->client->setScopes('email'); 
			$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
			$this->client->setHttpClient($guzzleClient);
			
		}
	}

	public function isLoggedIn(){
		return isset($_SESSION['username']);
	}

	public function getAuthUrl(){
		return $this->client->createAuthUrl();
	}

	public function checkRedirectCode(){
		
		$flag = false;

		if (isset($_GET['code'])) {
			$this->client->authenticate($_GET['code']);
			$this->setToken($this->client->getAccessToken());

			$payload = $this->getPayload();


		    $flag = $this->checkUser($this->getPayload());
		    
			return $flag;
		}

		return $flag;
	}

	public function setToken($token){

		$_SESSION['access_token'] = $token;

		$this->client->setAccessToken($token);
	}

	public function getPayload(){

		$payload = $this->client->verifyIdToken();

		return $payload;
	}

	protected function checkUser($payload){

		$type = null;
		$email = $this->db->quote($payload['email']);

		$sql = "SELECT type FROM user WHERE username = ".$email."";

		$result = $this->db->select($sql);

		if(count($result)==1){

			$type = $result[0]['type'];

			session_start();

			$user = new UserModel($email);

			$_SESSION['user'] = $user;
			$_SESSION['type'] = $type;
			$_SESSION['username'] = $email;

			return true;
		}

		return false;
		
	}
}

?>