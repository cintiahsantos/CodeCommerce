<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'name'];

    //uma tag pode estar associada a varios produtos e vice-versa (many to many)
    //essa funçao retorna os produtos associados a uma tag

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

}
