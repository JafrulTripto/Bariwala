<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeImageTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employee_image';

    /**
     * Run the migrations.
     * @table employee_image
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('employee_id')->unsigned();
            $table->integer('image_id')->unsigned();
            $table->timestamps();


            $table->index(["image_id"], 'fk_employee_image_image1_idx');


            $table->foreign('image_id', 'fk_employee_image_image1_idx')
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
