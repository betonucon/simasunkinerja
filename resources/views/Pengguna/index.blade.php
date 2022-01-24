@extends('layouts.web')

@push('style')
    <style>
        #style-3::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px #fff;
            background-color: #fff;
        }

        #style-3::-webkit-scrollbar
        {
            width: 3px;
            background-color: #F5F5F5;
        }

        #style-3::-webkit-scrollbar-thumb
        {
            background-color: #fff;
        }
        .table td{
            background-color: #fff;
            vertical-align: top !important;
        }

    </style>
@endpush
@section('conten')   
        
        <div id="content" class="content">
			<h1 class="page-header">{{$menu}} <small>{{name()}}</small></h1>
            
            <div class="col-xl-12 ui-sortable">
                <div class="panel panel-inverse" data-sortable-id="ui-general-1">
						<!-- begin panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">&nbsp;</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
						<!-- end panel-heading -->
						<!-- begin panel-body -->
					<div class="panel-body">
                        
                        <h1 class="page-header">
                            <span class="btn btn-sm btn-blue" onclick="tambah()"><i class="fas fa-user-plus"></i> Buat Pengguna</span>
                            <span class="btn btn-sm btn-danger" onclick="hapus()"><i class="fas fa-trash-alt"></i> Hapus</span>
                            <span class="btn btn-sm btn-green" onclick="reset_password()"><i class="fas fa-user-alt"></i> Reset Password</span>
                        </h1>
                        <form id="all-data" onkeypress="return event.keyCode != 13"  action="{{url('/Pengguna')}}" method="post" enctype="multipart/form-data">
							@csrf
                            <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="3%"></th>
                                        <th width="5%"></th>
                                        <th width="5%">Act</th>
                                        <th width="10%" class="text-nowrap">Username</th>
                                        <th width="20%" class="text-nowrap">Name</th>
                                        <th width="8%" class="text-nowrap">Role</th>
                                        <th class="text-nowrap">Akses</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(user_get() as $no=>$o)
                                        <tr class="odd gradeX">
                                            <td width="1%" >{{$no+1}}</td>
                                            <td width="1%"><input type="checkbox" name="id[]" value="{{$o->username}}"></td>
                                            <td width="1%"><span class="btn btn-xs btn-green" onclick="ubah(`{{$o->username}}`)"><i class="fas fa-pencil-alt"></i></span></td>
                                            <td>{{$o->username}}</td>
                                            <td>{{$o->name}}</td>
                                            <td>{{aksesnya($o->akses)}}</td>
                                            <td>{!!akses_get($o->username)!!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$menu}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-8 offset-xl-2">
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Pengguna')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Profil Pengguna</legend>
                                            <!-- begin form-group -->
                                            <input type="hidden" name="role_id" value="{{$role}}">
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Nama</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="name"  placeholder="Ketik.." class="form-control">
                                                </div>
                                            </div>
                                            
                                                <div class="form-group row m-b-10">
                                                    <label class="col-lg-3 text-lg-right col-form-label" >Akses</label>
                                                    <div class="col-lg-5">
                                                        <select class="form-control" onchange="pilih_akses(this.value)" name="akses">
                                                            <optgroup label="Pilih Akses">
                                                                <option value="">--Pilih--</option>
                                                                @foreach(role_get() as $opd)
                                                                    <option value="{{$opd->singkatan}}">{{$opd->name}}</option>
                                                                @endforeach
                                                            
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row m-b-10" id="tampilakses">
                                                    <label class="col-lg-3 text-lg-right col-form-label" >OPD Terkait</label>
                                                    <div class="col-lg-9">
                                                        <select class="multiple-select2 form-control" name="opd_id[]" multiple="multiple">
                                                            <optgroup label="Pilih OPD">
                                                                @foreach(opd_get() as $opd)
                                                                    <option value="{{$opd->id}}">{{$opd->name}} ( {{$opd->lengkap}} )</option>
                                                                @endforeach
                                                            
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                           
                                            
                                        </form>
									</div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-ubah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$menu}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-8 offset-xl-2">
                                        <form id="ubah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Pengguna/ubah')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Profil Pengguna</legend>
                                            <!-- begin form-group -->
                                            <div id="tampil_ubah"></div>
                                            
                                        </form>
									</div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="ubah_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                @include('layouts.modal')
            </div>
        </div>
@endsection
@push('ajax')

    <script>
        $(document).ready(function() {
            $('#tampilakses').hide();
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
            });
        });

        $('#myTable').DataTable( {
			responsive: false,
			paging: true,
			info: true,
			ordering:false,
			lengthChange: false,
		} );

        function pilih_akses(id){
            if(id=='AUD' || id=='OPD' || id=='IRB'){
                $('#tampilakses').show();
            }else{
                $('#tampilakses').hide();
            }
           
        }
        function tambah(){
            $('#modal-tambah').modal('show');
        }

        function ubah(a){
            
            $.ajax({
                type: 'GET',
                url: "{{url('Pengguna/ubah')}}",
                data: "username="+a,
                success: function(msg){
                    $('#tampil_ubah').html(msg);
                    $('#modal-ubah').modal('show');
                    
                }
            }); 
        
    }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Pengguna')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                       
                        if(msg=='ok'){
                            location.reload(); 
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
							$('#modal-notifikasi').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 

        function ubah_data(){
            var form=document.getElementById('ubah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Pengguna/ubah')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                       
                        if(msg=='ok'){
                            location.reload(); 
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
							$('#modal-notifikasi').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        }

        function hapus(){
            var form=document.getElementById('all-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Pengguna/hapus')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                       
                        if(msg=='ok'){
                            location.reload(); 
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
							$('#modal-notifikasi').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 
        function reset_password(){
            var form=document.getElementById('all-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Pengguna/reset_password')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                       
                        if(msg=='ok'){
                            location.reload(); 
                        }else{
                            document.getElementById("loadnya").style.width = "0px";
							$('#modal-notifikasi').modal('show');
							document.getElementById("notifikasi").style.width = "100%";
							$('#notifikasi').html(msg);
                        }
                        
                        
                    }
                });

        } 
	
    </script>

@endpush