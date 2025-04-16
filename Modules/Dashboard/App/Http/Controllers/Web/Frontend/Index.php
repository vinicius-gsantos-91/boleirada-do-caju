<?php

declare(strict_types=1);

namespace Modules\Dashboard\App\Http\Controllers\Web\Frontend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\BettingPool\Api\BettingPoolRepositoryInterface;
use Modules\BettingPoolUserRelationship\Api\BettingPoolUserRelationshipRepositoryInterface;

class Index extends Controller
{
    public function __construct(
        private readonly BettingPoolUserRelationshipRepositoryInterface $bettingPoolUserRelationshipRepository,
        private readonly BettingPoolRepositoryInterface $bettingPoolRepository
    ) {
    }

    /**
     * Generates dashboard page
     *
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function execute(Request $request): RedirectResponse|View
    {
        if (!Auth::check()) {
            $request->session()->flash('error', 'Realize o login para acessar o dashboard!');
            return Redirect::intended('/auth/login');
        }

        $bettingPoolRelationshipList = $this->bettingPoolUserRelationshipRepository->getListByUser(Auth::user()->id);
        $bettingPoolList = [];
        foreach ($bettingPoolRelationshipList as $bettingPoolRelationship) {
            $bettingPool = $this->bettingPoolRepository->getById($bettingPoolRelationship->getBettingPoolId());
            $bettingPoolList[] = [
                'name' => $bettingPool->getName(),
                'score' => $bettingPoolRelationship->getScore(),
                'position' => $bettingPoolRelationship->getPosition(),
                'code' => $bettingPool->getCode()
            ];
        }

        return view(
            'dashboard::index',
            [
                'bettingPoolList' => $bettingPoolList
            ]
        );
    }
}
