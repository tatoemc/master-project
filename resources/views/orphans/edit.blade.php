@extends('main')

@section('title','|تعديل')

@section('content')
<div class="row"> 
	<!-- to array here !--> 
	 
	 <div class="col-md-7">
	 	{!! Form::model($orphan, ['route'=>['orphans.update',$orphan->id] ,'method' => 'PUT', 'files' => 'ture']) !!}
	 

	 	{{form::label('name', 'الاسم رباعي :')}}
		{{ form::text('name', null , ["class"=>'form-control input-lg' ]) }}

		{{form::label('gender', 'النوع :')}} 
		<select class="form-control" name="gender">
         <option value='ذكر'> ذكر </option>   
         <option value='انثى'> انثى </option> 	
         </select>
        
        {{form::label('date', 'تاريخ الميلاد :')}} 
		{{ form::text('date', null,["class"=>'form-control' ]) }}

		{{form::label('state', 'الولاية :')}}
         <select class="form-control" name="state">
	         <option value='الخرطوم'> الخرطوم </option>
	         <option value='بحري'> بحري </option>  
	         <option value='ام درمان'> ام درمان </option>    	
         </select>

		{{form::label('city', 'المدينة :',['class'=>'form-spacing-top' ])}}
         <select class="form-control" name="city">
         <option value='الخرطوم'> الخرطوم </option>
         <option value='بحري'> بحري </option>  
         <option value='ام درمان'> ام درمان </option>      	
         </select>
		{{form::label('unit', 'الوحدة الاداريه :')}} 
		 <select class="form-control" name="unit">
         <option value='الخرطوم'> الخرطوم </option>     	
         </select>

		{{form::label('home_no', 'رقم المنزل :')}}
		{{ form::text('home_no', null, ["class"=>'form-control' ]) }}

		
		{{form::label('active', 'الوحدة الاداريه :')}} 
		 <select class="form-control" name="active">
         <option value='0'> غير مكفول </option>  
         <option value='1'> مكفول </option>     	
         </select>

		{{form::label('school', 'اسم المدرسه:',['class'=>'form-spacing-top' ])}}
		{{ form::text('school', null, ["class"=>'form-control' ]) }}

		{{form::label('schoolLevel', 'الصف:',['class'=>'form-spacing-top' ])}}
		{{ form::text('schoolLevel', null, ["class"=>'form-control' ]) }}
 
	
		{{form::label('images', 'تحديث صورة الموظف:'),['class'=>'form-spacing-top' ] }}
		{{form::file('images') }}
		
	</div>
	<div class="col-md-5">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($orphan->created_at)) }} </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($orphan->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('orphans.show','الغاء',array($orphan->id),array('class'=>'btn btn-danger btn-block')) }}
                   
				</div>
				<div class="col-sm-6">
                      {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}
				</div><!-- end form !-->
                 
			</div>
		</div>
	</div>

{!! Form::close() !!}
</div> <!-- end the form !-->

@endsection

