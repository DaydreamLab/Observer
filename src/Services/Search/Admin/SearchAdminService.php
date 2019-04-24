<?php

namespace DaydreamLab\Observer\Services\Search\Admin;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Search\Admin\SearchAdminRepository;
use DaydreamLab\Observer\Services\Search\SearchService;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchAdminService extends SearchService
{
    protected $type = 'SearchAdmin';

    public function __construct(SearchAdminRepository $repo)
    {
        parent::__construct($repo);
        $this->repo = $repo;
    }

    public function keywordList(Collection $input)
    {
        $limit = $input->get('limit') ?: $this->repo->getModel()->getLimit();
        $page = $input->get('page');

        $keyword_data = $this->repo->keywordList($input);

        if( gettype($keyword_data) == 'object' ){
            $this->status   = Str::upper(Str::snake($this->type.'GetListSuccess'));
            $this->response = $this->repo->paginate($keyword_data, (int)$limit, (int)$page , []);
        }else{
            $this->status   = Str::upper(Str::snake($this->type.'GetListFail'));
            $this->response = [];
        }
    }
}
