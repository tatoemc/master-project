
@include('partials._header')
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>منظمة القاسم | نظام الكفالة</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #364150;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            } 

            .full-height {
                height: 100vh;
            }
            

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
        </style>
    </head>
    <body> 
        <center>
       
       <div class="row">
        <font color="#ffffff">
        <img src="{{asset('logo.jpg') }}">
           <h1>منظمة العون الانساني - منظمة القاسم للعون الانساني</h1>
       </div>
       </font>
       </center>     

        <div class="container" style="margin-top:150px">    
                <div class="row">
                <div class="col-sm-8"> 
                    <div class="col-sm-4">              
                           <a href=" {{ route('register')}} " class="btn btn-lg btn-block btn-primary">تسجيل</a>
                           <a href=" {{ route('login')}} " class="btn btn-lg btn-block btn-primary">دخول</a>        
                    </div>                   
                      
                </div>
                
        </div><!-- end continar !-->
             
    </body>
</html>
