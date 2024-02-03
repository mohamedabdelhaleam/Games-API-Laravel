<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        if (!$orders) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'orders' => $orders
            ]
        ], 200);
    }
    public function getUserOrder()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with(['game' => function ($q) {
            $q->select('id', 'name');
        }, 'product' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        if (!$orders) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'orders' => $orders
            ]
        ], 200);
    }
    public function create(Request $request)
    {
        $user = Auth::user();
        $order = Order::create([
            'game_id' => $request->game_id,
            'product_id' => $request->product_id,
            'username' => $request->username,
            'gamer_id' => $request->gamer_id,
            'status' => 'wait',
            'user_id' => $user->id
        ]);
        if (!$order) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'order' => $order
            ]
        ], 200);
    }
    public function accept($orderId)
    {
        $order = Order::find($orderId);
        if (!$order) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $order->update([
            "status" => 'done'
        ]);
        return response()->json([
            "status" => "success",
            'data' => [
                'order' => $order
            ]
        ], 200);
    }
    public function delete($orderId)
    {
        $order = Order::find($orderId);
        if (!$order) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $order->delete();
        return response()->json([
            "status" => "success",
            'data' => [
                'order' => $order
            ]
        ], 200);
    }
}
