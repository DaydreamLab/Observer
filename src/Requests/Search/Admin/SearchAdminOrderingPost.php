<?php

namespace DaydreamLab\Observer\Requests\Search\Admin;

use DaydreamLab\JJAJ\Requests\AdminRequest;

class SearchAdminOrderingPost extends AdminRequest
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
            'id'            => 'required|integer',
            'index_diff'    => 'required|integer',
        ];
        return array_merge(parent::rules(), $rules);
    }
}
