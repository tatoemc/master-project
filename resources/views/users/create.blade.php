@extends('main')

@section('title','| انشاء رسالة')

@section('content')

<div class="row"> 
	
		<div class="col-md-8 col-md-offset-2">
			        {!! Form::open(['route' => 'users.store', 'data-parsley-validate' => '', 'files' => 'ture' ]) !!}

					{{form::label('')}}
					{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'الاسم' )) }}

					{{form::label('user_type', 'نوع المستخدم :')}} 
					<select class="form-control" name="user_type">
						<option value='user'> موظف </option> 
                         <option value='sponsor'> كافل </option>                   
                         <option value='guardian'> ولي امر </option>
                         <option value='supervisor'> مشرف </option>      	
                    </select>  
 
					{{form::label(' ')}}
					{{form::text('email',null,array('class' => 'form-control','required' => '','placeholder'=>'البريد الالكتروني' )) }}

					{{form::label('')}}
					{{form::text('password',null,array('class' => 'form-control','required' => '','placeholder'=>'كلمة المرور' )) }}

 
					{{form::label('')}}
					{{form::text('confirm_password',null,array('class' => 'form-control','required' => '','placeholder'=>'تأكيد كلمة المرور' )) }}
					
					{{form::label('gender', 'النوع :')}}
					
					<select class="form-control" name="gender">
                          <option value='ذكر'> انثى </option>
                          <option value='ذكر'> ذكر </option>        	
                    </select>

					{{form::label('')}}
					{{form::text('phone',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الهاتف' )) }}

					{{form::label('')}}
					{{form::text('phone2',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم الهاتف' )) }}

					
					{{form::label('state', 'الولاية:')}}
					
                     <select class="form-control" name="state">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select> 
					{{form::label('city', 'المدينة:')}}
					<select class="form-control" name="city">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select>

					{{form::label('unit', 'المحلية:')}}
					<select class="form-control" name="unit">
                         <option value='الخرطوم'> الخرطوم </option>
                         <option value='امدرمان'> امدرمان </option> 
                         <option value='بحري'> بحري </option>        	
                    </select>

					{{form::label('')}}
					{{form::text('home_no',null,array('class' => 'form-control','required' => '','placeholder'=>'رقم المنزل' )) }}

                    {{form::label('images', 'صورة الموظف:')}}
					{{form::file('images') }}



					{{form::submit('create',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

					{!! Form::close() !!}
		</div>
</div>

@endsection
