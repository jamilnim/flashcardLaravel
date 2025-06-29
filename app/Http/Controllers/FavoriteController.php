<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    // GET /api/favorites
    public function index()
    {
        return response()->json(Favorite::all());
    }

    // POST /api/favorites
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'finnish' => 'required|string',
            'difficulty' => 'required|string',
            'english' => 'required|string',
            'pronunciation' => 'required|string',
            'example' => 'nullable|string',
        ]);

        $favorite = Favorite::create($request->all());

        return response()->json($favorite, 201);
    }

    // DELETE /api/favorites/{id}
    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
