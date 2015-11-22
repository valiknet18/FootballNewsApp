<?php

namespace App\Http\Controllers;

use App\Article;
use App\Command;
use App\Tag;
use Illuminate\Support\Facades\Request;

class CommandsController extends Controller
{
    public function all(Request $request)
    {
        $commands = Command::paginate(5);

        return response()->json($commands);
    }

    public function get($slug)
    {
        $command = Command::findBySlug($slug);

        if (!$command) {
            return response()->json(null, 404);
        }

        return response()->json($command);
    }

    public function create(Request $request)
    {
        $filename = '';

        if ($request->hasFile('logo')) {
            $filename = md5(uniqid()) . $request->file('logo')->guessExtension();

            $request->file('logo')->move("/uploads", $filename);
        }

        $command = Command::create([
            'title' => $request->get('title'),
            'slug' => str_slug($request->get('title')),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'logo' => $filename,
        ]);

        return response()->json($command, 201);
    }
}
