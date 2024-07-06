<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function dashboard(){
        $response = Http::get('http://127.0.0.1:5000/api/events');
        $data = json_decode($response->body(), true);

        return view('dashboard', $data);
    }

    public function add_event(Request $request){
        $response = Http::post('http://127.0.0.1:5000/api/events', [   
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ]);
        $response = json_decode($response);

        if($response->status == true){
            return back()->with('success', 'Event add successfully');
        }else{
            return back()->with('danger', 'Event add fail');
        }
    }

    public function delete_event($id){
        $response = Http::delete('http://127.0.0.1:5000/api/events/'.$id);
        $response = json_decode($response);

        if($response->status == true){
            return back()->with('success', 'Event delete successfully');
        }else{
            return back()->with('danger', 'Event delete fail');
        }
    }

    public function view_event($id){
        $response = Http::get('http://127.0.0.1:5000/api/events/'.$id);
        $response = json_decode($response);
        $data = $response->data;

        if($response->status == true){            
            return view('view_event', compact('data'));
        }else{
            return back()->with('danger', 'Event view fail');
        }
    } 
    
    public function edit_event($id){
        $response = Http::get('http://127.0.0.1:5000/api/events/'.$id);
        $response = json_decode($response);
        $data = $response->data;

        if($response->status == true){            
            return view('edit_event', compact('data'));
        }else{
            return back()->with('danger', 'Event view fail');
        }
    }

    public function update_event(Request $request){
        $response = Http::put('http://127.0.0.1:5000/api/events/' .$request->id, [   
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location
        ]);
        $response = json_decode($response);

        if($response->status == true){
            return back()->with('success', 'Event update successfully');
        }else{
            return back()->with('danger', 'Event update fail');
        }
    }


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
