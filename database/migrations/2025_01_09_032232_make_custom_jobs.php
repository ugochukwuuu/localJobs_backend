<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Recruiter;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recruiter::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary',10,2);
            $table->string('status')->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_jobs');
    }
};
