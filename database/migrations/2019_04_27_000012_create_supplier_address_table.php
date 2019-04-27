<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierAddressTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'supplier_address';

    /**
     * Run the migrations.
     * @table supplier_address
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('supplier_address_id');
            $table->integer('suppliers_suppliers_id')->unsigned();
            $table->integer('address_address_id')->unsigned();

            $table->index(["address_address_id"], 'fk_supplier_has_address_address1_idx');

            $table->index(["suppliers_suppliers_id"], 'fk_supplier_has_address_suppliers1_idx');


            $table->foreign('suppliers_suppliers_id', 'fk_supplier_has_address_suppliers1_idx')
                ->references('suppliers_id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('address_address_id', 'fk_supplier_has_address_address1_idx')
                ->references('address_id')->on('address')
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
