<?php

namespace DaydreamLab\Observer\Services\Search\Front;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Search\Front\SearchFrontRepository;
use DaydreamLab\Observer\Services\Search\SearchService;

use DaydreamLab\Cms\Services\Item\Front\ItemFrontService;
use DaydreamLab\Cms\Services\Tag\Front\TagFrontService;
use DaydreamLab\Cms\Services\Category\Front\CategoryFrontService;
use Illuminate\Support\Collection;

class SearchFrontService extends SearchService
{
    protected $type = 'SearchAdmin';

    protected $ItemFrontService, $TagFrontService, $CategoryFrontService;

    public function __construct(SearchFrontRepository $repo,
                                ItemFrontService $ItemFrontService,
                                TagFrontService $TagFrontService,
                                CategoryFrontService $CategoryFrontService)
    {
        parent::__construct($repo);
        $this->repo = $repo;
        $this->ItemFrontService = $ItemFrontService;
        $this->TagFrontService = $TagFrontService;
        $this->CategoryFrontService = $CategoryFrontService;
    }

    public function search(Collection $input)
    {
        $aaa = $input;
        $bbb = $input;
        $tagResult = $this->TagFrontService->search($bbb);
        $itemResult = $this->ItemFrontService->search($aaa);

        Helper::show($tagResult->toArray());

        exit();
    }
}
