
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
    
    <div class="col-sm-7 pt-3 m-auto  bg-white">
       <h6 class="text-center fheader mb-2" >إضافة قبض أو صرف</h6>
                  <div class="card-body text-center">
                    <img src="{{asset('img/logo.jpg')}}" id="site_logo" alt="site_logo" srcset="">
                  </div>
     
            
              
              <form class="p-2" action="{{route('add_catch')}}" method="post"  id="req">
                           {{ csrf_field() }}
                           @if($errors)
                           @foreach($errors as $err)
                           <div class="alert alert-success alert-dismissible fade show  mr-auto ml-auto mb-3" role="alert">
                               {{$err}}   
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                            @endforeach
                           @endif
                                <div class="form-group row justify-content-center">
                          
                                        <label for="name" class="col-sm-3 col-form-label">الاسم</label>
                                        <div class="col-sm-7">
                                          <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="phone" class="col-sm-3 col-form-label">رقم الهاتف</label>
                                        <div class="col-sm-7">
                                          <input type="number" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="age" class="col-sm-3 col-form-label">العمر</label>
                                        <div class="col-sm-7">
                                          <input type="number" min="5" name="age" class="form-control" id="age" value="{{old('age')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="date" class="col-sm-3 col-form-label">التاريخ</label>
                                        <div class="col-sm-7">
                                          <input type="date" name="date"  class="form-control"
                                           id="date" placeholder="" value="{{old('date')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="total" class="col-sm-3 col-form-label">مبلغ الخدمة المقدمة</label>
                                        <div class="col-sm-7">
                                          <input type="number" name="total" class="form-control" id="total" value="{{old('total')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="payed" class="col-sm-3 col-form-label">المبلغ المدفوع</label>
                                        <div class="col-sm-7">
                                          <input type="number" name="payed" class="form-control" id="payed" value="{{old('payed')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="rest" class="col-sm-3 col-form-label">المبلغ المتبقي</label>
                                        <div class="col-sm-7">
                                          <input type="number" name="rest" class="form-control" id="rest" value="{{old('res')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="details" class="col-sm-3 col-form-label">تفاصيل الخدمة</label>
                                        <div class="col-sm-7">
                                          <textarea rows="6" name="details" class="form-control" id="details" placeholder="">value="{{old('details')}}"</textarea>
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                          
                                        <label for="editor" class="col-sm-3 col-form-label">محرر الطلب</label>
                                        <div class="col-sm-7">
                                          <input type="text" name="editor" class="form-control" id="editor" value="{{old('editor')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="editor" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-7">
                                                <input type="text" name="added1" class="form-control" id="added1" value="{{old('added1')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="editor" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-7">
                                                <input type="text" name="added2" class="form-control" id="added2" value="{{old('added2')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="editor" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-7">
                                                <input type="text" name="added3" class="form-control" id="added3" value="{{old('added3')}}">
                                        </div>
                                </div>
                                <div class="form-group  row justify-content-center">
                                        <label for="editor" class="col-sm-3 col-form-label"></label>
                                      
                                        <div class="col-sm-7">
                                                <input type="text" name="added4" class="form-control" id="added4" value="{{old('added4')}}">
                                        </div>
                                </div>
                                
                                <div class="form-group  row justify-content-center">
                                        <label for="editor" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-7">
                                                <input type="text" name="added5" class="form-control" id="added5" value="{{old('added5')}}">
                                        </div>
                                </div>
                           <hr>
                        <button type=""  class="btn btn-info searchbtn">إضافة</button>
                       
              </form>
              
    </div>
</div>
    <script src="{{asset('adminlte-rtl/plugins/jquery/jquery.min.js')}}"></script>
   {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
    <script>
        jQuery.extend(jQuery.validator.messages, {
    required: "هذا الحقل ضروري",
    number: "ادخل رقما صحيحا",
    minlength: jQuery.validator.format("ادخل رقم الجوال أكثر من 10 أحرف."),
    maxlength: jQuery.validator.format("ادخل رقم الجوال أقل من 12 حرف."),
});
    $( "#re" ).validate({
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
             url:'{{route("add_catch")}}',
             type: 'GET',
             data: $(form).serialize(),
             dataType : "json",
             success:function(data){
                 //console.log(data.ben);
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
    </script> --}}
    <script>
     $(document).on('keyup','#payed',function(){
         let total = $('#total').val();
         let payed  =$(this).val();
         let sum = total - payed;
         $('#rest').val(sum)
     })
    </script>
</body>
</html>