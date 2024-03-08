<?php

namespace App\Models;

use DB;
class Department extends Model
{
    /**
     * The DB table used by this model
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The fields that should not be mass assigned
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Fields that a keyword search should be carried on
     *
     * @var array
     */
    protected $searchFields = ['short_name', 'name'];
}
