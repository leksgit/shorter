<?php

namespace App\Http\Controllers;

use App\DTO\ShortCreateDTO;
use App\Http\Requests\CreateSortRequest;
use App\Service\ShortService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class linksController extends Controller
{
    /**
     * Render view for create new link
     * @return View
     */
    public function addShort(): View
    {
        return view('short.create');
    }

    /**
     * Create new link from request and display result for user
     * @param CreateSortRequest $createSortRequest
     * @param ShortService $shortService
     * @return View
     */
    public function create(CreateSortRequest $createSortRequest, ShortService $shortService): View
    {
        $shortCreateDTO = ShortCreateDTO::from($createSortRequest->validated());

        $short = $shortService->createLink(createDTO: $shortCreateDTO);

        return view('short.ready', ['short' => $short]);
    }

    /**
     * Get redirect URL with check allowed criteria (number of use and time available )
     * @param string $short
     * @param ShortService $shortService
     * @return View|RedirectResponse
     */
    public function short(string $short, ShortService $shortService): View|RedirectResponse
    {
        return $shortService->getShort(short: $short);
    }
}
