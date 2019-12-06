<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users'; // tên table
    protected $perPage = 30; // cài đặt số trang trên 1 trang
    const CREATED_AT = 'created_at'; // mặc định lưu thời gian khi created
    const UPDATED_AT = 'updated_at'; // mặc định lưu thời gian khi updated

    // điều kiện trường nào có thể thêm vào cơ sở dữ liệu khi thực hiên create
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday', 'gender', 'address', 'note', 'catalogue', 'trash'
    ];

    // trường dữ liệu lấy khi edit
    protected $selectEdit = [
        'name', 'email', 'phone', 'birthday', 'gender', 'address', 'note', 'catalogue'
    ];

    public $fieldsearch = 'name,email';
    
    // ???
    protected $hidden = [
        'password', 'remember_token',
    ];

    // hàm khởi tạo
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        return $this->fieldsearch;
    }
    public static function boot()
    {
        parent::boot(); 
    }

    // mặc định lấy trường, sắp xếp, phân trang ở trang view và search
    public function scopeView($q)
    {
        return $q->addSelect('id', 'name', 'phone', 'email')
            ->orderBy('created_at', 'desc')
            ->where('trash', 0)
            ->Paginate();
    }

    // convert dữ liệu truyền vào như ngày tháng, mật khẩu khi thực hiện create và update
    public function processRequest($request){
        foreach ($request as $key => $value) {
            switch ($key) {
                case 'birthday':
                    $request[$key] = convert_time($value);break;
                case 'password':
                    $request[$key] = Hash::make($value);break;
            }
        }
        return $request;
    }


    // ___________________PHẦN CHUNG GET SEARCH STORE EDIT UPDATE1 DESTROY ___________________
    // (các module cơ bản giống nhau)

    // lấy dữ liệu ở trang view
    public static function get()
    {
        return User::View();
    }
    
    // tìm kiếm dữ liệu ở trng view
    public static function search($request)
    {
        return User::whereLike('name,email,phone', $request->keyword)->View();
    }

    // thực hiện khởi tạo bản ghi
    public static function store($request)
    {
        $request = $request->all();
        return User::create($this->processRequest($request));
    }

    // lấy dữ liệu của 1 bản ghi 
    public static function edit($id)
    {
        return $this->fieldsearch;


        return User::
            addSelect($this->selectEdit)
            ->find($id);
    }

    // thực hiện cập nhập 1 bản ghi
    public static function update1($request, $id)
    {
        $request = $request->input();
        return User::find($id)->update($this->processRequest($request));
    }

    // thực hiện xóa 1 bản ghi
    public static function destroy($id)
    {
        return User::find($id)->update([
            'trash' => 1,
        ]);
    }
    // ________________ kết thúc PHẦN CHUNG GET SEARCH STORE EDIT UPDATE1 DESTROY ________________
}
