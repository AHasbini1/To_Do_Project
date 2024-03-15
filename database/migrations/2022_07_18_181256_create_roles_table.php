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
    public function up()// use php artisan make:migration create_tableName_table to create tables in the DB
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps(); // created_at and updated_at
            $table-> softDeletes();
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
