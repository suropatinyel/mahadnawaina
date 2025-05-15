<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('pembayarans', function (Blueprint $table) {
        $table->string('maksud_bayar', 50)->change(); // ubah dari varchar(10) misalnya ke varchar(50)
    });
}

public function down()
{
    Schema::table('pembayarans', function (Blueprint $table) {
        $table->string('maksud_bayar', 10)->change(); // balikkan jika perlu
    });
}
};
