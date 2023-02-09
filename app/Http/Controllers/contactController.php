<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Models\contactModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * @param contactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contactCreate(contactRequest $request){
        $data = $request->validated();

        // add to db
        $contact = contactModel::create([
            'sender_name' => $data['sender_name'],
            'sender_email' => $data['sender_email'],
            'message' => $data['message'],
            'address' => $data['address'] ,
            'subject' => $data['subject']
        ]);

        if ($contact){
            toastr()->success('Your message is sent successfully.');
            return redirect()->route('contact');
        }

        toastr()->error('Failed to add this project, try again.');
        return redirect()->route('contact');
    }

    /**
     * @param Request $request
     * @return Response|void
     */
    public function contactRemove(Request $request){
        try {
            $contact = contactModel::findOrFail($request->get('id'));
            if ($contact->delete())
                return response(['msg' => 'Message is Removed Successfully'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('contact-show');
        }
    }
}
