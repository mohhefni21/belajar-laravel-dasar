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
    // method untuk membuat schema dan struktur tabelnya
    // ini di eksekusi ketika migrate
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    // active record pattern

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // ini untuk menghpus table yang kita buat, istilahnya rollback jika di artisan
    // php artisan migrate:rollback
    // maka semua akan hilang kecuali migrations karena ini yang mencatat perubahan database
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
