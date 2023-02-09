<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPortfolioRequest;
use App\Http\Requests\updatePortfolioRequest;
use App\Models\portfolioModel;
use App\MyHelpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class portfolioController extends Controller
{

    /**
     * @param addPortfolioRequest $request
     * @return  Response
     */
    public function portfolioCreate(addPortfolioRequest $request){
        $data = $request->validated();
        $imgName = MyHelpers::uploadImage($request->file('image'), 'uploads/images/portfolio');
        $data['image'] = $imgName;

        // add to db
        $portfolio = portfolioModel::create([
            'title' => $data['title'],
            'category_id' => $data['category'],
            'image' => $data['image'],
            'description' => $data['project_description'],
        ]);

        if ($portfolio){
            return response(['msg' => 'Added Successfully.']);
        }

        toastr()->error('Failed to add this project, try again.');
        return redirect()->route('portfolio-add');
    }


    /**
     * @param string $image
     * @return void
     */
    private function deleteImageFromStorage(string $image){
        // delete image from the uploaded images file
        $image = public_path('uploads/images/portfolio/') . $image;
        try {
            unlink($image);
        }catch (Exception $exception){
            // log that exception
        }
    }

    /**
     * @param Request $request
     * @return  Response
     */
    public function portfolioRemove(Request $request){
        try {
            $portfolio = portfolioModel::findOrFail($request->get('id'));
            if ($portfolio->delete())
                $this->deleteImageFromStorage($portfolio->image);
            return response(['msg' => 'Project is Removed Successfully'], 200);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('portfolio-show');
        }
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function portfolioEdit($id){
        try {
            $data = portfolioModel::findOrFail($id);
            $categories = DB::table('portfolio_category')->select('id', 'category_name')->get();
            return view('admin.portfolio.portfolio_edit', ['categories'=>$categories, 'data'=>$data]);
        }catch (ModelNotFoundException $exception){
            return redirect()->route('portfolio-show');
        }
    }


    /**
     * @param addPortfolioRequest $request
     * @return  Response
     */
    public function portfolioUpdate(addPortfolioRequest $request){
        $data = $request->validated();
        $requestHasImage = $request->file('image');
        if ($requestHasImage){
            $imgName = MyHelpers::uploadImage($request->file('image'), 'uploads/images/portfolio');
            $data['image'] = $imgName;
        }

        $requestHasImage ?
        $dataToBeUpdated = [
            'title' => $data['title'],
            'category_id' => $data['category'],
            'description' => $data['project_description'],
            'image' => $data['image']
        ]
        :
        $dataToBeUpdated = [
            'title' => $data['title'],
            'category_id' => $data['category'],
            'description' => $data['project_description']
        ];

        // update in db
        $portfolio = portfolioModel::findOrFail($request->get('id'))->update($dataToBeUpdated);

        if ($portfolio){
            return response(['msg' => 'Updated Successfully.']);
        }

        toastr()->error('Failed to update this project, try again.');
        return redirect()->route('portfolio-edit', $data['id']);
    }


}
