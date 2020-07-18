@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('sponserforms.create')}} " class="btn btn-lg btn-block btn-primary">أضافة كفالة</a>
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
				<th>رقم الاستماره</th>
				<th>قيمة الكفالة</th>
				<th>اسم اليتيم</th>
				<th>اسم ولي الامر</th>
				<th>المرحلة الدراسية</th>
				<th>اسم المؤسسة التعليمية</th>
				<th>تاريخ الكفالة</th>
				 
			</thead> 
			<tbody>
				@foreach($sponserforms as $sponserform)
				<tr>
					<th>{{$sponserform->id}}</th>
					<td>{{$sponserform->cache}}</td>
					<td>{{$sponserform->orphan->name}}</td>
					<td>{{$sponserform->orphan->user->name}}</td>
					<td>{{$sponserform->orphan->schoolLevel}}</td>
					<td>{{$sponserform->orphan->school}}</td>
					
					<td>{{ date('M j,Y', strtotime($sponserform->created_at)) }}</td>
					<td><a href="{{ route('sponserforms.show',$sponserform->id)}}" class="btn btn-primary btn-sm">عرض</a>  <a href="{{ route('sponserforms.edit',$sponserform->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $sponserforms->links();  !!}
		</div>
	</div>
</div>


@stop