@extends('layout.templete')
<!-- START FORM -->
@section('konten')
@csrf
<form action='{{url('mahasiswa/'.$data->nim)}}' method='post'>
    @csrf
    @method('PUT')
    <a href="{{url('mahasiswa')}}" class="btn btn-secondary">kembali</a>
    </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm" >
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    {{$data->nim}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{$data->nama}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="konsentrasi" class="col-sm-2 col-form-label">Konsentrasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='konsentrasi' id="konsentrasi" value="{{$data->konsentrasi}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="konsentrasi" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          
        </div>
</form>
<!-- AKHIR FORM -->
@endsection
