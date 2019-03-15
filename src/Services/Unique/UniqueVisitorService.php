<?php

namespace DaydreamLab\Observer\Services\Unique;

use DaydreamLab\Observer\Repositories\Unique\UniqueVisitorRepository;
use DaydreamLab\JJAJ\Services\BaseService;
use Illuminate\Support\Collection;

class UniqueVisitorService extends BaseService
{
    protected $type = 'UniqueVisitor';

    protected $uniqueVisitorCounterService;

    public function __construct(UniqueVisitorRepository $repo,
                                UniqueVisitorCounterService $uniqueVisitorCounterService)
    {
        parent::__construct($repo);
        $this->repo = $repo;
        $this->uniqueVisitorCounterService = $uniqueVisitorCounterService;
    }


    public function add(Collection $input)
    {
        $item = parent::add($input);

        //event(new Add($item, $this->model_name, $input, $this->user));

        return $item;
    }


    public function alreadyVisited(Collection $input)
    {
        $result = $this->repo->alreadyVisited($input);

        return $result;
    }


    public function checkout(Collection $input)
    {
        $result = parent::checkout($input);

        //event(new Checkout($this->model_name, $result, $input, $this->user));

        return $result;
    }


    public function modify(Collection $input)
    {
        $result =  parent::modify($input);

        //event(new Modify($this->find($input->id), $this->model_name, $result, $input, $this->user));

        return $result;
    }


    public function ordering(Collection $input, $orderingKey = 'ordering')
    {
        $result = parent::ordering($input, $orderingKey);

        //event(new Ordering($this->model_name, $result, $input, $orderingKey, $this->user));

        return $result;
    }


    public function remove(Collection $input)
    {
        $result =  parent::remove($input);

        //event(new Remove($this->model_name, $result, $input, $this->user));

        return $result;
    }


    public function state(Collection $input)
    {
        $result = parent::state($input);

        //event(new State($this->model_name, $result, $input, $this->user));

        return $result;
    }
}
