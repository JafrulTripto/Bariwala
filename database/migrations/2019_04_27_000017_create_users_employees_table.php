<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users_employees';

    /**
     * Run the migrations.
     * @table users_employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_employees_id');
            $table->integer('user_user_id')->unsigned();
            $table->integer('employees_employees_id')->unsigned();

            $table->index(["employees_employees_id"], 'fk_user_has_employees_employees1_idx');

            $table->index(["user_user_id"], 'fk_user_has_employees_user_idx');


            $table->foreign('user_user_id', 'fk_user_has_employees_user_idx')
                ->references('user_id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('employees_employees_id', 'fk_user_has_employees_employees1_idx')
                ->references('id')->on('employees')
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
