<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BackendController as BackendController;

class DashboardController extends BackendController
{
    public function get_select2(Request $Request){
		$locationVal = $Request['locationVal'];
		$module = $Request['module'];
		$value = $Request['value'] ?? 'name';
		$key = $Request['key'] ?? 'id';
		$data = DB::table($module)
					->select($key, $value)
					->orderBy($key, 'desc')
					->limit(10)
					->get()->toArray();

			// 'keyword'=> '('.$value.' LIKE \'%'.$locationVal.'%\''.$condition.')',

		$temp = [];
		$data = convert_obj_to_array($data);
		if(isset($data) && is_array($data) && count($data)){
			foreach($data as $index => $val){
				$temp[] = array(
					'id'=> $val[$key],
					'text' => $val[$value],
				);
			}
		}
		echo json_encode(array('items' => $temp));die();
	}
}
