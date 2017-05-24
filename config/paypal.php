<?php
return array(
    // set your paypal credential
    'client_id' => 'AZkewm4l4VVSJuxwTQn_qnxnMphkuF80Y30E0QIZuzyBkW_D4dCR3VFrs7usF-H9dOOeN24FgLITA0a9',
    'secret' => 'EPUnMJ73i_nOSAWUcbkNvmIYAeBz9uWvLcXl73wjGiJnWWxjsDUjIEhAIiU3RquBjLYVvEl14gd97iY3',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);