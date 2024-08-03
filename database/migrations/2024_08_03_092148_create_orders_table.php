<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('sku')->unique();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_city');
            $table->string('user_address');
            $table->string('user_phone');
            $table->text('note')->nullable();
            $table->integer('payment_method');
            $table->enum('status', ['1', '2', '3', '4', '0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};