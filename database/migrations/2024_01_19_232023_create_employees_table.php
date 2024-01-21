<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->collation('utf8mb4_bin');
            $table->string('last_name', 255)->collation('utf8mb4_bin');
            $table->string('gender', 255)->collation('utf8mb4_bin');
            $table->string('position', 255)->collation('utf8mb4_bin');
            $table->string('status', 255)->collation('utf8mb4_bin');
            $table->float('salary', 255);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};