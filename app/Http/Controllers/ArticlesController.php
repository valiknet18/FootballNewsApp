<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Support\Facades\Request;

class ArticlesController extends Controller
{
    public function all(Request $request)
    {
        $articles = Article::paginate(5);

        return response()->json($articles);
    }

    public function get($slug)
    {
        $article = Article::findBySlug($slug);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }

    public function create(Request $request)
    {
        $article = Article::create([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description')
        ]);

        foreach ($request->get('tags') as $tagName) {
            $tag = Tag::findByName($tagName);

            if (!$tag) {
                $tag = Tag::create([
                    'title' => $tagName,
                    'slug' => str_slug($tagName)
                ]);
            }

            $article->tags()->save($tag);
        }

        return response()->json($article, 201);
    }
}
