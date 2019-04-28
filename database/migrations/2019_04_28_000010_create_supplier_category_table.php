<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierCategoryTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'supplier_category';

    /**
     * Run the migrations.
     * @table supplier_category
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('suppliers_id')->unsigned();
            $table->timestamps();

            $table->index(["category_id"], 'fk_supplier_category_category1_idx');

            $table->index(["suppliers_id"], 'fk_supplier_category_suppliers1_idx');


            $table->foreign('category_id', 'fk_supplier_category_category1_idx')
                ->references('id')->on('category')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('suppliers_id', 'fk_supplier_category_suppliers1_idx')
                ->references('id')->on('suppliers')
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
