<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('abilities_role', function (Blueprint $table) {
            $table->primary(['role_id', 'abilities_id']);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('abilities_id');
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            
            $table->foreign('abilities_id')
                ->references('id')
                ->on('abilities')
                ->onDelete('cascade');
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->primary(['user_id', 'role_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('niit_en_users')
                ->onDelete('cascade');
            
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
