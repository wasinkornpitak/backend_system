<?php

	require 'vendor/autoload.php';

	use Aws\S3\S3Client;

	use Aws\Exception\AwsException;

	function check_job_status_badges($status){
		$res = array();

		switch ($status) {
			case 'pending':
				$res['text'] = 'pending';
				$res['html'] = '<a href="javascript:void(0)" style="background-color: white;cursor: default;" class="badge badge-outline-secondary">pending</a>';
                break;
			case 'processing':
				$res['text'] = 'processing';
				$res['html'] = '<a href="javascript:void(0)" style="background-color: white;cursor: default;" class="badge badge-outline-info">processing</a>';
                break;
			case 'complete':
				$res['text'] = 'complete';
				$res['html'] = '<a href="javascript:void(0)" style="background-color: white;cursor: default;" class="badge badge-outline-success">complete</a>';
                break;
			case 'cancel':
				$res['text'] = 'cancel';
				$res['html'] = '<a href="javascript:void(0)" style="background-color: white;cursor: default;" class="badge badge-outline-danger">cancel</a>';
                break;
		}
		
		return $res;
	}

	function pagination($countData = 0, $limit = 0, $page = 0, $type = 'html', $text = ''){
		$CI = &get_instance();
	
		$adjacents = 2;
	
		if ($page) {
			$start = ($page - 1) * $limit; //first item to display on this page
		} else {
			$start = 0;
		}
	
		// Setup page vars for display. */
		if ($page == 0) {
			$page = 1;
		} //if no page var is given, default to 1.
		$prev = $page - 1; //previous page is page - 1
		$next = $page + 1; //next page is page + 1
		$lastpage = ceil($countData / $limit); //lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1; //last page minus 1
	
		/*
		Now we apply our rules and draw the pagination object.
		We're actually saving the code to a variable in case we want to draw it more than once.
		 */
		$pagination = '';
		if ($lastpage > 1) {
			// $pagination .= '<div role="toolbar"><div class="btn-group" role="group">';
			//previous button
			if ($page > 1) {
				// $pagination .= '<a class="btn btn-default btn-sm" ' . rLP($text, $type, $prev) . '>หน้าก่อน</a>';
				$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $prev) . '>หน้าก่อน</button></li>';
			} else {
				$pagination .= '<li class="page-item disabled"><button class="page-link" href="javascript:void(0)">หน้าก่อน</button></li>';
			}
	
			//pages
			if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
				for ($counter = 1; $counter <= $lastpage; ++$counter) {
					if ($counter == $page) {
						$pagination .= '<li class="page-item active disabled"><button class="page-link">' . $counter . '</button>';
					} else {
						$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $counter) . '>' . $counter . '</button>';
					}
				}
			} elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
				//close to beginning; only hide later pages
				if ($page < 1 + ($adjacents * 2)) {
					for ($counter = 1; $counter < 4 + ($adjacents * 2); ++$counter) {
						if ($counter == $page) {
							$pagination .= '<li class="page-item active disabled"><button class="page-link">' . $counter . '</button>';
						} else {
							$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $counter) . '>' . $counter . '</button>';
						}
					}
					$pagination .= '<li class="page-item active disabled"><button class="page-link">...</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $lpm1) . '>' . $lpm1 . '</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $lastpage) . '>' . $lastpage . '</button>';
				} elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) { //in middle; hide some front and some back
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, '1') . '>1</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, '2') . '>2</button>';
					$pagination .= '<li class="page-item active disabled"><button class="page-link">...</button>';
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; ++$counter) {
						if ($counter == $page) {
							$pagination .= '<li class="page-item active disabled"><button class="page-link">' . $counter . '</button>';
						} else {
							$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $counter) . '>' . $counter . '</button>';
						}
					}
					$pagination .= '<li class="page-item active disabled"><button class="page-link">...</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $lpm1) . '>' . $lpm1 . '</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $lastpage) . '>' . $lastpage . '</button>';
				} else { //close to end; only hide early pages
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, '1') . '>1</button>';
					$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, '2') . '>2</button>';
					$pagination .= '<li class="page-item active disabled"><button class="page-link">...</button>';
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; ++$counter) {
						if ($counter == $page) {
							$pagination .= '<li class="page-item active disabled"><button class="page-link">' . $counter . '</button>';
						} else {
							$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $counter) . '>' . $counter . '</button>';
						}
					}
				}
			}
			//next button
			if ($page < $counter - 1) {
				$pagination .= '<li class="page-item"><button class="page-link" ' . rLP($text, $type, $next) . '>หน้าต่อไป</button></li>';
			} else {
				$pagination .= '<li class="page-item disabled"><button class="page-link" href="javascript:void(0)">หน้าต่อไป</button></li>';
			}
			// $pagination .= '</div>';
			// $pagination .= '</div></div>';
		}
	
		return $pagination;
	}

	function rLP($text = '', $type = '', $page = 0){ 
		$CI = &get_instance();
		$rt = '';

		$text = str_replace('{{n}}', $page, $text);

		if ($type == 'js' || $type == 'javascript') {
			$rt = " onClick=\"$text\" ";
		} else {
			$rt = " href=\"$text\" ";
		}

		return $rt;
	}

	function thai_date($date_time, $line = false, $precis = false){

		$CI = &get_instance();
		list($date, $time) = explode(' ', $date_time); // แยกวันที่ กับ เวลาออกจากกัน
		$time_ex = explode(':', $time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที
		$date_ex = explode('-', $date); // แยกวันเป็น ปี เดือน วัน

		$H = $time_ex[0];
		$i = $time_ex[1];
		if(!empty($time_ex[2])){
			$s = $time_ex[2]; // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที
		}else{
			$s = 00;
		}

		$Y = $date_ex[0]; 
		$m = $date_ex[1]; 
		$d = $date_ex[2]; // แยกวันเป็น ปี เดือน วัน

		// list($date, $time) = explode(' ', $date_time); // แยกวันที่ กับ เวลาออกจากกัน
		// list($H, $i, $s) = explode(':', $time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที
		// list($Y, $m, $d) = explode('-', $date); // แยกวันเป็น ปี เดือน วัน

		//เปลี่ยน ค.ศ. เป็น พ.ศ.
		$Y = $Y;
		if ($precis) {
			switch ($m) {
				case '01':$m = 'มกราคม';
					break;
				case '02':$m = 'กุมภาพันธ์';
					break;
				case '03':$m = 'มีนาคม';
					break;
				case '04':$m = 'เมษายน';
					break;
				case '05':$m = 'พฤษภาคม';
					break;
				case '06':$m = 'มิถุนายน';
					break;
				case '07':$m = 'กรกฎาคม';
					break;
				case '08':$m = 'สิงหาคม';
					break;
				case '09':$m = 'กันยายน';
					break;
				case '10':$m = 'ตุลาคม';
					break;
				case '11':$m = 'พฤศจิกายน';
					break;
				case '12':$m = 'ธันวาคม';
					break;
			}
		} else {
			switch ($m) {
				case '01':$m = 'ม.ค.';
					break;
				case '02':$m = 'ก.พ.';
					break;
				case '03':$m = 'มี.ค.';
					break;
				case '04':$m = 'เม.ย.';
					break;
				case '05':$m = 'พ.ค.';
					break;
				case '06':$m = 'มิ.ย.';
					break;
				case '07':$m = 'ก.ค.';
					break;
				case '08':$m = 'ส.ค.';
					break;
				case '09':$m = 'ก.ย.';
					break;
				case '10':$m = 'ต.ค.';
					break;
				case '11':$m = 'พ.ย.';
					break;
				case '12':$m = 'ธ.ค.';
					break;
			}
		}

		if ($time != '') {
			if ($line) {
				$time = '<br>' . $time . ' น.';
			} else {
				$time = ' ' . $time . ' น.';
			}
		}

		return trim($d . ' ' . $m . ' ' . $Y . $time);
	}

	function generate_job_code($title){
		$CI = &get_instance();
	 
		$where_clause['company_key'] = $CI->session->userdata('white_label_key');
		$where_clause['code'] = new MongoDB\BSON\Regex($title, 'i');
		$where_clause['is_active'] = true;
	 
		$job_detail = $CI->mongo_db->order_by(array('_id' => 'desc'))->where($where_clause)->get("jobs");
	 
		$rq_code = $job_detail->rq_code;
		$new_running_number = new_running_number($rq_code, '-', '0', 6);
		$rq_code = $title . date('ym') . '-' . $new_running_number;
		$new_rq_id = $rq_code;
		
		$where_clause['rq_code'] = $rq_code;
		$result = $CI->cimongo->where($where_clause)->get("fz_fixrequest");
		$count = $result->num_rows();
	 
		while ($count > 0) {
		   $new_running_number = new_running_number($new_rq_id, '-', '0', 6);
		   $new_rq_id = $title . date('ym') . '-' . $new_running_number;
		   $where_clause['rq_code'] = $new_rq_id;
		   $result = $CI->cimongo->where($where_clause)->get("fz_fixrequest");
		   $count = $result->num_rows();
		}
	 
		return $new_rq_id;
	}
	 
	function new_running_number($rq_code, $seperate = '-', $pad_string = '0', $pad_number = 6){
	 
		$current_year_month = substr($rq_code, 2, 2);
		if($current_year_month < date('y')){
			$running_number = 1;
		}else{
			$code = explode($seperate, $rq_code);
			$running_number = end($code) + 1;
		}
		$new_running_number = str_pad($running_number, $pad_number, $pad_string, STR_PAD_LEFT);
		return $new_running_number;
	}

	function save_image_s3($files, $folder, $filename = ''){
		$CI = &get_instance();

		// Instantiate an Amazon S3 client.
		$s3 = new S3Client([
			'version' => 'latest',
			'region'  => 'ap-southeast-1',
			'credentials' => [
				'key'    => 'AKIAILPVNDEYQJ6RUYIA',
				'secret' => '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',
			],
		]);

		// $s3 = Aws\S3\S3Client::factory(array('key' => 'AKIAILPVNDEYQJ6RUYIA', 'secret' => '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', 'region' => 'ap-southeast-1'));
		$bucket = 'fixzy';
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($files) && $files['error'] == UPLOAD_ERR_OK && is_uploaded_file($files['tmp_name'])) {
			try {
				$upload = $s3->putObject(array(
					'Bucket' => $bucket,
					'Key' => $folder.'/'.$filename,
					'SourceFile' => $files['tmp_name'],
					'CacheControl' => 'max-age=7200',
					'ContentType' => $files['type']
				));
				$return = true;
				return $return;
			} catch (Exception $e) {
				$return = false;
				return $return;
			}
		}
	}
