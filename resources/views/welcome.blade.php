@extends('layouts.web')

@push('style')
	<style>
        #style-3::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px #fff;
            background-color: #fff;
        }
		body{
			background:#c7cceb !important;
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
		.visi{
			padding:2%;
			background: #b8fdb8;
		}
		.table th {
			text-align:center;
			vertical-align:middle !important;
			background: #37529f;
			color:#fff !important;
		}
		.table td {
			
		}

        

    </style>
@endpush
@section('conten')   
		<div id="content" class="content">
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-lg-12 col-xl-12">
					<marquee style="background: #9ddf36;color: #190e44;">" Selamat datang di aplikasi Inspektorat kota Cilegon - Sistem Informasi Manajemen evaluASi  Akuntabilitas Kinerja ( SIMASUN KINERJA ) " </marquee>
				</div>
				<div class="col-lg-12 col-xl-12">
					<div class="row row-space-10 m-b-20">
						<!-- begin col-4 -->
						<div class="col-lg-9 col-sm-6">
							<div class="widget widget-stats bg-aqua-teal m-b-10">
								<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
								<div class="stats-content">
									<div class="stats-title" style="color:#000;font-weight:bold"></div>
									<img src="{{url('img/walikota33.jpg')}}" width="100%">
									<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
										<div class="panel-body" style="color: #221919;font-weight: bold; text-align: center;">
											<h2>VISI & MISI</h2>
										"Terwujudnya Cilegon Baru, Modern dan Bermartabat "<br>
										"Kami bisa mewujudkan poin "modern", yakni dengan mengedepankan teknologi melalui Antara Digital Media lewat layanan informasi publiknya,”
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="widget widget-stats bg-aqua-teal m-b-10">
								<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
								<div class="stats-content">
									<iframe width="100%" height="250" src="https://www.youtube.com/embed/5Zl8xfEdZTg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									<div class="stats-title" style="color:#362b2b;font-weight:bold;background: #00f6d4; padding: 1%; text-transform: uppercase;">PROGRAM WASTE TO ENERGY PEMBUATAN DAN PEMANFAATAN BAHAN BAKAR JUMPUTAN PADAT (BBJP) KOTA CILEGON</div>
									
								</div>
								<div class="stats-content">
									<img src="{{url('img/berita1.jpeg')}}" width="100%">
									<div class="stats-title" style="color:#362b2b;font-weight:bold;background: #00f6d4; padding: 1%; text-transform: uppercase;">Pemkot Cilegon Dapat Penghargaan Smart City dari Menteri Kominfo Johnny G Plate</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
					
				<div class="col-xl-12">
					
					<div class="col-xl-12 col-lg-8" style="background:#00bdf6;padding-top:1%;padding-bottom:2px;">
						<!-- begin title -->
						<div class="mb-3 text-grey">
							<select id="tahun" onchange="pilih_tahun(this.value)" class="form-control" style="display:inline;width:40%">
								@for($x=2020;$x<2030;$x++)
									<option value="{{$x}}" @if($tahunini==$x) selected @endif >Laporan Tahun {{$x}}</option>
								@endfor
							</select>
						</div>
									
					</div>
					<!-- end card -->
				</div>
				
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row" id="row-web">
				<!-- begin col-8 -->
				<div class="col-xl-12 col-lg-6">
					<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
						<div class="panel-heading">
							<h4 class="panel-title">Dashboard</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							<canvas id="bar-chart" data-render="chart-js"></canvas>
						</div>
						
					</div>
				</div>
				<!-- end col-8 -->
				
			</div>
			<!-- end row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-xl-12 col-lg-6">
					<div class="panel panel-inverse" style="background: #fff;" data-sortable-id="chart-js-5">
						<div class="panel-heading">
							<h4 class="panel-title">Dashboard perbandingan dengan tahun sebelumnya</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body p-0">
							<table width="100%" style="width:96%;margin-left:2%"class="table table-bordered">
								<tr>
									<th rowspan="2" width="5%">No</th>
									<th rowspan="2" >Nama OPD</th>
									<th colspan="3">Tahun {{$tahunkemaren}}</th>
									<th colspan="3">Tahun {{$tahunini}}</th>
								</tr>
								<tr>
									<th width="10%">Target</th>
									<th width="10%">Actual</th>
									<th width="7%">Value</th>
									<th width="10%">Target</th>
									<th width="10%">Actual</th>
									<th width="7%">Value</th>
								</tr>
								@foreach(opd1_get(1) as $no=>$opd)
									<tr>
										<td>{{$no+1}}</td>
										<td>{{$opd->keterangan}}</td>
										<td class="text-center">{{total_nilai_opd_parameter($opd->id,$tahunkemaren)}}%</td>
										<td class="text-center">{{total_nilai_evaluasi_opd_parameter($opd->id,$tahunkemaren)}}%</td>
										<td class="text-center">{!! ket_total_nilai_evaluasi_opd_parameter($opd->id,$tahunkemaren) !!}</td>
										<td class="text-center">{{total_nilai_opd_parameter($opd->id,$tahunini)}}%</td>
										<td class="text-center">{{total_nilai_evaluasi_opd_parameter($opd->id,$tahunini)}}%</td>
										<td class="text-center">{!! ket_total_nilai_evaluasi_opd_parameter($opd->id,$tahunini) !!}</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
				<!-- end col-8 -->
				
			</div>
			<!-- end row -->
			
		</div>
       
@endsection
@push('ajax')
	<script src="{{url('assets/assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
	<script>
		$(document).ready(function() {
            $.ajax({
				type: 'GET',
				url: "{{url('Transaksilhe/detail_opd')}}",
				data: "tahunini={{$tahunini}}&tahunkemaren={{$tahunkemaren}}",
				success: function(msg){
					$("#detail-opd").html(msg);
				}
			}); 
        });

 		function pilih_tahun(a){
            location.assign("{{url('home')}}?tahun="+a);
        }
		

		Chart.defaults.global.defaultFontColor = COLOR_DARK;
		Chart.defaults.global.defaultFontFamily = FONT_FAMILY;
		Chart.defaults.global.defaultFontStyle = FONT_WEIGHT;
		var randomScalingFactor = function() { 
			return Math.round(Math.random()*100)
		};
		var barChartData = {
			labels: [
				@foreach(opd1_get(1) as $opd)
						'{{$opd->name}}', 
				@endforeach
			],
			datasets: [{
				label: 'Target',
				borderWidth: 1,
				borderColor: "#000",
				backgroundColor: "orange",
				data: [
						@foreach(opd1_get(1) as $opd)
							{{total_nilai_opd_parameter_target($opd->id,$tahunini)}},
						@endforeach
				]
			}, {
				label: 'Aktual',
				borderWidth: 1,
				borderColor: "#000",
				backgroundColor: "blue",
				data: [
						@foreach(opd1_get(1) as $opd)
							{{total_nilai_opd_parameter($opd->id,$tahunini)}},
						@endforeach
				]
			}]
		};
		var handleChartJs = function() {
			var ctx2 = document.getElementById('bar-chart').getContext('2d');
			var barChart = new Chart(ctx2, {
				type: 'bar',
				data: barChartData
			});
		}
		var ChartJs = function () {
			"use strict";
			return {
				//main function
				init: function () {
					handleChartJs();
				}
			};
		}();

		$(document).ready(function() {
			ChartJs.init();
		});


	</script>
@endpush