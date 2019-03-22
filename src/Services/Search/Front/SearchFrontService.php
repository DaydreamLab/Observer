<?php

namespace DaydreamLab\Observer\Services\Search\Front;

use DaydreamLab\Observer\Events\Search;
use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Search\Front\SearchFrontRepository;
use DaydreamLab\Observer\Services\Search\SearchService;
use DaydreamLab\Cms\Services\Item\Front\ItemFrontService;
use DaydreamLab\Cms\Services\Tag\Front\TagFrontService;
use DaydreamLab\Cms\Services\Category\Front\CategoryFrontService;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

    public function search(Collection $input)
    {
        $limit = $input->get('limit') ?: $this->repo->getModel()->getLimit();

        $tagResults = $this->TagFrontService->searchItems(Helper::collect($input->toArray()), false);

        $categoryResults = $this->CategoryFrontService->searchItems(Helper::collect($input->toArray()), false);

        $itemResults = $this->ItemFrontService->search(Helper::collect($input->toArray()), false);


        $combine_items = collect([]);

        if($tagResults->count()){
            foreach ($tagResults as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }

        if( $categoryResults->count()){
            foreach ($categoryResults as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }

        if($itemResults->count()){
            foreach ($itemResults as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }


        $this->status   = Str::upper(Str::snake($this->type.'SearchSuccess'));
        $this->response = $this->repo->paginate($combine_items, (int)$limit, 1, []);
        event(new Search($input, $this->user));

        return $this->response;
    }

}
