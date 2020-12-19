<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string( "FirstName");
            $table->string( "LastName");
            $table->integer( "Shop");
            $table->integer( "Company");
            $table->string( "Email")->unique();
            $table->string( "Phone");
            $table->timestamps();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('Shop')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
