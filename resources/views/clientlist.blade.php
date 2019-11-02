
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>قائمة العملاء</title>
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
    i.fa{cursor: pointer}
    #clientlist i.fa{
        font-size: 0.9rem;
        opacity: 0.8;
        position: relative;
        top: 4px;
    }
    .dataTables_paginate{float: left}
    .dataTables_length select{
        width: 77px;
    margin: 0 10px;
    }
    .dataTables_length label{
    display: flex;
    }
    </style>
</head>
<body >
<div class="content pt-4 pb-4">
    
    <div class="col-sm-11 pt-3 m-auto  bg-white">
       <!-- /.card-header -->
       <div class="card-body">
            <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="clientlist" class="table table-bordered table-striped text-right">
                        <thead>
                            <tr>
                                
                              <th>#</th>
                              <th><i class="fa fa-arrow-up float-right">
                                  </i><i class="fa fa-arrow-down float-right ml-3"></i>الاسم 
                              </th>
                              <th><i class="fa fa-arrow-up float-right">
                                </i><i class="fa fa-arrow-down float-right ml-3"></i>التاريخ</th>
                              <th><i class="fa fa-arrow-up float-right">
                                </i><i class="fa fa-arrow-down float-right ml-3"></i>مبلغ الخدمة</th>
                              <th><i class="fa fa-arrow-up float-right">
                                </i><i class="fa fa-arrow-down float-right ml-3"></i>المبلغ المدفوع</th>
                              <th><i class="fa fa-arrow-up float-right">
                                </i><i class="fa fa-arrow-down float-right ml-3"></i>المبلغ المتبقي</th>
                              {{-- <th> الصورة</th> --}}
                              <th ></th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @if(count($clientlist) > 0)
                            @foreach($clientlist as $client)
                            <tr>
                                
                                <td>
                                    {{$i++}}
                                </td>
                                <td>{{$client->name}}</td>
                                <td>{{date('Y-m-d',strtotime($client->date))}}</td>
                                <td>{{$client->total}}</td>
                                <td data-payed="{{$client->id}}">{{$client->payed}}</td>
                                <td data-rest="{{$client->id}}">{{$client->rest}}</td>
                                <td>
                                     <a class="text-decoration-none" href="{{route('editCach',['id'=>$client->id])}}">
                                     <i class="fa fa-pencil text-success editClient"></i>
                                    </a>
                                     
                                     <i class="fa fa-eye text-primary mr-2 moredetails"
                                     data-toggle="modal" data-target="#moredetail"
                                     data-name='{{$client->name}}'
                                     data-age='{{$client->age}}'
                                     data-phone='{{$client->phone}}'
                                     data-details='{{$client->details}}'
                                     data-ad1='{{$client->added1}}'
                                     data-ad2='{{$client->added2}}'
                                     data-ad3='{{$client->added3}}'
                                     data-ad4='{{$client->added4}}'
                                     data-ad5='{{$client->added5}}'
                                     > </i>
                                     <i class="fa fa-trash text-danger mr-2 deleteClient" data-id="{{$client->id}}"></i>
                                     <i class="fa fa-money text-info mr-2 payrest" data-id="{{$client->id}}"
                                         data-rest="{{$client->rest}}" 
                                         aria-hidden="true"></i>
                                </td> 
                                
                               
                              </tr>
                         
                            @endforeach
                            @endif
                        
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
            </div>
    </div>
    <!-- /.card-body -->
    <!-- Modal -->
      <div class="modal fade text-right" id="moredetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تفاصيل العميل</h5>
              <button type="button" class="close p-0 m-0" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                   الاسم : <strong id="nm"></strong>
                    <br><br>
                    <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                   العمر : <strong id="age"></strong>
                    <br><br>
                    <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                   الهاتف : <strong id="ph"></strong>
                    <br><br>
                    <i class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                   التفاصيل : <strong id="det"></strong>
                    <br><br>
                    <hr>
                    <div class="added">
                      <h6 class="text-danger">تفاصيل إضافية</h6>
                      <div id="ad1">
                      <i  class="fa fa-circle ml-2" style="font-size: 0.7rem;color: #5a5a5a;"></i>
                      إضافة 1 : <strong >dsf</strong>
                      </div>
                      <br> 
                    </div>
                    

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
          </div>
        </div>
      </div>
    
             
          
              
    </div>
