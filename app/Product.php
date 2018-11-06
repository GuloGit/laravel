<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table= "products";

    //сейчас можно массово задать значения для всех столбцов

    protected $guarded= [];

    public static function rules()
    {
        return[
            "name"=>"required|max:255",
            "info"=>"required",
            "content"=>"required",
            "price"=>"required|integer|min:0",
            "quantity"=>"required|integer|min:0",
            "image" => "mimes:jpeg,png|max:2000"
        ];

    }
}
