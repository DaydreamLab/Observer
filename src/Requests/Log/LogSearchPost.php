<?php

namespace DaydreamLab\Observer\Requests\Log;

use DaydreamLab\JJAJ\Requests\ListRequest;
use Illuminate\Validation\Rule;

class LogSearchPost extends ListRequest
{
    protected $apiMethod = 'searchLog';

    protected $modelName = 'Log';

    public function authorize()
    {
        return parent::authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'search'     => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date'   => 'nullable|string',
            'action'     => 'nullable|string'
        ];

        return array_merge(parent::rules(), $rules);
    }
}
