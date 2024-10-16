<?php

namespace App\Graphql\Types;

use App\Models\Post;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Post',
        'description'   => 'Post in my blog',
        // Note: only necessary if you use `SelectFields`
        'model'         => Post::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'author' => [
                'type' =>  GraphQL::type('User!')
            ],
            'draft' => [
                'alias' => 'is_draft',
                'type' =>  GraphQL::type('Boolean!')
            ]
        ];
    }
}
