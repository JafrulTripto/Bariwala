<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'product_category';

    /**
     * Run the migrations.
     * @table product_category
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_category_id');
            $table->integer('product_product_id')->unsigned();
            $table->integer('category_category_id')->unsigned();

            $table->index(["product_product_id"], 'fk_product_category_product1_idx');

            $table->index(["category_category_id"], 'fk_product_category_category1_idx');


            $table->foreign('category_category_id', 'fk_product_category_category1_idx')
                ->references('category_id')->on('category')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_product_id', 'fk_product_category_product1_idx')
                ->references('product_id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
