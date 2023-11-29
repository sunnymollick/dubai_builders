<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Contact::where('is_read','0')->update(['is_read' => '1']);
        $all_messages = Contact::orderby('created_at', 'desc')->get();
        return view('backend.pages.chatbox.index', compact('all_messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function fetchMessages()
    {
        $all_messages = Contact::orderby('created_at', 'desc')->get();
        return response()->json($all_messages);
    }

    public function fetchChat($id)
    {
        // Retrieve the chat messages for the selected chat ID
        $messages = Contact::where('id', $id)->first();

        return response()->json($messages);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
