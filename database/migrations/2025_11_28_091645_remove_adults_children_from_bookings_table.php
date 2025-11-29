<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'total_adults')) {
                $table->dropColumn('total_adults');
            }
            if (Schema::hasColumn('bookings', 'total_children')) {
                $table->dropColumn('total_children');
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('total_adults')->default(1);
            $table->integer('total_children')->default(0);
        });
    }
};

