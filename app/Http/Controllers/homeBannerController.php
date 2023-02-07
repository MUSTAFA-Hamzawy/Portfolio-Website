<?php

namespace App\Http\Controllers;

use App\Http\Requests\homeBannerUpdateRequest;
use App\Models\homeBannerModel;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;
use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\Console\Input\Input;

class homeBannerController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function homeBannerShow(){

        try {
            $data = homeBannerModel::all()->first();
            return view('admin.home_banner.default_view', compact('data'));
        }catch (ModelNotFoundException $exp){
            toastr()->error('Sorry, We did not find any data.');
            return redirect()->back();
        }
    }

    /**
     * @param homeBannerUpdateRequest $request
     * @return Response
     */
    public function homeBannerUpdate(homeBannerUpdateRequest $request){
        $data = $request->validated();

        // moving the image to the uploads directory
        $requestHasImage = $request->file('banner_image');
        if ($requestHasImage){
            $imgName = MyHelpers::uploadImage($request->file('banner_image'), 'uploads/images/home_banner');
            $data['banner_image'] = $imgName;
            $requestHasImage = true;
        }

        // update
        try {
            homeBannerModel::findOrFail($data['id'])->update([
                'title' => $data['title'],
                'video_url' => $data['video_url'],
                'bio_description' => $data['bio_description']
            ]);

            if ($requestHasImage){
                homeBannerModel::findOrFail($data['id'])->update([
                    'banner_image' => $data['banner_image'],
                ]);
            }
            return response(['msg' =>'Updated Successfully.'], 200);
        } catch (ModelNotFoundException $exp){
            toastr()->error('Failed to update.');
            return redirect()->back();
        }


    }
}
