<?php

namespace Modules\BettingPool\App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;
use Illuminate\Support\Str;

class CreateBettingPool extends Controller
{
    public function __construct(
        private readonly BettingPoolRepositoryInterface $bettingPoolRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function execute(Request $request): JsonResponse
    {
        $request->validate([
            BettingPoolInterface::NAME => 'required|string|max:255',
            BettingPoolInterface::TYPE => 'required|string|max:255'
        ]);

        $params = $request->all();
        $data = [
            BettingPoolInterface::NAME => $params[BettingPoolInterface::NAME],
            BettingPoolInterface::TYPE => $params[BettingPoolInterface::TYPE],
            BettingPoolInterface::CODE => Str::random(6)
        ];

        return response()->json([
            'success' => $this->bettingPoolRepository->save($data),
            'betting-pool-code' => $data[BettingPoolInterface::CODE]
        ]);
    }
}
