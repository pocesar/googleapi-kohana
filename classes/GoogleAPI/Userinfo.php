<?php

class GoogleAPI_Userinfo extends Google_Oauth2Service {

	public static function factory(GClient $client)
	{
		return new GUser($client);
	}
}