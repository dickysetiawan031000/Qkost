<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInKontrakanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontrakan_users', function (Blueprint $table) {
            $table->dateTime('jatuh_tempo')->after('harga');
            $table->string('payment_status', 100)->default('waiting')->after('jatuh_tempo');
            $table->string('midtrans_url')->nullable()->after('payment_status');
            $table->string('midtrans_booking_code')->nullable()->after('midtrans_url');
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
            $table->dropColumn(['jatuh_tempo', 'payment_status', 'midtrans_url', 'midtrans_booking_code']);
        });
    }
}
