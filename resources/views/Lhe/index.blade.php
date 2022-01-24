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
                                <th width="9%">No</th>
                                <th>KOMPONEN/SUB KOMPONEN</th>
                                <th width="8%"></th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                            </tr>
                            @foreach(parameter_get() as $no=>$param)
                                <tr>
                                    <td style="background:aqua"><b>{{huruf($no+1)}}.</b></td>
                                    <td style="background:aqua"><b>{{$param->name}} ({{$param->nilai}}%)</b></td>
                                    <td style="background:aqua"><b>{{uang($param->nilai)}}</b></td>
                                </tr>
                                @foreach(detail_parameter_get($param->id) as $no=>$detailparam)
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{romawi($no+1)}}.</b></td>
                                        <td><span class="btn btn-sm btn-blue" onclick="tambah({{$detailparam->id}})"><i class="fas fa-pencil-alt fa-fw"></i></span>&nbsp;<b>{{$detailparam->name}} ({{$detailparam->nilai}}%)</b></td>
                                        <td><b>{{uang($detailparam->nilai)}}</b></td>
                                    </tr>
                                    @foreach(penilaian_get($detailparam->id) as $pen=>$penilaian)
                                        @if($penilaian->utama==1)
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{huruf($pen+1)}}.</b></td>
                                                <td>&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-red" onclick="hapus({{$penilaian->id}})"><i class="fas fa-trash-alt fa-fw"></i></span>&nbsp;<b>{{$penilaian->name}} ({{$penilaian->nilai}}%)</b></td>
                                                <td><b>{{uang($penilaian->nilai)}}</b></td>
                                           </tr>
                                            @foreach(detail_penilaian_get($penilaian->id) as $dtp=>$detpen)
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($dtp+1)}}.</td>
                                                    <td>&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-red" onclick="hapus({{$detpen->id}})"><i class="fas fa-trash-alt fa-fw"></i></span>&nbsp;{{$detpen->name}}</td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($penilaian->utama==3)
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{($pen+1)}}.</td>
                                                <td>&nbsp;&nbsp;&nbsp;<span class="btn btn-xs btn-red" onclick="hapus({{$penilaian->id}})"><i class="fas fa-trash-alt fa-fw"></i></span>&nbsp;{{$penilaian->name}}</td>
                                                <td></td>
                                            </tr>
                                        @endif
                                        
                                    @endforeach
                                @endforeach
                            @endforeach
                        </table>
                        
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Buat Parameter Penilaian</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-8 offset-xl-2">
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Lhe/penilaian')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <input type="hidden" name="detail_parameter_id" id="detail_parameter_id">
                                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Parameter Penilaian</legend>
                                            <!-- begin form-group -->
                                            
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Nama Penilaian <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <textarea name="name" rows="3" placeholder="Ketik disini"  class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Kategori</label>
                                                <div class="col-lg-5">
                                                    <select name="utama" onchange="pilih_kategori(this.value)"  placeholder="Ketik.." class="form-control">
                                                        <option value="">--Pilih kategori</option>
                                                        <option value="1">Kepala Penilaian</option>
                                                        <option value="2">Penilaian</option>
                                                        <option value="3">Tanpa Kepala Parameter</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="tampil_nilai"></div>
                                            
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

        function pilih_kategori(a){
            
                var id=$('#detail_parameter_id').val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('Lhe/tampil_nilai')}}",
                    data: "id="+id+"&utama="+a,
                    success: function(msg){
                        $('#tampil_nilai').html(msg);
                        
                    }
                }); 
            
        }

        function hapus(a){
            
                $.ajax({
                    type: 'GET',
                    url: "{{url('Lhe/hapus')}}",
                    data: "id="+a,
                    success: function(msg){
                        location.reload();
                        
                    }
                }); 
            
        }

        function simpan_data(){
            var form=document.getElementById('tambah-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Lhe/penilaian')}}",
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