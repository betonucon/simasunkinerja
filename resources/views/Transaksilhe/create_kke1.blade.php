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
        .td-left{
            text-align:left;
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
        .nilai{
            background:#ffff90;
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
                        @include('Transaksilhe.tab')
                        <h1 class="page-header">
                            <span class="btn btn-sm btn-blue" onclick=" cetak_kke({{$data->id}},`KKE1`,`Laporan KKE1 Capaian`)"><i class="fas fa-print"></i> Cetak</span>
                        </h1>
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="2%">No</th>
                                <th rowspan="2" >SASARAN</th>
                                <th rowspan="2" width="13%">INDIKATOR KINERJA</th>
                                <th colspan="18">OUTCOME IP</th>
                               
                            </tr>
                            <tr>
                                <th colspan="2">SASARAN TEPAT</th>
                                <th colspan="2">IK TEPAT</th>
                                <th colspan="4">TARGET TERCAPAI</th>
                                <th colspan="4">KINERJA LEBIH BAIK</th>
                                <th colspan="4">DATA ANDAL</th>
                            </tr>
                            
                            @foreach(kkesatu_get(akses_opd(),periode_laporan($data->tahun)) as $no=>$o)
                                <tr>
                                    <td style="background:aqua" rowspan="{{kkesatu_rowspan($o->id)}}"><b>{{$no+1}}.</b></td>
                                    <td class="td-left" rowspan="{{kkesatu_rowspan($o->id)}}">{{$o->name}}</td>
                                    <td class="td-left" >{{kkesatu_utama_name($o->id)}}</td>
                                    <td rowspan="{{kkesatu_rowspan($o->id)}}">
                                        <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$o->id}},`sasaran`)">
                                            @foreach(jawaban_get(2) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,$o->id,"sasaran")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td rowspan="{{kkesatu_rowspan($o->id)}}">{!! nilai_kkesatu_id($data->id,$o->id,"sasaran")!!}</td>
                                    <td style="text-align:center;vertical-align: middle !important">
                                        <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkesatu_utama_id($o->id)}},`ik`)">
                                            @foreach(jawaban_get(2) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,kkesatu_utama_id($o->id),"ik")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{!! nilai_kkesatu_id($data->id,kkesatu_utama_id($o->id),"ik")!!}</td>
                                    <td style="text-align:center;vertical-align: middle !important">
                                        <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkesatu_utama_id($o->id)}},`target`)">
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,kkesatu_utama_id($o->id),"target")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{!! nilai_kkesatu_id($data->id,kkesatu_utama_id($o->id),"target")!!}</td>
                                    <td class="{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"target")!!}">{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"target")!!}</td>
                                    <td></td>
                                    <td style="text-align:center;vertical-align: middle !important">
                                        <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkesatu_utama_id($o->id)}},`kinerja`)">
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,kkesatu_utama_id($o->id),"kinerja")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{!! nilai_kkesatu_id($data->id,kkesatu_utama_id($o->id),"kinerja")!!}</td>
                                    <td class="{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"kinerja")!!}">{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"kinerja")!!}</td>
                                    <td></td>
                                    <td style="text-align:center;vertical-align: middle !important">
                                        <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkesatu_utama_id($o->id)}},`data`)">
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,kkesatu_utama_id($o->id),"data")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>{!! nilai_kkesatu_id($data->id,kkesatu_utama_id($o->id),"data")!!}</td>
                                    <td class="{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"data")!!}">{!! indikator_kkesatu_id($data->id,kkesatu_utama_id($o->id),"data")!!}</td>
                                    <td></td>
                                    
                                </tr>
                                @foreach(detail_kkesatu_get($o->id) as $no=>$det)
                                    <tr>
                                        <td class="td-left" >{{$det->name}}</td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`ik`)">
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,$det->id,"ik")==$jwb->id) selected @endif >{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkesatu_id($data->id,$det->id,"ik")!!}</td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`target`)">
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,$det->id,"target")==$jwb->id) selected @endif >{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkesatu_id($data->id,$det->id,"target")!!}</td>
                                        <td class="{!! indikator_kkesatu_id($data->id,$det->id,"target")!!}">{!! indikator_kkesatu_id($data->id,$det->id,"target")!!}</td>
                                        <td></td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`kinerja`)">
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,$det->id,"kinerja")==$jwb->id) selected @endif >{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkesatu_id($data->id,$det->id,"kinerja")!!}</td>
                                        <td class="{!! indikator_kkesatu_id($data->id,$det->id,"kinerja")!!}">{!! indikator_kkesatu_id($data->id,$det->id,"kinerja")!!}</td>
                                        <td></td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`data`)">
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,$det->id,"data")==$jwb->id) selected @endif >{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkesatu_id($data->id,$det->id,"data")!!}</td>
                                        <td class="{!! indikator_kkesatu_id($data->id,$det->id,"data")!!}">{!! indikator_kkesatu_id($data->id,$det->id,"data")!!}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Persentase pemenuhan kriteria</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ uang(total_detail_kkesatu_id($data->id,$o->id,"target")) }}%</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ uang(total_detail_kkesatu_id($data->id,$o->id,"kinerja")) }}%</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ uang(total_detail_kkesatu_id($data->id,$o->id,"data")) }}%</td>
                                    
                                    
                                </tr>
                                
                            @endforeach
                                <tr>
                                    <td colspan="4">Nilai pada Kriteria</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ total_kkesatu_id($data->id,$data->opd_id,$o->tahun,"target") }}%</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ total_kkesatu_id($data->id,$data->opd_id,$o->tahun,"kinerja") }}%</td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%"></td>
                                    <td width="4%" class="nilai">{{ total_kkesatu_id($data->id,$data->opd_id,$o->tahun,"data") }}%</td>
                                    
                                    
                                </tr>
                        </table>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-saran" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Buat Saran / Rekomendasi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-8 offset-xl-2">
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksikkesatu/save_saran')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            
                                            <div id="tampil_saran"></div>
                                           
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

        function tambah(id){
            $('#detail_parameter_id').val(id);
            $('#modal-tambah').modal('show');
        }

        function pilih_jawaban(jawaban_id,transaksilhe_id,id,kategori){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikkesatu/save_kkesatu')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&transaksilhe_id="+transaksilhe_id+"&kategori="+kategori,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        location.reload();
                    }
                }); 
        }
        function saran(a){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikkesatu/saran')}}",
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
                    url: "{{url('/Transaksikkesatu/save_saran')}}",
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