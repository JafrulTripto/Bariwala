<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'product';

    /**
     * Run the migrations.
     * @table product
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('product_id');
            $table->string('product_name', 45);
            $table->string('product_barcode', 45);
            $table->string('product_buying_price', 45)->nullable();
            $table->string('product_selling_price', 45)->nullable();
            $table->timestamps();

            $table->unique(["product_barcode"], 'product_barcode_UNIQUE');
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
