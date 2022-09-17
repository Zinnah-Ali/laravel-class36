<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $request)
    {
       $data['blogs'] = Blogs::get();
       return view('admin.blogs.listData', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.listAdd'); 
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
            'title'     => 'required',
            'sub_title' => 'required',
            'details'   => 'required',
            'status'    => 'required',
        ]);

        if ( $valide->passes() ) {
            Blogs::create([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'details'   => $request->details,
                'status'    => $request->status,
            ]);
            Toastr::success( 'Blog Add Success full :)', 'Success', ["positionClass" => "toast-top-center"]);
        } else {
            $errorMessage = $valide->messages()->all();
            foreach ($errorMessage as $key => $message) {
                Toastr::error( $message, 'Required', ["positionClass" => "toast-top-center"]);
            }
        }
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blogInfo'] = Blogs::find($id);
        return view('admin.blogs.editeList', $data);
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
        Blogs::find($id)->update([
            'title'     => $request->title,
            'sub_title' => $request->sub_title,
            'details'   => $request->details,
            'status'    => $request->status,
        ]);

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
        Blogs::find($id)->delete();
        Toastr::success( 'Delete Success', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
