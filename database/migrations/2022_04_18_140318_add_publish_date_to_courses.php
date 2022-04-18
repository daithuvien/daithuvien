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
        Schema::table('courses', function (Blueprint $table) {
            $table->timestamp('time_to_deliver')->nullable();
            $table->string('date_to_deliver')->nullable();
            $table->string('minute_to_deliver')->nullable();
            $table->string('hours_to_deliver')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('time_to_deliver');
            $table->dropColumn('date_to_deliver');
            $table->dropColumn('hours_to_deliver');
            $table->dropColumn('minute_to_deliver');
        });
    }
};
