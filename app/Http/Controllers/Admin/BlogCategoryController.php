<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Response $request )
    {
       $data['blogsCategory']= BlogCategory::get();
       return view('admin.blogsCategory.listData', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogsCategory.listAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $valide = Validator::make( $request->all(), [
        'name'   => 'required',
        'status' => 'required',
        ]);
       $data = [
        'name'   => $request->name,
        'status' => $request->status,
       ];
       if ( $valide->passes() ) {
        BlogCategory::create($data);
        Toastr::success( 'The '. $request->name . ' Category is Add Succesfully' , 'Success', ["positionClass" => "toast-top-center"]);
       } else {
            $errorMessage = $valide->messages()->all();
            foreach ($errorMessage as $key => $message) {
                Toastr::error( $message, 'Required', ["positionClass" => "toast-top-center"]);
            }
       }
       
       return redirect(route('blogCategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['blogCategoryInfo'] = BlogCategory::find($id);
       return view('admin.blogsCategory.editeList', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid_field = [
            'name'   => 'required',
            'status' => 'required',
        ];
        $data = [
          'name'   => $request->name,
          'status' => $request->status,
        ];

        $valide = Validator::make($request->all(), $valid_field);
        if ( $valide->passes() ) {
            BlogCategory::find($id)->update($data);
            Toastr::success( 'Category Update Success', 'Success', ["positionClass" => "toast-top-center"]);
        } else {
            $errorMessage = $valide->messages()->all();
            foreach ($errorMessage as $key => $message) {
                Toastr::error( $message, 'Required', ["positionClass" => "toast-top-center"]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();
        return redirect()->back();
    }
}
