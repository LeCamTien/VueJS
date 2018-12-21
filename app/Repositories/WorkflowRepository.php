<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface WorkflowRepository.
 *
 * @package namespace App\Repositories;
 */
interface WorkflowRepository extends RepositoryInterface
{
    public function getDetail($id);
}
