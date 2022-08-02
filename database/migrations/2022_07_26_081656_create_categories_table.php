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
        Schema::create('categories', function (Blueprint $table) {
            // id BIGINT UNSIGNED AUTO INCREMENT PRIMARY
            $table->id();
            // name VARCHAR(255)
            $table->string('name');
            $table->string('slug')->unique();
            // description TEXT NULL
            $table->text('description')->nullable();
            // image_path VARCHAR(255) NULL
            $table->string('image_path')->nullable();
            // status ENUM('public', 'archived', 'private')
            $table->enum('status', ['public', 'archived', 'private'])
                ->default('public');

            // created_at TIMESTAMP
            // updated_at TIMESTAMP
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
        Schema::dropIfExists('categories');
    }
};
