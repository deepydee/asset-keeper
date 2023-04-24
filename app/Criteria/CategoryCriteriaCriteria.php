<?php

namespace App\Criteria;

use App\Models\Category;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CategoryCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class CategoryCriteriaCriteria implements CriteriaInterface
{

    public function __construct(
        private Category $category,
    ) {}

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->with('categories')
            ->whereHas(
                'categories',
                fn ($query) => $query->whereid($this->category->id),
            );
    }
}
