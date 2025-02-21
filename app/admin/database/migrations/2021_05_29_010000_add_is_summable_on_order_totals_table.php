<?php

namespace Admin\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Schema;

class AddIsSummableOnOrderTotalsTable extends Migration
{
    public function up()
    {
        Schema::table('order_totals', function (Blueprint $table) {
            $table->boolean('is_summable')->default(0);
        });

        DB::table('order_totals')
            ->where('code', '!=', 'subtotal')
            ->where('code', '!=', 'total')
            ->update(['is_summable' => 1]);
    }

    public function down()
    {
    }
}
