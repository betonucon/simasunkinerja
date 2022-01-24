@if(Auth::user()->role_id==3)

    <div class="form-grup" style="margin-bottom:2%">
        <label>Pilih Tahun</label>
        <select class="form-control" style="width:20%;display:inline" onchange="pilih_tahun_laporan(this.value)">
        @foreach(lhe_opd_get(akses_opd()) as $opdtahun)
             <option value="{{base64_encode($opdtahun->id)}}" @if($id==base64_encode($opdtahun->id)) selected @endif>{{$opdtahun->tahun}}</option>
        @endforeach
        </select>
        @if($data->sts==1)
            <span class="btn btn-green btn-sm" onclick="kirim_auditor({{$data->id}})">Kirim</span>
        @else

        @endif
    </div>

@endif
<ul class="nav nav-pills mb-2" style="background: #a8a8e3;padding: 1%;">
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke" class="nav-link @if($act=='kke') active @endif">
            <span class="d-sm-none">LKE</span>
            <span class="d-sm-block d-none">LKE</span>
        </a>
    </li>
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke1" class="nav-link @if($act=='kke1') active @endif">
            <span class="d-sm-none">KKE1 Capaian</span>
            <span class="d-sm-block d-none">KKE1 Capaian</span>
        </a>
    </li>
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke2" class="nav-link @if($act=='kke2') active @endif">
            <span class="d-sm-none">KKE2</span>
            <span class="d-sm-block d-none">KKE2</span>
        </a>
    </li>
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke31" class="nav-link @if($act=='kke31') active @endif">
            <span class="d-sm-none">KKE3 IT</span>
            <span class="d-sm-block d-none">KKE3 IT</span>
        </a>
    </li>
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke32" class="nav-link @if($act=='kke32') active @endif">
            <span class="d-sm-none">KKE3 IS</span>
            <span class="d-sm-block d-none">KKE3 IS</span>
        </a>
    </li>
    <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
        <a href="{{url('Transaksilhe/create?id='.$id)}}&act=kke33" class="nav-link @if($act=='kke33') active @endif">
            <span class="d-sm-none">KKE3A IKU</span>
            <span class="d-sm-block d-none">KKE3A IKU</span>
        </a>
    </li>
    @if(Auth::user()->role_id==3)

    @else
        <li class="nav-item" style="background: #fff;border: solid 1px #d1c4c4;">
            <a href="{{url('Transaksilhe/create?id='.$id)}}&act=rekomendasi" class="nav-link @if($act=='rekomendasi') active @endif">
                <span class="d-sm-none">Rekomendasi</span>
                <span class="d-sm-block d-none">Rekomendasi</span>
            </a>
        </li>

    @endif
    
    
</ul>