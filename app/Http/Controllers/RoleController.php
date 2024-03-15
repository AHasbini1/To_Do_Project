<?php
/**compact function takes an index and turns it in an array */
namespace App\Http\Controllers;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Models\Role;
use Error;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //
       
        $roles=Role::all();
        
    
        // return view('roles.index',['roles'=>$roles]);
       return view ('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        //public function store (Request $request)
        
        $data=$request->all();
        //$data=$request ->validate (['description'=>['required','min:3']]);
        Role::create($data);// this is us writing to db
        return redirect('/roles');// after writing to db, return to page 
       // if $this->$data==empty throw Error;
    
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
    public function edit($id)
    {
        $role=Role::findOrFail($id);
        return view ('/roles.edit',compact('role'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, CreateRoleRequest $request)
    {
        $data=$request->all();
        
        Role::findOrFail($id)
            ->update($data);// this is us writing roles to db
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
        //
        Role::find($id)->delete();
        return redirect ('/roles');
    }
}
