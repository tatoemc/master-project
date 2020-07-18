@extends('main')

@section('title','|عرض')

@section('content')
<div class="row">
	 <div class="col-md-8">
		
	<div class="portlet-body">
      <div class="table-responsive">
		    <table class="table table-bordered">
		        <thead >
		            
		        </thead>
		        <tbody> 
		        	<tr>
		                 <p> <td > رقم المستخدم</td></p>
		                <td >{{ $user->id }}</td> 
		                <td colspan="2" > <img src="{{ asset('images/' . $user->images )}}" class="rounded"> </td>	                 
		            </tr>	        
		            <tr>
		                <td > البريد الالكتروني </td>
		                <td >{{ $user->email}}</td>  
		                   
		            </tr>
		            <tr>
		               <td > رقم الهاتف </td>
		                <td >{{ $user->phone }} </td> 
		            </tr>
		            <tr>
		               <td > تاريخ الانشاء</td>
		                <td >{{ date( 'M j, h:ia', strtotime($user->created_at)) }}</td> 
		            </tr>
		        </tbody>
		    </table>
		
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd>  </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($user->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('users.edit','تعديل',array($user->id),array('class'=>'btn btn-primary btn-block')) }}
					
                   
				</div>
				<div class="col-sm-6">
                      <!-- here is tow array !-->
					{!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE' ] ) !!}
          
                      {!! Form::submit('حذف', ['class'=> 'btn btn-danger btn-block' ]) !!}
                      {!! Form::close() !!}
					
				</div>
				
			</div>
		</div>
	</div>
</div>


@endsection