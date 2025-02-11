<?php

use App\Models\Dog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('breed')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->enum('state', Dog::STATES)->default('ON-DECK');
            $table->enum('temperament', Dog::TEMPERAMENT)->nullable()->default(null);
            $table->enum('cuteness', Dog::CUTENESS)->nullable()->default(null);
            $table->enum('size', Dog::SIZE)->nullable()->default(null);
            $table->string('image_url', 255);
            $table->dateTime('adoption_date')->nullable();
            $table->dateTime('euthanized_date')->nullable();
            $table->timestamps();
        });

        Schema::create('dog_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dog_names');
        Schema::dropIfExists('dogs');
    }
};
