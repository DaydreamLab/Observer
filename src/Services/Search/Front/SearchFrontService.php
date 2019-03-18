<?php

namespace DaydreamLab\Observer\Services\Search\Front;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Search\Front\SearchFrontRepository;
use DaydreamLab\Observer\Services\Search\SearchService;

use DaydreamLab\Cms\Services\Item\Front\ItemFrontService;
use DaydreamLab\Cms\Services\Tag\Front\TagFrontService;
use DaydreamLab\Cms\Services\Category\Front\CategoryFrontService;

class SearchFrontService extends SearchService
{
    protected $type = 'SearchFront';

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

    //Main Front Search
    public function search(Collection $input)
    {
        $itemResult = $this->ItemFrontService->search($input);
        Helper::show($itemResult);
        exit();
        //record Keyword
        event(new Search($input, $this->user));
    }
}
