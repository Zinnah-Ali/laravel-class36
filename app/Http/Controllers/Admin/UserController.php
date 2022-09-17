<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * 
     * CRUD Opartetion
     * 
     */

    // Reed, View, List Show, User List Page
    public function userList()
    {
        $data['users'] = User::get();
        return view('admin.users.listData', $data);
    }

    // Form View Page
    public function addList()
    {
        return view('admin.users.listAdd');
    }

    // Create or Insert Data
    public function store( Request $request )
    {
        // return $request->all();
        $valide = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ( $valide->passes() ) {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
            ]);
            Toastr::success('User Data Succesfull', 'Succes', ["positionClass" => "toast-top-center"]);
            
        } else {
            $errorMessage = $valide->messages();
            foreach ($errorMessage->all() as $message) {
                Toastr::error( $message, 'Required', ["positionClass" => "toast-top-center"]);
            }
            
        }
        
        return redirect('users/user_list');

    }

    // Update, edite List

    // One Way Update Value Show
    // public function editeList( Request $request )
    // {
    //     $id = $request->id;

    //     $data['userInfo'] = User::find($id);
    //     return view('admin.users.editeList', $data);
    // }


    // tow Way Update Value Show
    public function editeList( $id )
    {
        $data['userInfo'] = User::find($id);
        return view('admin.users.editeList', $data);
    }

    public function updateList( Request $request )
    {
        $valide = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($valide->passes()) {
            User::find($request->id)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
            ]);
            Toastr::success('Update User Succesfull', 'Succes', ["positionClass" => "toast-top-center"]);
        } else {
            $errorMessage = $valide->messages();
            foreach ($errorMessage as $message) {
                Toastr::error( $message, 'Succes', ["positionClass" => "toast-top-center"]);
            }
            
        }

        return redirect()->back();
    }


    // Delete 
    public function delteList( $id )
    {
        User::find($id)->delete();
        Toastr::warning('User Delete', 'Delete', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

}
