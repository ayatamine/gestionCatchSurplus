
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>صفحة الإستعلام</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        @font-face {font-family: 'segoeui';
            src: url("/css/segoeui.ttf");
            src: url("/css/segoeui.ttf") format("embedded-opentype"),
            url("/css/segoeui.ttf") format("truetype"); 
            font-weight: normal;
            font-style: normal;
        }
        .container{padding-top: 50px}
        .fheader{color: #ff4600;margin-bottom:0.9rem}
        .progress{    height: 0.5rem;margin-bottom:1.6rem }
        .spac{    height: 1.9rem;
          background-color: #daedf4;
          border-color: #a1ddf3;
        }
        form{
            padding:30px 0;
        }
        .searchbtn{
            background: #59bddf!important;
            border: 0;
            border-radius: 20px;
            padding: 4px 20px;
        }
        .form-control{    border-radius: 20px;
    background: #eeeeee;}
    .form-control:focus{
        box-shadow: none;
    }
    label{text-align:right;font-family:segoeui;    color: #656565; }
    #site_logo{
        max-height: 120px;
    }
    label.error{
        color: red;float: right;
        font-weight: 500;
        margin-bottom: 0;
    }
    .top-right.text-right a{
        color: #989090;
        padding: 5px;
    }
    </style>
</head>
<body >
    <div class="container">
        <div class="top-right  text-right">
            @auth
                @if(Auth::user()->admin)
                <a href="{{ url('/admin-cpx') }}">لوحة التحكم</a>  
                <a href="{{ url('/logout') }}">تسجيل الخروج</a>
                @endif
            @else
                <a href="{{ route('login') }}"> تسجيل الدخول</a>
                <!--
                <a href="{{ route('front.benificier') }}">صفحة الاستعلام </a>
                -->
               
            @endauth
        </div>
                  <div class="card-body text-center">
                    <img src="{{asset('img/'.$settings->logo)}}" id="site_logo" alt="site_logo" srcset="">
                  </div>
     
              <h4 class="text-right fheader" >الإستعلام عن بيانات المستفيد</h4>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <button type="button" class="btn  btn-lg btn-block spac"></button>
              
              <form  onsubmit="event.preventDefault()"  id="req">
                  {{ csrf_field() }}
                        <div class="row">
                                <div class="form-group col-md-6 row">
                          
                                        <label for="staticname" class="col-sm-5 col-form-label">اسم صاحب السجل المدني</label>
                                        <div class="col-sm-7">
                                          <input type="text" readonly class="form-control" id="staticname" placeholder="">
                                        </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                        <label for="id_number" class="col-sm-5 col-form-label">السجل المدني</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control" name="id_number" id="id_number" placeholder="">
                                        </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-6 row">
                          
                                        <label for="file_number" class="col-sm-5 col-form-label">رقم التسجيل في جمعية البر</label>
                                        <div class="col-sm-7">
                                          <input type="text" name="file_number" class="form-control" id="file_number" placeholder="">
                                        </div>
                                </div>
                                <div class="form-group col-md-6 row">
                                        <label for="inputbenificied" class="col-sm-5 col-form-label">هل هو مستفيد من جمعية البر؟</label>
                                        <div class="col-sm-7">
                                          <input type="text"  style="    color: #0baf0b;font-weight: bold;" class="form-control"
                                           id="inputbenificied" placeholder="">
                                        </div>
                                </div>
                        </div>
                        <hr>
                        <button type=""  class="btn btn-info searchbtn">بحث</button>
                       
              </form>
              
    </div>
    <script src="{{asset('adminlte-rtl/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>
        jQuery.extend(jQuery.validator.messages, {
    required: "هذا الحقل ضروري",
    number: "ادخل رقما صحيحا",
    minlength: jQuery.validator.format("ادخل رقم الجوال أكثر من 10 أحرف."),
    maxlength: jQuery.validator.format("ادخل رقم الجوال أقل من 12 حرف."),
});
    $( "#req" ).validate({
        rules: {
             
            file_number: {
            number: true
            },
            id_number: {
            required :true,
            number: true
            }
            
        },
        submitHandler: function(form) {
           
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
            });
           $.ajax({
             url:'/search_benificier',
             type: 'GET',
             data: $(form).serialize(),
             dataType : "json",
             success:function(data){
                 console.log(data.ben);
                 if(data.res == "yes"){
                     $("#staticname").val(data.ben.name);
                     $("#id_number").val(data.ben.id_number);
                     $("#file_number").val(data.ben.file_number);
                     $("#inputbenificied").val('نعم');
                 }else{
                    $("#staticname").val('');
                     $("#inputbenificied").val('لا');
                 }
             }
           });
         
         }
    
        });
    </script>
</body>
</html>