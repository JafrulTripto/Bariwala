<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersPhonenoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'suppliers_phoneNo';

    /**
     * Run the migrations.
     * @table suppliers_phoneNo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('suppliers_phoneNo_id');
            $table->integer('suppliers_suppliers_id')->unsigned();
            $table->integer('phone_numbers_phone_numbers_id')->unsigned();

            $table->index(["suppliers_suppliers_id"], 'fk_suppliers_phoneNo_suppliers1_idx');

            $table->index(["phone_numbers_phone_numbers_id"], 'fk_suppliers_phoneNo_phone_numbers1_idx');


            $table->foreign('suppliers_suppliers_id', 'fk_suppliers_phoneNo_suppliers1_idx')
                ->references('suppliers_id')->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('phone_numbers_phone_numbers_id', 'fk_suppliers_phoneNo_phone_numbers1_idx')
                ->references('phone_numbers_id')->on('phone_numbers')
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
