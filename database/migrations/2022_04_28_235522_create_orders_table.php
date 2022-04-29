<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lender_id')->nullable()->references('id')->on('lenders')->onDelete('set null');
            $table->integer('loan_id')->nullable()->references('id')->on('loans')->onDelete('set null');        
            $table->double('amount', 16, 2);
            $table->tinyInteger('duration')->comment('in months');
            $table->string('purpose')->nullable();
            $table->dateTime('req_date');
            $table->dateTime('res_date')->nullable();
            $table->tinyInteger('STATUS')->default(0)->comment('loan status');
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
        Schema::dropIfExists('orders');
    }
}
