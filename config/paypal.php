<?php 

return array(
/** set your paypal credential **/
'client_id' =>'ATwARYpbHoYprj8vVH7UNPBFVOG2AR8Wm4A-TDDcXs-JToDXvLzONAV0wNdjn88HKvgngutHcBCSdpjw',
'secret' => 'EFN7PH0uYyWURGWlQYgb8wf8t8Ac9Xelnd1AOy1xs7e5iRRJk-j-0QjO12Ub4bOeQepca3mamD6PpZ7_',
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
'http.ConnectionTimeOut' => 1000,
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