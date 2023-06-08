<?php

namespace App\Facades;
use App\Models\Categories;
use Illuminate\Support\Facades\Facade;

class Student
{


    protected static function getFacadeAccessor()
    {

        return 'student';
    }

    public static function allCategory()
    {

        $all_category = Categories::orderBy('id', 'desc')->get();
        return $all_category;
    }


}
