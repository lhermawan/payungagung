<?php

namespace App\Traits;

trait PaginationTraits
{
    public function paginateData($query, $perPage = 10)
    {
        return $query->paginate($perPage);
    }
}
