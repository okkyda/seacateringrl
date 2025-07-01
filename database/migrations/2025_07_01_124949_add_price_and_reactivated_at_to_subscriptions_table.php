<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceAndReactivatedAtToSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->integer('price')->default(0)->after('days'); // atau sesuaikan posisi
            $table->timestamp('reactivated_at')->nullable()->after('active_until');
        });
    }

    public function down()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['price', 'reactivated_at']);
        });
    }
}
