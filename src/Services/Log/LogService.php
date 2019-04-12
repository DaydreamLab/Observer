<?php

namespace DaydreamLab\Observer\Services\Log;

use DaydreamLab\JJAJ\Helpers\Helper;
use DaydreamLab\Observer\Repositories\Log\LogRepository;
use DaydreamLab\JJAJ\Services\BaseService;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LogService extends BaseService
{
    protected $type = 'Log';

    public function __construct(LogRepository $repo)
    {
        parent::__construct($repo);
    }

    public function search(Collection $input)
    {
        $limit = $input->get('limit') ?: $this->repo->getModel()->getLimit();
        //先控制上層search功能都不要幫我製作分頁
        $input->put('paginate', false);
        $start_time = NULL;
        $end_time = NULL;
        if( $input->has('start_date') && $input->get('start_date') != '' && $input->has('end_date') && $input->get('end_date') != '' ){
            $start_time = $input->get('start_date');
            $end_time = $input->get('end_date');

            $input->forget('start_date');
            $input->forget('end_date');
        }

        //叫BasicService的search
        $data = parent::search($input);
        if( gettype($data) == 'object' ){
            //Basic回傳必使用get變成collection
            //預想log紀錄都要看最新的所以倒著排序
            $data = $data->sortByDesc('created_at');

            if( $start_time != NULL && $end_time != NULL ){

                $format_start_date = Carbon::createFromTimeString($start_time." 00:00:00", 'Asia/Taipei');
                $format_end_date = Carbon::createFromTimeString($end_time." 23:59:59", 'Asia/Taipei');

                $format_start_date->timezone('UTC');
                $format_end_date->timezone('UTC');

                $data = $data->filter(function ($item) use($format_start_date, $format_end_date) {
                    if( $format_start_date < $item->created_at && $format_end_date > $item->created_at ) {
                        return $item;
                    }
                });
            }

            $this->status   = Str::upper(Str::snake($this->type.'SearchSuccess'));
            $this->response = $this->repo->paginate($data, (int)$limit, 1, []);
        }else{
            $this->status   = Str::upper(Str::snake($this->type.'SearchFail'));
            $this->response = [];
        }
    }
}
