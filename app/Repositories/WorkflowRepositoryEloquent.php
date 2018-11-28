<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\WorkflowRepository;
use App\Entities\Workflow;
use App\Validators\WorkflowValidator;

/**
 * Class WorkflowRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WorkflowRepositoryEloquent extends BaseRepository implements WorkflowRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Workflow::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WorkflowValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getDetail($id)
    {
        return Workflow::find($id);
    }
    
}
