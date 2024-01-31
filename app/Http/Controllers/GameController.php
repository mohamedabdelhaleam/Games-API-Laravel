<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        if (!$games) {
            return response()->json([
                "status" => "fail",
                "message" => "Not Found"
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'games' => $games
            ]
        ], 200);
    }
    public function getGame($gameId)
    {
        $game = Game::find($gameId);
        if (!$game) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'game' => $game
            ]
        ], 200);
    }
    public function getGamesByCategory($categoryId)
    {
        $games = Game::where('category_id', $categoryId)->get();
        if (!$games) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'games' => $games
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        $game = Game::create([
            'name' => $request->name,
            'price' => $request->image,
            'count_service' => $request->count_service,
            'category_id' => $request->category_id,
        ]);
        if (!$game) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully created.",
            'data' => [
                'game' => $game
            ]
        ], 201);
    }
    public function update(Request $request, $gameId)
    {
        $game = Game::find($gameId);
        if (!$game) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $game->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'game' => $game
            ]
        ], 200);
    }
    public function delete($gameId)
    {
        $game = Game::find($gameId);
        if (!$game) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $game->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 204);
    }
}
