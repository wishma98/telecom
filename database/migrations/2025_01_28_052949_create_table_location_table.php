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
        Schema::create('table_location', function (Blueprint $table) {
            $table->id();
   

            // $table->string('connection_type');
            $table->string('location_name');
            $table->string('END_A_LONGITUDE');
            $table->string('END_A_LATITUDE');
            $table->string('END_A_PHOTO');
            $table->string('END_B_LONGITUDE')->nullable();
            $table->string('END_B_LATITUDE')->nullable();
            $table->string('END_B_PHOTO')->nullable();
            $table->enum('LEA', ['LEA1', 'LEA2', 'LEA3']);
            $table->enum('clouser_used', ['Yes', 'No']);
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('table_location');
    }
};
