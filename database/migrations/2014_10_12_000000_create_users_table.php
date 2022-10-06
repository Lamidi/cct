<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
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
            $table->string('name', 32);
            $table->string('email')->unique();
            $table->enum('role', ['agent', 'admin', 'hero'])->default('agent');
            $table->string('password');
            $table->string('nik', 16)->nullable();
            $table->char('gender', 1);
            $table->string('ro_id')->default('1');
            $table->string('image')->default('user.png');
            $table->string('phone', 13)->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
};
