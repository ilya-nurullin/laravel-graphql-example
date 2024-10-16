<?php

namespace App\Graphql\Queries;

use Closure;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class VersionQuery extends Query
{
    protected $attributes = [
        'name' => 'version',
    ];

    public function type(): Type
    {
        return GraphQL::type('String');
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return '0.1.3';
    }
}
