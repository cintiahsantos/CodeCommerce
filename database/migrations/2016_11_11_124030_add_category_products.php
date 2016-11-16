<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //abaixo crio o campo com valor default =1
            $table->integer('category_id')->unsigned()->default(1);
            //crio o relacionamento do campo criado com o campo id da tabela categories
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //o rollback exclui a coluna criada
            $table->removeColumn('category_id');
        });
    }
}
