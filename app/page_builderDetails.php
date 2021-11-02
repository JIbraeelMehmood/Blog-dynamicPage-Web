<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page_builderDetails extends Model
{
    protected $fillable = ['section_ids','page_name','page_url','page_favicon', 'page_title','page_desc','page_key'];

}
