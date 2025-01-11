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
        // Create the clients table
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique(); // Ensure email is unique
            $table->string('phone');
            $table->decimal('total_price', 10, 2)->default(0); // Add a default value for total_price
            $table->timestamps();
        });

        // Create the client_products table
        Schema::create('client_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id'); // Foreign key for clients table
            $table->string('product_name');
            $table->decimal('product_price', 10, 2); // Store numeric price values
            $table->integer('quantity'); // Quantity of the product
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the tables in reverse order to maintain integrity
        Schema::dropIfExists('client_products');
        Schema::dropIfExists('clients');
    }
};
