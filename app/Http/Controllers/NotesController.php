<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;



class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           // 'title' => 'required|string|min:1|unique:notes'
            //'descript' => 'required' 
         ]);
         if ($validator->fails()){
             return response()->json(['error'=>$validator->errors()->all()]);
         }
        
        else{
            $nt = new Notes();
            $nt->title = $request->tit;
            $nt->descript = $request->des;       
            if($nt->save())
              return response()->json(['success'=>'Notes Added Sucessfully']);
            else
              return response(['type'=>"error",'msg'=> "Error Occured!! Try Again"]);
        }    
    }
    public function record(Request $request){
        $notes= Notes::all();
        return view('Note.read', compact('notes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nt = Notes::find($id);
        return view('Note.update',compact('nt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {    }
    public function updateNotes(Request $request){
         
        $validator = Validator::make($request->all(),[
            // 'title' => 'required|string|min:1|unique:notes'
             //'descript' => 'required' 
          ]);
          if ($validator->fails()){
              return response()->json(['error'=>$validator->errors()->all()]);
          }
         
         else{
            $nts = Notes::find($request->id);
            if($nts->title == $request->tit){
                $nt =Notes::find($request->id);
                $nt->title = $request->tit;
                $nt->descript = $request->des;       
                if($nt->save())
                redirect('records')->with("success",'Update Successfully');
                else
                redirect('records')->with("success",'Update Successfully');
            }
             
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Notes::find($id);
        if($data->delete()){
        return redirect('/records')->with("success",'Delete Successfully');
        }
        else
        {
          return redirect('/records')->with("error",'Error');
        } 
    }
}