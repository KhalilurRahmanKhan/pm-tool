<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view("role.index",[
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' => 'required',
            'comments' => 'required',

        ]);

        Role::create([
            'role' => $request->role,
            'comments' => $request->comments,
        ]);

        return redirect('/role');
     

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
    public function edit(Role $role)
    {
        return view('role.edit',[
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        $this->validate($request,[
            'role' => 'required',
            'comments' => 'required',

        ]);

        $role->role = $request->role;
        $role->comments = $request->comments;
        $role->save();


        // Alert::success('Congrats', 'Data has been updated');
        // Alert::alert('Title', 'Message', 'Type');
        // Alert::toast('Toast Message', 'Toast Type');
        // Alert::html('Html Title', 'Html Code', 'Type');
        // alert()->html('<i>HTML</i> <u>example</u>'," You can use <b>bold text</b>, <a href='//github.com'>links</a> and other HTML tags ",'success');




        return redirect('/role');

 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back();
    }


    // public function ax(Request $request)
    // {
    //     $role = new Role();
    //     $role->role = $request->role;
    //     $role->comments = $request->comments;

    //     $role->save();
    //     return response()->json(['success'=>'Data is successfully added']);


    // }



    // public function print(Request $request)
    // {
      
    // $role = Role::all();

    // $pdf = PDF::loadView('pdf.role', [
    //     'role' => $role,
    // ]);
    // return $pdf->stream('role.pdf');

    // }


}
