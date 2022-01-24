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
            text-align:center;
        }
        .td-left{
            text-align:left;
            background:#ffff90;
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
                            <span class="btn btn-sm btn-blue" onclick=" cetak_kke({{$data->id}},`KKE2`,`Laporan KKE2`)"><i class="fas fa-print"></i> Cetak</span>
                        </h1>
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="3%">No</th>
                                <th rowspan="2" >TUJUAN</th>
                                <th colspan="2">RENSTRA IP</th>
                                <th rowspan="2" width="20%">SASARAN</th>
                                <th colspan="2">RENSTRA IP</th>
                                <th colspan="2">PK IP</th>
                            </tr>
                            <tr>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                                
                            </tr>
                            
                            @foreach(kkedua_get($data->opd_id,periode_laporan($data->tahun)) as $no=>$o)
                                @if($o->ket==1)
                                    @if(kkedua_satu_id($data->opd_id,$data->tahun)==$o->id)
                                        <tr>
                                            <td></td>
                                            <td  style="text-align:left"><b>RENSTRA IP</b></td>
                                            <td></td>
                                            <td></td>
                                            <td  style="text-align:left"><b>RENSTRA IP</b></td>
                                                
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td rowspan="{{kkedua_rowspan($o->id)}}">{{$no+1}}</td>
                                        <td rowspan="{{kkedua_rowspan($o->id)}}" class="td-left">{{$o->name}}</td>
                                        
                                        <td>
                                            @if(kkedua_rowspan($o->id)>0)
                                                <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkedua_utama_id($o->id)}},`tujuan`)">
                                                    @foreach(jawaban_get(2) as $jwb)
                                                        <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,kkedua_utama_id($o->id),"tujuan")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td>@if(kkedua_rowspan($o->id)>0) {!! nilai_kkedua_id($data->id,kkedua_utama_id($o->id),"tujuan")!!} @endif</td>
                                        <td  class="td-left">{{kkedua_utama_name($o->id)}} </td>
                                        <td>
                                            @if(kkedua_rowspan($o->id)>0)
                                                <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{kkedua_utama_id($o->id)}},`sasaran`)">
                                                    @foreach(jawaban_get(2) as $jwb)
                                                        <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,kkedua_utama_id($o->id),"sasaran")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        <td>@if(kkedua_rowspan($o->id)>0) {!! nilai_kkedua_id($data->id,kkedua_utama_id($o->id),"sasaran")!!} @endif</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach(detail_kkedua_get($o->id) as $no=>$det)
                                    <tr>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`tujuan`)">
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,$det->id,"tujuan")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkedua_id($data->id,$det->id,"tujuan")!!}</td>
                                        
                                        <td  class="td-left">{{$det->name}}</td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$det->id}},`sasaran`)">
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,$det->id,"sasaran")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkedua_id($data->id,$det->id,"sasaran")!!}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                @else
                                    @if(kkedua_kedua_id($data->opd_id,$data->tahun)==$o->id)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:left"><b>PK IP</b></td>
                                                
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td  class="td-left">{{$o->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <select style="width:100%;" onchange="pilih_jawaban(this.value,{{$data->id}},{{$o->id}},`pk`)">
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,$o->id,"pk")==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>{!! nilai_kkedua_id($data->id,$o->id,"pk")!!}</td>
                                    </tr>
                                @endif
                                
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td width="7%"></td>
                                    <td width="7%" class="nilai">{{total_detail_kkedua_id($data->opd_id,$data->tahun,$data->id,"tujuan")}}%</td>
                                    <td></td>
                                    <td width="7%"></td>
                                    <td width="7%" class="nilai">{{total_detail_kkedua_id($data->opd_id,$data->tahun,$data->id,"sasaran")}}%</td>
                                    <td width="7%"></td>
                                    <td width="7%" class="nilai">{{total_detail_kkedua_id($data->opd_id,$data->tahun,$data->id,"pk")}}%</td>
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
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Transaksikkedua/save_saran')}}" method="post" enctype="multipart/form-data">
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

        function pilih_jawaban(jawaban_id,transaksilhe_id,id,kategori){
            
            $.ajax({
                type: 'GET',
                url: "{{url('Transaksikkedua/save_kkedua')}}",
                data: "jawaban_id="+jawaban_id+"&id="+id+"&transaksilhe_id="+transaksilhe_id+"&kategori="+kategori,
                beforeSend: function() {
                    document.getElementById("loadnya").style.width = "100%";
                },
                success: function(msg){
                    location.reload();
                }
            }); 
        }

       
	
    </script>

@endpush