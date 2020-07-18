@extends('main')

@section('title','|عرض')
@section('stylesheets')
<script type="text/css">
p { font-family: TimesNewRoman; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; line-height: 20px; } 
</script>

@endsection


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
		                	بسم الله الرحمن الرحيم <br>
		                	منظمة القاسم للعون الانساني <br>
		                	أستمارة كفالة يتيم
		                    </h3>
		                    </strong></p>

		                </td>     
		         </tr>

                 </table>
             </div>
         </div>



   <div class="portlet-body">
      <div class="table-responsive">
		    <table class="table table-bordered">
		        <thead >
		            
		        </thead>
		        <tbody> 
		        	<tr>
		                 <p> <td > رقم الاستمارة</td></p>
		                <td >{{ $sponserform->id }}</td> 
		                <td colspan="2" > <img src="{{ asset('images/' . $sponserform->orphan->images )}}" class="rounded"> </td>

		                 
		            </tr>
		            <tr>
		                <td > تاريخ الكفالة </td>
		                <td >{{ date( 'M j Y', strtotime($sponserform->created_at)) }} </td> 
		                <td >عدد الاخوان </td>
		                <td >{{$sponserform->orphan->brother_count}} </td>
		            </tr>
		            <tr>
		                <td > أسم اليتيم </td>
		                <td >{{ $sponserform->orphan->name }}</td>  
		                <td > عدد الاخوان البنات </td>
		                <td >{{$sponserform->orphan->girl}} </td>   
		            </tr>
		            <tr>
		                <td > أسم ولي الامر </td>
		                <td > {{ $sponserform->orphan->user->name }}</td>  
		                <td > عدد الاخوان الاولاد </td>
		                <td >{{$sponserform->orphan->boy}} </td>     
		            </tr>
		            <tr>
		                <td > صلة القرابه </td>
		                <td >{{ $sponserform->orphan->family }}</td> 
		            </tr>
		            <tr>
		                <td > الحالة الصحيه </td>
		                <td >{{ $sponserform->orphan->helth_state }}</td>  
		            </tr>
		            <tr>
		                <td> النوع </td>
		                <td> {{ $sponserform->orphan->gender }} </td>
		                
		            </tr>
		            <tr>
		                <td> المرحلة الدراسية </td>
		                <td> {{ $sponserform->orphan->schoolLevel }} </td>
		            </tr>

		            <tr>
		                <td> اسم المدرسة </td>
		                <td> {{ $sponserform->orphan->school }} </td>
		            </tr>
		            <tr>
		                <td> قيمة الكفالة </td>
		                <td> {{ $sponserform->cache }} </td>
		            </tr>
		            <tr>
		                <td> العنوان </td>
		                <td> {{ $sponserform->orphan->state }} - {{ $sponserform->orphan->city }} - {{ $sponserform->orphan->unit }} | رقم المنزل : {{ $sponserform->orphan->home_no }} </td>
		            </tr>
		            <tr>
		                <td> # </td>
		                <td>
		                 @foreach($sponserform->users as $user)
		                  <li>{{ $user->name }}</li>
		                 @endforeach
		                  </td>
		            </tr>
		        </tbody>
		    </table>
</div>
</div>
</div>
</div>

@endsection