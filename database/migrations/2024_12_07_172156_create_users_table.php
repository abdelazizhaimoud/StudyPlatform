<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // a user has one role , a role belongs to many users



        Schema::create('users',function(Blueprint $table){
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->boolean('email_verified')->default(false);
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('sexe');
            $table->text('address');
            $table->string('phone_number')->unique();
            $table->text('bio');
            $table->string('school');
            $table->string('sector');
            $table->string('profile_picture');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }






};
