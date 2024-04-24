<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Contact::where('is_read', '0')->update(['is_read' => '1']);
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

    public function sendMessage(Request $request)
    {
        DB::beginTransaction();
        try {
            $msg = $request->input('message');
            $chatId = $request->input('chatId');
            $chatDetails = Contact::findOrFail($chatId);

            $data["email"] = $chatDetails->email;
            $data["title"] = "Hi $chatDetails->name";
            $data["body"] = $msg;

            Mail::send('backend.pages.all_quotations.quotation_mail', $data, function ($message) use ($data) {
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
            });

            // Optionally, return a response indicating success

            DB::commit();
            return response()->json(['type' => 'success', 'message' => "Successfully Sent"]);
        } catch (Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return response()->json(['type' => 'error', 'message' => "Please Fill With Correct data"]);
        }
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
