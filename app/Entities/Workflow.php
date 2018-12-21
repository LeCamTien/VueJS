<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Workflow.
 *
 * @package namespace App\Entities;
 */
class Workflow extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Workflows";
    protected $primaryKey = "workflow_id";
    public $timestamps = false;

    protected $fillable = [
    	'name', 'description', 'diagram', 'explanation'
    ];

}
