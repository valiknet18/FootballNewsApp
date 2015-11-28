<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Support\Facades\Request;

class TagsController extends Controller
{
    public function get($id)
    {
        $article = Tag::with('articles.tags')->find($id);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }
}
