<?php 
if(!function_exists('convert_obj_to_array')){
	function convert_obj_to_array($obj, &$arr = '') {
		$arr = [];
	    if(!is_object($obj) && !is_array($obj)){
	        $arr = $obj;
	        return $arr;
	    }
	    foreach ($obj as $key => $val){
	        if (!empty($val)){

	            $arr[$key] = array();
	            convert_obj_to_array($val, $arr[$key]);
	        }else{
	            $arr[$key] = $val;
	        }
	    }
	    return $arr;
	}
}

if(!function_exists('da')){
	function da($data){
		dd($data);
	}
}
if(!function_exists('dc')){
	function dc($data){
		dd($data->attributesToArray());
	}
}
if(!function_exists('addCommas')){
	function addCommas($number = ''): string{
		$number = $number ?? 0;
		if(!empty($number)){
			return number_format($number,'0',',','.');
		}
		return 0;
	}
}


//  kiểm tra định dạng 
if(!function_exists('check_array')){
	function check_array($param = ''): bool{
		$param = (array)$param;
		if(isset($param) && is_array($param) && count($param)){
			return true;
		}else{
			return false;
		}
	}
}


// laoij bỏ tiêng việt
if(!function_exists('removeutf8')){
	function removeutf8($value = NULL){
		$chars = array(
			'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
			'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
			'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
			'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
			'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
			'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
			'd'	=>	array('đ','Đ'),
		);
		foreach ($chars as $key => $arr)
			foreach ($arr as $val)
				$value = str_replace($val, $key, $value);
		return $value;
	}
}

// chyển kiểu string về slug
if(!function_exists('slug')){
	function slug($value = NULL){
		$value = removeutf8($value);
		$value = str_replace('-', ' ', trim($value));
		$value = preg_replace('/[^a-z0-9-]+/i', ' ', $value);
		$value = trim(preg_replace('/\s\s+/', ' ', $value));
		return strtolower(str_replace(' ', '-', trim($value)));
	}
}

if(!function_exists('random')){
	function random($leng = 168, $char = FALSE){
		if($char == FALSE) $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
		else $s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		mt_srand((double)microtime() * 1000000);
		$salt = '';
		for ($i=0; $i<$leng; $i++){
			$salt = $salt . substr($s, (mt_rand()%(strlen($s))), 1);
		}
		return $salt;
	}
}



if(!function_exists('get_colum_in_array')){
	function get_colum_in_array($data=array(), $field= 'id' ){
	    if(empty($field) || empty($data) ){
	        return false ;
	    }
	    if(isset($data) && is_array($data) && count($data)){
	    	foreach ($data as $key => $val) {
	    		if(isset($val[$field])){
		    		$result[] = $val[$field];
	    		}
	    	}
	    }
	    return (isset($result)) ? $result : '' ;
	}
}


//  convert định dạng đường dẫn ảnh
if(!function_exists('getthumb')){
	function getthumb($image = '' , $thumb = TRUE){
		$image = !empty($image) ? $image :  IMG_NOT_FOUND;

		return $image;
		if(!file_exists(dirname(dirname(dirname(__FILE__))).$image) ){
			$image = IMG_NOT_FOUND;
		}
		if($thumb == TRUE){
			$image_thumb = str_replace(SRC_IMG, SRC_THUMB, $image);
			if (file_exists(dirname(dirname(dirname(__FILE__))).$image_thumb)){
				return $image_thumb;
			}
		}
		return $image;
	}
}
?>