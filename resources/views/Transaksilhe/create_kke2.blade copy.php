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
                                <th rowspan="2" width="5%">No</th>
                                <th rowspan="2">TUJUAN</th>
                                <th colspan="2">RENSTRA IPA</th>
                                <th rowspan="2">SARAN</th>
                                <th colspan="2">RENSTRA IPA</th>
                                <th colspan="2">PK IP</th>
                               
                            </tr>
                            <tr>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                                <th colspan="2">ORIENTSI HASIL</th>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td></td>
                                <td width="6%"></td>
                                <td width="6%"></td>
                                <td></td>
                                <td width="6%"></td>
                                <td width="6%"></td>
                                <td width="6%"></td>
                                <td width="6%"></td>
                            </tr>
                            @foreach(parameter_kkedua_get() as $no=>$param)
                                @if($param->utama==1)
                                    <tr>
                                        <td style="background:aqua" rowspan="{{count_detail_parameter_kkedua_get($param->id)}}"><b>{{$no+1}}.</b></td>
                                        <td style="background:aqua;text-align:left" rowspan="{{count_detail_parameter_kkedua_get($param->id)}}">{{$param->name}}</td>
                                        <td style="background:#e3e3b8">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{detailutama_parameter_kkedua_get($param->id)->id}},11{{detailutama_parameter_kkedua_get($param->id)->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,'11'.detailutama_parameter_kkedua_get($param->id)->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'11'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                                        <td style="background:#e3e3b8;text-align:left">{{detailutama_parameter_kkedua_get($param->id)->name}}dd</td>
                                        <td style="background:#e3e3b8">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{detailutama_parameter_kkedua_get($param->id)->id}},12{{detailutama_parameter_kkedua_get($param->id)->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,'12'.detailutama_parameter_kkedua_get($param->id)->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'12'.detailutama_parameter_kkedua_get($param->id)->id)}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>   
                                    @foreach(detail_parameter_kkedua_get($param->id) as $no=>$detailparam)
                                        <tr>
                                            <td style="background:#e3e3b8">
                                                <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},11{{$detailparam->id}})">
                                                    <option value="0" >Pilih</option>
                                                    @foreach(jawaban_get(2) as $jwb)
                                                        <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,'11'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'11'.$detailparam->id)}}</td>
                                            <td style="background:#e3e3b8;text-align:left" >{{$detailparam->name}}</td>
                                            <td style="background:#e3e3b8">
                                                <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},12{{$detailparam->id}})">
                                                    <option value="0" >Pilih</option>
                                                    @foreach(jawaban_get(2) as $jwb)
                                                        <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,'12'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'12'.$detailparam->id)}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>   
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="background:aqua"><b>{{$no+1}}.</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#e3e3b8;text-align:left">{{$param->name}}</td>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#e3e3b8">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},13{{$param->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkedua_id($data->id,'13'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="background:aqua;font-weight:bold;">{{value_kkedua_id($data->id,'13'.$param->id)}}</td>
                                    </tr> 
                                @endif
                            @endforeach
                                    <tr>
                                        <td colspan="2" style="background:aqua"><b>Total</b></td>
                                        <td></td>
                                        <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,11)}}%</td>
                                        <td></td>
                                        <td></td>
                                        <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,12)}}%</td>
                                        <td></td>
                                        <td style="background:#e3e3b8;font-weight:bold">{{rekapan_detail_kkedua_id($data->id,13)}}%</td>
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

        function tambah(id){
            $('#detail_parameter_id').val(id);
            $('#modal-tambah').modal('show');
        }

        function pilih_sasaran(jawaban_id,id,parameter_kkedua_id,kategori){
                // alert("jawaban_id="+jawaban_id+"&id="+id+"&parameter_kkedua_id="+parameter_kkedua_id+"&kategori="+kategori)
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikkedua/save')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&parameter_kkedua_id="+parameter_kkedua_id+"&kategori="+kategori,
                    success: function(msg){
                        location.reload();
                    }
                }); 
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
                    url: "{{url('/Transaksikkedua/save_saran')}}",
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