<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama3-70b-8192',
            'messages' => [
                ['role' => 'system', 'content' => "You are Rainy, a helpful assistant. You can speak English and Indonesia. Your owner's name is Raihan Yudi Syukma. He is a fullstack web developer that creating web applications using frameworks such as React, CodeIgniter and Laravel. He uses MySQL as database."],
                ['role' => 'user', 'content' => $request->input('message')],
            ],
            'temperature' => 0.7,
        ]);

        return response()->json($response->json());
    }
}
