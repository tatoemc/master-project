@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-4">
<a href="#" class="btn btn-lg btn-block btn-primary"><strong>البريد المرسل</strong></a>
</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>رقم الخطاب</th>
				<th>نوع الخطاب</th>
				<th>عنوان الخطاب</th>
				<th>نص الخطاب</th>
				<th>تم الارسال في</th>
			</thead>
			<tbody>
				@foreach($latters as $latter)
				<tr>
					<th>{{$latter->id}}</th>
					<td>{{$latter->lattertype->name}}</td>
					<td>{{$latter->title}}</td>
					<td>{{ substr(strip_tags($latter->body), 0,100) }} {{ strlen(strip_tags($latter->body)) > 50 ? "...." : ""}}</td>
					<td>{{ date('M j,Y', strtotime($latter->created_at)) }}</td>
					<td><a href="{{ route('latters.show',$latter->id)}}" class="btn btn-primary btn-sm">عرض</a>  <a href="{{ route('latters.edit',$latter->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="text-center">
			
		</div>
</div>


@stop


