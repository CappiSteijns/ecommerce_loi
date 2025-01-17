<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function index() {
        return view('Frontend.index');
    }

    public function UserLogout() {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request) {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        // Hieronder uploaden wij de profile picture naar de juiste map en verwijderen we de bestaande foto als er nieuwe wordt geupload. Daarnaast geven we het bestand een naam en geven wij die door aan de database.
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        return redirect()->route('dashboard');


    }  //end method

    public function UserChangePassword() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function AdminChangePassword() {
        return view('admin.admin_change_password');
    }

    public function UserPasswordUpdate(request $request){

        $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }

    } //end method

}
