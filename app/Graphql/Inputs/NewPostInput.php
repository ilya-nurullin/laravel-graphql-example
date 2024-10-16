<?php

namespace App\Graphql\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class NewPostInput extends InputType
{
    protected $attributes = [
        'name' => 'NewPostInput',
    ];

    public function fields(): array
    {
        return [
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'min:3']
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'min:5']
            ],
        ];
    }
}
