<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('gender')->default(true);
            $table->string('medical_type');
            $table->string('type')->nullable();
            $table->string('speciality')->nullable();
            $table->longText('description')->nullable();
            $table->text('address')->nullable();
            $table->text('work_hours')->nullable();
            $table->string('exp_years')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('country_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('state_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('status')->default(true);
            $table->boolean('admin_check')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicals');
    }
}
