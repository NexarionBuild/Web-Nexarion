<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:190',
            'phone' => ['required', 'string', 'max:40', 'regex:/^\+?[0-9][0-9\s\-]{7,}$/'],
            'company' => 'nullable|string|max:150',
            'service' => 'required|string|max:150',
            'budget' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'reference' => 'nullable|url|max:500',
            'message' => 'required|string|min:20|max:5000',
        ]);

        $body = "Phone/WhatsApp: {$v['phone']}\n"
            . 'Company: ' . ($v['company'] ?? '-') . "\n"
            . "Service: {$v['service']}\n"
            . 'Budget: ' . ($v['budget'] ?? '-') . "\n"
            . 'Timeline: ' . ($v['timeline'] ?? '-') . "\n"
            . 'Reference: ' . ($v['reference'] ?? '-') . "\n\n"
            . "Project Description:\n{$v['message']}";

        DB::table('messages')->insert([
            'uid' => (string) Str::uuid(),
            'from_name' => $v['name'],
            'email' => $v['email'],
            'phone' => $v['phone'],
            'company' => $v['company'] ?? null,
            'service' => $v['service'],
            'budget' => $v['budget'] ?? null,
            'timeline' => $v['timeline'] ?? null,
            'reference' => $v['reference'] ?? null,
            'subject' => 'Project Inquiry — ' . $v['service'],
            'body' => $body,
            'is_read' => false,
            'is_starred' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('activities')->insert([
            'type' => 'mail',
            'message' => 'New project inquiry from ' . $v['name'],
            'occurred_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['ok' => true, 'message' => 'Inquiry received.'], 201);
    }

    public function application(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:190',
            'job' => 'required|string|max:160',
            'portfolio' => 'nullable|url|max:500',
            'message' => 'required|string|min:20|max:5000',
        ]);

        $body = "Position: {$v['job']}\n"
            . 'Portfolio / LinkedIn: ' . ($v['portfolio'] ?? '-') . "\n\n"
            . "Why this candidate:\n{$v['message']}";

        DB::table('messages')->insert([
            'uid' => (string) Str::uuid(),
            'from_name' => $v['name'],
            'email' => $v['email'],
            'service' => 'Career Application',
            'reference' => $v['portfolio'] ?? null,
            'subject' => 'Career Application — ' . $v['job'],
            'body' => $body,
            'is_read' => false,
            'is_starred' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('activities')->insert([
            'type' => 'mail',
            'message' => 'New career application from ' . $v['name'] . ' for ' . $v['job'],
            'occurred_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['ok' => true, 'message' => 'Application received.'], 201);
    }
}
