<?php

use App\Models\Step;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('steps', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->json('default_content');
            $table->foreignIdFor(Step::class, 'previous_step_id')
                ->nullable()
                ->constrained('steps');
            $table->foreignIdFor(Step::class, 'next_step_id')
                ->nullable()
                ->constrained('steps');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
