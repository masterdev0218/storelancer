<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('is_rapyd_enabled')->default('off')->after('paypal_secret_key');
            $table->string('rapyd_mode')->nullable()->after('is_rapyd_enabled');
            $table->text('rapyd_client_id')->nullable()->after('rapyd_mode');
            $table->text('rapyd_secret_key')->nullable()->after('rapyd_client_id');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['is_rapyd_enabled', 'rapyd_mode', 'rapyd_client_id', 'rapyd_secret_key']);
        });
    }
};
