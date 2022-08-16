<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInKontrakanUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrakan_users', function (Blueprint $table) {
            $table->foreignId('transaksi_id')->after('kontrakan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontrakan_users', function (Blueprint $table) {
            $table->dropColumn('transaksi_id');
        });
    }
}
