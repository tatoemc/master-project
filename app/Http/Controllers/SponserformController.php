<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Sponserform;
use App\User; 
use App\Orphan;
class SponserformController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        //
        public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        if(!Gate::allows('isAdmin') )
            {
               abort(404,"soory");
            }
        //
        $sponserforms = Sponserform::orderBy('id', 'desc')->paginate(10); 
        //return view and pass in the variable
        return view ('sponserforms.index')->withSponserforms($sponserforms);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         if(!Gate::allows('isAdmin') )
            {
               abort(404,"soory");
            }
        // 
        $orphans = Orphan::where('active', '0')->get();
        //sponsor arry 
        $sponsors = User::where('user_type', 'sponsor')->get();       
            
        //Guardian arry
        $guardians = User::where('user_type', 'guardian')->get();       
            
        //Guardian arry
        $supervisors = User::where('user_type', 'supervisor')->get();       
            
       
        return view('sponserforms.create')->withSponsors($sponsors)->withGuardians($guardians)->withSupervisors($supervisors)->withOrphans($orphans);
    }

    /**

    $sponserform->sponsor_id = $request->sponsor_id;
        $sponserform->guardian_id = $request->guardian_id;
        $sponserform->supervisor_id = $request->supervisor_id;
        $sponserform->orphan_id = $request->orphan_id;        
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //
        $this->validate($request , array(
         'cache'=> 'required'
           
         
        ));
        //2  
        $sponserform = new Sponserform; 
        
        $sponserform->cache = $request->cache;
        $sponserform->orphan_id = $request->orphan_id;
        $sponserform->kafal_type = $request->kafal_type;
        $sponserform->payment_type = $request->payment_type;
       
       
        $sponserform->save();

        $sponserform->users()->sync([
            $request->sponsor_id, 
            $request->supervisor_id,
        ]);

        $Orphan = Orphan::where('id', $request->orphan_id)->update(['active' => 1]);
       // Session::flash('success','تم الحفظ بنجاح');
        
        return redirect()->route('sponserforms.show', $sponserform->id);
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
        $sponserform = Sponserform::find($id);  
        return view('sponserforms.show')->withSponserform($sponserform);

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

        $sponserform = Sponserform::find($id);
      
        
         //return the view ans pass in the variable
         //dd($id);
        return view('sponserforms.edit')->withSponserform($sponserform);
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
         'cache'=> 'required',
         'family' =>'required'
         
         
        ));
        //save the data to the data base
        $sponserform = Sponserform::find($id);
        $sponserform->cache = $request->input('cache');
        $sponserform->family = $request->input('family');
       

        $sponserform->save();

        //redirect with flash data to  posts.show
        return redirect()->route('sponserforms.show', $id); 
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
        $sponserform = Sponserform::find($id);
        $sponserform->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('sponserforms.index'); 
    }
}
