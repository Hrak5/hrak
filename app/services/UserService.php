<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Events\UserPasswordUpdateEvent;

class UserService{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function update($validated){
		$validated = array_filter($validated,function($value){
            return !empty($value);
        });
        $this->user->update($validated);
        // dd($this->user);

        if (isset($validated['password'])) {
        	event(new UserPasswordUpdateEvent($this->user));
        }

         if (isset($validated['image'])) {
            if ($this->user->profile_image) {
                $oldImagePath = $this->user->profile_image;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
        }
            $imageName = Storage::put('images',$validated['image']);
            $this->user->profile_image = $imageName;
            $this->user->save();
        }
        return true;
	}
}