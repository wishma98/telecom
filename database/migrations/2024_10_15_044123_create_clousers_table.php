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
        Schema::create('clousers', function (Blueprint $table) {
            $table->id();
            $table->string('clouser_ID');
            // $table->string('technician_ID');

            $table->string('service_id');
            $table->foreign('service_id')->references('service_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('category', ['new', 'fault','re']);
            $table->enum('clouser_type', ['ribbon', 'non_ribbon']);
            $table->decimal('clouser_amount', 10, 2);
            $table->string('location');
            $table->timestamp('date_time');
            $table->text('message')->nullable();
            $table->decimal('nooflocation', 10, 2)->nullable();
            $table->enum('connectiontype', ['Maintainance', 'New'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clousers');
    }
};
