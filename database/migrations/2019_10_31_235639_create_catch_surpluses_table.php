<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatchSurplusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catch_surpluses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone')->default(0);
            $table->unsignedInteger('age')->default(0);
            $table->dateTime('date')->default(date('Y-m-d'));
            $table->unsignedInteger('total')->default(0);
            $table->unsignedInteger('payed')->default(0);
            $table->unsignedInteger('rest')->default(0);
            $table->mediumText('details')->nullable();
            $table->string('editor')->default('');
            $table->string('added1')->nullable();
            $table->string('added2')->nullable();
            $table->string('added3')->nullable();
            $table->string('added4')->nullable();
            $table->string('added5')->nullable();
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
        Schema::dropIfExists('catch_surpluses');
    }
}
