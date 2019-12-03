<?php
namespace App\Http\Controllers\Backend;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController as BackendController;
use App\Http\Requests\StoreArticleRequests;
use App\Http\Requests\UpdateArticleRequests;
use App\Library\Services\Nestedsetbie;


class ArticleController extends BackendController 
{
    
    public $module;
    function __construct() {
        $this->module = 'article';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Nestedsetbie $Nestedsetbie)
    {
        
        $script = $this->module;   
        return view('backend.article.index', ['script' => $script, 'modules' => Article::get()]);
    }

    /**
     * Display a listing of the resource where search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $Request)
    {
        $script = $this->module;    
        return view('backend.article.index', ['script' => $script, 'modules' => Article::search($Request)]);

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
        return view('backend.article.create', compact('script', 'cataList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequests $request)
    {
        $validated = $request->validated();

        $result = Article::store($request);

        if ($result ) {
            \Session::flash('success', __('messages.module_store') );
        } else {
            \Session::flash('error', __('messages.module_not_store'));
        }
        return redirect()->route('backend.article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Article $user)
    {
        return redirect()->route('backend.article');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $script = $this->module;

        $module = Article::edit($id);

        // Kiểm tra xem có tồn tại bản ghi k 
        if(!isset($module) || !check_array($module)){
            \Session::flash('error', __('messages.module_not_found') );
            return redirect()->route('backend.article');
        }

        // lấy danh sách nhóm bài viết
        $Nestedsetbie = new Nestedsetbie();
        $cataList = $Nestedsetbie->dropdown(array('table' => 'article_catalogues'));

        return view('backend.article.edit', ['script' => $script, 'cataList' => $cataList, 'module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequests $request, $id)
    {
        $validated = $request->validated();
        $result = Article::update1($request, $id);

        if ($result ) {
            \Session::flash('success', __('messages.module_update') );
        } else {
            \Session::flash('error', __('messages.module_not_update'));
        }
        return redirect()->route('backend.article');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $result = Article::destroy($id);

        if ($result ) {
            \Session::flash('success', __('messages.module_destroy') );
        } else {
            \Session::flash('error', __('messages.module_not_destroy'));
        }
        return redirect()->route('backend.article');
    }
}
