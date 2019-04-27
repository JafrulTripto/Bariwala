<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'address';

    /**
     * Run the migrations.
     * @table address
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('address_id');
            $table->string('address_postal_code', 45)->nullable();
            $table->string('address_house_no', 45)->nullable();
            $table->string('address_road_no', 45)->nullable();
            $table->string('address_thana', 45)->nullable();
            $table->string('address_district', 45)->nullable();
            $table->timestamps();
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
