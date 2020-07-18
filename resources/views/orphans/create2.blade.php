@extends('main')

@section('title','| انشاء رسالة')

@section('content')

<div class="row"> 
	انشاء خاص بالموظف
		<div class="col-md-8 col-md-offset-2">
			        {!! Form::open(['route' => 'orphans.store',  'data-parsley-validate' => '', 'files' => 'ture' ]) !!}

					{{form::label('')}}
					{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'اسم اليتيم' )) }}

					{{form::label('guardian_id', 'القسم:')}}
					<select class="form-control" name="guardian_id">
						@foreach($users as $user)
                         <option value='{{ $user->id}}'> {{ $user->name}}</option>
                    	@endforeach
                    </select>

					{{form::label('gender', 'النوع :')}}
					
					<select class="form-control" name="gender"> 
                          <option value='ذكر'> انثى </option>
                          <option value='ذكر'> ذكر </option>        	
                    </select>

			
					{{form::label(' ')}}
					{{form::text('date',null,array('class' => 'form-control','required' => '','placeholder'=>'تاريخ الميلاد' )) }}

					
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


					{{form::label('')}}
					{{form::text('school',null,array('class' => 'form-control','required' => '','placeholder'=>'الصف' )) }}

					{{form::label('')}}
					{{form::text('schoolLevel',null,array('class' => 'form-control','required' => '','placeholder'=>'اسم المدرسه' )) }}

					

                    {{form::label('images', 'صورة الموظف:')}}
					{{form::file('images') }}



					{{form::submit('create',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

					{!! Form::close() !!}
		</div>
</div>

@endsection
