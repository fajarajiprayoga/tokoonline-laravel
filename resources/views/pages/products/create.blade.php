@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('products.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-lable">Nama Barang</label>
                    <input type="text" name="name" id="" value="{{old('name')}}" class="form-control @error('name') is-invaild @enderror" >
                    @error('name')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-lable">Tipe Barang</label>
                    <input type="text" name="type" id="" value="{{old('type')}}" class="form-control @error('type') is-invaild @enderror" >
                    @error('type')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="form-control-lable">Deskripsi Barang</label>
                    <textarea name="description" class="form-control ckeditor @error('description') is-invailid @enderror">{{old('description')}}</textarea>
                    @error('description')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="form-control-lable">Harga Barang</label>
                    <input type="number" name="price" id="" value="{{old('price')}}" class="form-control @error('price') is-invaild @enderror" >
                    @error('price')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-lable">Quantity</label>
                    <input type="number" name="quantity" id="" value="{{old('quantity')}}" class="form-control @error('quantity') is-invaild @enderror" >
                    @error('quantity')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection