<?php

namespace App\Http\Controllers;

use App\Article;
use App\Member;
use App\Tag;
use Illuminate\Support\Facades\Request;

class MembersController extends Controller
{
    public function all(Request $request)
    {
        $articles = Member::paginate(5);

        return response()->json($articles);
    }

    public function get($slug)
    {
        $article = Member::findBySlug($slug);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }

    public function create(Request $request)
    {
        $filename = '';

        if ($request->hasFile('photo')) {
            $filename = md5(uniqid()) . $request->file('photo')->guessExtension();

            $request->file('photo')->move("/uploads", $filename);
        }

        $article = Member::create([
            'full_name' => $request->get('full_name'),
            'slug' => str_slug($request->get('full_name')),
            'role' => $request->get('role'),
            'photo' => $filename,
            'birthday' => $request->get('birthday'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'command_id' => $request->get('command_id')
        ]);


        return response()->json($article, 201);
    }
}
