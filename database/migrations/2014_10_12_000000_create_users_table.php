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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('postNominal')->nullable();
            $table->string('email')->unique();
            $table->enum('role', ['superad', 'admin']) -> default=('admin');
            $table->integer('department')->nullable()->unsigned();
            $table->enum('designation', ['dean', 'chairperson','campusdirector','admin']) -> default=('admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('activated')->default(0);
            $table->string('password');
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
