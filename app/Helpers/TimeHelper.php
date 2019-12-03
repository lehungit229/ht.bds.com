<?php 

if(!function_exists('convert_time')){
	function convert_time($time = '', $type = '-'){
		if($time == ''){
			return '0000-00-00 00:00:00';
		};
		$time = str_replace( '/', '-', $time );
		$current = explode('-', $time);
		$time_stamp = $current[2].'-'.$current[1].'-'.$current[0].' 00:00:00';
		return $time_stamp;
	}
}

// cộng trừ thời gian ngày tháng
if(!function_exists('operator_time')){
	function operator_time($time, $val = 0, $type = 'd', $return = 'd/m/Y'){
		$time = (isset($time)) ? $time : $this->currentTime;
		$data['H'] = 0;
		$data['i'] = 0;
		$data['s'] = 0;
		$data['d'] = 0;
		$data['m'] = 0;
		$data['Y'] = 0;
		$data[$type] = $val;
		$dateint = mktime(gettime($time, 'H') - $data['H'], gettime($time, 'i') - $data['i'], gettime($time, 's') - $data['s'], gettime($time, 'm') - $data['m'], gettime($time, 'd') - $data['d'], gettime($time, 'Y') - $data['Y']);
		return date($return, $dateint); // 02/12/2016
	}
}

//  lấy cách môc thời gian như : đầu tuần, cuối tuần, đầu tháng, cuối tháng
if(!function_exists('get_time_of')){
	function get_time_of($date = ''){
		$date = new DateTime('now');

		$date->modify('first day of this month');
		$param['first_day_of_month'] = $date->format('Y-m-d').' 00:00:00';

		$date->modify('last day of this month');
		$param['last_day_of_month'] = $date->format('Y-m-d').' 23:59:59';


		$day = date('w');
		$param['first_day_of_week'] = date('Y-m-d', strtotime('-'.$day.' days')).' 00:00:00';
		$param['last_day_of_week'] = date('Y-m-d', strtotime('+'.(6-$day).' days')).' 23:59:59';

		$day = date('Y-m-d', time());
		$param['first_day_of_day'] = $day.' 00:00:00';
		$param['last_day_of_day'] = $day.' 23:59:59';
	    return $param;
	}
}

//  lấy kiểu thời gian theo yêu cầu
if(!function_exists('gettime')){
	function gettime($time, $type = 'H:i - d/m/Y'){
		if($time == '0000-00-00 00:00:00'){
			return false;
		}
		if($type == 'micro'){
			return strtotime($time)*1000;
		}
		return gmdate($type, strtotime($time) + 7*3600);
	}
}

?>