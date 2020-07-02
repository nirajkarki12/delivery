<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\BaseController;
use Validator;
use anlutro\LaravelSettings\Facade as Setting;
use App\Http\Helpers\Helper;

class SettingController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $data = $request->except('_token');

            if($request->file('site_logo')) {
                Helper::deleteImage(Setting::get('site_logo'));

                if(!$file = Helper::uploadImage($request->file('site_logo'))) throw new \Exception("Cannot Save Logo", 1);
                $data['site_logo'] = $file;
            }

            if($request->file('site_icon')) {
                Helper::deleteImage(Setting::get('site_icon'));

                if(!$file = Helper::uploadImage($request->file('site_icon'))) throw new \Exception("Cannot Save Icon", 1);
                $data['site_icon'] = $file;
            }


            if($data && is_array($data)){
                foreach ($data as $key => $value) {
                    Setting::set($key, $value);
                }

                Setting::save();
            }

            return redirect()->route('admin.config')->with('flash_success', 'Config updated Successfully');

        } catch (\Exception $e) {
            return back()->with('flash_error', $e->getMessage())->withInput();
        }
    }

}
