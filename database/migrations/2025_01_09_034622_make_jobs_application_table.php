<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CustomJob;
use App\Models\Freelancer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_job_id');
            $table->unsignedBigInteger('freelancer_id');
            $table->foreign('custom_job_id')->references('id')->on('custom_jobs')->onDelete('cascade');
            $table->foreign('freelancer_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
