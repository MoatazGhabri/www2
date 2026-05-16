<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoteurMessage;
use App\Models\PromoteurProperty;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\PromoteurMessageNotification;

class PromoteurMessageController extends Controller
{
    /**
     * Send a message to promoteur
     */
    public function sendMessage(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'property_id' => 'required|exists:promoteur_properties,id',
            'promoteur_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Create the message
            $message = PromoteurMessage::create([
                'promoteur_id' => $request->promoteur_id,
                'property_id' => $request->property_id,
                'sender_name' => $request->name,
                'sender_email' => $request->email,
                'sender_phone' => $request->phone,
                'message' => $request->message,
                'status' => 'unread'
            ]);

            // Get the promoteur and property details
            $promoteur = User::find($request->promoteur_id);
            $property = PromoteurProperty::find($request->property_id);

            // Send email notification to promoteur (optional)
            if ($promoteur && $promoteur->email) {
                try {
                    Mail::to($promoteur->email)->send(new PromoteurMessageNotification($message, $property));
                } catch (\Exception $e) {
                    // Log email error but don't fail the request
                    \Log::error('Failed to send promoteur message notification: ' . $e->getMessage());
                }
            }

            return redirect()->back()
                ->with('success', 'Votre message a été envoyé avec succès au promoteur.');

        } catch (\Exception $e) {
            \Log::error('Error sending promoteur message: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.')
                ->withInput();
        }
    }

    /**
     * Display messages for a promoteur (dashboard)
     */
    public function index()
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            abort(403, 'Accès non autorisé.');
        }

        $query = PromoteurMessage::where('promoteur_id', $user->id)
            ->with(['property', 'promoteur']);

        // Filter by status if provided
        if (request()->has('status') && request('status') !== '') {
            $query->where('status', request('status'));
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(15);

        $unreadCount = PromoteurMessage::where('promoteur_id', $user->id)
            ->where('status', 'unread')
            ->count();

        return view('promoteur.messages.index', compact('messages', 'unreadCount'));
    }

    /**
     * Show a specific message
     */
    public function show($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            abort(403, 'Accès non autorisé.');
        }

        $message = PromoteurMessage::where('promoteur_id', $user->id)
            ->with(['property', 'promoteur'])
            ->findOrFail($id);

        // Mark as read if unread
        if ($message->isUnread()) {
            $message->markAsRead();
        }

        return view('promoteur.messages.show', compact('message'));
    }

    /**
     * Mark message as read
     */
    public function markAsRead($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            abort(403, 'Accès non autorisé.');
        }

        // Handle bulk actions
        if ($id === 'bulk') {
            $messageIds = request('message_ids', []);
            
            PromoteurMessage::where('promoteur_id', $user->id)
                ->whereIn('id', $messageIds)
                ->update(['status' => 'read', 'read_at' => now()]);

            return response()->json(['success' => true]);
        }

        $message = PromoteurMessage::where('promoteur_id', $user->id)
            ->findOrFail($id);

        $message->markAsRead();

        return response()->json(['success' => true]);
    }

    /**
     * Mark message as replied
     */
    public function markAsReplied($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            abort(403, 'Accès non autorisé.');
        }

        // Handle bulk actions
        if ($id === 'bulk') {
            $messageIds = request('message_ids', []);
            
            PromoteurMessage::where('promoteur_id', $user->id)
                ->whereIn('id', $messageIds)
                ->update(['status' => 'replied']);

            return response()->json(['success' => true]);
        }

        $message = PromoteurMessage::where('promoteur_id', $user->id)
            ->findOrFail($id);

        $message->markAsReplied();

        return response()->json(['success' => true]);
    }

    /**
     * Delete a message
     */
    public function destroy($id)
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            abort(403, 'Accès non autorisé.');
        }

        // Handle bulk actions
        if ($id === 'bulk') {
            $messageIds = request('message_ids', []);
            
            PromoteurMessage::where('promoteur_id', $user->id)
                ->whereIn('id', $messageIds)
                ->delete();

            return response()->json(['success' => true]);
        }

        $message = PromoteurMessage::where('promoteur_id', $user->id)
            ->findOrFail($id);

        $message->delete();

        return redirect()->route('promoteur.messages.index')
            ->with('success', 'Message supprimé avec succès.');
    }

    /**
     * Get unread messages count for AJAX
     */
    public function getUnreadCount()
    {
        $user = auth()->user();
        
        if (!$user || !$user->isPromoteur()) {
            return response()->json(['count' => 0]);
        }

        $count = PromoteurMessage::where('promoteur_id', $user->id)
            ->where('status', 'unread')
            ->count();

        return response()->json(['count' => $count]);
    }
}
