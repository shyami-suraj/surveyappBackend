<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('question_mappers', function (Blueprint $table) {
            $table->id();
            $table->string('project_id');
            $table->string('activity_id');
            $table->string('question_id');
            $table->string('order');
            $table->string('del_status')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_mappers');
    }
};