</div>
    <script src="{{asset('adminlte-rtl/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('adminlte-rtl/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    
<script src="{{asset('adminlte-rtl/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte-rtl/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>

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
$(function () {
       $('#clientlist').DataTable({
         "language": {
            "paginate": {
                "next": "بعدی",
                "previous" : "قبلی"
            }
        }, 
      "info" : false,
      
    });
  });

     $(document).on('click','.moredetails',function(){
      let name = $(this).data('name');
      let age = $(this).data('age');
      let phone = $(this).data('phone');
      let details = $(this).data('details');
     
      
       $('.modal  #nm').text(name);
       $('.modal  #age').text(age);
       $('.modal #ph').text(phone);
       $('.modal  #det').text(details);
        //the added field
         
      let ad1 = $(this).data('ad1');
      let ad2 = $(this).data('ad2');
      let ad3 = $(this).data('ad3');
      let ad4 = $(this).data('ad4');
      let ad5 = $(this).data('ad5');
       if(ad1.length > 0){
         $('.modal  #ad1 strong').text(ad1);  
         $('.modal  #ad1').removeClass('d-none');  
       }
       if(ad1.length > 0){
        $('.modal #ad2 strong').text(ad2); 
         $('.modal  #ad2').removeClass('d-none');  
       }
       if(ad1.length > 0){
        $('.modal  #ad3 strong').text(ad3); 
         $('.modal  #ad3').removeClass('d-none');  
       }
       if(ad1.length > 0){
        $('.modal  #ad4 strong').text(ad4);
         $('.modal  #ad4').removeClass('d-none');  
       }
       if(ad1.length > 0){
        $('.modal  #ad5 strong').text(ad5); 
         $('.modal  #ad5').removeClass('d-none');  
       }
       
       
       
       
       
       
     });
     //delete client
     $(document).on('click','.deleteClient',function(){
         let id = $(this).data('id');
         var dat = $(this);
        Swal.fire({
            text: 'سيتم حدف العميل',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#E64545',
            confirmButtonText: 'نعم !'
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        method:'get',
                        url:'{{route("deleteclient")}}',
                        data:{_token:$('meta[name="csrf-token"]').attr('content'),clientid:id},
                        dataType : 'json',
                        success:function(res){
                           
                            Swal.fire({
                            text: res.data,
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#E64545',
                            })  
                            $(dat).parent().parent().remove();
                        }
                    })
                }
            }
            )
        });
        //pay rest 
        $(document).on('click','.payrest',function(){
            var dat = $(this);
            let clientid = $(this).data('id');
            let rest = $(this).data('rest');
            Swal.fire({
               title: 'أضف مبلغ الدفع ',
               html:'<h6>المبلغ المتبقي :'+rest+'</h6>',
               input: 'number',
               inputAttributes: {
               min: 1,
               max: rest,
               step: 1
               },
               showCancelButton: true,
               confirmButtonText: 'Submit',
           }).then((quantity) => {
                 if(quantity.value > 0){
                   $.ajax({
                        method:'get',
                        url:'{{route("payrest")}}',
                        data:{_token:$('meta[name="csrf-token"]').attr('content'),clientid:clientid,payed:quantity.value},
                        dataType : 'json',
                        success:function(res){
                           
                            Swal.fire({
                            text: res.data,
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            })  

                            $('td[data-payed="'+clientid+'"]').text(res.payed);
                            $('td[data-rest="'+clientid+'"]').text(res.rest);
                            $(dat).data('rest',res.rest);
                        }
                    })
                }
                
           })
        })
    </script>
</body>
</html>