<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrakans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kontrakan_id')->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('jenis_kontrakan_id');
            // // $table->foreign('jenis_kontrakan_id')->references('id')->on('jenis_kontrakans')->onDelete('cascade');
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
        Schema::dropIfExists('kontrakans');
    }
}
