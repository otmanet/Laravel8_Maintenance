<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMaintanceWork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Maintances', function (Blueprint $table) {
            $table->id();
            $table->String('name_maintance');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->String('TypeMaintence');
            $table->bigInteger('departement_id')->unsigned();
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->bigInteger('machine_id')->unsigned();
              $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
              $table->String('material');
               $table->boolean('valide')->default(0);
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
        Schema::dropIfExists('WorkMaintances');
    }
}