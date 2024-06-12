<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Http\Requests\WishRequest;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Class WishController
 * This class manages the wishes
 */
class WishController extends Controller
{

    public function getUserIdFromToken(string $token): ?int
    {
        $accessToken = PersonalAccessToken::findToken($token);

        return $accessToken ? $accessToken->tokenable_id : null;
    }

    /**
     * Store a new wish
     */
    public function store(WishRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        $wish = Wish::create($validatedData);
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
    public function index(): JsonResponse
    {
        $userId = auth()->id();
        $wishes = Wish::where('user_id', $userId)->get();

        return response()->json($wishes, 200);
    }

    /**
     * Display the specified wish
     */
    public function show(string $id): JsonResponse
    {
        $userId = auth()->id();
        $wish = Wish::where('id', $id)->where('user_id', $userId)->first();

        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not found or you do not have permission to view this wish'
            ], 404);
        }

        return response()->json($wish, 200);
    }

    /**
     * Update the specified wish
     */
    public function update(WishRequest $request, string $id): JsonResponse
    {
        $userId = auth()->id();
        $wish = Wish::where('id', $id)->where('user_id', $userId)->first();

        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not found or you do not have permission to update this wish'
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
    public function destroy(string $id): JsonResponse
    {
        $userId = auth()->id();
        $wish = Wish::where('id', $id)->where('user_id', $userId)->first();

        if (!$wish) {
            return response()->json([
                'success' => false,
                'message' => 'Wish not found or you do not have permission to delete this wish'
            ], 404);
        }

        $wish->delete();

        return response()->json([
            'success' => true,
            'data' => $wish
        ], 200);
    }
}
