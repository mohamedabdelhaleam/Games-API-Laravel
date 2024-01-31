<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (!$products) {
            return response()->json([
                "status" => "fail",
                "message" => "Not Found"
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'product' => $products
            ]
        ], 200);
    }
    public function getProductsByGame($gameId)
    {
        $products = Product::where('game_id' , $gameId)->get();
        if (!$products) {
            return response()->json([
                "status" => "fail",
                "message" => "Not Found"
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'products' => $products
            ]
        ], 200);
    }
    public function getProduct($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'product' => $product
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'min' => $request->min,
            'max' => $request->max,
        ]);
        if (!$product) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully created.",
            'data' => [
                'product' => $product
            ]
        ], 201);
    }
    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $product->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'product' => $product
            ]
        ], 200);
    }
    public function delete($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $product->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 204);
    }
}
