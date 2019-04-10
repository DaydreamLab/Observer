<?php

namespace DaydreamLab\Observer\Requests\Search\Admin;

use DaydreamLab\JJAJ\Requests\ListRequest;

class SearchAdminKeywordListPost extends ListRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            //
            'search'     => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date'   => 'nullable|string'
        ];
        return array_merge($rules, parent::rules());
    }
}
