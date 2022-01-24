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
        th{
            text-align:center;
            background:#cdbebe;
            vertical-align:middle !important;
           
        }
        td{
            background:#fff;
            vertical-align:top !important;
            font-size:11px !important;
            
            padding:3px !important;
            text-align:center;
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
                        @include('Transaksilhe.tab')
                        <div class="table-responsive">
                            <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksikrekomendasi/save')}}" method="post" enctype="multipart/form-data">
							    @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <table class="table table-striped table-condensed text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th>Rekomendasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="files">
                                        @foreach(parameter_get() as $param)
                                        <tr data-id="empty">
                                            <td class="text-left text-muted p-t-30 p-b-30" style="padding-left: 4% !important;">
                                                <div class="form-group" >
                                                    <label style="font-weight:bold;font-size:1vw">{{$param->name}} ({{$param->nilai}}%)</label>
                                                    <textarea disabled placeholder="Ketik disini......" id="rekomendasi{{$param->id}}" class="textarea from-control">{!!isi_rekomendasi($data->id,$param->id)!!}</textarea>
                                                    
                                                </div>
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                            <div style="width:100%;padding:2%;background:#fff">
                                <a href="javascript:;" class="btn btn-blue" onclick="simpan_data()">Simpan</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-upload" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload File</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                        <div id="notifikasinya"></div>
                                        <form id="upload-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksikrekomendasi/save_file')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <input name="rekomendasi_id" id="rekomendasi_id" type="hidden">
                                            <input name="namafile" id="namafile" type="hidden">
                                            <div class="form-group">
                                                <label><b>Upload File</b></label>
                                                <input type="file" name="file" class="form-control">
                                            </div>
                                           
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_upload()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>

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
    <script src="{{url('assets/assets/plugins/ckeditor/ckeditor.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js')}}"></script>
	<script src="{{url('assets/assets/js/demo/form-wysiwyg.demo.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
            });
        });

        @foreach(parameter_get() as $par)
            $("#rekomendasi{{$par->id}}").wysihtml5();
        @endforeach
        
        function upload_file(id,namafile){
            $('#rekomendasi_id').val(id);
            $('#namafile').val(namafile);
            $('#modal-upload').modal('show');
        }

        function lihat_file(file){
            $('#tampil-file').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
            $('#modal-file').modal('show');
        }

        
        function saran(a){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikkedua/saran')}}",
                    data: "id="+a,
                    success: function(msg){
                        $('#tampil_saran').html(msg);
                        $('#modal-saran').modal('show');
                        
                    }
                }); 
            
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Transaksikrekomendasi/save')}}",
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
	
        function simpan_upload(){
            var form=document.getElementById('upload-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Transaksikrekomendasi/upload')}}",
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
							$('#notifikasinya').html(msg);
                        }
                        
                        
                    }
                });

        } 
	
    </script>

@endpush