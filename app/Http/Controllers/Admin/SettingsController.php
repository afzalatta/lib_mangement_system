<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Setting;
use Redirect;
use Session;
use Hash;
use Auth;
use Vinkla\Hashids\Facades\Hashids;

class SettingsController extends Controller
{
    public function view_settings()
        {
            $all_settings= Setting::get();
            return view('admin.settings.edit_settings' , compact('all_settings'));
        }

    public function edit_setting(Request $request)
        {
            $input = $request->all();

            $all_settings= Setting::get();

            foreach($all_settings as $single_setting)
                {
                    $rules = [

                        $single_setting->key => 'required',
                    ];
                    $this->validate($request, $rules);



                    $update['value'] = $input[$single_setting->key];
                    Setting::where('key', $single_setting->key)->update($update);

                }

                Session::flash('success', 'Setting Updated!');
                return redirect('/admin/settings');
        }


}
