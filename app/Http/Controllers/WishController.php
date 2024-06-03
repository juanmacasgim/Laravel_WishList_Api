<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Http\Requests\WishRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class WishController
 * This class manages the wishes
 */
class WishController extends Controller
{
    /**
     * Store a new wish
     */
    public function store(WishRequest $request):JsonResponse
    {
        $wish = Wish::create($request->validated());
        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not created'
            ], 400);
        }
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 201);
    }

    /**
     * Display all wishes
     */
    public function index():JsonResponse{
        return response()->json([
            'success' => true,
            'data' => Wish::all()
        ], 200);
    }

    /**
     * Display the specified wish
     */
    public function show(string $id):JsonResponse{
        $wish = Wish::find($id);
        if(!$wish){
            return response()->json([
                'success' => false,
                'message' => 'Wish not found'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }

    /**
     * Update the specified wish
     */
    public function update(WishRequest $request, string $id):JsonResponse{
        $wish = Wish::find($id);
        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not found'
            ], 404);
        }
        $wish->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }

    /**
     * Remove the specified wish
     */
    public function destroy(string $id):JsonResponse{
        $wish = Wish::find($id);
        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not found'
            ], 404);
        }
        $wish->delete();
        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }
}
