<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->boolean('is_leader')
                ->default(false)
                ->after('team_id');
            $table->boolean('is_organizer')
                ->default(false)
                ->after('is_leader');
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropColumn('is_leader');
        });
    }
};
