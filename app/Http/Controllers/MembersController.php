<?php

namespace App\Http\Controllers;

use App\Article;
use App\Member;
use App\Tag;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function all(Request $request)
    {
        $articles = Member::with('command')->paginate(5);

        return response()->json($articles);
    }

    public function get($id)
    {
        $article = Member::with('command')->find($id);

        if (!$article) {
            return response()->json(null, 404);
        }

        return response()->json($article);
    }

    public function create(Request $request)
    {
        $filename = '';

        if ($request->hasFile('photo')) {
            $filename = md5('photo' . uniqid()) . "." . $request->file('photo')->guessExtension();

            $request->file('photo')->move(__DIR__ . "/../../../public/uploads", $filename);
        }

        $article = Member::create([
            'full_name' => $request->get('full_name'),
            'role' => $request->get('role'),
            'photo' => $filename,
            'birthday' => new \DateTime($request->get('birthday')),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'command_id' => $request->get('command_id')
        ]);


        return response()->json($article, 201);
    }
}
