<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\UsersAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

    }

    public function menuBuilder()
    {
        $usersAccess = UsersAccess::where('users_id', Auth::id())->get()->toArray();
        $access = array();
        foreach ($usersAccess as $acc){
            $access[] = $acc['module_id'];
        }
        $access = implode(",", $access);
        session(['access' => $access]);
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('documents')) {
            $fileName = sprintf(
                '%s%s.%s',
                str_random(6),
                time(),
                $request->file('documents')->getClientOriginalExtension());
            $request->file('documents')->move("uploads/", $fileName);

            return $fileName;
        }

    }
}
