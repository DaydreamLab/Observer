<?php
namespace DaydreamLab\Observer\Models\Unique\Front;

use DaydreamLab\Observer\Models\Unique\UniqueVisitor;

class UniqueVisitorFront extends UniqueVisitor
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unique_visitors';

}