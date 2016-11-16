<?php

namespace CodeCommerce;

use CodeCommerce\Http\Requests\ProductRequest;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'];

    //relacionando os Models
    //uma categoria pode ter diversos produtos
    public function products(){
        return $this->hasMany('CodeCommerce\Product');
    }
}
