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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable();
            $table->string("tracking_number")->nullable();
            $table->string("package")->nullable();
            $table->string("sender_name")->nullable();
            $table->string("sender_telephone")->nullable();
            $table->string("sender_email")->nullable();
            $table->string("sender_city")->nullable();
            $table->string("sender_country")->nullable();
            $table->string("sender_zipcode")->nullable();
            $table->string("sender_address")->nullable();
            $table->string("recipient_name")->nullable();
            $table->string("recipient_telephone")->nullable();
            $table->string("recipient_email")->nullable();
            $table->string("recipient_city")->nullable();
            $table->string("recipient_country")->nullable();
            $table->string("recipient_zipcode")->nullable();
            $table->string("recipient_address")->nullable();
            $table->string("delivery_status")->nullable();
            $table->date("tracking_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};