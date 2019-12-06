<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCatalogue extends Model
{
    protected $table = 'user_catalogues';
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
        'id','name', 'created_at',  'permission'
    ];// trường nào có thể fill với User_catalogue::create()

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
        return $q->addSelect('id', 'name', 'created_at')
           ->orderBy('created_at', 'desc')
           ->Paginate();
    }

    public static function get()
    {
        return UserCatalogue::View();
    }
    
    public static function search($Request)
    {
        return UserCatalogue::whereLike('name', $Request->keyword)->View();
    }

    public static function store($request)
    {
        $request = $request->all();
        $request['permission'] = json_encode($request['permission'] ?? []);
        return UserCatalogue::create($request);
    }
    public static function edit($id)
    {
        return UserCatalogue::
            addSelect('id', 'name', 'permission')
            ->find($id);
    }

    public static function update1($request, $id)
    {
        $request = $request->input();
        return UserCatalogue::find($id)->update([
            'name' => $request['name'] ?? '',
            'catalogue' => $request['catalogue'] ?? '',
            'permission' => json_encode($request['permission'] ?? []),
        ]);
    }

    public static function destroy($id)
    {
        return User::find($id)->update([
            'trash' => 1,
        ]);
    }
}
