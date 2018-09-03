<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\UsersAccess;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersAccessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            parent::menuBuilder();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = UsersAccess::with(['users', 'modules'])->get()->toArray();
        $create['modules'] = Module::get()->toArray();
        $create['users'] = User::get()->toArray();
        return view('managements.users-access.index', compact('items', 'create'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            foreach($request->input('modules') as $module){
                $response = UsersAccess::firstOrCreate([
                    'users_id' => $request->input('users'),
                    'module_id' => $module
                ]);
            }
            Session::flash('success','New Access Granted');
            return back();
        }
        catch (\Throwable $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsersAccess  $usersAccess
     * @return \Illuminate\Http\Response
     */
    public function show(UsersAccess $usersAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsersAccess  $usersAccess
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersAccess $usersAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UsersAccess  $usersAccess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersAccess $usersAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UsersAccess  $usersAccess
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersAccess $usersAccess)
    {
        //
    }
}
