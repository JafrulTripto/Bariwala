<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImageTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'product_image';

    /**
     * Run the migrations.
     * @table product_image
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_image_id');
            $table->integer('product_product_id')->unsigned();
            $table->integer('image_image_id')->unsigned();

            $table->index(["image_image_id"], 'fk_product_image_image1_idx');

            $table->index(["product_product_id"], 'fk_product_image_product1_idx');


            $table->foreign('product_product_id', 'fk_product_image_product1_idx')
                ->references('product_id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('image_image_id', 'fk_product_image_image1_idx')
                ->references('image_id')->on('image')
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
