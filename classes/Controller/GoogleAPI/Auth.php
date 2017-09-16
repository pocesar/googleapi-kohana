<?php

class Controller_GoogleAPI_Auth extends Controller {
	
	function action_auth()
	{
		if (isset($_GET['code']))
		{
			GPlus::instance()->client->authenticateCode($_GET['code']);
            		$config = Kohana::$config->load('googleapi');
           		$redirectUrl = $config->get('post_auth_url');
            		if(empty($redirectUrl)) {
                		$redirectUrl = Request::$current->detect_uri();
           		}
			HTTP::redirect($redirectUrl);
		} else {
			$this->response->body('<script>window.close();</script>');
		}
	}
}
