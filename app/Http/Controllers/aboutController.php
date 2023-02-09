<?php

namespace App\Http\Controllers;

use App\Http\Requests\aboutRequest;
use App\Models\aboutModel;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function aboutShow(){
        try {
            $data = aboutModel::all()->first();
            return view('admin.about.default_about_view', compact('data'));
        }catch (ModelNotFoundException $exp){
            toastr()->error('Failed to fetch the data.');
            return redirect()->back();
        }
    }

    /**
     * @param aboutRequest $request
     * @return Response
     */
    public function aboutUpdate(aboutRequest $request){
        $data = $request->validated();

        // moving the image
        $requestHasImage = $request->file('about_image');
        if ($requestHasImage){
            $data['about_image'] = MyHelpers::uploadImage($request->file('about_image'), 'uploads/images/about');
        }

        // update
        try {
            $updatedData = [
                'title' => $data['title'],
                'sub_title' => $data['sub_title'],
                'description' => $data['about_description'],
                'long_description' => $data['long_description']
            ];
            $requestHasImage ? $updatedData['about_image'] = $data['about_image'] : null;

            aboutModel::findOrFail($request->id)->update($updatedData);
            return response(['msg' => 'Updated Successfully'], 200);
        }catch (ModelNotFoundException $exp){
            toastr()->error('Failed to update.');
            return redirect()->back();
        }
    }
}
