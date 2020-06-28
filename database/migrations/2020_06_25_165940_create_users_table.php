<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('document_type')->nullable();
            $table->string('ducument_front')->nullable();
            $table->string('ducument_back')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
				$table->unsignedBigInteger('district_id')->nullable();
				$table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
				$table->boolean('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
