<?php
//method===green
//variable===white
//class===blue
//red ===language response 
// when accessing static methods must use '::'
// similar to '->'
//'=>' this means we are defining an item inside an array
// key value pairs eg: $data=[]
        //              $data['user_id'=>10];
    //middleware - checking something between route and controller

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\ProjectList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectListRequest;

class ProjectListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $projects=ProjectList::with('user')
                    -> where ('user_id',Auth::user()->id)
                    ->get();
        return view ('/project-list.index', compact('projects'));
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
    public function store(ProjectListRequest $request)
    {
        //dd(Auth::user()->id);// retreive id from current user
        $data=$request->all();
        $data['user_id']=Auth::user()->id;
        
    
        //$data=$request ->validate (['description'=>['required','min:3']]);
        ProjectList::create($data);// this is us writing to db
        return redirect('/project-list');// after writing to db, return to page 
       
    
    }
    public function tasks($id)
    
    {
        $tasks= Task ::where ('project_list_id',$id)

        ->get();
        return  view ('tasks.taskFormIndex',compact('tasks'));
        


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
        $list=ProjectList::findOrFail ($id);
        return view ('/project-list.edit',compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectListRequest $request, $id)
    {
        
       

        $data=$request->all();
        $list =ProjectList::findOrFail ($id);

        if($list->user_id != Auth::user()->id)
                
             return response ()->json ([ 'message'=> 'List Doesn`t Belong To' .Auth::user()->first_name],403);
         $list->update($data);
        return redirect('/project-list');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy
            ($id, Request $request)
    {
        $list =ProjectList::findOrFail($id);
            #dd($list);
            if($list->user_id != Auth::user()->id)
                
                return response ()->json ([ 'message'=> 'List Doesn`t Belong To Authenticated User'],403);
                $list ->delete();
                return redirect ('/project-list');
                
            
            
    }
}
