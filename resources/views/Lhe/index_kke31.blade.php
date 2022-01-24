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
            font-size:11px !important;
            vertical-align:middle !important;
            border:solid 1px #000 !important;
        }
        td{
            background:#fff;
            vertical-align:middle !important;
            font-size:10px !important;
            border:solid 1px #000 !important;
            padding:3px !important;
            text-align:center;
            vertical-align: middle !important
        }
        .td-center{
            text-align:center;
            vertical-align:top !important;
            background:#ffff90;
        }
        .td-left{
            text-align:left;
            vertical-align:top !important;
            background:#ffff90;
        }
        .salah{
            background:red;
            color:#fff;
        }
        .OK{
            background:yellow;
            color:#000;
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
                        <span class="btn btn-green btn-sm" onclick="tambah_sasaran()"><i class="fa fa-plus"></i> Sasaran</span>
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="4%">No</th>
                                <th rowspan="2" width="8%">Aksi</th>
                                <th rowspan="2">TUJUAN</th>
                                <th rowspan="2" width="17%">INDIKATOR TUJUAN</th>
                                <th rowspan="2"  colspan="2">RENSTRA</th>
                                <th colspan="8">KRITERIA INDIKATOR KINERJA TERUKUR DALAM DOKUMEN PERENCANAAN</th>
                                <th rowspan="2" colspan="2">PENGUKURAN</th>
                            </tr>
                            <tr>
                                <th colspan="2">MEASURABLE</th>
                                <th colspan="2">ORIENTASI HASIL</th>
                                <th colspan="2">RELEVAN</th>
                                <th colspan="2">CUKUP</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>RENSTRA IP</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            @foreach(kketiga1_get(akses_opd(),$tahun) as $no=>$o)
                                <tr>
                                    <td style="background:aqua" class="td-center" rowspan="{{kketiga1_rowspan($o->id)}}"><b>{{$no+1}}.</b></td>
                                    <td style="background:aqua" class="td-center" rowspan="{{kketiga1_rowspan($o->id)}}">
                                        <span class="btn btn-blue btn-xs" onclick="tambah({{$o->id}})"><i class="fa fa-plus"></i></span>
                                        <span class="btn btn-green btn-xs" onclick="ubah({{$o->id}},`{{$o->name}}`,`Tujuan`)"><i class="fa fa-pencil-alt"></i></span>
                                        <span class="btn btn-red btn-xs" onclick="hapus({{$o->id}},`sasaran`)"><i class="fa fa-times-circle"></i></span>
                                    </td>
                                    <td style="background:#ffff90"  class="td-left" rowspan="{{kketiga1_rowspan($o->id)}}">{{$o->name}}</td>
                                    <td style="background:#ffff90"  class="td-left">
                                        <span class="btn btn-green btn-xs" onclick="ubah({{kketiga1_utama_id($o->id)}},`{{kketiga1_utama_name($o->id)}}`,`Indikator`)"><i class="fa fa-pencil-alt"></i></span>
                                        <span class="btn btn-red btn-xs" onclick="hapus({{kketiga1_utama_id($o->id)}},`detail`)"><i class="fa fa-times-circle"></i></span>
                                        <br>{{kketiga1_utama_name($o->id)}}
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td  rowspan="{{kketiga1_rowspan($o->id)}}"></td>
                                    <td  rowspan="{{kketiga1_rowspan($o->id)}}"></td>
                                    <td></td>
                                    <td></td>
                                    
                                    
                                </tr>
                                @foreach(detail_kketiga1_get($o->id) as $no=>$det)
                                    <tr>
                                        <td  class="td-left">
                                            <span class="btn btn-green btn-xs" onclick="ubah({{$det->id}},`{{$det->name}}`,`Indikator`)"><i class="fa fa-pencil-alt"></i></span>
                                            <span class="btn btn-red btn-xs" onclick="hapus({{$det->id}},`detail`)"><i class="fa fa-times-circle"></i></span>
                                            <br>{{$det->name}}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    
                                </tr>
                            @endforeach
                                
                        </table>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-sasaran" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">&nbsp;</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form id="tambah-data-sasaran" onkeypress="return event.keyCode != 13"  action="{{url('/Lhe/save_sasaran_kke1')}}" method="post" enctype="multipart/form-data">
                                            @csrf    
                                            <input type="text" name="opd_id" value="{{akses_opd()}}">
                                            <input type="hidden" name="tahun" value="{{$tahun}}">
                                            <input type="hidden" name="sampai" value="{{$sampai}}">
                                            
                                            <div class="form-group">
                                                <label>Sasaran <span class="text-danger">*</span></label>
                                                <textarea name="name" rows="3" placeholder="Ketik disini"  class="form-control"></textarea>
                                                
                                            </div>
                                            
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_data_sasaran()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">&nbsp;</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Lhe/save_kke1')}}" method="post" enctype="multipart/form-data">
                                            @csrf    
                                            <input type="text" name="parameter_id" id="parameter_id">
                                            <div class="form-group">
                                                <label>Indikator <span class="text-danger">*</span></label>
                                                <textarea name="name" rows="3" placeholder="Ketik disini"  class="form-control"></textarea>
                                                
                                            </div>
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_data()">Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-ubah-sasaran" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">&nbsp;</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form id="ubah-data-sasaran" onkeypress="return event.keyCode != 13"  action="{{url('/Lhe/update_kke1')}}" method="post" enctype="multipart/form-data">
                                            @csrf    
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label id="label"></label>
                                                <textarea name="name" rows="3" id="name" placeholder="Ketik disini"  class="form-control"></textarea>
                                                
                                            </div>
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="update_data_sasaran()">Simpan</a>
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

        function tambah_sasaran(){
            $('#modal-sasaran').modal('show');
        }
        function tambah(id){
            $('#parameter_id').val(id);
            $('#modal-tambah').modal('show');
        }
        function ubah(id,name,label){
            $('#id').val(id);
            $('#label').val(label);
            $('#name').val(name);
            $('#modal-ubah-sasaran').modal('show');
        }

        function pilih_sasaran(jawaban_id,id,parameter_kketiga1_id,kategori){
                // alert("jawaban_id="+jawaban_id+"&id="+id+"&parameter_kketiga1_id="+parameter_kketiga1_id+"&kategori="+kategori)
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikketiga1/save_kketiga1')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&parameter_kketiga1_id="+parameter_kketiga1_id+"&kategori="+kategori,
                    success: function(msg){
                        location.reload();
                    }
                }); 
        }
        function hapus(id,act){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Lhe/hapus_kke31')}}",
                    data: "id="+id+"&act="+act,
                    beforeSend: function() {
                        document.getElementById("loadnya").style.width = "100%";
                    },
                    success: function(msg){
                        location.reload();
                    }
                }); 
            
        }

        function simpan_data_sasaran(){
            var form=document.getElementById('tambah-data-sasaran');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Lhe/save_kketiga1_sasaran')}}",
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
        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Lhe/save_kketiga1')}}",
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
        function update_data_sasaran(){
            var form=document.getElementById('ubah-data-sasaran');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Lhe/save_kketiga1_sasaran')}}?act=ubah",
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