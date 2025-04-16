<?php

declare(strict_types=1);

namespace Modules\BettingPool\App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\Data\BettingPoolUserRelationshipInterface;
use Modules\User\App\Models\User;

class View extends Controller
{
    public function __construct(
        private readonly BettingPoolUserRelationshipRepositoryInterface $bettingPoolUserRelationshipRepository,
        private readonly BettingPoolRepositoryInterface $bettingPoolRepository
    ) {
    }

    public function execute(Request $request)
    {
        if (!Auth::check()) {
            $request->session()->flash(
                'error',
                'Para acessar essa funcionalidade voce precisa estar logado'
            );
        }
        $bettingPool = $this->bettingPoolRepository->getByCode($request->code);
        $bettingPoolUsersList = $this->bettingPoolUserRelationshipRepository->getList(
            [
                BettingPoolUserRelationshipInterface::BETTING_POOL_ID => $bettingPool->id
            ]
        );

        $bettingPoolRow = [];
        foreach ($bettingPoolUsersList as $bettingPoolUser) {
            $bettingPoolRow[] = [
                'user' => User::find($bettingPoolUser->getUserId())->first_name,
                'position' => $bettingPoolUser->getPosition(),
                'score' => $bettingPoolUser->getScore()
            ];
        }

        $result = [
            'name' => $bettingPool->getName(),
            'code' => $bettingPool->getCode(),
            'bettingPoolUsersList' => $bettingPoolRow
        ];

        return view('bettingpool::view', $result);
    }
}
