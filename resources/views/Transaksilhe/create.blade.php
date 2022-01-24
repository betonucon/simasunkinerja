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
            font-size:12px !important;
            vertical-align:middle !important;
            border:solid 1px #000 !important;
        }
        td{
            background:#fff;
            vertical-align:top !important;
            font-size:11px !important;
            border:solid 1px #000 !important;
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
                    @if(cek_rpjmd($data->opd_id,$data->tahun,1,$data->role_id)>0)
                        @include('Transaksilhe.tab')
                        <h1 class="page-header">
                            <span class="btn btn-sm btn-blue" onclick=" cetak_kke({{$data->id}},`LKE`,`Laporan KKE`)"><i class="fas fa-print"></i> Cetak</span>
                            {!! file_uploadan_rpjmd($data->opd_id,$data->tahun,1,$data->role_id) !!}
                            
                        </h1>
                        
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="8%">No</th>
                                <th rowspan="2">KOMPONEN/SUB KOMPONEN</th>
                                <th rowspan="2" width="8%">BOBOT</th>
                                <th colspan="2">SKPD</th>
                                <th rowspan="2" width="10%">KONTROL KERANGKA LOGIS</th>
                                <th rowspan="2" width="8%">Catatan</th>
                            </tr>
                            <tr>
                                <th width="9%">Y</th>
                                <th width="9%">NILAI</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th colspan="2">4</th>
                                <th>5</th>
                                <th>6</th>
                            </tr>
                            @foreach(parameter_get() as $no=>$param)
                                <tr>
                                    <td style="background:aqua"><b>{{huruf($no+1)}}.</b></td>
                                    <td style="background:aqua;text-align:left;"><b>{{$param->name}} ({{$param->nilai}}%)</b></td>
                                    <td style="background:aqua;text-align:center"><b>{{uang($param->nilai)}}</b></td>
                                    <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_parameter($data->id,$param->id)/$param->nilai)*100)}}%</td>
                                    <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_parameter($data->id,$param->id)}}</td>
                                    <td style="background:aqua;text-align:center;font-weight:bold"></td>
                                    <td style="background:aqua;text-align:center;font-weight:bold"></td>
                                </tr>
                                @foreach(detail_parameter_get($param->id) as $no=>$detailparam)
                                    @if($detailparam->id==1 || $detailparam->id==2)
                                        <tr>
                                            <td style="background:aqua">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{romawi($no+1)}}.</b></td>
                                            <td style="background:aqua;text-align:left;"><b>{{$detailparam->name}} ({{$detailparam->nilai}}%)</b></td>
                                            <td  style="text-align:center;background:aqua"><b>{{uang($detailparam->nilai)}}</b></td>
                                            <td style="background:aqua;text-align:center;font-weight:bold">{{uang(((nilai_detail_parameter($data->id,$detailparam->id))/$detailparam->nilai)*100)}}%</td>
                                            <td style="background:aqua;text-align:center;font-weight:bold">{{uang(nilai_detail_parameter($data->id,$detailparam->id))}}</td>
                                            <td style="background:aqua"></td>
                                            <td style="background:aqua"></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td style="background:aqua">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{romawi($no+1)}}.</b></td>
                                            <td style="background:aqua;text-align:left;"><b>{{$detailparam->name}} ({{$detailparam->nilai}}%)</b></td>
                                            <td  style="text-align:center;background:aqua"><b>{{uang($detailparam->nilai)}}</b></td>
                                            <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_detail_parameter($data->id,$detailparam->id)}}%</td>
                                            <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_detail_parameter($data->id,$detailparam->id)*$detailparam->nilai)/100)}}</td>
                                            <td style="background:aqua"></td>
                                            <td style="background:aqua"></td>
                                        </tr>
                                    @endif
                                    @foreach(penilaian_get($detailparam->id) as $pen=>$penilaian)
                                        @if($penilaian->utama==1)
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{huruf($pen+1)}}.</b></td>
                                                <td style="background:aqua;text-align:left;"><b>{{$penilaian->name}} ({{$penilaian->nilai}}%)</b></td>
                                                <td style="background:aqua;text-align:center;font-weight:bold"><b>{{uang($penilaian->nilai)}}</b></td>
                                                <td style="background:aqua;text-align:center;font-weight:bold">{{nilai_utama($data->id,$penilaian->id)}}%</td>
                                                <td style="background:aqua;text-align:center;font-weight:bold">{{uang((nilai_utama($data->id,$penilaian->id)*$penilaian->nilai)/100)}}</td>
                                                <td style="background:aqua;text-align:center;font-weight:bold"></td>
                                                <td style="background:aqua;text-align:center;font-weight:bold"></td>
                                            </tr>
                                            @foreach(detail_penilaian_get($penilaian->id) as $dtp=>$detpen)
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($dtp+1)}}.</td>
                                                    <td style="text-align:left;">{{$detpen->name}}</td>
                                                    <td>
                                                        <select style="width: 80%;" name="jawaban_id" onchange="jawab(this.value,{{$data->id}},{{$detpen->id}},{{$detailparam->id}})">
                                                           
                                                            @foreach(jawaban_get($detpen->pilihan) as $jawaban)
                                                            <option value="{{$jawaban->id}}" @if(jawaban_id($data->id,$detpen->id)==$jawaban->id) selected @endif>{{$jawaban->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td style="background:#c2e7c2;text-align:center">{{ value_id($detpen->pilihan,$data->id,$detpen->id) }}</td>
                                                    <td style="background:aqua;text-align:center">{!! val_nilai_id($data->id,$detpen->id) !!}</td>
                                                    <td style="background: #ffff9f; text-align: center; font-size: 9px !important; font-weight: bold; text-transform: uppercase;">
                                                        {{keterangan_nilai_id($data->id,$detpen->id)}}
                                                    </td>
                                                    <td>
                                                        @if($detpen->upload>0)
                                                            {!! file_uploadan($data->opd_id,$data->tahun,$detpen->upload,$data->role_id) !!}
                                                        @endif
                                                        
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($penilaian->utama==3)
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($pen+1)}}.</td>
                                                <td style="text-align:left;">{{$penilaian->name}}</td>
                                                <td>
                                                    <select style="width: 80%;" name="jawaban_id" onchange="jawab(this.value,{{$data->id}},{{$penilaian->id}},{{$detailparam->id}})">
                                                        
                                                        @foreach(jawaban_get($penilaian->pilihan) as $jawaban)
                                                        <option value="{{$jawaban->id}}" @if(jawaban_id($data->id,$penilaian->id)==$jawaban->id) selected @endif>{{$jawaban->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td style="background:#c2e7c2;text-align:center">{{ value_id($penilaian->pilihan,$data->id,$penilaian->id) }}</td>
                                                <td style="background:aqua;text-align:center">{!! val_nilai_id($data->id,$penilaian->id) !!}</td>
                                                <td style="background: #ffff9f; text-align: center; font-size: 9px !important; font-weight: bold; text-transform: uppercase;">
                                                    {{keterangan_nilai_id($data->id,$penilaian->id)}}
                                                </td>
                                                <td>
                                                    @if($penilaian->upload>0)
                                                        {!! file_uploadan($data->opd_id,$data->tahun,$penilaian->upload,$data->role_id) !!}
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                        @endif
                                        
                                    @endforeach
                                @endforeach
                            @endforeach
                                <tr>
                                    <th colspan="2">HASIL EVALUASI AKUNTABILITAS KINERJA (100%)</th>
                                    <th>100.00</th>
                                    <th>{{(total_nilai_parameter($data->id)/100)*100}}%</th>
                                    <th>{{total_nilai_parameter($data->id)}}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                        </table>
                    @else
                            <div class="alert alert-success fade show m-b-0">
								<span class="close" data-dismiss="alert">×</span>
								<strong>MAAF !</strong><br>
								Dokumen RPJMD untuk OPD {{$data->opd['name']}} ({{$data->opd['keterangan']}}) belum ada.
							</div>
                    @endif
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-saran" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="file_label"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksilhe/save_saran')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <input type="hidden" name="opd_id" id="file_opd_id" class="form-control" />
                                            <input type="hidden" name="kategori_id" id="file_kategori" class="form-control" />
                                            <div class="form-grup">
                                                <label>File Upload</label>
                                                <input type="file" name="file" class="form-control" />
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-grup">
                                                        <label>Tahun Mulai</label><br>
                                                        <select name="tahun"  id="file_tahun" class="form-control" >
                                                            @for($thn=$data->tahun;$thn<2030;$thn++)
                                                                <option value="{{$thn}}">{{$thn}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-grup">
                                                        <label>Tahun Sampai</label><br>
                                                        <select name="sampai" onchange="tampil_target(this.value)" id="file_tahun_sampai" class="form-control" >
                                                            @for($thn=$data->tahun;$thn<2030;$thn++)
                                                                <option value="{{$thn}}">{{$thn}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-grup" style="margin-top:2%">
                                                        <div id="target"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
									
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Batalkan</a>
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_data()">Upload</a>
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
                                            <div class="form-grup" id="tampil-target">
                                                <label>Target</label>
                                                <input type="text" style="width:20%" name="target" class="form-control" />
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
                    <div class="modal fade" id="modal-saranubahfile" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="max-width:80%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="file_ubah_label"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                     <div id="tampil-saran_ubahfile"></div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Tutup</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-file" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="max-width:90%">
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
        $('#tampil-target').hide();
        
        function tambah(id){
            $('#detail_parameter_id').val(id);
            $('#modal-tambah').modal('show');
        }

        function jawab(jawaban_id,id,penilaian_id,detail_pramater_id){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksilhe/save_lhe')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&penilaian_id="+penilaian_id+"&detail_prameter_id="+detail_pramater_id,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        location.reload();
                    }
                }); 
        }
        function saran(opd,tahun,kategori,label){
            
            $('#file_opd_id').val(opd);
            $('#file_tahun').val(tahun);
            $('#file_tahun_sampai').val(tahun);
            $('#file_kategori').val(kategori);
            $('#file_label').html(label);
            $('#modal-saran').modal('show');
        }
        function tampil_target(a){
            var tahun=$('#file_tahun').val();
            var kategori=$('#file_kategori').val();
            let target = "";
                for(thn=tahun;thn<=a;thn++){
                    target+='<label>&nbsp;&nbsp;Target '+thn+'</label><input type="text" onkeypress="return hanyaangkadantitik(event)" style="display:inline;margin-left:2%;width:30%" class="form-control" name="target['+thn+']"><br>';
                }
                document.getElementById("target").innerHTML = target;
        }
        function lihat_saran(opd,tahun,kategori,label,file){
            if(kategori==2){
                $('#tampil-target').show();
            }else{
                $('#tampil-target').hide();
            }
            
            $('#file_ubah_opd_id').val(opd);
            $('#file_ubah_tahun').val(tahun);
            $('#file_ubah_tahun_sampai').val(tahun);
            $('#file_ubah_kategori').val(kategori);
            $('#file_ubah_label').html(label);
            $('#modal-saranubah').modal('show');
            $('#tampil-saran_ubah').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
        }
        function lihat_saran_file(opd,tahun,kategori,label,file){
            $('#file_ubah_opd_id').val(opd);
            $('#file_ubah_tahun').val(tahun);
            $('#file_ubah_kategori').val(kategori);
            $('#file_ubah_label').html(label);
            $('#modal-saranubahfile').modal('show');
            $('#tampil-saran_ubahfile').html("<iframe src='{{url('dokumen')}}/"+file+"' width='100%' height='600px'></iframe>");
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
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