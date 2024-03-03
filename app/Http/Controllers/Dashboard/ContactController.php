<?php

namespace App\Http\Controllers\Dashboard;

use App\Base\Repositories\ContactRepository;
use App\Http\Controllers\Controller;
use App\Mail\MakenContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->contactRepository->getAll();
        return view('dashboard.contacts.index', compact('contacts'));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = $this->contactRepository->find($id);
        return view('dashboard.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $this->contactRepository->delete($id);
        return response()->json([
            'message' => 'تم الحذف بنجاح',
        ]);
    }

    /**
     * Show the form for reply to user.
     */
    public function showReplyForm($id)
    {
        $contact = $this->contactRepository->find($id);
        if ($contact){
            return view('dashboard.contacts.reply', compact('contact'));
        }

        else{
            return redirect()->route('admin.contacts.index')->with('error', 'هذا الرسالة غير موجودة');
        }
    }

    /**
     * Send reply to user.
     */

    public function sendReply(Request $request)
    {
        Mail::to($request->email)->send(new MakenContactEmail($request->reply));
        $this->contactRepository->find($request->id)->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'تم الارسال بنجاح');
    }

}











