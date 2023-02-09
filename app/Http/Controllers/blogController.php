<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPortfolioRequest;
use App\Http\Requests\blogCategoryRequest;
use App\Http\Requests\blogRequest;
use App\Models\blogModel;
use App\Models\portfolioModel;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    public function blogCategoryCreate(blogCategoryRequest $request){
        $data = $request->validated();

        DB::table('blog_category')->insert([
            'name' => $data['category_name']
        ]);

        return response(['msg' => 'Created.'], 200);
    }

    public function blogCreate(blogRequest $request){
        $data = $request->validated();

        $requestHasImage = $request->file('image');
        if ($requestHasImage) {
            $imgName = MyHelpers::uploadImage($request->file('image'), 'uploads/images/blog');
            $data['image'] = $imgName;
        }

        $dataToBeInserted = $requestHasImage ?
            [
                'title' => $data['post_title'],
                'category_id' => $data['category'],
                'image' => $data['image'],
                'post_description' => $data['post_description']
            ]:
            [
                'title' => $data['post_title'],
                'category_id' => $data['category'],
                'post_description' => $data['post_description']
            ];

        // add to db
        $blog = blogModel::create($dataToBeInserted);

        if ($blog){
            return response(['msg' => 'Added Successfully.']);
        }

        toastr()->error('Failed to add this post, try again.');
        return redirect()->route('blog-add');
    }

    public function blogRemove(Request $request){
        try {
            $blog = blogModel::findOrFail($request->get('id'));
            if ($blog->delete())
                $this->deleteImageFromStorage($blog->image);
            return response(['msg' => 'Post is Removed Successfully'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('blog-show');
        }
    }

    public function blogEdit($id){
        try {
            $data = blogModel::findOrFail($id);
            $categories = DB::table('blog_category')->select('id', 'name')->get();
            return view('admin.blog.blog_edit', ['categories'=>$categories, 'data'=>$data]);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('blog-show');
        }
    }



    public function blogUpdate(blogRequest $request){
        $data = $request->validated();
        $requestHasImage = $request->file('image');
        if ($requestHasImage){
            $imgName = MyHelpers::uploadImage($request->file('image'), 'uploads/images/blog');
            $data['image'] = $imgName;
        }

        $dataToBeUpdated = $requestHasImage ?
            [
                'title' => $data['post_title'],
                'category_id' => $data['category'],
                'image' => $data['image'],
                'post_description' => $data['post_description']
            ]:
            [
                'title' => $data['post_title'],
                'category_id' => $data['category'],
                'post_description' => $data['post_description']
            ];

        // update in db
        try {
            $blog = blogModel::findOrFail($request->get('id'))->update($dataToBeUpdated);

        }catch (ModelNotFoundException $exp)
        {
            toastr()->error('Could not update ');
//            return redirect()->route('blog-show');
        }


        if ($blog){
            return response(['msg' => 'Updated Successfully.']);
        }

        toastr()->error('Failed to update this post, try again.');
        return redirect()->route('blog-edit', $data['id']);
    }


    private function deleteImageFromStorage(string $image){
        // delete image from the uploaded images file
        $image = public_path('uploads/images/blog/') . $image;
        try {
            unlink($image);
        }catch (Exception $exception){
            // log that exception
        }
    }
}
