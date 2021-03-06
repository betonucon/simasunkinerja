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
            padding:2px !important;
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
                            <span class="btn btn-sm btn-blue" onclick=" cetak_kke({{$data->id}},`KKE31`,`Laporan KKE3 IT`)"><i class="fas fa-print"></i> Cetak</span>
                        </h1>
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="3%">No</th>
                                <th rowspan="2" width="15%">TUJUAN</th>
                                <th rowspan="2">INDIKATOR KINERJA TUJUAN</th>
                                <th rowspan="2" colspan="2">RENSTRA IPA</th>
                                <th colspan="8">KRITERIA INDIKATOR KINERJA TERUKUR DALAM DOKUMEN PERENCANAAN</th>
                                <th colspan="2" rowspan="2">PENGUKURAN</th>
                               
                            </tr>
                            <tr>
                                <th colspan="2">MEASURABLE</th>
                                <th colspan="2">ORIENTASI HASIL</th>
                                <th colspan="2">RELEVAN</th>
                                <th colspan="2">CUKUP</th>
                                
                            </tr>
                            <tr>
                                <td width="3%"></td>
                                <td></td>
                                <td></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                                <td width="5%"></td>
                            </tr>
                            @foreach(parameter_kketiga1_get() as $no=>$param)
                                <tr>
                                    <td style="background:aqua" rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{$no+1}}</td>
                                    <td style="text-align:left;background:aqua" rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{$param->name}}</td>
                                    <td></td>
                                    <td>{{huruf_kketiga1_id($data->id,'11'.$param->id)}} </td>
                                    
                                    <td>{{value_kketiga1_id($data->id,'11'.$param->id)}}</td>
                                    <td>{{huruf_kketiga1_id($data->id,'12'.$param->id)}} </td>
                                    <td>{{value_kketiga1_id($data->id,'12'.$param->id)}}</td>
                                    <td>{{huruf_kketiga1_id($data->id,'13'.$param->id)}} </td>
                                    <td>{{value_kketiga1_id($data->id,'13'.$param->id)}}</td>
                                    <td>{{huruf_kketiga1_id($data->id,'14'.$param->id)}} </td>
                                    <td>{{value_kketiga1_id($data->id,'14'.$param->id)}}</td>
                                    <td rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{huruf_kketiga1_id($data->id,'15'.$param->id)}} </td>
                                    <td rowspan="{{count_detail_parameter_kketiga1_get($param->id)+1}}">{{value_kketiga1_id($data->id,'15'.$param->id)}}</td>
                                    <td>{{huruf_kketiga1_id($data->id,'16'.$param->id)}} </td>
                                    <td>{{value_kketiga1_id($data->id,'16'.$param->id)}}</td>
                                </tr>
                                     
                                    @foreach(detail_parameter_kketiga1_get($param->id) as $no=>$detailparam)
                                        <tr>
                                            <td style="text-align:left;background:#e3e3b8">{{$detailparam->name}}</td>
                                            <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'11'.$detailparam->id)}} </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'11'.$detailparam->id)}}</td>
                                            <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'12'.$detailparam->id)}} </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'12'.$detailparam->id)}}</td>
                                            <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'13'.$detailparam->id)}} </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'13'.$detailparam->id)}}</td>
                                            <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'14'.$detailparam->id)}} </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'14'.$detailparam->id)}}</td>
                                            <td style="background:#e3e3b8">{{huruf_kketiga1_id($data->id,'16'.$detailparam->id)}} </td>
                                            <td style="background:aqua;font-weight:bold;">{{value_kketiga1_id($data->id,'16'.$detailparam->id)}}</td>
                                        </tr>
                                    @endforeach
                                
                            @endforeach
                                    <tr>
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,11)}}%</td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,12)}}%</td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,13)}}%</td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,14)}}%</td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,15)}}%</td> 
                                        <td></td> 
                                        <td style="font-weight:bold;background:aqua;">{{rekapan_detail_kketiga1_id($data->id,16)}}%</td>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
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

        function pilih_sasaran(jawaban_id,id,parameter_kketiga1_id,kategori){
                // alert("jawaban_id="+jawaban_id+"&id="+id+"&parameter_kketiga1_id="+parameter_kketiga1_id+"&kategori="+kategori)
                $.ajax({
                    type: 'GET',
                    url: "{{url('Transaksikketiga/save')}}",
                    data: "jawaban_id="+jawaban_id+"&id="+id+"&parameter_kketiga1_id="+parameter_kketiga1_id+"&kategori="+kategori,
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