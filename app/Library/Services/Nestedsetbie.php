<?php
namespace App\Library\Services;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class Nestedsetbie extends Controller
{
    function __construct($params = NULL){
		$this->params = $params;
		$this->checked = NULL;
		$this->data = NULL;
		$this->count = 0;
		$this->count_level = 0;
		$this->lft = NULL;
		$this->rgt = NULL;
		$this->level = NULL;
	}

	public function Processed($param = []){
		$this->Get($param);
		$this->Recursive(0, $this->Set());
		$this->Action($param);
	}
	public function Get($param = []){
		$table = $param['table'] ?? 'users';
		$key = $param['key'] ?? 'id';
		$value = $param['value'] ?? 'name';
		$data = DB::table($table)->select($key, $value, 'level', 'parentid', 'lft', 'rgt')->get()->toArray();
		$data = convert_obj_to_array($data);
		return $this->data = $data;
	}

	public function Set(){	
		if(isset($this->data) && is_array($this->data)){
			foreach($this->data as $key => $val){
				$arr[$val['id']][$val['parentid']] = 1;
				$arr[$val['parentid']][$val['id']] = 1;
			}
			return $arr;
		}
	}

	public function Recursive($start = 0, $arr = NULL){
		$this->lft[$start] = ++$this->count;
		$this->level[$start] = $this->count_level;
		if(isset($arr) && is_array($arr)){
			foreach($arr as $key => $val){
				if((isset($arr[$start][$key]) || isset($arr[$key][$start])) &&(!isset($this->checked[$key][$start]) && !isset($this->checked[$start][$key]))){
					$this->count_level++;
					$this->checked[$start][$key] = 1;
					$this->checked[$key][$start] = 1;
					$this->recursive($key, $arr);
					$this->count_level--;
				}
			}
		}
		$this->rgt[$start] = ++$this->count;
	}

    public function Action($param){
		if(isset($this->level) && is_array($this->level) && isset($this->lft) && is_array($this->lft) && isset($this->rgt) && is_array($this->rgt)){
			$data = NULL;
			foreach($this->level as $key => $val){
				$data = array(
					'level' => $val,
					'lft' => $this->lft[$key],
					'rgt' => $this->rgt[$key],
				);
				DB::table($param['table'])
		            ->where('id', $key)
		            ->update($data);
			}
			// da($data);
		}
    }

	public function Dropdown($param = []){
		$this->get($param);
		$key = $param['key'] ?? 'id';
		$value = $param['value'] ?? 'name';
		// return $this->data;
		if(isset($this->data) && is_array($this->data)){
			$temp = NULL;
			$temp[0] = (isset($param->text) && !empty($param->text)) ? $param->text : '[Root]';
			foreach($this->data as $key => $val){
				$temp[$val['id']] = str_repeat('|-----', (($val['level'] > 0)?($val['level'] - 1):0)).$val[$value];
			}
			return $temp;
		}
		return [];
	}
}