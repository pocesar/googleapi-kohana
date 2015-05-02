<?php

class GoogleAPI_Client extends Google_Client {
	/**
	 * @var Config_Group
	 */
	public $config;

	public static $token_name = 'googleapi_token';

	public function __construct()
	{
		$this->config = Kohana::$config->load('googleapi');

		@session_start();

		parent::__construct($this->config->as_array());
	}

	function authenticateCode($code = null)
	{
		if (empty($_SESSION[GClient::$token_name]))
		{
			$this->authenticate($code);
			$_SESSION[GClient::$token_name] = $this->getAccessToken();
		}
		else
		{
			$this->setAccessToken($_SESSION[GClient::$token_name]);
		}
	}

	public static function factory()
	{
		return new GClient();
	}
}