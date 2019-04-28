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
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->timestamps();

            $table->index(["image_id"], 'fk_product_image_image1_idx');

            $table->index(["product_id"], 'fk_product_image_product1_idx');


            $table->foreign('product_id', 'fk_product_image_product1_idx')
                ->references('id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('image_id', 'fk_product_image_image1_idx')
                ->references('id')->on('image')
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
