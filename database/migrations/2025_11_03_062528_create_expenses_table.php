<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('expenses', function (Blueprint $table) {
    $table->id();
    $table->string('title'); // 👈 correct column name
    $table->decimal('amount', 10, 2);
    $table->unsignedBigInteger('category_id');
   $table->unsignedBigInteger('user_id');
          $table->date('date'); // 👈 new field
        $table->text('note')->nullable(); // 👈 new field
    $table->timestamps();

    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
