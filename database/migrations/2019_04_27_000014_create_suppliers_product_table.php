<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersProductTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'suppliers_product';

    /**
     * Run the migrations.
     * @table suppliers_product
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('suppliers_suppliers_id')->unsigned();
            $table->integer('product_product_id')->unsigned();

            $table->index(["suppliers_suppliers_id"], 'fk_suppliers_has_product_suppliers1_idx');

            $table->index(["product_product_id"], 'fk_suppliers_has_product_product1_idx');


            $table->foreign('suppliers_suppliers_id', 'fk_suppliers_has_product_suppliers1_idx')
                ->references('suppliers_id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('product_product_id', 'fk_suppliers_has_product_product1_idx')
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
