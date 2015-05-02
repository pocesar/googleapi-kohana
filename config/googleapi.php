<?php

return array(
  'application_name' => '',

  // Which Authentication, Storage and HTTP IO classes to use.
  //'auth_class'    => 'Google_Auth_OAuth2',
  //'cache_class'   => 'Google_Cache_File',
  //'logger_class'  => 'Google_Logger_Null',

  // Don't change these unless you're working against a special development
  // or testing environment.
  //'base_path' => 'https://www.googleapis.com',

  // Definition of class specific values, like file paths and so on.
  'classes' => array(
    'Google_IO_Abstract' => array(
      'request_timeout_seconds' => 100,
    ),
    /*'Google_Logger_Abstract' => array(
      'level' => 'debug',
      'log_format' => "[%datetime%] %level%: %message% %context%\n",
      'date_format' => 'd/M/Y:H:i:s O',
      'allow_newlines' => true
    ),
    'Google_Logger_File' => array(
      'file' => 'php://stdout',
      'mode' => 0640,
      'lock' => false,
    ),*/
    /*'Google_Http_Request' => array(
      // Disable the use of gzip on calls if set to true. Defaults to false.
      'disable_gzip' => Google_Config::GZIP_ENABLED,

      // We default gzip to disabled on uploads even if gzip is otherwise
      // enabled, due to some issues seen with small packet sizes for uploads.
      // Please test with this option before enabling gzip for uploads in
      // a production environment.
      'enable_gzip_for_uploads' => Google_Config::GZIP_UPLOADS_DISABLED,
    ),*/
    // If you want to pass in OAuth 2.0 settings, they will need to be
    // structured like this.
    'Google_Auth_OAuth2' => array(
      // Keys for OAuth 2.0 access, see the API console at
      // https://developers.google.com/console
      'client_id' => '',
      'client_secret' => '',
      'redirect_uri' => '',

      // Simple API access key, also from the API console. Ensure you get
      // a Server key, and not a Browser key.
      'developer_key' => '',

      // Other parameters.
      'hd' => '',
      'prompt' => '',
      'openid.realm' => '',
      'include_granted_scopes' => '',
      'login_hint' => '',
      'request_visible_actions' => '',
      'access_type' => 'online',
      'approval_prompt' => 'auto',
      'federated_signon_certs_url' =>
          'https://www.googleapis.com/oauth2/v1/certs',
    ),/*
    'Google_Task_Runner' => array(
      // Delays are specified in seconds
      'initial_delay' => 1,
      'max_delay' => 60,
      // Base number for exponential backoff
      'factor' => 2,
      // A random number between -jitter and jitter will be added to the
      // factor on each iteration to allow for better distribution of
      // retries.
      'jitter' => .5,
      // Maximum number of retries allowed
      'retries' => 0
    ),
    'Google_Service_Exception' => array(
      'retry_map' => array(
        '500' => Google_Config::TASK_RETRY_ALWAYS,
        '503' => Google_Config::TASK_RETRY_ALWAYS,
        'rateLimitExceeded' => Google_Config::TASK_RETRY_ALWAYS,
        'userRateLimitExceeded' => Google_Config::TASK_RETRY_ALWAYS
      )
    ),
    'Google_IO_Exception' => array(
      'retry_map' => !extension_loaded('curl') ? array() : array(
        CURLE_COULDNT_RESOLVE_HOST => Google_Config::TASK_RETRY_ALWAYS,
        CURLE_COULDNT_CONNECT => Google_Config::TASK_RETRY_ALWAYS,
        CURLE_OPERATION_TIMEOUTED => Google_Config::TASK_RETRY_ALWAYS,
        CURLE_SSL_CONNECT_ERROR => Google_Config::TASK_RETRY_ALWAYS,
        CURLE_GOT_NOTHING => Google_Config::TASK_RETRY_ALWAYS
      )
    ),
    // Set a default directory for the file cache.
    /*'Google_Cache_File' => array(
      'directory' => sys_get_temp_dir() . '/Google_Client'
    )*/
  )
);