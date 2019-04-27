<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierEmailTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'supplier_email';

    /**
     * Run the migrations.
     * @table supplier_email
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('supplier_email_id');
            $table->integer('emails_emails_id')->unsigned();
            $table->integer('suppliers_suppliers_id')->unsigned();

            $table->index(["emails_emails_id"], 'fk_supplier_email_emails1_idx');

            $table->index(["suppliers_suppliers_id"], 'fk_supplier_email_suppliers1_idx');


            $table->foreign('emails_emails_id', 'fk_supplier_email_emails1_idx')
                ->references('emails_id')->on('emails')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('suppliers_suppliers_id', 'fk_supplier_email_suppliers1_idx')
                ->references('suppliers_id')->on('suppliers')
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
