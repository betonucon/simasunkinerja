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
            border:solid 1px #000 !important;
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
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="5%">No</th>
                                <th rowspan="2">SASARAN</th>
                                <th rowspan="2" width="15%">INDIKATOR KERJA</th>
                                <th colspan="15">OUTCOME IP</th>
                               
                            </tr>
                            <tr>
                                <th width="15%" colspan="3">SASARAN TEPAT</th>
                                <th width="15%" colspan="3">IK TEPAT</th>
                                <th width="15%" colspan="3">TARGET TERCAPAI</th>
                                <th width="15%" colspan="3">KINERJA LEBIH BAIK</th>
                                <th width="15%" colspan="3">DATA ANDAL</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th colspan="3">4</th>
                                <th colspan="3">5</th>
                                <th colspan="3">6</th>
                                <th colspan="3">7</th>
                                <th colspan="3">8</th>
                            </tr>
                            @foreach(parameter_kkesatu_get() as $no=>$param)
                                <tr>
                                    <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}"><b>{{$no+1}}.</b></td>
                                    <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}">{{$param->name}}</td>
                                    <td style="background:aqua">{{detailutama_parameter_kkesatu_get($param->id)->name}}</td>
                                    <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'11'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'11'.$param->id)}}</td>
                                    <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'11'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'11'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'21'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'21'.$param->id)}}</td>
                                    <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'21'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'21'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'31'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'31'.$param->id)}}</td>
                                    <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'31'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'31'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'41'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'41'.$param->id)}}</td>
                                    <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'41'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'41'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{huruf_kkesatu_id($data->id,'51'.$param->id)}}</td>
                                    <td style="text-align:center" width="5%">{{value_kkesatu_id($data->id,'51'.$param->id)}}</td>
                                    <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'51'.$param->id))}}" >{{keterangan_kkesatu_id($data->id,'51'.$param->id)}}</td>
                                </tr>
                                @foreach(detail_parameter_kkesatu_get($param->id) as $no=>$detailparam)
                                    <tr>
                                        <td style="background:aqua">{{$detailparam->name}}</td>
                                        <td style="text-align:center">{{huruf_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'12'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                                        <td style="text-align:center">{{huruf_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'22'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                                        <td style="text-align:center">{{huruf_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'32'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                                        <td style="text-align:center">{{huruf_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'42'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                                        <td style="text-align:center">{{huruf_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                                        <td style="text-align:center;font-weight:bold;background:{{warna_kkesatu(keterangan_kkesatu_id($data->id,'52'.$detailparam->id))}}" >{{keterangan_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
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