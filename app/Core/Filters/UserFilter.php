<?php

namespace App\Core\Filters;

class ArticleFilter extends Filter
{
    /**
     * Filter by author username.
     * Get all the articles by the user with given username.
     *
     * @param $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($email)
    {
        return $this->builder->whereEmail($email);
    }

    protected function q($q)
    {
        return $this->builder
        ->where('email','like',"%$q%")
        ->orWhere('first_name','like',"%$q%")
        ->orWhere('last_name','like',"%$q%");
    }

}
