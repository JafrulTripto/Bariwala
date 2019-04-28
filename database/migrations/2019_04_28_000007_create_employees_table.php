<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employees';

    /**
     * Run the migrations.
     * @table employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('designation_id')->unsigned();
            $table->string('employees_first_name', 45)->nullable();
            $table->string('employees_last_name', 45)->nullable();
            $table->string('employees_nid', 45)->nullable();
            $table->dateTime('employees_dob')->nullable();
            $table->timestamps();

            $table->index(["designation_id"], 'fk_designation_id_idx');


            $table->foreign('designation_id', 'fk_designation_id_idx')
                ->references('id')->on('employee_designation')
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
