@extends('main')

@section('title','| انشاء رسالة')
@section('stylesheets')

 {!! Html::style('css/bootstrap-datepicker.css') !!} 
@endsection
@section('content')
<div class="row">
	
<div class="col-md-8 col-md-offset-2">

{!! Form::open(['route' => 'sponserforms.store', 'data-parsley-validate' => '','class'=>'dates']) !!}

					
            {{form::label('orphan_id', 'اسم اليتيم :')}}
			<select class="form-control" name="orphan_id">
				@foreach($orphans as $orphan)
	             <option value='{{ $orphan->id}}'> {{ $orphan->name}}</option>
	        	@endforeach
	        </select>
					
	        {{form::label('sponsor_id', 'اسم الكفيل:')}}
			<select class="form-control" name="sponsor_id">
				@foreach($sponsors as $sponsor)
	             <option value='{{ $sponsor->id}}'> {{ $sponsor->name}}</option>
	        	@endforeach
	        </select> 

	        {{form::label('cache', 'قيمة الكفالة:')}}
			{{form::text('cache',null,array('class' => 'form-control','required' => '' )) }}

			{{form::label('kafal_type', 'نوع الكفالة :')}}
					
					<select class="form-control" name="kafal_type">
                          <option value='نقداً'> نقداً </option>
                          <option value='شيك'> شيك </option>        	
                    </select>

             {{form::label('payment_type', 'طريقة الدفع :')}}
					
					<select class="form-control" name="payment_type">
                          <option value='سنويه'> سنويه </option>
                          <option value='نصف سنويه'> نصف سنويه </option> 
                          <option value='شهريه'> شهريه </option>        	
                    </select>

	        {{form::label('supervisor_id', 'المشرف:')}}
			<select class="form-control" name="supervisor_id">
				@foreach($supervisors as $supervisor)
	             <option value='{{ $supervisor->id}}'> {{ $supervisor->name}}</option>
	        	@endforeach
	        </select> 


			{{form::submit('انشاء',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

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
</script>

 @endsection