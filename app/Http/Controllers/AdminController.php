<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Doctors;
use App\Models\Appointments;


class AdminController extends Controller
{
    //
    public function addview()
    {
        return view('admin.adddoctor');
    }
    public function uploaddoctor(Request $request)
    {
        $doctors = new Doctors();
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();

        $request->file->move('doctorimages', $imagename);
        $doctors->image = $imagename;

        $doctors->name = $request->doctorName;
        $doctors->phone = $request->phone;
        $doctors->room = $request->room;
        $doctors->specialty = $request->specialty;

        $doctors->save();

        return redirect()->back()->with('message', 'New Doctor is Added!');
    }

    public function adminappointment()
    {
        $data = Appointments::all();
        return view('admin.adminappointment', compact('data'));
    }

    public function approveappointment($id)
    {
        $data = Appointments::find($id);
        $data->status = "Approved";
        $data->save();

        return redirect()->back();
    }

    public function cancelappoint($id)
    {
        $data = Appointments::find($id);

        $data->status = "Cancelled";

        $data->save();

        return redirect()->back();
    }

    public function showdoctor()
    {
        $doctors = Doctors::all();
        return view('admin.showdoctor', compact('doctors'));
    }

    public function deletedoctor($id)
    {
        $doctors = Doctors::find($id);
        $doctors->delete();

        return redirect()->back()->with('message', 'Doctor Record ' . $id . ' Deleted!');
    }

    public function updatedoctor($id)
    {
        $data = Doctors::find($id);
        return view('admin.updatedoctor', compact('data'));
    }

    public function editdoctor($id, Request $request)
    {
        $data = Doctors::find($id);

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->room = $request->room;
        $data->specialty = $request->specialty;

        $image = $request->file;
        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('doctorimages', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Updated doctor successsfully!');
    }
}
