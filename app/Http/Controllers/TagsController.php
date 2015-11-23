<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Support\Facades\Request;

class TagsController extends Controller
{
    public function get($slug)
    {
        $article = Tag::findBySlug($slug);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }
}
