<?php

namespace App\Http\Controllers;


use App\Models\Machine;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MachineController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Machine::query();
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('status_format', function (Machine $machine) {
                    if ($machine->status == Machine::MACHINE_ACTIVE) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactivated</span>';
                    }
                })
                ->addColumn('action', function (Machine $machine) {
                    $edit ='<a class="btn btn-warning btn-xs" href="' . route('machines.edit', ['machine' => $machine->id]) . '"><i class="fas fa-edit"></i> แก้ไข</a>';
                    $delete = '<button class="btn btn-danger btn-xs" onClick="deleteConfirmation(' . $machine->id . ');"><i class="fas fa-trash"></i> ลบ</button>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['status_format','action'])
                ->make(true);
        }
        return view('machine.index');
    }

    public function create()
    {
        return view('machine.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $machine = new Machine();
        $machine->title = $request->title;
        $machine->code = $request->code;
        $machine->status = $request->status;

        if ($machine->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('machines.index');
        }

        return redirect()->refresh();
    }

    public function show($id)
    {
        //
    }

    public function edit(Machine $machine)
    {
        return view('machine.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
        ];

        $this->validate($request, $rules);

        $machine->title = $request->title;
        $machine->code = $request->code;
        $machine->status = $request->status;

        if ($machine->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('machines.index');
        }

        return redirect()->refresh();

    }

    public function destroy(Request $request, Machine $machine)
    {
        $status = false;
        $message ='ไม่สามารถลบข้อมูลได้';
        if ($machine->delete()) {
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
