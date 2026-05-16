<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminMessage;

class PublicMessageController extends Controller
{
    public function receiveAdminMessage(Request $request)
    {
        // Debug logging
        \Log::info('receiveAdminMessage called', [
            'is_ajax' => $request->ajax(),
            'wants_json' => $request->wantsJson(),
            'expects_json' => $request->expectsJson(),
            'content_type' => $request->header('Content-Type'),
            'x_requested_with' => $request->header('X-Requested-With'),
            'user_agent' => $request->header('User-Agent'),
            'is_authenticated' => auth()->check()
        ]);
        
        try {
            $request->validate([
                'admin_name' => 'required|string|max:255',
                'admin_email' => 'required|email|max:255',
                'admin_phone' => 'required|string|max:20',
                'admin_message' => 'required|string|max:1000',
            ]);
            
            AdminMessage::create([
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'phone' => $request->admin_phone,
                'message' => $request->admin_message,
                'property_id' => $request->property_id ?? null,
            ]);
            
            if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
                return response()->json([
                    'success' => true, 
                    'message' => 'Votre message a été envoyé à l\'administrateur.'
                ]);
            }
            
            return back()->with('success', 'Votre message a été envoyé à l\'administrateur.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erreur de validation.',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Une erreur est survenue lors de l\'envoi du message.'
                ], 500);
            }
            return back()->withErrors(['error' => 'Une erreur est survenue lors de l\'envoi du message.']);
        }
    }
} 