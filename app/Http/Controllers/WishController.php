<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishRequest;
use Illuminate\Http\Request;
use App\Models\Wish;
use Illuminate\Http\JsonResponse;
use Laravel\Prompts\Note;

class WishController extends Controller
{

    public function index():JsonResponse{
        return response()->json(Wish::all(), 200);
    }

    public function store(WishRequest $request):JsonResponse
    {
        $wish = Wish::create($request->validated());
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 201);
    }

    public function show(string $id):JsonResponse{
        $wish = Wish::find($id);
        return response()->json($wish, 200);
    }

    public function update(WishRequest $request, string $id):JsonResponse{
        $wish = Wish::find($id);
        $wish->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }

    public function destroy(string $id):JsonResponse{
        $wish = Wish::find($id)->delete();
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }
}
