<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesPhonenoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees_phone';

    /**
     * Run the migrations.
     * @table employees_phoneNo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('phone_numbers_id')->unsigned();
            $table->timestamps();

            $table->index(["phone_numbers_id"], 'fk_employees_phoneNo_phone_numbers1_idx');

            $table->index(["employee_id"], 'fk_employees_phoneNo_employees1_idx');


            $table->foreign('employee_id', 'fk_employees_phoneNo_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('phone_numbers_id', 'fk_employees_phoneNo_phone_numbers1_idx')
                ->references('id')->on('phone_numbers')
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
