<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Profile;
class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $newimage;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();

        $user->profile->mobile = $request->mobile;
        if ($request->newimage) {
            // if ($request->image) {
            //     unlink('assets/images/profile/' . $request->image);
            // }
            $imageName = Carbon::now()->timestamp . '.' . $request->newimage->extension();
            $request->newimage->storeAs('profile', $imageName);
            $user->profile->image = $imageName;
        }
        $user->profile->line1 = $request->line1;
        $user->profile->line2 = $request->line2;
        $user->profile->city = $request->city;
        $user->profile->province = $request->province;
        $user->profile->country = $request->country;
        $user->profile->zipcode = $request->zipcode;
        $user->profile->save();
        session()->flash('success', 'Profile Updated Successfully');
        return redirect()->back();
    }


    public function render()
    {
        $user = User::find(Auth::user()->id);
        $profile=Profile::where('user_id',Auth::user()->id)->first();
        return view('livewire.user.user-edit-profile-component', ['user' => $user,'profile'=>$profile])->layout('layouts.base');
    }
}
