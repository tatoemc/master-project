<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\orphan;
use App\User;
use Session;
use Image;
use Storage; 
use Auth;
   
class OrphanController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        // $latters = Latter::where('sender', Auth::user()->id)->get();
        
        $orphans = Orphan::orderBy('id', 'desc')->paginate(10); 
        //dd($orphans,$user);
        //dd( $orphans );
        //if (Auth::user()->user_type ='guardian') {
        //   $orphans = Orphan::where('sender', Auth::user()->id)->get() 
       // }


        return view ('orphans.index')->withOrphans($orphans);
        //return view and pass in the variable
        //dd($orphans);
        //dd($user,$orphans); 
        //$user = Auth::user()->id ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    
        return view('orphans.create');
    } 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         
        $this->validate($request , array(
         'name'=> 'required',
         'gender'=> 'required',
         'mother_name'=> 'required',
         'mother_job' =>'required',
         'brother_count'=> 'required',
         'girl'=> 'required',
         'boy' =>'required',
         'helth_state'=> 'required',
         'father_date'=> 'required',
         'date' =>'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'school' =>'required',
         'schoolLevel' =>'required',
         'family' =>'required',
         'images' =>'sometimes|image',
         'cirtificate' =>'sometimes|image'  
        ));
        //2 
        $orphan = new Orphan; 
        $orphan->name = $request->name;
        $orphan->gender = $request->gender;
        $orphan->mother_name = $request->mother_name;
        $orphan->mother_job = $request->mother_job;
        $orphan->brother_count = $request->brother_count;
        $orphan->girl = $request->girl;
        $orphan->boy = $request->boy;
        $orphan->helth_state = $request->helth_state;
        $orphan->father_date = $request->father_date;
        $orphan->date = $request->date;
        $orphan->state = $request->state;
        $orphan->city = $request->city;
        $orphan->unit = $request->unit;
        $orphan->home_no = $request->home_no; 
        $orphan->school = $request->school;
        $orphan->schoolLevel = $request->schoolLevel;
        $orphan->family = $request->family;

        if ($request->has('guardian_id')) {
            $orphan->user_id = $request->guardian_id;
        }
        else
        {
        $orphan->user_id = Auth::user()->id;
        }
 
   
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $orphan->images = $filename;
        } 
        if ($request->hasFile('cirtificate')) {
            $image = $request->file('cirtificate');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/cirtificate/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);

            $orphan->cirtificate = $filename;
        } 


        $orphan->save();
       
        //$orphan->id->sync([$request->guardian]);
        //$orphan->id->sync([$request->sponsor]);
        //$orphan->id->sync([$request->supervisor]);

       //$orphan->users()->sync($request->users, false);
       // Session::flash('success','تم الحفظ بنجاح');

        return redirect()->route('orphans.show', $orphan->id);
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
        $orphan = Orphan::find($id);  
        return view('orphans.show')->withOrphan($orphan);
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
        if(!Gate::allows('isEmployee') && !Gate::allows('isAdmin'))
        {
           abort(404,"soory");
        }

        $orphan = Orphan::find($id);
      
        
         //return the view ans pass in the variable
         //dd($id);
        return view('orphans.edit')->withOrphan($orphan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request , array(
         'name'=> 'required',
         'gender'=> 'required',
         'mother_name'=> 'required',
         'mother_job' =>'required',
         'brother_count'=> 'required',
         'girl'=> 'required',
         'boy' =>'required',
         'helth_state'=> 'required',
         'father_date'=> 'required',
         'date' =>'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'school' =>'required',
         'schoolLevel' =>'required',
         'family' =>'required',
         'images' =>'sometimes|image',
         'cirtificate' =>'sometimes|image' 
         
        ));
        //save the data to the data base
        $orphan = Orphan::find($id);

        $orphan->name = $request->input('name');
        $orphan->gender = $request->input('gender');
        $orphan->date = $request->input('date');
        $orphan->state = $request->input('state');
        $orphan->mother_name = $request->input('mother_name');
        $orphan->mother_job = $request->input('mother_job');
        $orphan->brother_count = $request->input('brother_count');
        $orphan->girl = $request->input('girl');
        $orphan->boy = $request->input('boy');
        $orphan->helth_state = $request->input('helth_state');
        $orphan->father_date = $request->input('father_date');
        $orphan->city = $request->input('city');
        $orphan->unit = $request->input('unit');
        $orphan->home_no = $request->input('home_no');    
        $orphan->school = $request->input('school');
        $orphan->schoolLevel = $request->input('schoolLevel');
        $orphan->family = $request->input('family');
    
        
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);
            $oldFilename = $orphan->image;
            $orphan->images = $filename;
           // Stroage::delete();
            Storage::delete($oldFilename);
        }
        if ($request->hasFile('cirtificate')) {
            $image = $request->file('cirtificate');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $oldFilename = $orphan->cirtificate;
            $orphan->cirtificate = $filename;
           // Stroage::delete();
            Storage::delete($oldFilename);
        }


        $orphan->save();

        //redirect with flash data to  posts.show
        return redirect()->route('orphans.show', $id); 
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
         $orphan = Orphan::find($id);
        Storage::delete($orphan->image);
        $orphan->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('orphans.index'); 
    }

    public function createemp()
    {  

       $users = User::where('user_type', 'guardian')->get();  
        return view ('orphans.create2')->withUsers($users);
        
    }

    public function sponsered()
    {  

       $orphans = Orphan::where('active', '1')->get();  
        return view ('orphans.sponsered')->withOrphans($orphans);
         
    } 

    public function notsponsered()
    {  

       $orphans = Orphan::where('active', '0')->get();  
        return view ('orphans.notsponsered')->withOrphans($orphans);
        
    }


}
