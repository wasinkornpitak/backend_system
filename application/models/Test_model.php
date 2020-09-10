<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get_test(){

		// phpinfo();
		// exit;

		$test_lacal = $this->mongo_db->select(array('name', 'last_name'))->get('user');

		$test = $this->mongo_db->select(array('name', 'last_name'))->get('test');

		$data = array(
			'test_local'=> $test_lacal,
			'test'=> $test
		);

		// $test_agg = $this->mongo_db->aggregate('jobs', array(
		// 	array('$match'=> array(
		// 		'is_active'=> true,
		// 	)),
		// 	array('$lookup'=> array(
		// 		'from'=> 'category',
		// 		'localField'=> 'category_id',
		// 		'foreignField'=> '_id',
		// 		'as'=> 'docs_last_level'
		// 	)),
		// 	array('$unwind'=> '$docs_last_level'),
		// 	array('$lookup'=> array(
		// 		'from'=> 'category',
		// 		'localField'=> 'docs_last_level.parent_id',
		// 		'foreignField'=> '_id',
		// 		'as'=> 'docs_under_level'
		// 	)),
		// 	// array('$unwind'=> '$docs_under_level'),
		// 	// array('$project'=> array(
		// 	// 	'user_firstname'=> '$docs_user.user_firstname'
		// 	// ))
		// ));

		// $where = array(
			// 'name'=> 'test'
			// '_id'=> new MongoDB\BSON\ObjectId('5ef1bdf7fde55175c90b47d5')
		// );

		// $test = $this->mongo_db->select(array('name'))->get('test');
		// $test = $test->count();

		// $date_from = '23-06-2020';
		// $date_to = '23-06-2020';
		// $test_agg = $this->mongo_db->aggregate('fz_fixrequest', array(
		// 	array('$match'=> array(
		// 		'is_active'=> '1',
		// 		'white_label_key'=> 'fixzy',
		// 		'doc'=> array(
		// 			'$gte'=> '2020-06-23T00:00:00+07:00',
		// 			'$lte'=> '2020-06-23T23:59:59+07:00'
		// 			)
		// 	)),
		// 	array('$lookup'=> array(
		// 	   'from'=> 'fz_user',
		// 	   'localField'=> 'user_id',
		// 	   'foreignField'=> '_id',
		// 	   'as'=> 'docs_user'
		// 	)),
		// 	array('$unwind'=> '$docs_user'),
		// 	array('$project'=> array(
		// 		'user_firstname'=> '$docs_user.user_firstname'
		// 	))
		// ));

		// $test_insert = $this->mongo_db->insert('test', array('name'=> 'test3', 'is_active'=> '1', 'doc'=> date('c')));

		// $updateData = array(
		// 	'name'=> 'test8',
		// 	'is_active'=> '0',
		// 	// 'doc'=> date('c')
		// );

		// unset($updateData['is_active']);

		// $where = array(
		// 	'_id'=> new MongoDB\BSON\ObjectId('5ef1c81a90fe3d381e15cba9')
		// );

		// $test_update = $this->mongo_db->where($where)->update('test', $updateData);

		// $test_delete = $this->mongo_db->where($where)->delete('test');

		return $data;

	}

}
