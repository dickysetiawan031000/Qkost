<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnInKontrakanUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrakan_users', function (Blueprint $table) {
            $table->dropColumn('payment_status');
            $table->dropColumn('midtrans_url');
            $table->dropColumn('midtrans_booking_code');
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
            //
        });
    }
}
