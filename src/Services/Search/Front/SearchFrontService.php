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
        $real_limit = $input->get('limit') ?: 15;

        $input->put('limit', 10000);

        $itemResults = $this->ItemFrontService->search(Helper::collect($input->toArray()));
        $tagResults = $this->TagFrontService->search(Helper::collect($input->toArray()));
        $categoryResults = $this->CategoryFrontService->search(Helper::collect($input->toArray()));
        $combine_items = Collection::make([]);

        if( count($itemResults->items()) > 0 ){
            foreach ($itemResults->items() as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }

        if( count($tagResults->items()) > 0 ){
            foreach ($tagResults->items() as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }

        if( count($categoryResults->items()) > 0 ){
            foreach ($categoryResults->items() as $item) {
                if(!$combine_items->contains('id', $item->id)) {
                    $combine_items->push($item);
                }
            }
        }

        $this->status   = Str::upper(Str::snake($this->type.'SearchSuccess'));
        $this->response = $this->repo->paginate($combine_items, (int)$real_limit, '', ['limit' => $real_limit]);
        event(new Search($input, $this->user));

    }

}
