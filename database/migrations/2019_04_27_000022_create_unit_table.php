<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'unit';

    /**
     * Run the migrations.
     * @table unit
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('unit_id');
            $table->integer('product_product_id')->unsigned();
            $table->string('unit_name', 45)->nullable();
            $table->timestamps();

            $table->index(["product_product_id"], 'fk_unit_product1_idx');


            $table->foreign('product_product_id', 'fk_unit_product1_idx')
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
