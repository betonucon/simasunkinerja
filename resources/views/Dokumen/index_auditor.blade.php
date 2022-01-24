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
                        
                        <h4>
                            Pilih Tahun
                            <select id="tahun" onchange="pilih_tahun(this.value)" class="form-control" style="display:inline;width:10%">
                                @for($x=2020;$x<2030;$x++)
                                    <option value="{{$x}}" @if($tahun==$x) selected @endif >{{$x}}</option>
                                @endfor
                            </select>
                            
                        </h4>
                        
                        <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="5%"></th>
                                    <th width="50%"> Nama OPD</th>
                                    @foreach(kategori_get() as $kat)
                                        <th style="width:5%">{{$kat->name}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(opd_dokumen_get() as $no=>$o)
                                    <tr class="odd gradeX">
                                        <td width="1%" >{{$no+1}}</td>
                                        <td>{{$o->name}} ({{$o->keterangan}})</td>
                                        @foreach(kategori_get() as $kat)
                                            <td style="background: #d4f7af;text-align:center;border: solid 1px #ebf2f6;">
                                                @if(dokumen_cek($kat->id,$tahun,$o->id)>0)
                                                    <a href="javascript:;" style="color:#000;font-weight:bold" onclick="lihat_data(`{{dokumen_file($kat->id,$tahun,$o->id)}}`,`{{$kat->name}}`)" >
                                                        <span class="btn btn-xs btn-green"><i class="fas fa-file"></i> {{$kat->name}}</span>
                                                    </a>
                                                @else

                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                    

                    <div class="modal fade" id="modal-file" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="labelfile"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                   
                                        <div id="tampil-file"></div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Tutup</a>
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
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
            });
        });

        $('#myTable').DataTable( {
			responsive: false,
			paging: false,
			info: false,
			ordering:false,
			lengthChange: false,
		} );

        function pilih_tahun(a){
            location.assign("{{url('Dokumennya')}}?tahun="+a);
        }

        function lihat_data(file,label){
            $('#labelfile').html("Dokumen "+label);
            $('#tampil-file').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
            $('#modal-file').modal('show');
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
	
    </script>

@endpush