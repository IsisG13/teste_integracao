<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SlackController extends Controller
{
    public function sendNotification(Request $request) {
        $this->validate($request, [
            'message' => 'required|string',
        ]);

        $message = $request->input('message');
        $webhookUrl = 'https://hooks.slack.com/services/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';

        $response = Http::post($webhookUrl, [
            'text' => $message,
        ]);

        if ($response->successful()) {
            return response()->json(['status' => 'success'], 200);
        } {
            return response()->json(['status' => 'error'], $response->status());
        }

    }
}
