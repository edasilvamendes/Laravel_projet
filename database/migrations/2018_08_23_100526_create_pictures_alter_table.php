<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesAlterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->unsignedInteger('id_post')->nullable();
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Ajout obligatoire d'une supp de contrainte dans le rollback
        Schema::table('pictures', function (Blueprint $table) {
            $table->dropForeign(['id_post']);
            $table->dropColumn('id_post');
        });
    }
}
