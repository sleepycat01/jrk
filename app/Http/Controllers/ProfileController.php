<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $admin = auth()->user();
        $myrole = $admin->roles()->pluck('name')->toArray();
        return view('profiles.index',compact('admin','myrole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = auth()->user();
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . $admin->id,
        ];

        if ($request->has('email') && $admin->email != $request->email) {
            $admin->email = $request->get('email');
        }

        if ($request->username!='') {
            $rules['username'] = 'unique:users,username,' . $admin->id;
            $admin->username = $request->get('username');
        }

        if ($request->get('password')) {
            $rules['password'] = 'required|confirmed|min:6';
            $admin->password = $request->get('password');
        }

        $this->validate($request, $rules);

        $admin->name = $request->get('name');

        if ($request->roles){
            $admin->syncRoles($request->roles);
        }

        if ($admin->save()) {
            alert()->success('สำเร็จ', 'บันทึกข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->back();

        }
        return redirect()->refresh();
    }
}
