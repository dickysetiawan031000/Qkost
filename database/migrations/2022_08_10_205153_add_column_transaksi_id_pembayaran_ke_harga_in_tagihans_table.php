<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTransaksiIdPembayaranKeHargaInTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tagihans', function (Blueprint $table) {
            $table->string('transaksi_id')->after('kontrakan_user_id')->nullable();
            $table->string('pembayaran_ke')->after('transaksi_id');
            $table->string('harga')->after('pembayaran_ke');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tagihans', function (Blueprint $table) {
            $table->dropColumn('transaksi_id', 'pembayaran_ke', 'harga');
        });
    }
}
