<?php
namespace App\Http\Controllers\Backend;

use App\ArticleCatalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController as BackendController;
use App\Http\Requests\StoreArticleCatalogueRequests;
use App\Http\Requests\UpdateArticleCatalogueRequests;
use App\Library\Services\Nestedsetbie;


class ArticleCatalogueController extends BackendController 
{
    
    public $module;
    function __construct() {
        $this->module = 'article_catalogue';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Nestedsetbie $Nestedsetbie)
    {
        
        $script = $this->module;   
        return view('backend.articlecatalogue.index', ['script' => $script, 'modules' => ArticleCatalogue::get()]);
    }

    /**
     * Display a listing of the resource where search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $Request)
    {
        $script = $this->module;    
        return view('backend.articlecatalogue.index', ['script' => $script, 'modules' => ArticleCatalogue::search($Request)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Nestedsetbie $Nestedsetbie)
    {   
        $script = $this->module; 
        $cataList = $Nestedsetbie->dropdown(array('table' => 'article_catalogues'));
        return view('backend.articlecatalogue.create', compact('script', 'cataList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleCatalogueRequests $request)
    {
        $validated = $request->validated();

        $result = ArticleCatalogue::store($request);

        if ($result ) {
            \Session::flash('success', __('messages.module_store') );
        } else {
            \Session::flash('error', __('messages.module_not_store'));
        }
        return redirect()->route('backend.articlecatalogue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCatalogue $userCatalogue)
    {
        return redirect()->route('backend.articlecatalogue');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $script = $this->module;

        $module = ArticleCatalogue::edit($id);

        // Kiểm tra xem có tồn tại bản ghi k 
        if(!isset($module) || !check_array($module)){
            \Session::flash('error', __('messages.module_not_found') );
            return redirect()->route('backend.articlecatalogue');
        }

        // lấy danh sách nhóm bài viết
        $Nestedsetbie = new Nestedsetbie();
        $cataList = $Nestedsetbie->dropdown(array('table' => 'article_catalogues'));

        return view('backend.articlecatalogue.edit', ['script' => $script, 'cataList' => $cataList, 'module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleCatalogueRequests $request, $id)
    {
        $validated = $request->validated();
        $result = ArticleCatalogue::update1($request, $id);

        if ($result ) {
            \Session::flash('success', __('messages.module_update') );
        } else {
            \Session::flash('error', __('messages.module_not_update'));
        }
        return redirect()->route('backend.articlecatalogue');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $result = ArticleCatalogue::destroy($id);

        if ($result ) {
            \Session::flash('success', __('messages.module_destroy') );
        } else {
            \Session::flash('error', __('messages.module_not_destroy'));
        }
        return redirect()->route('backend.articlecatalogue');
    }
}
