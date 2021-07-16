<?php

namespace DaydreamLab\Observer\Requests\RequestLog\Admin;

use DaydreamLab\Observer\Requests\ComponentBase\ObserverSearchRequest;

class RequestLogAdminSearchRequest extends ObserverSearchRequest
{
    protected $modelName = 'RequestLog';

    protected $apiMethod = 'searchRequestLog';
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
        ];

        return array_merge(parent::rules(), $rules);
    }


    public function validated()
    {
        $validated = parent::validated();

        return $validated;
    }
}
