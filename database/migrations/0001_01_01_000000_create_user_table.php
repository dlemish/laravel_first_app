<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    //Migrate
    public function up(): void{

        Schema::create('user', function (Blueprint $table) {

            $table -> id();
            $table -> string('family', 50);
            $table -> string('first_name', 50);
            $table -> string('patronymic', 50) -> nullable();
            $table -> string('email', 100) -> unique();
            $table -> string('login', 30) -> unique();
            $table -> timestamp('email_verified_at') -> nullable();
            $table -> string('password');
            $table -> rememberToken();

        });

    }

    //Rollback
    public function down(): void{
        Schema::dropIfExists('user');
    }
};
