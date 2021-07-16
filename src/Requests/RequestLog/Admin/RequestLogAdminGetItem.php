<?php

namespace DaydreamLab\Observer\Requests\RequestLog\Admin;

use DaydreamLab\JJAJ\Requests\AdminRequest;

class RequestLogAdminGetItem extends AdminRequest
{
    protected $package = 'Observer';

    protected $modelName = 'RequestLog';

    protected $apiMethod = 'getRequestLog';
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
        return [
        ];
    }
}
