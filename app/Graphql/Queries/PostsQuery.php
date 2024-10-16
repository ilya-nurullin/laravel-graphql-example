<?php

namespace App\Graphql\Queries;

use App\Models\Post;
use Closure;
use App\Models\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class PostsQuery extends Query
{
    protected $attributes = [
        'name' => 'posts',
    ];

    public function type(): Type
    {
        return GraphQL::simplePaginate('Post');
    }

    public function args(): array
    {
        return [
            'limit' => [
                'type' => Type::int()
            ],
            'page' => [
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();

        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $posts = Post::select($select)->with($with);

        return $posts->simplePaginate($args['limit'] ?? 3, ['*'], 'page', $args['page'] ?? 1);
    }
}
