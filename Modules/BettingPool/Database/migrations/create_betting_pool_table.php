<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\BettingPool\Api\Data\BettingPoolInterface;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(BettingPoolInterface::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(BettingPoolInterface::NAME)->nullable(false);
            $table->string(BettingPoolInterface::CODE)->unique()->nullable(false);
            $table->string(BettingPoolInterface::TYPE)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(BettingPoolInterface::TABLE_NAME);
    }
};
