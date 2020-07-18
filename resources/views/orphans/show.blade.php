@extends('main')

@section('title','|عرض')

@section('content')
<div class="row">
	 <div class="col-md-8">
	 	<h1> <img src="{{ asset('images/' . $orphan->images) }}" class="rounded"> </h1>
		<hr>
		<h1> {{ $orphan->name }}</h1>
		<hr>
		<h1> {{ $orphan->gender }}</h1>
		<hr>
		<h1> {{ $orphan->school }}</h1>
		<hr>
		<h1> {{ $orphan->schoolLevel }}</h1>
		<hr>

	</div>
	<div class="col-md-4">
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
					 {{ Html::linkRoute('orphans.edit','تعديل',array($orphan->id),array('class'=>'btn btn-primary btn-block')) }}
					
                   
				</div>
				<div class="col-sm-6">
                      <!-- here is tow array !-->
					{!! Form::open(['route'=>['orphans.destroy', $orphan->id], 'method'=>'DELETE' ] ) !!}
          
                      {!! Form::submit('حذف', ['class'=> 'btn btn-danger btn-block' ]) !!}
                      {!! Form::close() !!}
					
				</div>
				
			</div>
		</div>
	</div>
</div>


@endsection