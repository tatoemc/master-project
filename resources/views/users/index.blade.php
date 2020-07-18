@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('users.create')}} " class="btn btn-lg btn-block btn-primary">انشاء مستخدم جديد</a>
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="portlet-body">
		<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<th>الرقم</th>
				<th>الاسم</th>
				<th>نوع المستخدم</th>
				<th>المستخدم</th>
				<th>رقم الهاتف</th>
				<th>البريد الالكتروني</th>
				<th>الولاية</th>
				<th>المدينة</th>
				<th>رقم المنزل</th>
				<th>تم الانشاء</th>
				<th></th>

			</thead>
			<tbody>
				@foreach($users as $user)
				<tr> 
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->user_type}}</td>
					<td>{{$user->gender}}</td>
					<td>{{$user->phone}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->state}}</td> 
					<td>{{$user->city}}</td>
					<td>{{$user->home_no}}</td>
					<td>{{ date('M j,Y', strtotime($user->created_at)) }}</td>

					<td><a href="{{ route('users.show',$user->id)}}" class="btn btn-primary btn-sm">عرض</a>  <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		</div>
		<div class="text-center">
			{!! $users->links();  !!}
		</div>
	</div>
</div>


@stop