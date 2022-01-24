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
            border:solid 1px #000 !important;
        }
        td{
            background:#fff;
            vertical-align:top !important;
            font-size:11px !important;
            border:solid 1px #000 !important;
            padding:3px !important;
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
                        <span class="btn btn-green btn-sm" onclick="tambah_sasaran()"><i class="fa fa-plus"></i> Tujuan</span>
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="3%">No</th>
                                <th rowspan="2" width="8%">Aksi</th>
                                <th rowspan="2">TUJUAN</th>
                                <th colspan="2">RENSTRA IP</th>
                                <th rowspan="2" width="16%">SASARAN</th>
                                <th colspan="2">RENSTRA IP</th>
                                <th colspan="2">PK IP</th>
                            </tr>
                            <tr>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                                
                            </tr>
                            
                            @foreach(kkedua_get(akses_opd(),$tahun) as $no=>$o)
                                @if($o->ket==1)
                                    @if(kkedua_satu_id(akses_opd(),$tahun)==$o->id)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>RENSTRA IP</b></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>RENSTRA IP</b></td>
                                                
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td style="background:aqua" rowspan="{{kkedua_rowspan($o->id)}}">{{$no+1}}</td>
                                        <td style="background:aqua" rowspan="{{kkedua_rowspan($o->id)}}">
                                            <span class="btn btn-blue btn-xs" onclick="tambah({{$o->id}})"><i class="fa fa-plus"></i></span>
                                            <span class="btn btn-green btn-xs" onclick="ubah({{$o->id}},`{{$o->name}}`,`Tujuan`)"><i class="fa fa-pencil-alt"></i></span>
                                            <span class="btn btn-red btn-xs" onclick="hapus({{$o->id}},`sasaran`)"><i class="fa fa-times-circle"></i></span>
                                        </td>
                                        <td style="background:#ffff90" rowspan="{{kkedua_rowspan($o->id)}}">{{$o->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#ffff90">
                                            <span class="btn btn-green btn-xs" onclick="ubah({{kkedua_utama_id($o->id)}},`{{kkedua_utama_name($o->id)}}`,`Sasaran`)"><i class="fa fa-pencil-alt"></i></span>
                                            <span class="btn btn-red btn-xs" onclick="hapus({{kkedua_utama_id($o->id)}},`detail`)"><i class="fa fa-times-circle"></i></span>
                                            <br>{{kkedua_utama_name($o->id)}}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach(detail_kkedua_get($o->id) as $no=>$det)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#ffff90">
                                            <span class="btn btn-green btn-xs" onclick="ubah({{$det->id}},`{{$det->name}}`,`Sasaran`)"><i class="fa fa-pencil-alt"></i></span>
                                            <span class="btn btn-red btn-xs" onclick="hapus({{$det->id}},`detail`)"><i class="fa fa-times-circle"></i></span>
                                            <br>{{$det->name}}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                @else
                                    @if(kkedua_kedua_id(akses_opd(),$tahun)==$o->id)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>PK IP</b></td>
                                            
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td style="background:aqua">{{$no+1}}</td>
                                        <td style="background:aqua"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#ffff90">
                                            <span class="btn btn-green btn-xs" onclick="ubah({{$o->id}},`{{$o->name}}`,`Sasaran`)"><i class="fa fa-pencil-alt"></i></span>
                                            <span class="btn btn-red btn-xs" onclick="hapus({{$o->id}},`detail`)"><i class="fa fa-times-circle"></i></span>
                                            <br>{{$o->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td width="7%"></td>
                                    <td></td>
                                    <td width="7%"></td>
                                    <td width="7%"></td>
                                    <td></td>
                                    <td width="7%">2</td>
                                    <td width="7%">2</td>
                                    <td width="7%">3</td>
                                    <td width="7%">3</td>
                                </tr>  
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
                                            <input type="hidden" name="opd_id" value="{{akses_opd()}}">
                                            <input type="hidden" name="tahun" value="{{$tahun}}">
                                            <input type="hidden" name="sampai" value="{{$sampai}}">
                                            
                                            <div class="form-group">
                                                <label>Sasaran <span class="text-danger">*</span></label>
                                                <textarea name="name" rows="3" placeholder="Ketik disini"  class="form-control"></textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori <span class="text-danger">*</span></label>
                                                <select class="form-control" name="ket">
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="1">RENSTRA IP</option>
                                                    <option value="2">PK IP</option>
                                                </select>
                                                
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
                                            <input type="hidden" name="parameter_id" id="parameter_id">
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

        function pilih_sasaran(jawaban_id,id,parameter_kkesatu_id,kategori){
                // alert("jawaban_id="+jawaban_id+"&id="+id+"&parameter_kkesatu_id="+parameter_kkesatu_id+"&kategori="+kategori)
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikkesatu/save_kkesatu')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&parameter_kkesatu_id="+parameter_kkesatu_id+"&kategori="+kategori,
                    success: function(msg){
                        location.reload();
                    }
                }); 
        }
        function hapus(id,act){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Lhe/hapus_kke2')}}",
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
                    url: "{{url('/Lhe/save_kke2_sasaran')}}",
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
                    url: "{{url('/Lhe/save_kke2')}}",
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
                    url: "{{url('/Lhe/save_kke2_sasaran')}}?act=ubah",
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