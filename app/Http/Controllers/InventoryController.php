<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class InventoryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Inventory::query();
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('status_format', function (Inventory $inventory) {
                    if ($inventory->status == Inventory::INVENTORY_ACTIVE) {
                        return '<span class="badge badge-success">Active</span>';
                    } else {
                        return '<span class="badge badge-warning">Inactivated</span>';
                    }
                })
                ->addColumn('action', function (Inventory $inventory) {
                    $edit ='<a class="btn btn-warning btn-xs" href="' . route('inventories.edit', ['inventory' => $inventory->id]) . '"><i class="fas fa-edit"></i> แก้ไข</a>';
                    $delete = '<button class="btn btn-danger btn-xs" onClick="deleteConfirmation(' . $inventory->id . ');"><i class="fas fa-trash"></i> ลบ</button>';
                    return $edit . ' ' . $delete;
                })
                ->rawColumns(['status_format','action'])
                ->make(true);
        }
        return view('inventory.index');
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
            'stock' => 'required'
        ];

        $this->validate($request, $rules);

        $inventory = new Inventory();
        $inventory->title = $request->title;
        $inventory->code = $request->code;
        $inventory->stock = $request->stock;
        $inventory->status = $request->status;

        if ($inventory->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('inventories.index');
        }

        return redirect()->refresh();
    }

    public function show($id)
    {
        //
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit',compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $rules = [
            'title' => 'required|max:255',
            'code' => 'required',
            'stock' => 'required'
        ];

        $this->validate($request, $rules);

        $inventory->title = $request->title;
        $inventory->code = $request->code;
        $inventory->stock = $request->stock;
        $inventory->status = $request->status;

        if ($inventory->save()) {
            alert()->success('สำเร็จ', 'เพิ่มข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('inventories.index');
        }

        return redirect()->refresh();
    }

    public function destroy(Request $request, Inventory $inventory)
    {
        $status = false;
        $message ='ไม่สามารถลบข้อมูลได้';
        if ($inventory->delete()) {
            $status = true;
            $message = 'ลบข้อมูลเรียบร้อยแล้ว';
        }
        if ($request->ajax()) {
            return response()->json(['status' => $status, 'message' => $message]);
        } else {
            alert()->success('สำเร็จ', 'ลบข้อมูลเรียบร้อยแล้ว')->autoClose(0)->animation(false, false);
            return redirect()->route('inventories.index');
        }
    }
}
