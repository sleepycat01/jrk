<?php

namespace App\Http\Controllers;

use App\Models\Ng;
use DataTables;
use Illuminate\Http\Request;

class NGController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ng::query();
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('status_format', function (Ng $ng) {
                    if ($ng->status == Ng::NG_ACTIVE) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactivated</span>';
                    }
                })
                ->addColumn('action', function (Ng $ng) {
                    $edit ='<a class="btn btn-warning btn-xs" href="' . route('ng.edit', ['ng' => $ng->id]) . '"><i class="fas fa-edit"></i> แก้ไข</a>';
                    $delete = '<button class="btn btn-danger btn-xs" onClick="deleteConfirmation(' . $ng->id . ');"><i class="fas fa-trash"></i> ลบ</button>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['status_format','action'])
                ->make(true);
        }
        return view('ng.index');
    }

    public function create()
    {
        return view('ng.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $ng = new Ng();
        $ng->title = $request->title;
        $ng->code = $request->code;
        $ng->status = $request->status;

        if ($ng->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('ng.index');
        }

        return redirect()->refresh();
    }

    public function show($id)
    {
        //
    }

    public function edit(Ng $ng)
    {
        return view('ng.edit', compact('ng'));
    }

    public function update(Request $request, Ng $ng)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $ng->title = $request->title;
        $ng->code = $request->code;
        $ng->status = $request->status;

        if ($ng->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('ng.index');
        }

        return redirect()->refresh();
    }

    public function destroy(Request $request, Ng $ng)
    {
        $status = false;
        $message ='ไม่สามารถลบข้อมูลได้';
        if ($ng->delete()) {
            $status = true;
            $message = 'ลบข้อมูลเรียบร้อยแล้ว';
        }
        if ($request->ajax()) {
            return response()->json(['status' => $status, 'message' => $message]);
        } else {
            alert()->success('สำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('machines.index');
        }
    }
}
