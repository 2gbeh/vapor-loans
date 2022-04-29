<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lenders', function (Blueprint $table) {
            $table->increments('id');
            $table->binary('photo')->nullable();
            $table->string('names', 50)->index();
            $table->enum('sex', ['n/a', 'm', 'f', 'b_n'])->default('n/a');
            $table->date('dob')->nullable();
            $table->string('address', 160)->nullable();
            $table->string('email', 50)->unique();
            $table->string('tel', 25);
            $table->tinyInteger('rel')->default(0)->comment('relationship status');
            $table->string('password', 64);
            $table->tinyInteger('STATUS')->default(0)->comment('account status');
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
        Schema::dropIfExists('lenders');
    }
}
