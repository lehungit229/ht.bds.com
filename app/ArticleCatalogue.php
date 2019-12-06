<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Library\Services\Nestedsetbie;


class ArticleCatalogue extends Model
{
    protected $table = 'article_catalogues';
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
        'id','name','created_at','parentid','description','meta_name','meta_description','canonical','image','publish'
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
        return ArticleCatalogue::View();
    }
    
    public static function search($Request)
    {
        return ArticleCatalogue::whereLike('name', $Request->keyword)->View();
    }

    public static function store($request)
    {
        $request = $request->all();
        $request['slug'] = $request['canonical'];
        $resultid = ArticleCatalogue::create($request)->id;
        // thực hiện left right
        if(!empty($request['canonical'])){
            $router = array(
                'canonical' => $request['canonical'],
                'crc32' => sprintf("%u", crc32($request['canonical'])),
                'uri' => 'article/frontend/catalogue/view',
                'param' => $resultid,
                'type' => 'number',
                'created' => gmdate('Y-m-d H:i:s', time() + 7*3600),
            );
            DB::table('router')->insert($router);
        }
        $Nestedsetbie = new Nestedsetbie();
        $Nestedsetbie->Processed(array('table' => 'article_catalogues'));
        return $resultid;
    }
    public static function edit($id)
    {
        return ArticleCatalogue::
            addSelect('id','name','created_at','parentid','description','meta_name','meta_description','canonical','image','publish')
            ->find($id);
    }

    public static function update1($request, $id)
    {
        $request = $request->all();
        $request['slug'] = slug($request['name']);
        // foreach ($request as $key => $value) {
        //     if(in_array($value, $this->fillable)){
        //         unset($request[$key]);
        //     }
        // }
        ArticleCatalogue::find($id)->update($request);
        $Nestedsetbie = new Nestedsetbie();
        $Nestedsetbie->Processed(array('table' => 'article_catalogues'));

        return ArticleCatalogue::find($id)->update([
            'name' => $request['name'] ?? '',
        ]);
    }

    public static function destroy($id)
    {
        return User::find($id)->update([
            'trash' => 1,
        ]);
    }
}
