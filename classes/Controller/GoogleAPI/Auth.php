<?php

class Controller_GoogleAPI_Auth extends Controller {
	
	function action_auth()
	{
		if (isset($_GET['code']))
		{
			GPlus::factory()->client->authenticateCode($_GET['code']);
			HTTP::redirect(Request::$current->detect_uri());
		}
		else
		{
			$this->response->body('<script>window.close();</script>');
		}
	}
}