<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        if (!$agents) {
            return response()->json([
                "status" => "fail",
                "message" => "Not Found"
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'agent' => $agents
            ]
        ], 200);
    }
    public function getAgent($agentId)
    {
        $agent = Agent::find($agentId);
        if (!$agent) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'agent' => $agent
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        $agent = Agent::create([
            'name' => $request->name,
            'image' => $request->image,
            'address' => $request->address,
        ]);
        if (!$agent) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully created.",
            'data' => [
                'agent' => $agent
            ]
        ], 201);
    }
    public function update(Request $request, $agentId)
    {
        $agent = Agent::find($agentId);
        if (!$agent) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $agent->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'agent' => $agent
            ]
        ], 200);
    }
    public function delete($agentId)
    {
        $agent = Agent::find($agentId);
        if (!$agent) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $agent->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 204);
    }
}
