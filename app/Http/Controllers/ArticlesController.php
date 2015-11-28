<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function all(Request $request)
    {
        $articles = Article::orderBy('id', 'DESC')->with('tags')->paginate(5);

        return response()->json($articles);
    }

    public function get($id)
    {
        $article = Article::with('tags')->find($id);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }

    public function create(Request $request)
    {
        $article = Article::create([
            'title' => $request->get('title'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description')
        ]);

        foreach ($request->get('tags') as $tagName) {
            $tag = Tag::findByName($tagName)->first();

            if (!$tag) {
                $tag = Tag::create([
                    'title' => $tagName
                ]);
            }

            $article->tags()->attach($tag);
        }

        return response()->json($article, 201);
    }
}
