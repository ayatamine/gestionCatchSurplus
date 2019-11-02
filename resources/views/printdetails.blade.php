
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>إضافة صرف أو قبض</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte-rtl/plugins/font-awesome/css/font-awesome.css')}}">
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
        width: 50px; max-height: 50px;border-radius: 50%;
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
    .content{
        background: #F1F1F1;
    }
    </style>
</head>
<body >
<div class="content pt-4 pb-4">
    
    <div class="col-sm-7 pt-3 pb-4 m-auto  bg-white" style="direction:rtl">
        <div id="DivIdToPrint">
           <h6 class="text-center fheader mb-2" >تفاصيل العملية</h6>
           <div class="progress w-50 m-auto mb-3" style="height:0.3rem">
                <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
           </div>
           <div class="card-body border mt-3 text-right" style="word-spacing: 3px;" >
               <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
               قام العميل <strong>{{$catch_surplus->name}}</strong> هاتف رقم  <strong>{{$catch_surplus->phone}}</strong> 
               بتاريخ  <strong>{{$catch_surplus->date}}</strong> بدفع جزء من مبلغ  <strong>{{$catch_surplus->total}}</strong>
               المتبقي  <strong>{{$catch_surplus->rest}}</strong>
               <br><br>
               <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
               تفاصيل الخدمة : <strong>{{$catch_surplus->details}}</strong>
               <br><br>
               <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
               محرر الطلب : <strong>{{$catch_surplus->editor}}</strong>
           </div>
           @if($catch_surplus->added1 !='' || $catch_surplus->added2 !='' || $catch_surplus->added3 !='' ||
           $catch_surplus->added4 !='' || $catch_surplus->added5 !='' 
           )
           <h6 class="text-center fheader mb-2" >تفاصيل إضافية</h6>
           <div class="card-body border mt-3 text-right" style="word-spacing: 3px;" >
               
                <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                إضافة 1 : <strong>{{$catch_surplus->added1}}</strong>
                <br><br>
                <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                إضافة 2 : <strong>{{$catch_surplus->added2}}</strong>
                <br><br>
                <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                إضافة 3 : <strong>{{$catch_surplus->added3}}</strong>
                <br><br>
                <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                إضافة 4 : <strong>{{$catch_surplus->added4}}</strong>
                <br><br>
                <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                إضافة 5 : <strong>{{$catch_surplus->added5}}</strong>
            </div>
            @endif
        </div>
        <button class="btn btn-success float-left printbtn mt-2"
                onclick='printtag("DivIdToPrint")'>طباعة</button>
           <div class="mt-5" style="min-height: 41px;">
               <a href="{{route('editCach',['id'=>$catch_surplus])}}" class="btn btn-danger  float-right returnbtn ">رجوع</a>
               <a href="{{route('clientlist')}}" class="btn btn-primary float-left printbtn"
                >التالي</a>
           </div>
              
    </div>
</div>
    <script src="{{asset('adminlte-rtl/plugins/jquery/jquery.min.js')}}"></script>
    <script>
         function printtag(tagid) {
            var hashid = "#"+ tagid;
            var tagname =  $(hashid).prop("tagName").toLowerCase() ;
            var attributes = "";
            var attrs = document.getElementById(tagid).attributes;
                $.each(attrs,function(i,elem){
                attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
                })


            var divToPrint= $(hashid).html() ;
            var head = "<html dir='rtl'><head>"+ $("head").html() + "</head>" ;
            var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write(allcontent);
            newWin.document.close();
            // setTimeout(function(){newWin.close();},10);
            }
    </script>
</body>
</html>