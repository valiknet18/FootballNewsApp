<?php

namespace App\Http\Controllers;

use App\Article;
use App\Command;
use App\Tag;
use Illuminate\Http\Request;

class CommandsController extends Controller
{
    public function all(Request $request)
    {
        $commands = Command::paginate(5);

        return response()->json($commands);
    }

    public function get($id)
    {
        $command = Command::with('members')->find($id);

        if (!$command) {
            return response()->json(null, 404);
        }

        return response()->json($command);
    }

    public function create(Request $request)
    {
        $filename = '';

        if ($request->hasFile('logo')) {
            $filename = md5('logo' . uniqid()) . '.' . $request->file('logo')->guessExtension();

            $request->file('logo')->move(__DIR__ . "/../../../public/uploads", $filename);
        }

        $command = Command::create([
            'title' => $request->get('title'),
            'short_description' => $request->get('short_description'),
            'description' => $request->get('description'),
            'logo' => $filename,
        ]);

        return response()->json($command, 201);
    }
}
