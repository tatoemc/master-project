@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">التسجيل</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">الاسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
 
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">تأكيد كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">نوع المستخدم</label>

                            <div class="col-md-6">                             
                                <select class="form-control" name="user_type" id="user_type" required autofocus>                                
                                     <option value='sponsor'> كافل </option>                   
                                     <option value='guardian'> ولي امر </option>
                                      
                                </select> 

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">النوع</label>

                            <div class="col-md-6">
                               <select id="gender" class="form-control" name="gender" required autofocus>
                                  <option value='ذكر'> انثى </option>
                                  <option value='ذكر'> ذكر </option>            
                              </select>
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">رقم الهاتف</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="اجباري" required autofocus>
 
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                            <label for="phone2" class="col-md-4 control-label">رقم هاتف اخر</label>

                            <div class="col-md-6">
                                <input id="phone2" type="text" class="form-control" name="phone2" value="{{ old('phone2') }}" placeholder="اختياري" required autofocus>
 
                                @if ($errors->has('phone2'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">الولاية</label>

                            <div class="col-md-6">
                                  <select id="state" class="form-control" name="state" required autofocus>
                                     <option value='الخرطوم'> الخرطوم </option>
                                     <option value='امدرمان'> امدرمان </option> 
                                     <option value='بحري'> بحري </option>           
                                </select> 
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">المدينة</label>

                            <div class="col-md-6">
                            
                             <select id="city" class="form-control" name="city" required autofocus>
                                 <option value='الخرطوم'> الخرطوم </option>
                                 <option value='امدرمان'> امدرمان </option> 
                                 <option value='بحري'> بحري </option>           
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                            <label for="unit" class="col-md-4 control-label">الوحدة الادارية</label>

                            <div class="col-md-6">
                                
                                <select id="unit" class="form-control" name="unit" required autofocus>
                                     <option value='الخرطوم'> الخرطوم </option>
                                     <option value='امدرمان'> امدرمان </option> 
                                     <option value='بحري'> بحري </option>           
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home_no') ? ' has-error' : '' }}">
                            <label for="home_no" class="col-md-4 control-label">رقم المنزل</label>

                            <div class="col-md-6">
                                <input id="home_no" type="text" class="form-control" name="home_no" value="{{ old('home_no') }}" required autofocus>
 
                                @if ($errors->has('home_no'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('home_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                            <label for="images" class="col-md-4 control-label">الصورة</label>

                            <div class="col-md-6">
                                <input id="images" type="file" class="form-control" name="images" value="{{ old('images') }}">
 
                                @if ($errors->has('images'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   تسجيل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
