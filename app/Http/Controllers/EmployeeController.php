<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DataTables;
use App\Repositories\Interfaces\IEmployee;
use App\Http\Requests\StoreEmployee;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(IEmployee $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //$limit = 5;
        /*return view('employee.index')->with([
            'pageTitle'=>'List',
            'employees'=>$this->employeeService->all($limit)
        ]);*/
        if ($request->ajax()) {
            $data = Employee::select('*');
            return Datatables::of($data)
                    ->addColumn('photo', function($row){
     
                        $btn = '<div class="clearfix m-b-sm">
                        <img src="'.asset('images/'.$row->photo).'" width="80" height="80">
                        </div>';
 
                         return $btn;
                    })
                    ->addColumn('actions', function($row){
                        
                           $btn = '<div class="d-flex"><a href="' . route('employees.show', $row->id ) . '" class="edit btn btn-primary btn-sm mx">View</a>
                                    <a href="' . route('employees.edit', $row->id ) . '" class="btn btn-primary mx">Edit</a>
                                      <form action="'.route('employees.destroy', $row->id ).'" method="post" class="mx">
                                      <input type="hidden" name="_token" value="'.csrf_token().'">
                                      <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm(\'Are You Sure Want to Delete?\')">Delete</button>
                                      </form></div>';
                                      
    
                            return $btn;
                    })
                    ->rawColumns(['photo', 'actions'])
                    ->make(true);
        }
        
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create')->with(
            [
                'pageTitle'=>'Add Record',
                'employee'=>null,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $this->employeeService->create($request);
        return redirect('/employees')->with(['status'=>true,'msg'=>'Record saved!']);
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
        return view('employee.show')->with([
            'pageTitle'=>'Show',
            'employee'=>$this->employeeService->getById($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('employee.update')->with([
            'pageTitle'=>'Edit',
            'employee'=>$this->employeeService->getById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        //
        $this->employeeService->update($request, $id);
        return redirect('/employees')->with(['status'=>true,'msg'=>'Record updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->employeeService->delete($id);
        return redirect('/employees')->with(['status'=>true,'msg'=>'Record Deleted!']);
    }
}
