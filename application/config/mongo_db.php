<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------------
| This file will contain the settings needed to access your Mongo database.
|
|
| ------------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| ------------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['write_concerns'] Default is 1: acknowledge write operations.  ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['journal'] Default is TRUE : journal flushed to disk. ref(http://php.net/manual/en/mongo.writeconcerns.php)
|	['read_preference'] Set the read preference for this connection. ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|	['read_preference_tags'] Set the read preference for this connection.  ref (http://php.net/manual/en/mongoclient.setreadpreference.php)
|
| The $config['mongo_db']['active'] variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
*/

$config['mongo_db']['active'] = 'default';

$config['mongo_db']['default']['no_auth'] = FALSE;
$config['mongo_db']['default']['hostname'] = 'localhost';
$config['mongo_db']['default']['port'] = '27017';

// $config['mongo_db']['default']['database'] = 'fixzyv3';
$config['mongo_db']['default']['db_debug'] = TRUE;
$config['mongo_db']['default']['return_as'] = 'array';
$config['mongo_db']['default']['write_concerns'] = (int)1;
$config['mongo_db']['default']['journal'] = TRUE;
$config['mongo_db']['default']['read_preference'] = NULL;
$config['mongo_db']['default']['read_preference_tags'] = NULL;

if (ENVIRONMENT == 'development_local')
{	
	// $config['mongo_db']['default']['username'] = '';
	// $config['mongo_db']['default']['password'] = '';
	// $config['mongo_db']['default']['dns'] = 'mongodb://mongo:27017/local_db';
	// $config['mongo_db']['default']['database'] = 'local_db';

	$config['mongo_db']['default']['username'] = 'fixzy1124';
	$config['mongo_db']['default']['password'] = '8dQUUKU77c';
	$config['mongo_db']['default']['dns'] = 'mongodb+srv://fixzy1124:8dQUUKU77c@cluster1.l8de3.mongodb.net/empforce?retryWrites=true&w=majority&wtimeout=5000';
	$config['mongo_db']['default']['database'] = 'empforce';
} 
else 
{
	$config['mongo_db']['default']['username'] = 'fixzy1124';
	$config['mongo_db']['default']['password'] = '8dQUUKU77c';
	$config['mongo_db']['default']['dns'] = 'mongodb://fixzy1124:8dQUUKU77c@v36-shard-00-00.l8de3.mongodb.net:27017,v36-shard-00-01.l8de3.mongodb.net:27017,v36-shard-00-02.l8de3.mongodb.net:27017/fixzyv3?ssl=true&replicaSet=atlas-uk6ezj-shard-0&authSource=admin&w=majority&wtimeout=5000';
	$config['mongo_db']['default']['database'] = 'fixzyv3';
}

$config['mongo_db']['test']['no_auth'] = FALSE;
$config['mongo_db']['test']['hostname'] = 'localhost';
$config['mongo_db']['test']['port'] = '27017';
$config['mongo_db']['test']['username'] = 'username';
$config['mongo_db']['test']['password'] = 'password';
$config['mongo_db']['test']['database'] = 'database';
$config['mongo_db']['test']['db_debug'] = TRUE;
$config['mongo_db']['test']['return_as'] = 'array';
$config['mongo_db']['test']['write_concerns'] = (int)1;
$config['mongo_db']['test']['journal'] = TRUE;
$config['mongo_db']['test']['read_preference'] = NULL;
$config['mongo_db']['test']['read_preference_tags'] = NULL;

/* End of file database.php */
/* Location: ./application/config/database.php */
