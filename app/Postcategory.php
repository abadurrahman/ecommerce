<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcategory extends Model
{
    protected $fillable = [
            'category_name_en','category_name_bn','category_name_cn','category_name_hn'
        ];
}
