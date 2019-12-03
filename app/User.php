<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    protected $perPage = 30;
    protected $dates = ['deleted_at'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at'; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday', 'gender', 'address', 'note', 'password', 'catalogue'
    ];// trường nào có thể fill với User::create()

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

    public static function boot()
    {
        parent::boot();
    }

    public function scopeView($q)
    {
        return $q->addSelect('id', 'name', 'phone', 'email')
           ->orderBy('created_at', 'desc')
           ->Paginate();
    }

    public static function get()
    {
        return User::View();
        pre(User);  
    }
    
    public static function search($Request)
    {
        return User::whereLike('email,name,phone', $Request->keyword)->View();
    }

    public static function store($request)
    {
        $request = $request->all();
        $request['birthday'] = convert_time($request['birthday']);
        $request['password'] = Hash::make($request['password']);
        return User::create($request);
    }
    public static function edit($id)
    {
        return User::
            addSelect('id', 'name', 'email', 'birthday', 'gender', 'note', 'phone', 'address')
            ->find($id);
    }

    public static function update1($request, $id)
    {
        $request = $request->input();
        return User::find($id)->update([
            'email' => $request['email'] ?? '',
            'name' => $request['name'] ?? '',
            'phone' => $request['phone'] ?? '',
            'address' => $request['address'] ?? '',
            'birthday' => convert_time($request['birthday'] ?? ''),
            'gender' => $request['gender'] ?? 0,
            'note' => $request['note'] ?? '',
            'catalogue' => $request['catalogue'] ?? '',
        ]);
    }

    public static function destroy($id)
    {
        return 1;
    }
}
