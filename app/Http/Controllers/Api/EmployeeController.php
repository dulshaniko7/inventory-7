<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return EmployeeResource::collection(
           Employee::all()
        );

       // $employees = Employee::all();
        //return response()->json($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'name' => 'required',
            'nic' => 'required|unique:employees',
            'email' => 'required|unique:employees',
            'phone' => 'required'
        ]);
        /*
                if($request->photo) {

                    $position = strpos($request->photo, ';');
                    $sub = substr($request->photo, 0, $position);
                    $ext = explode('/', $sub)[1];

                    $name = time() . '.' . $ext;
                    $img = Image::make($request->photo)->resize(240, 200);
                    $upload_path = 'backend/storage/Employee/';
                    $image_url = $upload_path . $name;
                    $img->save($image_url);
         if (request()->hasFile('photo'))
        */
        if ($request->photo) {

            $emp = new Employee();
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->salary = $request->salary;
            $emp->address = $request->address;
            $emp->nic = $request->nic;
            $emp->joiningDate = $request->joiningDate;

            $imageName = $request->photo->hashName();

            $request->photo->move(public_path('employees'), $imageName);
            $emp->photo = $imageName;

            $emp->save();
        } else {
            $emp = new Employee();
            $emp->name = $request->name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->salary = $request->salary;
            $emp->address = $request->address;
            $emp->nic = $request->nic;
            $emp->joiningDate = $request->joiningDate;
            $emp->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
