<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Http\Controllers\Web\Frontend;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPool\Api\Data\BettingPoolInterface;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Illuminate\Support\Facades\Auth;
use Modules\BettingPoolUserRelationship\Models\Data\BettingPoolUserRelationship;

class JoinBettingPool
{
    public function __construct(
        private readonly BettingPoolRepositoryInterface $bettingPoolRepository,
        private readonly BettingPoolUserRelationshipRepositoryInterface $bettingPoolUserRelationshipRepository
    ) {
    }

    public function execute(Request $request): JsonResponse
    {
        $request->validate([
            BettingPoolInterface::CODE => 'required|string|max:6'
        ]);

        try {
            $bettingPool = $this->bettingPoolRepository->getByCode($request->all()[BettingPoolInterface::CODE]);
        } catch (ModelNotFoundException) {
            $request->session()->flash(
                'error',
                sprintf(
                    'Nao foi possivel  encontrar um bolao com codigo: %s',
                    $request->all()[BettingPoolInterface::CODE]
                )
            );
            return response()->json(
                [
                    'success' => false
                ],
                500
            );
        }

        $lastDocument = BettingPoolUserRelationship::all()
                ->where(BettingPoolUserRelationshipInterface::BETTING_POOL_ID, $bettingPool->id)->last();

        $data = [
            BettingPoolUserRelationshipInterface::BETTING_POOL_ID => $bettingPool->id,
            BettingPoolUserRelationshipInterface::USER_ID => Auth::user()->id,
            BettingPoolUserRelationshipInterface::SCORE => 0,
            BettingPoolUserRelationshipInterface::POSITION => $lastDocument->getPosition() + 1
        ];
        $this->bettingPoolUserRelationshipRepository->save($data);

        $request->session()->flash(
            'success',
            'Bolao cadastrado com sucesso! Boa sorte.'
        );

        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
