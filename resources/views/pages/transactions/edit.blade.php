@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Transaksi</strong>
            <small>{{$item->uuid}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{route('transactions.update', $item->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="form-control-lable">Nama Pemesan</label>
                    <input type="text" name="name" id="" value="{{old('name') ? old('name') : $item->name}}" class="form-control @error('name') is-invaild @enderror" >
                    @error('name')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-lable">Email</label>
                    <input type="email" name="email" id="" value="{{old('email') ? old('email') : $item->email}}" class="form-control @error('type') is-invaild @enderror" >
                    @error('type')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="number" class="form-control-lable">Nomor Handphone</label>
                    <input type="text" name="number" id="" value="{{old('number') ? old('number') : $item->number}}" class="form-control @error('number') is-invaild @enderror" >
                    @error('number')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-lable">Alamat Pemesan</label>
                    <input type="text" name="address" id="" value="{{old('address') ? old('address') : $item->address}}" class="form-control @error('address') is-invaild @enderror" >
                    @error('address')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Edit Pesanan</button>
                </div>
            </form>
        </div>
    </div>
@endsection