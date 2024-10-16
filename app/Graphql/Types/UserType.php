<?php

namespace App\Graphql\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A regular user',
        // Note: only necessary if you use `SelectFields`
        'model'         => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'User ID'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Full user name'
            ],
            'posts' => [
                'type' => GraphQL::type('[Post!]!')
            ]
        ];
    }
}
