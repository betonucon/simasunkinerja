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
                        <div class="form-grup" style="margin-bottom:2%;background:aqua;padding:1%">
                            <label>Pilih Tahun</label>
                            <select class="form-control" style="width:20%;display:inline" onchange="pilih_tahunnya(this.value)">
                            @for($thn=2020;$thn<2030;$thn++)
                                <option value="{{$thn}}" @if($thn==$tahun) selected @endif>{{$thn}}</option>
                            @endfor
                            </select>
                           
                        </div>
                        <span class="btn btn-sm btn-green" onclick="upload()"><i class="fa fa-clone"></i> Upload RPJMD</span>
                        <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th >OPD</th>
                                    <th width="8%">Tahun</th>
                                    <th width="8%">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(opd_get() as $no=>$o)
                                <tr class="odd gradeX">
                                    <td class="f-s-600 text-inverse">{{$no+1}}</td>
                                    <td>{{$o->name}} ({{$o->keterangan}})</td>
                                    <td>{{$tahun}}</td>
                                    <td>{!! file_uploadan($o->id,$tahun,1,1) !!}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload Dokumen RPJMD</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                   
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksilhe/proses_buka')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grup">
                                                        <label>Dari Tahun</label>
                                                        <input type="text" name="tahun" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grup">
                                                        <label>Sampai Tahun</label>
                                                        <input type="text" name="sampai" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-grup">
                                                        <label>RPJMD</label>
                                                        <input type="file" name="file" class="form-control">
                                                    </div>
                                                    
                                                </div>
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
                    <div class="modal fade" id="modal-saranubah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="max-width:80%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="file_ubah_label"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form id="ubah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksilhe/save_saran')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <input type="hidden" name="opd_id" id="file_ubah_opd_id" class="form-control" />
                                            <input type="hidden" name="tahun" id="file_ubah_tahun" class="form-control" />
                                            <input type="hidden" name="sampai" id="file_ubah_tahun_sampai" class="form-control" />
                                            <input type="hidden" name="kategori_id" id="file_ubah_kategori" class="form-control" />
                                            <div class="form-grup">
                                                <label>File Upload</label>
                                                <input type="file" name="file" class="form-control" />
                                            </div>
                                            <div class="form-grup" style="padding-top:1%;padding-bottom:1%">
                                                <a href="javascript:;" class="btn btn-blue" onclick="ubah_data()">Upload</a>
                                
                                            </div>
                                            <div id="tampil-saran_ubah"></div>
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
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

    <script>
        $(document).ready(function() {
            $('#tanggal').datepicker({
                format: 'yyyy-mm-dd',
            });
        });
        $('#myTable').DataTable( {
			responsive: false,
			paging: false,
			info: true,
			ordering:false,
			lengthChange: false,
		} );
        function lihat_saran_file(opd,tahun,kategori,label,file){
            $('#file_ubah_opd_id').val(opd);
            $('#file_ubah_tahun').val(tahun);
            $('#file_ubah_tahun_sampai').val(tahun);
            $('#file_ubah_kategori').val(kategori);
            $('#file_ubah_label').html(label);
            $('#modal-saranubah').modal('show');
            $('#tampil-saran_ubah').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
        }
        function lihat_saran(opd,tahun,kategori,label,file){
            $('#file_ubah_opd_id').val(opd);
            $('#file_ubah_tahun').val(tahun);
            $('#file_ubah_tahun_sampai').val(tahun);
            $('#file_ubah_kategori').val(kategori);
            $('#file_ubah_label').html(label);
            $('#modal-saranubah').modal('show');
            $('#tampil-saran_ubah').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
        }
        function upload(){
            $('#modal-tambah').modal('show');
        }

        function pilih_tahunnya(a){
            location.assign("{{url('Dokumennya')}}?tahun="+a); 
        }
        function penilaian(a){
            location.assign("{{url('Transaksilhe/create')}}?id="+a); 
        }
        function lihat_data(file,label){
            $('#labelfile').html("Dokumen LHE "+label);
            $('#tampil-file').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
            $('#modal-file').modal('show');
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Dokumennya')}}",
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
                    url: "{{url('/Transaksilhe/save_saran')}}",
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