<?php

namespace DaydreamLab\Observer\Repositories\Search\Admin;

use Carbon\Carbon;
use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Search\SearchRepository;
use DaydreamLab\Observer\Models\Search\Admin\SearchAdmin;
use Illuminate\Support\Collection;

class SearchAdminRepository extends SearchRepository
{
    public function __construct(SearchAdmin $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function keywordList(Collection $input){
        $data = $this->model
            ->selectRaw('keyword, count(keyword) as count');

        if( $input->has('search') && $input->get('search') != '' ){
            $data = $data->where('keyword', 'like', '%'.$input->get('search').'%');
        }

        if( $input->has('start_date') && $input->get('start_date') != '' && $input->has('end_date') && $input->get('end_date') != '' ){

            $format_start_date = Carbon::createFromTimeString($input->get('start_date')." 00:00:00", 'Asia/Taipei');
            $format_end_date = Carbon::createFromTimeString($input->get('end_date')." 23:59:59", 'Asia/Taipei');

            $format_start_date->timezone('UTC');
            $format_end_date->timezone('UTC');

            $data = $data->whereBetween('created_at', [$format_start_date->format('Y-m-d H:i:s'), $format_end_date->format('Y-m-d H:i:s')]);
        }

        return $data = $data->groupBy('keyword')->orderBy('count', 'desc')->get();
    }
}