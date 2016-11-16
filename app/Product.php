<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommend',
        'category_id'];

    //Relacionando models
    //um produto pertence a uma categoria
    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }
}
