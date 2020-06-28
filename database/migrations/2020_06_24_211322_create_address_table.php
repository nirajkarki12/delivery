<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('street_name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('addressable_type');
            $table->unsignedBigInteger('addressable_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
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
        Schema::dropIfExists('address');
    }
}
