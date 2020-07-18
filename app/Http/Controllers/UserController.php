<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;
use Image;
use Storage; 
use Auth; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $users = User::orderBy('id', 'desc')->paginate(10); 
        //return view and pass in the variable
        return view ('users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        if(!Gate::allows('isAdmin') )
            {
               abort(404,"soory");
            }
        //
        
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request , array(
         'name'=> 'required',
         'user_type' =>'required',
         'email' =>'required',
         'password' =>'required',
         'confirm_password' =>'required',
         'gender'=> 'required',
         'phone' => 'required',
         'phone2' => 'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'images' =>'sometimes|image'
        ));
        //2 
        $user = new User; 
        $user->name = $request->name;
        $user->user_type = $request->user_type;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->phone2 = $request->phone2; 
        $user->state = $request->state;
        $user->city = $request->city;
        $user->unit = $request->unit;
        $user->home_no = $request->home_no;
       
 
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);

            $user->image = $filename;
        } 
        $user->save();


       // Session::flash('success','تم الحفظ بنجاح');

        return redirect()->route('users.show', $user->id);
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
        $user = User::find($id);  
        return view('users.show')->withUser($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isEmployee') && !Gate::allows('isAdmin'))
        {
           abort(404,"soory");
        }

        $user = User::find($id);
      
        
         //return the view ans pass in the variable
         //dd($id);
        return view('users.edit')->withUser($user);
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
         'user_type' =>'required',
         'email' =>'required',
         'gender'=> 'required',
         'phone' => 'required', 
         'phone2' => 'required',
         'state'=> 'required',
         'city' => 'required',
         'unit' => 'required',
         'home_no' => 'required',
         'images' =>'sometimes|image'
         
        ));
        //save the data to the data base
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->user_type = $request->input('user_type');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->phone2 = $request->input('phone2');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->unit = $request->input('unit');
        $user->home_no = $request->input('home_no');
        
       
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(100, 100)->save($location);
            $oldFilename = $user->image;
            $user->image = $filename;
           // Stroage::delete();
            Storage::delete($oldFilename);
        }

        $user->save();

        //redirect with flash data to  posts.show
        return redirect()->route('users.show', $id); 
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
        $user = User::find($id);
        Storage::delete($user->image);
        $user->delete();
        //Session::flash('success','تم حذف الموظف بنجاح');
        return redirect()->route('users.index'); 
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","كلمة المرور الحالية غير صحيحة. فضلا حاول مجددا.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","لا يمكن تغير كلمة المرور بكلمة المرور الحالية. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","تم تغير كلمة المرور بنجاح !");
 
    }


    public function supervisor()
    {  
       
           $users = User::where('user_type', 'supervisor')->get();
            return view ('users.supervisor')->withUsers($users);
        
    }
    public function sponsor()
    {  
       
           $users = User::where('user_type', 'sponsor')->get();
            return view ('users.sponsor')->withUsers($users);
        
    }
    public function guardian()
    {  
       
           $users = User::where('user_type', 'guardian')->get();
            return view ('users.guardian')->withUsers($users);
        
    }
} 
