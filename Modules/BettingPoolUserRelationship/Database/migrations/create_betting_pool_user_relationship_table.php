<?php

declare(strict_types=1);

namespace Modules\BettingPoolUserRelationship\Database\migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(BettingPoolUserRelationshipInterface::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(BettingPoolUserRelationshipInterface::BETTING_POOL_ID)
                ->constrained(BettingPoolInterface::TABLE_NAME)
                ->onDelete('cascade');
            $table->foreignId(BettingPoolUserRelationshipInterface::USER_ID)
                ->constrained('users')
                ->onDelete('cascade');
            $table->integer(BettingPoolUserRelationshipInterface::SCORE)->default(0);
            $table->integer(BettingPoolUserRelationshipInterface::POSITION)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(BettingPoolUserRelationshipInterface::TABLE_NAME);
    }
};
