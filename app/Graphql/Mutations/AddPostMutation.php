<?php

namespace App\Graphql\Mutations;

use Closure;
use App\Models\Post;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class AddPostMutation extends Mutation
{
    protected $attributes = [
        'name' => 'addPost'
    ];

    public function type(): Type
    {
        return GraphQL::type('Post!');
    }

    public function args(): array
    {
        return [
            'post' => [
                'type' => GraphQL::type('NewPostInput!'),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $title = $args['post']['title'];
        $text = $args['post']['text'];

        $post = new Post();
        $post->title = $title;
        $post->text = $text;
        $post->author_id = 1;
        $post->is_draft = true;

        $post->save();

        return $post->refresh();
    }
}
