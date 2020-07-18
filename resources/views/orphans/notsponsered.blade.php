@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
<div class="col-sm-10">
	<div class="portlet-body">
      <div class="table-responsive">
		    <table border="0"> 
		        <thead >
		            
		        </thead> 
		        <tbody>
                </tbody>

                 <tr> 
		                <td width="150" height="150" > <img src="{{asset('logo2.png') }}"> </td>
		                <td >
		                	<p><strong>
		                	<h3>
		                	منظمة القاسم للعون الانساني <br>
	 	                	الايتام الغير المكفولين
		                    </h3>
		                    </strong></p>

		                </td>     
		           
		         </tr>

                 </table>
             </div>
         </div>
</div>


<div class="row">
	
<div class="col-md-5">
	
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				
				<th>الاسم</th> 
				<th>اسم ولي الامر</th>
				<th>تاريخ الميلاد</th>
				<th>النوع</th>
				<th>المرحلة الدراسية</th>
				<th>اسم المدرسه</th>
				<th>الحالة</th>
				<th></th> 

			</thead> 
			<tbody>	   
			@foreach ($orphans as $orphan) 
			  <tr>	
			   <td> {{ $orphan->name }} </td>	
			   <td> {{ $orphan->user->name }} </td>
			   <td> {{ $orphan->date }} </td>
			   <td> {{ $orphan->gender }} </td>
			   <td> {{ $orphan->schoolLevel }} </td>
			   <td> {{ $orphan->school }} </td>
			   <td>{{ date('M j,Y', strtotime($orphan->created_at)) }}</td>

					<td><a href="{{ route('orphans.show',$orphan->id)}}" class="btn btn-primary btn-sm">عرض</a>  <a href="{{ route('orphans.edit',$orphan->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>
			  </tr>               
			 @endforeach
			</tbody>
			
		</table>
		<div class="text-center">
			
		</div>
	</div>
</div>


@stop