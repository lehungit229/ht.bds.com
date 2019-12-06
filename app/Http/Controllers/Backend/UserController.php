<?php
namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BackendController as BackendController;
use App\Http\Requests\StoreUserRequests;
use App\Http\Requests\UpdateUserRequests;



class UserController extends BackendController
{
    
    public $module;
    function __construct() {
        $this->module = 'user';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $script = $this->module;   
        return view('backend.user.index', ['script' => $script, 'modules' => User::get()]);
    }

    /**
     * Display a listing of the resource where search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $Request)
    {
        $script = $this->module;    
        return view('backend.user.index', ['script' => $script, 'modules' => User::search($Request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $script = $this->module;  
        return view('backend.user.create', compact('script'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequests $request)
    {
        $validated = $request->validated();

        $result = User::store($request);

        if ($result ) {
            \Session::flash('success', __('messages.module_store') );
        } else {
            \Session::flash('error', __('messages.module_not_store'));
        }
        return redirect()->route('backend.user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->route('backend.user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $script = $this->module;  

        $module = User::edit($id);
        
        // Kiểm tra xem có tồn tại bản ghi 
        if(!isset($module) || !check_array($module)){
            \Session::flash('error', __('messages.module_not_found') );
            return redirect()->route('backend.user');
        }

        return view('backend.user.edit', ['script' => $script, 'module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequests $request, $id)
    {
        $validated = $request->validated();

        $result = User::update1($request, $id);

        if ($result ) {
            \Session::flash('success', __('messages.module_update') );
        } else {
            \Session::flash('error', __('messages.module_not_update'));
        }
        return redirect()->route('backend.user');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $result = User::destroy($id);
        if ($result ) {
            \Session::flash('success', __('messages.module_destroy') );
        } else {
            \Session::flash('error', __('messages.module_not_destroy'));
        }
        return redirect()->route('backend.user');
    }
}
