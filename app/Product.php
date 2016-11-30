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
    //essa função retorna  a categoria do produto
    public function category(){
        return $this->belongsTo('CodeCommerce\Category');
    }

    //um produto pode ter varias imagens
    //essa função retorna as imagens do produto
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    //um produto pode ter varias tags e vice-versa (many to many)
    //essa funçao retorna as tags do produto
    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    // Exemplo de Accessor (metodo que permite ser tratado como atributo)
    // Neste caso, o nome do método deve começar com get e terminar com Attribute.
    // Sua utilização na manipulação do objeto poderia ser de varias formas:
    // Ex: $product->name_description; ou $product->nameDescription; ous $product->NameDescription;
    public function getNameDescriptionAttribute(){
         return $this->name . " - " .$this->description;
    }

    //O metodo abaixo lista as tags do produto, separado por virgula
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(', ',$tags);
    }

    //Consulta de Escopo inicia-se sempre com scope
    //forma elegante de fazer consultas, filtros para atender regras de negocio
    //devem ser tratadas no Model e não no controller

    public function scopeFeatured($query)
    {
        return $query->where('featured','=',1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend','=',1);
    }

    //retorna a query que filtra os produtos de uma determinada categoria
    public function scopeByCategory($query, $id)
    {
         return $query->where('category_id', '=', $id);
    }

}
