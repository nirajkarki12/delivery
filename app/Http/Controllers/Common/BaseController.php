<?php

namespace App\Http\Controllers\Common;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        //
    }

    /**
     * Get the authGuard
     *
     * @return \Illuminate\Http\Response
     */
    public function authGuard()
    {
        return Auth::guard('admin');
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        return $this->authGuard()->user();
    }

    public function beginTransaction() {
        return \DB::beginTransaction();
    }

    public function commit() {
        return \DB::commit();
    }

    public function rollBack() {
        return \DB::rollBack();
    }

}
