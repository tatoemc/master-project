@extends('main')

@section('title','| انشاء رسالة')

@section('stylesheets')
{!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection

@section('content')

<div class="row"> 
	
		<div class="col-md-8 col-md-offset-2">
	        {!! Form::open(['route' => 'orphans.store',  'data-parsley-validate' => '', 'files' => 'ture','class'=>'dates' ]) !!}
	       

			{{form::label('')}}
			{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'اسم اليتيم' )) }}

			{{form::label('gender', 'النوع :')}}
			
			<select class="form-control" name="gender">
                  <option value='ذكر'> انثى </option>
                  <option value='ذكر'> ذكر </option>        	
            </select>

      {{form::label('')}}
			{{form::text('mother_name',null,array('class' => 'form-control','required' => '','placeholder'=>'اسم الوالده' )) }}

            {{form::label('mother_job', 'وظيفة الام :')}}
			<select class="form-control" name="mother_job">
                  <option value='ربة منزل'> ربة منزل </option>
                  <option value='موظفة'> موظفة </option>
                  <option value='اعمال حره'> اعمال حره </option>        	
            </select>

      {{form::label('')}}
			{{form::text('family',null,array('class' => 'form-control','required' => '','placeholder'=>'صلة قرابة الكافل' )) }}

			{{form::label('')}}
			{{form::text('brother_count',null,array('class' => 'form-control','required' => '','placeholder'=>'عدد الاخوة' )) }}

			{{form::label('')}}
			{{form::text('girl',null,array('class' => 'form-control','required' => '','placeholder'=>'عدد البنات' )) }}


			{{form::label('')}}
			{{form::text('boy',null,array('class' => 'form-control','required' => '','placeholder'=>'عدد الاولاد' )) }}

			{{form::label('helth_state', 'الحالة الصحية :')}}
			<select class="form-control" name="helth_state">
                  <option value='سليم'> سليم </option>
                  <option value='مرض مزمن'> مرض مزمن </option>      	
            </select>

			{{form::label('')}}
			{{form::text('father_date',null,array('class' => 'form-control','id'=>'u1','required' => '','placeholder'=>'تاريخ وقاة الوالد' )) }}

			{{form::label('')}}
			{{form::text('date',null,array('class' => 'form-control','id'=>'u1','autocomplete'=>'off','placeholder'=>'تاريخ الميلاد' )) }}


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
			{{form::text('school',null,array('class' => 'form-control','required' => '','placeholder'=>'اسم المؤسسة التعليمية' )) }}

      {{form::label('schoolLevel', 'المرحلة الدراسية:')}}
      <select class="form-control" name="schoolLevel">
                 <option value='التعليم قبل المدرسي'> التعليم قبل المدرسي </option>
                 <option value='الاساس'> الاساس </option> 
                 <option value='الثانوي'> الثانوي </option>         
            </select>

            {{form::label('images', 'صورة اليتيم:')}}
			{{form::file('images') }}

			{{form::label('cirtificate', 'شهادة الوفاة:')}}
			{{form::file('cirtificate') }}

			{{form::submit('create',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

			{!! Form::close() !!}
		</div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/bootstrap-datepicker.js') !!}

<script type="text/javascript">
 

  $(function() {
            $('.dates #u1').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
  $(function() {
            $('.dates #u2').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true,
                'multidate': true
            });

        });
</script>

 @endsection
