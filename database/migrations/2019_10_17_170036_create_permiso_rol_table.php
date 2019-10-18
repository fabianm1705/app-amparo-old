<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->unsignedBigInteger('permiso_id');
            $table->foreign('permiso_id','fk_permisorol_permiso')->references('id')->on('permisos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id','fk_permisorol_rol')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_rol');
    }
}
