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
		
		if (empty($this->config->oauth2_client_id))
		{
			throw new Kohana_Kohana_Exception('You must fill the oauth2_client_id in the config file');
		} 
		elseif (empty($this->config->oauth2_client_secret))
		{
			throw new Kohana_Kohana_Exception('You must fill the oauth2_client_secret in the config file');
		} 
		elseif (empty($this->config->oauth2_redirect_uri))
		{
			throw new Kohana_Kohana_Exception('You must fill the oauth2_redirect_url in the config file');
		} 
		elseif (empty($this->config->developer_key))
		{
			throw new Kohana_Kohana_Exception('You must fill the developer_key in the config file');
		}
		
		@session_start();
		
		parent::__construct($this->config->as_array()); 
		
		$this->setApprovalPrompt("auto");
		
		$this->setScopes(
			array_merge((array)$this->config->services['oauth2']['scope'], array($this->config->services['plus']['scope']))
		);
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