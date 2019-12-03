<?php
namespace App\Http\Controllers\Backend;

use App\UserCatalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController as BackendController;
use App\Http\Requests\StoreUserCatalogueRequests;
use App\Http\Requests\UpdateUserCatalogueRequests;

class UserCatalogueController extends BackendController
{
    
    public $module;
    function __construct() {
        $this->module = 'user_catalogue';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $script = $this->module;   
        return view('backend.usercatalogue.index', ['script' => $script, 'modules' => UserCatalogue::get()]);
    }

    /**
     * Display a listing of the resource where search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $Request)
    {
        $script = $this->module;    
        return view('backend.usercatalogue.index', ['script' => $script, 'modules' => UserCatalogue::search($Request)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $script = $this->module;  
        return view('backend.usercatalogue.create', compact('script'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCatalogueRequests $request)
    {
        $validated = $request->validated();

        $result = UserCatalogue::store($request);

        if ($result ) {
            \Session::flash('success', __('messages.module_store') );
        } else {
            \Session::flash('error', __('messages.module_not_store'));
        }
        return redirect()->route('backend.usercatalogue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(UserCatalogue $userCatalogue)
    {
        return redirect()->route('backend.usercatalogue');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $script = $this->module; 

        $module = UserCatalogue::edit($id);
        
        // Kiểm tra xem có tồn tại bản ghi 
        if(!isset($module) || !check_array($module)){
            \Session::flash('error', __('messages.module_not_found') );
            return redirect()->route('backend.usercatalogue');
        }

        return view('backend.usercatalogue.edit', ['script' => $script, 'module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserCatalogueRequests $request, $id)
    {
        $validated = $request->validated();
        $result = UserCatalogue::update1($request, $id);

        if ($result ) {
            \Session::flash('success', __('messages.module_update') );
        } else {
            \Session::flash('error', __('messages.module_not_update'));
        }
        return redirect()->route('backend.usercatalogue');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCatalogue  $userCatalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $result = UserCatalogue::destroy($id);

        if ($result ) {
            \Session::flash('success', __('messages.module_destroy') );
        } else {
            \Session::flash('error', __('messages.module_not_destroy'));
        }
        return redirect()->route('backend.usercatalogue');
    }
}
