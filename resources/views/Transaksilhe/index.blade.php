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
                        
                        <table id="myTable" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th width="15%">Evaluasi</th>
                                    <th >Nama OPD</th>
                                    <th  width="5%">Tahun</th>
                                    <th  width="5%">Target</th>
                                    <th  width="5%">Aktual</th>
                                    <th  width="4%">LKE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auditor_get() as $no=>$o)
                                <tr class="odd gradeX">
                                    <td class="f-s-600 text-inverse">{{$no+1}}</td>
                                    <td><span class="btn btn-green btn-xs" onclick="penilaian(`{{base64_encode($o->id)}}`)">EVALUSASI LKE</span></td>
                                    <td>{{$o->opd['lengkap']}} ({{$o->opd['keterangan']}})</td>
                                    <td>{{$o->tahun}}</td>
                                    <td>{{((total_nilai_parameter(lhe_id_opd($o->opd_id,$tahun))/100)*100)}}%</td>
                                    <td>{{((total_nilai_parameter(lhe_id($o->opd_id,$tahun))/100)*100)}}%</td>
                                    <td>{{kalkulasi((total_nilai_parameter(lhe_id($o->opd_id,$tahun))/100)*100)}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="modal fade" id="modal-tambah" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-besar">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Buat LKE</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xl-8 offset-xl-2">
                                        <form id="tambah-data" onkeypress="return event.keyCode != 13"  action="{{url('/Lhe')}}" method="post" enctype="multipart/form-data">
							                @csrf
                                            <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Informasi LKE</legend>
                                            <!-- begin form-group -->
                                            
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Judul Laporan <span class="text-danger">*</span></label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <textarea name="name" rows="3" placeholder="Ketik disini"  class="form-control"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">OPD</label>
                                                <div class="col-lg-5">
                                                    <select name="opd_id"  placeholder="Ketik.." class="form-control">
                                                        <option value="">Pilih OPD</option>
                                                        @foreach(opd_auditor_get() as $opd)
                                                            <option value="{{$opd['id']}}">{{$opd['name']}} ({{$opd['lengkap']}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">Tahun Laporan</label>
                                                <div class="col-lg-5">
                                                    <select name="tahun"  placeholder="Ketik.." class="form-control">
                                                        <option value="">Pilih Tahun</option>
                                                        @for($x=2020;$x<2030;$x++)
                                                            <option value="{{$x}}">{{$x}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row m-b-10">
                                                <label class="col-lg-3 text-lg-right col-form-label">File LKE</label>
                                                <div class="col-lg-5">
                                                    <input type="file" name="file" placeholder="Ketik.." class="form-control">
                                                </div>
                                            </div>
                                            
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
			paging: true,
			info: true,
			ordering:false,
			lengthChange: false,
		} );
        function tambah(){
            $('#modal-tambah').modal('show');
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
                    url: "{{url('/Transaksilhe')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        var tex=msg.split('@');
                        if(tex[0]=='ok'){
                            location.assign("{{url('Transaksilhe/create')}}?id="+tex[1]); 
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