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
                        @include('Transaksilhe.tab')
                        <table class="table table-bordered">
                            <tr>
                                <th rowspan="2" width="5%">No</th>
                                <th rowspan="2">SASARAN</th>
                                <th rowspan="2" width="15%">INDIKATOR KERJA</th>
                                <th colspan="10">OUTCOME IP</th>
                               
                            </tr>
                            <tr>
                                <th width="14%" colspan="2">SASARAN TEPAT</th>
                                <th width="14%" colspan="2">IK TEPAT</th>
                                <th width="14%" colspan="2">TARGET TERCAPAI</th>
                                <th width="14%" colspan="2">KINERJA LEBIH BAIK</th>
                                <th width="14%" colspan="2">DATA ANDAL</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th colspan="2">4</th>
                                <th colspan="2">5</th>
                                <th colspan="2">6</th>
                                <th colspan="2">7</th>
                                <th colspan="2">8</th>
                            </tr>
                            <?php
                                $nilai=0;
                            ?>
                            @foreach(parameter_kkesatu_get() as $no=>$param)
                                <tr>
                                    <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}"><b>{{$no+1}}.</b></td>
                                    <td style="background:aqua" rowspan="{{count_detail_parameter_kkesatu_get($param->id)}}">{{$param->name}}</td>
                                    <td style="background:aqua">{{detailutama_parameter_kkesatu_get($param->id)->name}}</td>
                                    <td style="text-align:center" width="7%">
                                        <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},11{{$param->id}})">
                                            <option value="0" >Pilih</option>
                                            @foreach(jawaban_get(2) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'11'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align:center" width="7%">{{value_kkesatu_id($data->id,'11'.$param->id)}}</td>
                                    <td style="text-align:center" width="7%">
                                        <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},21{{$param->id}})">
                                            <option value="0" >Pilih</option>
                                            @foreach(jawaban_get(2) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'21'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align:center" width="7%">{{value_kkesatu_id($data->id,'21'.$param->id)}}</td>
                                    <td style="text-align:center" width="7%">
                                        <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},31{{$param->id}})">
                                            <option value="0" >Pilih</option>
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'31'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align:center" width="7%">{{value_kkesatu_id($data->id,'31'.$param->id)}}</td>
                                    <td style="text-align:center" width="7%">
                                        <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},41{{$param->id}})">
                                            <option value="0" >Pilih</option>
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'41'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align:center" width="7%">{{value_kkesatu_id($data->id,'41'.$param->id)}}</td>
                                    <td style="text-align:center" width="7%">
                                        <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$param->id}},51{{$param->id}})">
                                            <option value="0" >Pilih</option>
                                            @foreach(jawaban_get(1) as $jwb)
                                                <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'51'.$param->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align:center" width="7%">{{value_kkesatu_id($data->id,'51'.$param->id)}}</td>
                                </tr>
                                @foreach(detail_parameter_kkesatu_get($param->id) as $no=>$detailparam)
                                    
                                    <tr>
                                        <td style="background:aqua">{{$detailparam->name}}</td>
                                        <td style="text-align:center" >
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},12{{$detailparam->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'12'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'12'.$detailparam->id)}}</td>
                                        <td style="text-align:center">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},22{{$detailparam->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(2) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'22'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'22'.$detailparam->id)}}</td>
                                        <td style="text-align:center">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},32{{$detailparam->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'32'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'32'.$detailparam->id)}}</td>
                                        <td style="text-align:center">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},42{{$detailparam->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'42'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'42'.$detailparam->id)}}</td>
                                        <td style="text-align:center">
                                            <select  onchange="pilih_sasaran(this.value,{{$data->id}},{{$detailparam->id}},52{{$detailparam->id}})">
                                                <option value="0" >Pilih</option>
                                                @foreach(jawaban_get(1) as $jwb)
                                                    <option value="{{$jwb->id}}" @if(jawaban_kkesatu_id($data->id,'52'.$detailparam->id)==$jwb->id) selected @endif>{{$jwb->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="text-align:center" >{{value_kkesatu_id($data->id,'52'.$detailparam->id)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="background:aqua" ><b></b></td>
                                    <td style="background:aqua"></td>
                                    <td style="background:aqua"></td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center;font-weight:bold;background:yellow" >{{rekapan_detail_kkesatu_id($data->id,$param->id,'11')}}%</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center;font-weight:bold;background:yellow" >{{rekapan_detail_kkesatu_id($data->id,$param->id,'21')}}%</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center;font-weight:bold;background:yellow" >{{rekapan_detail_kkesatu_id($data->id,$param->id,'31')}}%</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center;font-weight:bold;background:yellow" >{{rekapan_detail_kkesatu_id($data->id,$param->id,'41')}}%</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center;font-weight:bold;background:yellow" >{{rekapan_detail_kkesatu_id($data->id,$param->id,'51')}}%</td>
                                </tr>  
                            @endforeach
                                <tr>
                                    <td style="background:aqua" ><b></b></td>
                                    <td style="background:aqua"></td>
                                    <td style="background:aqua"></td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center" >{{rekapan_kkesatu_id($data->id,'11')}}</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center" >{{rekapan_kkesatu_id($data->id,'21')}}</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center" >{{rekapan_kkesatu_id($data->id,'31')}}</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center" >{{rekapan_kkesatu_id($data->id,'41')}}</td>
                                    <td style="text-align:center" ></td>
                                    <td style="text-align:center" >{{rekapan_kkesatu_id($data->id,'51')}}</td>
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