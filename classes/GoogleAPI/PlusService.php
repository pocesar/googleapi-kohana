<?php

class GoogleAPI_PlusService extends Google_PlusService {
	/**
	 * @var Google_Client
	 */
	public $client;
	/**
	 * @var GPlus
	 */
	public static $instance = null;
	
	public function __construct()
	{
		$this->client = new GClient();
		
		@session_start();
		
		parent::__construct($this->client);
		
		$this->client->authenticateCode();
	}

	/**
	 * @return GPlus
	 */
	public static function instance()
	{
		if (!(self::$instance instanceof GPlus))
		{
			self::$instance = new GPlus();
		}
		return self::$instance;
	}
	
	function checkToken()
	{
		if ($token = $this->client->getAccessToken())
		{
			$_SESSION[GClient::$token_name] = $token;
			return true;
		}
		return false;
	}

	/**
	 * @return Google_Userinfo|null
	 */
	function getUserinfo()
	{
		if ($this->checkToken())
		{
			$userinfo = new GUser($this->client);
			
			return $userinfo->userinfo_v2_me->get() ? : null;
		}
		return null;
	}
	/**
	 * Get the current user. Returns false if not yet authorized
	 * 
	 * @return Google_Person|Boolean
	 */
	function getUser()
	{
		if ($this->checkToken())
		{
			return $this->people->get('me');
		}
		return false;
	}
}