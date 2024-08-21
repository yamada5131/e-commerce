<?php

use App\Models\OrderStatus;
use App\Models\Address;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\User;

return new class() extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->foreignIdFor(User::class);
            $table->timestamp('order_date');
            $table->foreignIdFor(Address::class);
            $table->decimal('order_total', 8, 2);
            $table->foreignIdFor(OrderStatus::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
