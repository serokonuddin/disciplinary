@extends('layouts.app')

@section('content')
<style>
.table td, .table th {
    padding: .5rem;
    vertical-align: top;
}



</style>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" id="contentdetails">
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Disciplinary Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header">Employee Info</div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 140px">Employee Code</th>
                                            <td id="employee_codev" style="width: 150px"></td>
                                            <td style="width: 180px">

                                            </td>
                                            <td style="width: 140px"></td>
                                            <td rowspan="4" style="width: 100px"><img id="imageshowv" src="{{ asset('img/person.jpg') }}" style="width: 100px" /></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 140px">Name</th>
                                            <td id="employee_namev"></td>
                                            <td>Rank</td>
                                            <td id="rankv"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Designation</th>
                                            <td id="designationv"></td>
                                            <td>Organization</td>
                                            <td id="organizationv"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Location</th>
                                            <td id="locationv"></td>
                                            <td id="spdsv">SPDS :</td>
                                            <td id="lpdsv">LPDS :</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="card-header">Disciplinary Info</div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th scope="row">Go Date</th>
                                        <th id="go_datev"></th>
                                        <th>Offence</th>
                                        <th id="offencev"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nature Of Punishment</th>
                                        <th id="natureofpunishmentv"></th>
                                        <th>Punishment Line 1</th>
                                        <th id="pl1v"></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Punishment Line 2</th>
                                        <th id="pl2v"></th>
                                        <th>Remarks</th>
                                        <th id="remarksv"></th>
                                    </tr>
                                </table>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header">Disciplinary Info <input type="hidden" name="accesstoken" id="accesstoken" value="{{ $accesstoken }}" /></div>
                
                <div class="card-body">
                    <div class="col-md-12" style="marign-left: 200px">
                        <div class="alert alert-danger" id="alertmassage" role="alert" style="display: none;">
                            This is a danger alert—check it out!
                          </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 140px">Employee Code</th>
                                    <td id="employee_code" style="width: 150px"></td>
                                    <td style="width: 210px">
                                    
                                        <div class="col-md-9">
                                        <a href="JavaScript:Void(0)" style="display: inline" class="searchemployee"><img  src="{{ asset('img/search--v2.png')}}"></a>
                                        <input type="text" style="width: 200px;display: inline" name="search_employee" id="search_employee" class="form-control" placeholder="Search By Employee Code">
                                            
                                        </div>
                                   
                                        
                                    </td>
                                <td style="width: 140px"></td>
                                <td rowspan="4" style="width: 100px" ><img id="imageshow" src="{{ asset('img/person.jpg') }}" style="width: 100px" /></td>
                                </tr>
                                <tr>
                                    <th style="width: 140px">Name</th>
                                    <td id="employee_name"></td>
                                    <td>Rank</td>
                                    <td id="rank"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Designation</th>
                                    <td id="designation"></td>
                                    <td>Organization</td>
                                    <td id="organization"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Location</th>
                                    <td id="location"></td>
                                    <td id="spds">SPDS :</td>
                                    <td id="lpds">LPDS :</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12" >
                        <div class="card-header">Add a New Disciplinary Action</div> 
                        
                        <div class="col-md-12" >
                            <form class="needs-validation" novalidate>
                                <input type="hidden" name="employee_id" id="employee_id" value="0">
                                <input type="hidden" name="id" id="id" value="0">
                            {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="validationCustom01">Go Date</label>
                                        <input type="date" class="form-control"  id="go_date" name="go_date" value="" required>
                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="validationCustom03">Offence</label>
                                        <input type="text" name="offence_name" id="offence" autocomplete="off" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please write offence.
                                        </div>
                                        <div id="listOffence" ></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="natureofpunishment">Nature Of Punishment</label>
                                        <input type="text" name="natureofpunishment" id="natureofpunishment" autocomplete="off" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please write Nature of punishment.
                                        </div>
                                        <div id="natureofpunishmentlist" ></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="pl1">Punishment Line 1</label>
                                        <input type="text" name="pl1" class="form-control" id="pl1" required>
                                        <div class="invalid-feedback">
                                            Please provide a Punishment Line 1.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="pl2">Punishment Line 2</label>
                                        <input type="text" name="pl2" class="form-control" id="pl2" >
                                        
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-6">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" class="form-control" id="remarks" name="remarks" required>
                                        <div class="invalid-feedback">
                                            Please provide a remarks.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Action & Proccess</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="card-header">List of Disciplinary List</div> 
                        
                        <table class="table table-bordered">
                            <tr>
                                <th scope="row">Go Date</th>
                                <td >Offence</td>
                                <td>Nature of Punishment</td>
                                <td>Action</td>
                            </tr>
                            <tbody id="showDisciplinaryList">
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <script>
                    
                    $(function(){
                        getAlldata();
                        checkLogin();
                        $(document.body).on('click','#logout',function(){
                            var accesstoken=$('#accesstoken').val();
                            $.ajax({
                                        url:"{{url('/api/auth/logout')}}",
                                        method: "post",
                                        dataType: "json",
                                        data:{token:accesstoken},
                                        success:function(data){
                                            
                                                location.href = "{{url('/')}}";
                                            
                                        }
                            });
                        });
                        $(document.body).on('click','.viewd',function(){
                            checkLogin();
                            var id=$(this).data('id');
                            $.ajax({
                                    url:"{{url('/api/getDisciplinaryById')}}/"+id,
                                    method: "get",
                                    dataType: "json",
                                    success:function(data){
                                            $('#employee_namev').html(data.employee.employee_name);
                                            $('#employee_codev').html(data.employee.employee_code);
                                            $('#rankv').html(data.employee.ranks);
                                            $('#designationv').html(data.employee.designation);
                                            $('#organizationv').html(data.employee.organization);
                                            $('#locationv').html(data.employee.location);
                                            $('#spdsv').html("SPDS : "+data.employee.spds);
                                            $('#lpdsv').html("LPDS : "+data.employee.lpds);
                                            var urlimage="{{asset('img')}}/";
                                            
                                            $('#imageshowv').attr("src", urlimage+data.employee.image);
                                            
                                            
                                            $('#remarksv').html(data.remarks);
                                            $('#pl2v').html(data.punishment_line_2);
                                            $('#pl1v').html(data.punishment_line_1);
                                            $('#offencev').html(data.offence);
                                            $('#natureofpunishmentv').html(data.punishment_type);
                                            $('#go_datev').html(data.go_date);
                                    }
                            });
                        });
                        $(document.body).on('click','.deleted',function(){
                            checkLogin();
                            var id=$(this).data('id');
                            if (confirm("Are you sure delete this disciplinary?")) {
                                $.ajax({
                                        url:"{{url('/api/deleteDisciplinary')}}/"+id,
                                        method: "delete",
                                        dataType: "json",
                                        success:function(data){
                                            $("#alertmassage").html(data);
                                            $("#alertmassage").fadeIn();
                                            $("#alertmassage").fadeOut(10000);
                                            getAlldata();
                                        }
                                });
                            }
                            return false;
                            
                        });
                        $(document.body).on('click','.edit',function(){
                            checkLogin();
                            var id=$(this).data('id');
                            $.ajax({
                                    url:"{{url('/api/getDisciplinaryById')}}/"+id,
                                    method: "get",
                                    dataType: "json",
                                    success:function(data){
                                            $('#employee_name').html(data.employee.employee_name);
                                            $('#search_employee').val(data.employee.employee_code);
                                            $('#employee_code').html(data.employee.employee_code);
                                            $('#employee_id').val(data.employee.id);
                                            $('#rank').html(data.employee.ranks);
                                            $('#designation').html(data.employee.designation);
                                            $('#organization').html(data.employee.organization);
                                            $('#location').html(data.employee.location);
                                            $('#spds').html("SPDS : "+data.employee.spds);
                                            $('#lpds').html("LPDS : "+data.employee.lpds);
                                            var urlimage="{{asset('img')}}/";
                                            
                                            $('#imageshow').attr("src", urlimage+data.employee.image);
                                            
                                            
                                            $('#remarks').val(data.remarks);
                                            $('#pl2').val(data.punishment_line_2);
                                            $('#pl1').val(data.punishment_line_1);
                                            $('#offence').val(data.offence);
                                            $('#employee_id').val(data.employee_id);
                                            $('#id').val(data.id);
                                            $('#natureofpunishment').val(data.punishment_type);
                                            $('#go_date').val(data.go_date);
                                    }
                            });
                        });
                        $(document.body).on('change','.searchemployee',function(){
                            checkLogin();
                            var search_employee=$('#search_employee').val();
                            if(search_employee!=''){
                                
                                $.ajax({
                                    url:"{{url('/api/searchEmployee')}}",
                                    method: "POST",
                                    dataType: "json",
                                    data:{search_employee:search_employee},
                                    success:function(data){
                                        if(!data){
                                            $('#employee_name').html(data.employee_name);
                                            $('#employee_code').html(data.employee_code);
                                            $('#employee_id').val(data.id);
                                            $('#rank').html(data.ranks);
                                            $('#designation').html(data.designation);
                                            $('#organization').html(data.organization);
                                            $('#location').html(data.location);
                                            $('#spds').html("SPDS :"+data.spds);
                                            $('#lpds').html("LPDS :"+data.lpds);
                                            var urlimage="{{asset('img/')}}";
                                            
                                            $('#imageshow').attr("src", urlimage+'/'+data.image);
                                            getAlldata(data.id);
                                        }else{
                                            $('#employee_name').html('');
                                            $('#employee_code').html('');
                                            $('#employee_id').val('');
                                            $('#rank').html('');
                                            $('#designation').html('');
                                            $('#organization').html('');
                                            $('#location').html('');
                                            $('#spds').html("SPDS :");
                                            $('#lpds').html("LPDS :");
                                            var urlimage="{{asset('img/')}}";
                                            
                                            $('#imageshow').attr("src", urlimage+'/person.jpg');
                                            
                                        }
                                       
                                    }
                                });
                            }
                        });
                        $(document.body).on('change','#search_employee',function(){
                            checkLogin();
                            var search_employee=$(this).val();
                            if(search_employee!=''){
                                
                                $.ajax({
                                    url:"{{url('/api/searchEmployee')}}",
                                    method: "POST",
                                    dataType: "json",
                                    data:{search_employee:search_employee},
                                    success:function(data){
                                        
                                        
                                        if(data.employee_name!=undefined){
                                            
                                            $('#employee_name').html(data.employee_name);
                                            $('#employee_code').html(data.employee_code);
                                            $('#employee_id').val(data.id);
                                            $('#rank').html(data.ranks);
                                            $('#designation').html(data.designation);
                                            $('#organization').html(data.organization);
                                            $('#location').html(data.location);
                                            $('#spds').html("SPDS :"+data.spds);
                                            $('#lpds').html("LPDS :"+data.lpds);
                                            var urlimage="{{asset('img/')}}";
                                            
                                            $('#imageshow').attr("src", urlimage+'/'+data.image);
                                            $("#alertmassage").fadeOut();
                                            getAlldata(data.id);
                                        }else{

                                            $('#employee_name').html('');
                                            $('#employee_code').html('');
                                            $('#employee_id').val('');
                                            $('#rank').html('');
                                            $('#designation').html('');
                                            $('#organization').html('');
                                            $('#location').html('');
                                            $('#spds').html("SPDS :");
                                            $('#lpds').html("LPDS :");
                                            var urlimage="{{asset('img/')}}";
                                            
                                            $('#imageshow').attr("src", urlimage+'/person.jpg');
                                            $("#alertmassage").html('Employee Not Found! Try another employee code');
                                            $("#alertmassage").fadeIn();
                                            $("#alertmassage").fadeOut(10000);
                                        }
                                    
                                    }
                                });
                            }
                        });
                        $(document.body).on('keyup','#offence',function(){
                            checkLogin();
                            var offencesearch=$(this).val();
                            if(offencesearch!=''){
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url:"{{url('/api/searchOffence')}}",
                                    method: "POST",
                                    dataType: "json",
                                    data:{offence:offencesearch,_token:_token},
                                    success:function(data){
                                        $('#listOffence').fadeIn();
                                        
                                        var offenceview='<ul class="dropdown-menu" style="padding: 10px;display: block;position: relative">';
                                        $.each(data, function(i, value) {
                                            offenceview=offenceview+'<li class="offenceselect"><a href="JavaScript:Void(0);">'+value.offence_name+'</a></li>';
                                        });
                                        offenceview=offenceview+'</ul>';
                                        $('#listOffence').html(offenceview)
                                    }
                                });
                            }
                        });
                        $(document.body).on('click','.offenceselect',function(){
                            checkLogin();
                            var value=$(this).text();
                            $('#offence').val(value);

                            $('#listOffence').fadeOut();
                        });

                        $(document.body).on('keyup','#natureofpunishment',function(){
                            var punishment=$(this).val();
                            checkLogin();
                            if(punishment!=''){
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url:"{{url('/api/searchPunishment')}}",
                                    method: "POST",
                                    dataType: "json",
                                    data:{punishment:punishment,_token:_token},
                                    success:function(data){
                                        $('#natureofpunishmentlist').fadeIn();
                                        
                                        var offenceview='<ul class="dropdown-menu" style="padding: 10px;display: block;position: relative">';
                                        $.each(data, function(i, value) {
                                            offenceview=offenceview+'<li class="punishmentselect"><a href="JavaScript:Void(0);">'+value.punishment_type+'</a></li>';
                                        });
                                        offenceview=offenceview+'</ul>';
                                        $('#natureofpunishmentlist').html(offenceview)
                                    }
                                });
                            }
                        });
                        $(document.body).on('click','.punishmentselect',function(){
                            var value=$(this).text();
                            checkLogin();
                            $('#natureofpunishment').val(value);

                            $('#natureofpunishmentlist').fadeOut();
                        });
                    });
                    function checkLogin(){
                        
                        var accesstoken=$('#accesstoken').val();
                       
                        $.ajax({
                                    url:"{{url('/api/auth/me')}}",
                                    method: "post",
                                    dataType: "json",
                                    data:{token:accesstoken},
                                    success:function(data){
                                        
                                        if(typeof data.name === 'undefined'){
                                            
                                            location.href = "{{url('/')}}";
                                        }else{
                                            
                                            $('#navbarDropdown').html(data.name);
                                        }
                                    }
                        });

                    }
                    function getAlldata(id=0){
                          
                                 $.ajax({
                                    url:"{{url('/api/getDisciplinary')}}/"+id,
                                    method: "get",
                                    dataType: "json",
                                    success:function(data){
                                        
                                        var alldata='';
                                        $.each(data, function(i, value) {
                                            alldata=alldata+'<tr>';
                                            alldata=alldata+'<th scope="row">'+value.go_date+'</th>';
                                            alldata=alldata+'<th scope="row">'+value.offence+'</th>';
                                            alldata=alldata+'<th scope="row">'+value.punishment_type+'</th>';
                                            alldata=alldata+'<th scope="row"><img src="{{asset("img/edit.png")}}" class="edit" data-id="'+value.id+'" style="cursor: pointer" /> | <button type="button" class="viewd" data-id="'+value.id+'" data-toggle="modal" data-target="#exampleModalCenter"><img src="{{asset("img/view.png")}}" style="cursor: pointer"  /></button> | <img src="{{asset("img/delete.png")}}"  class="deleted" data-id="'+value.id+'" style="cursor: pointer" /></th>';
                                            alldata=alldata+'</tr>';
                                        });
                                        
                                        $('#showDisciplinaryList').html(alldata)
                                    }
                                });
                        }
                    
                    </script>
                    <tr>
                        <th scope="row">Go Date</th>
                        <td >Offence</td>
                        <td>Nature of Punishment</td>
                        <td>Action</td>
                    </tr>
                    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            }
                            event.preventDefault();
                            event.stopPropagation();
                            form.classList.add('was-validated');
                            var employee_id=$('#employee_id').val();
                            var id=$('#id').val();
                            var go_date=$('#go_date').val();
                            var natureofpunishment=$('#natureofpunishment').val();
                            var offence=$('#offence').val();
                            var pl1=$('#pl1').val();
                            var pl2=$('#pl2').val();
                            var remarks=$('#remarks').val();

                            if(employee_id!=0){
                                var _token = $('input[name="_token"]').val();
                                if(id!=0){
                                    var urllink="{{url('/api/updateDisciplinary')}}/"+id;
                                    var mathodurl="PUT";
                                }else{
                                    var urllink="{{url('/api/createDisciplinary')}}";
                                    var mathodurl="POST";
                                }
                                
                                $.ajax({
                                    url:urllink,
                                    method: mathodurl,
                                    dataType: "json",
                                    data:{id:id,employee_id:employee_id,go_date:go_date,natureofpunishment:natureofpunishment,offence:offence,pl1:pl1,pl2:pl2,remarks:remarks,_token:_token},
                                    success:function(data){
                                            $('#employee_name').html('');
                                            $('#search_employee').val('');
                                            $('#employee_code').html('');
                                            $('#employee_id').val('');
                                            $('#rank').html('');
                                            $('#designation').html('');
                                            $('#organization').html('');
                                            $('#location').html('');
                                            $('#spds').html("SPDS :");
                                            $('#lpds').html("LPDS :");
                                            var urlimage="{{asset('img/')}}";
                                            
                                            $('#imageshow').attr("src", urlimage+'/person.jpg');
                                            $("#alertmassage").html(data);
                                            $("#alertmassage").fadeIn();
                                            $("#alertmassage").fadeOut(10000);
                                            $('#remarks').val('');
                                            $('#pl2').val('');
                                            $('#pl1').val('');
                                            $('#offence').val('');
                                            $('#employee_id').val('0');
                                            $('#id').val('0');
                                            $('#natureofpunishment').val('');
                                            $('#go_date').val('');
                                            getAlldata();
                                    }
                                });
                            }else{
                                alert("Add Employee with Search Box");
                            }
                            
                        }, false);
                        });
                    }, false);
                    })();
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
