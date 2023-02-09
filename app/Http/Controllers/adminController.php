<?php

namespace App\Http\Controllers;

use App\Http\Requests\passwordUpdateRequest;
use App\Http\Requests\profileUpdateRequest;
use App\Models\User;
use App\MyHelpers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * @param UploadedFile $image
     * @return string
     */
    private function uploadImage(UploadedFile $image): string{
        return MyHelpers::uploadFile($image, public_path('uploads/images/admin_profile'));
    }

    /**
     * @return User
     */
    private function getAuthData() : User{
        $authId = Auth::user()->id;
        $authData = User::find($authId);
        return $authData;
    }

    /**
     * @param profileUpdateRequest $request
     * @return Response
     */
    public function profileUpdate(profileUpdateRequest $request){
        $request->validated();
        $data = $this->getAuthData();
        $data->name = $request->name;
        $data->email = $request->email;

        // moving the image to the uploads directory
        if ($request->file('image')){
            $imgName = MyHelpers::uploadImage($request->file('image'), 'uploads/images/admin_profile');
            $data->image = $imgName;
        }

        $data->save();

        return response(['msg' => 'Profile is Updated Successfully'], 200);
    }

    /**
     * @param passwordUpdateRequest $request
     * @return Response
     */
    public function passwordUpdate(passwordUpdateRequest $request){
        $data = $request->validated();

        if(Hash::check($data['old-password'], Auth::user()->getAuthPassword())){
            $user = User::find(Auth::id());
            $user->password = $data['old-password'];
            $user->save();
            return response(['msg' => 'Password is updated.'], 200);
        }else{
            return response(['msg' => 'Current password is wrong.'], 400);
        }

    }
}
