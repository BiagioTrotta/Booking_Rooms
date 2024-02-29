<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('lastname', 10);
            $table->string('firstname', 10)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            //others
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('identity_document')->nullable();
            $table->string('document_number')->nullable();
            $table->string('document_issuing_place')->nullable();
            //client_groups
            $table->string('lastname_group_1', 10)->nullable();
            $table->string('firstname_group_1', 10)->nullable();
            $table->date('date_of_birth_group_1')->nullable();
            $table->string('place_of_birth_group_1')->nullable();
            $table->enum('gender_group_1', ['male', 'female', 'other'])->nullable();
            $table->string('identity_document_group_1')->nullable();
            $table->string('document_number_group_1')->nullable();
            $table->string('document_issuing_place_group_1')->nullable();
            $table->string('lastname_group_2', 10)->nullable();
            $table->string('firstname_group_2', 10)->nullable();
            $table->date('date_of_birth_group_2')->nullable();
            $table->string('place_of_birth_group_2')->nullable();
            $table->enum('gender_group_2', ['male', 'female', 'other'])->nullable();
            $table->string('identity_document_group_2')->nullable();
            $table->string('document_number_group_2')->nullable();
            $table->string('document_issuing_place_group_2')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
