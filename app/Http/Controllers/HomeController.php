<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctors;
use App\Models\Appointments;


class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctors = Doctors::all();
            return view('user.home', compact('doctors'));
        }
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctors = Doctors::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $appointment = new Appointments();

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->date = $request->date;
        $appointment->message = $request->message;
        $appointment->doctor = $request->doctor;
        $appointment->status = 'In progress';
        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment made successfully. We will contact you soon.');
    }

    public function showappointment()
    {
        if (Auth::id()) {
            $appoint = Appointments::all();
            return view('user.show_appointment', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    public function cancelappointment($id)
    {
        $data = Appointments::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Appointment deleted successfully');
    }

    public function doctors()
    {
        return view('users.doctorlist.php');
    }
}
