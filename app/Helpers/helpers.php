<?php

use App\Models\Setting;
use App\Models\Page;

if (!function_exists('setActiveRoutes')) {

  function setActiveRoutes($paths, $class = false)
  {
    foreach ($paths as $path) {

      if (Request::is($path . '*')) {
        if ($class)
          return ' class=active';
        else
          return ' active';
      }
    }
  }
}



if (!function_exists('checkImage')) {

  function checkImage($path)
  {
    if (\File::exists(public_path('uploads/' . $path))) {
      return asset('public/uploads/' . $path);
    } else {
      $path = explode('/', $path);
      $place_holder = 'no_image.png';
      if (count($path) > 0) {
        $path = $path[0];
      }
      return asset('public/uploads/' . $place_holder);
    }
  }
}

if (! function_exists('settingValue')) {
    
  function settingValue($key)
  {
      $setting = \DB::table('settings')->where('key',$key)->first();  
      if($setting)
          return $setting->value;
      else
          return '';
  }  
}

if (!function_exists('getPageByKey')) {
  function getPageByKey($key)
  {
    return Page::where('page_title', $key)->first();
  }
}

if (! function_exists('isActiveRoute')) {
    
  function isActiveRoute($route, $output = "active")
  {
    if (Route::current()->uri == $route) return $output;
  }  
}

if (! function_exists('setActive')) {
  
  function setActive($paths)
  {
      foreach ($paths as $path) {
          if(Request::is($path . '*'))
              return ' menu-item-active'; 
      }
  }
}

if (! function_exists('setSectionActive')) {
  
  function setSectionActive($paths)
  {
      foreach ($paths as $path) {

          if(Request::is($path . '*'))
              return ' active'; 
      }
  }
}

if (! function_exists('setTabActive')) {
  
  function setTabActive($paths)
  {
      foreach ($paths as $path) {

          if(Request::is($path . '*'))
              return ' show active'; 
      }
  }
}
