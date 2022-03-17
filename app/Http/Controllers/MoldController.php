<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Mold;
use DataTables;
use Illuminate\Http\Request;

class MoldController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Mold::query();
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('status_format', function (Mold $mold) {
                    if ($mold->status == Mold::MOLD_ACTIVE) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactivated</span>';
                    }
                })
                ->addColumn('action', function (Mold $mold) {
                    $edit ='<a class="btn btn-warning btn-xs" href="' . route('molds.edit', ['mold' => $mold->id]) . '"><i class="fas fa-edit"></i> แก้ไข</a>';
                    $delete = '<button class="btn btn-danger btn-xs" onClick="deleteConfirmation(' . $mold->id . ');"><i class="fas fa-trash"></i> ลบ</button>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['status_format','action'])
                ->make(true);
        }
        return view('mold.index');
    }

    public function create()
    {
        return view('mold.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $mold = new Mold();
        $mold->title = $request->title;
        $mold->code = $request->code;
        $mold->status = $request->status;

        if ($mold->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('molds.index');
        }

        return redirect()->refresh();

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
    public function edit(Mold $mold)
    {
        return view('mold.edit',compact('mold'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mold $mold)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $mold->title = $request->title;
        $mold->code = $request->code;
        $mold->status = $request->status;

        if ($mold->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('molds.index');
        }

        return redirect()->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Mold $mold)
    {
        $status = false;
        $message ='ไม่สามารถลบข้อมูลได้';
        if ($mold->delete()) {
            $status = true;
            $message = 'ลบข้อมูลเรียบร้อยแล้ว';
        }
        if ($request->ajax()) {
            return response()->json(['status' => $status, 'message' => $message]);
        } else {
            alert()->success('สำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('molds.index');
        }
    }
}
