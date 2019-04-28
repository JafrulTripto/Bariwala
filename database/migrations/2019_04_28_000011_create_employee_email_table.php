<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeEmailTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employee_email';

    /**
     * Run the migrations.
     * @table employee_email
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('employees_id')->unsigned();
            $table->integer('emails_id')->unsigned();
            $table->timestamps();

            $table->index(["emails_id"], 'fk_employee_email_emails1_idx');

            $table->index(["employees_id"], 'fk_employee_email_employees1_idx');


            $table->foreign('employees_id', 'fk_employee_email_employees1_idx')
                ->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('emails_id', 'fk_employee_email_emails1_idx')
                ->references('id')->on('emails')
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
