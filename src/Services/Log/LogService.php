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
        $this->canAction('search');

        $start_time = $input->get('start_date');
        $end_time = $input->get('end_date');
        $input->forget('start_date');
        $input->forget('end_date');

        // 組合搜尋條件
        $where = [];
        if ($start_time != '')
        {
            $where[] = [
                'key'       => 'created_at',
                'operator'  => '>=',
                'value'     => $start_time
            ];
        }

        if ($end_time != '')
        {
            $where[] = [
                'key'       => 'created_at',
                'operator'  => '<=',
                'value'     => $end_time
            ];
        }
        $input->put('where', $where);

        $data = parent::search($input);

        $this->status   = Str::upper(Str::snake($this->type.'SearchSuccess'));
        $this->response = $data;

        return $data;
    }
}
