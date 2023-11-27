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
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('report_date_time');
            $table->dateTime('incident_date_time');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->text('incident_location');
            $table->text('nature_of_incident');
            $table->text('incident_details');
            $table->text('suspect_charges');
            $table->text('arrested_relation');
            $table->string('name_of_victims');
            $table->string('bullying_type');
            $table->enum('result_in_injury', ['Yes', 'No']);
            $table->enum('reported_to_nurse', ['Yes', 'No']);
            $table->enum('reported_to_police', ['Yes', 'No']);
            $table->string('bully_behaviors');
            $table->text('Description');
            $table->string('physical_evidence');
            $table->string('file_upload')->nullable(); // Assuming you store the file path
          $table->timestamps();
          $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
       
    }
};
