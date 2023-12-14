<?php

namespace App\Repositories;

use App\models\Employee;
use Illuminate\Http\Request;
use App\models\Department;
use App\Repositories\Interfaces\IEmployee;

class EmployeeRepository implements IEmployee
{
    /**
     * To get employee by id
     *
     * @param integer $id
     * @return void
     */
    public function getById(int $id)
    {
        return Employee::find($id);
    }

    /**
     * To get All Employee Records
     *
     * @return void
     */
    public function all(int $limit=10)
    {
        return Employee::findAll( $limit );
    }

    /**
     * Deletes employee
     *
     * @param int
     */
    public function delete(int $id)
    {
        Employee::destroy($id);
    }

    /**
     * Updates a employee.
     *
     * @param int
     * @param array
     */
    public function update(Request $request, int $id)
    {
        $model = Employee::find($id);
        $this->save($model,$request);
    }

    /**
     * To create new employee in system.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $model = new Employee();
        $this->save($model,$request);
    }

    public function getDepartments()
    {
        return Department::active()->get();
    }

    /**
     * To save employee record
     *
     * @param Employee $model
     * @param Request $request
     * @return void
     */
    private function save(Employee $model,  Request $request){
        $model->employee_id = $request->employee_id;
        $model->firstname = $request->firstname;
        $model->lastname = $request->lastname;        
        $model->dob = date('Y-m-d',strtotime($request->dob));
        $model->phone = $request->phone;
        $model->email =  $request->email;
        $model->education_qualification = $request->education_qualification;
        $model->address = $request->address;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imagename);
            $model->photo = $imagename;
        }
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumename = time().'.'.$resume->getClientOriginalExtension();
            $destinationPath = public_path('/resume');
            $resume->move($destinationPath, $resumename);
            $model->resume = $resumename;
        }
        $model->save();
    }
}