@extends('layouts.master')

@section('content')
    <h1>Edit Ruang Parkir</h1>
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        </div>
    @endif
        <div class="row">
        <div class="col lg-12">
        <form action="/pruang1/{{$data_ruang->id}}/update" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Ruang</label>
                    <input type="text" name="ruang" class="form-control" id="exampleInputEmail1" aria-describedby
                    ="emailHelp" placeholder="{{$data_ruang->ruang}}" value="{{$data_ruang->ruang}}" readonly>
                </div>
                
                <div class="form-group">
                <label for="exampleFormControlSelect1">Plat Nomor yang tersedia</label>
                <select class="form-control" name="no_kendaraan" id="exampleFormControlSelect1">
                    @foreach($data_ruang as $ruang)
                    <option value="{{$data_ruang->no_kendaraan}}">{{$data_ruang->no_kendaraan}}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>
@endsection