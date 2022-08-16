<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPembayarankeInKontrakanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrakan_users', function (Blueprint $table) {
            $table->string('pembayaran_ke')->after('transaksi_id');
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
            $table->dropColumn('pembayaran_ke');
        });
    }
}
