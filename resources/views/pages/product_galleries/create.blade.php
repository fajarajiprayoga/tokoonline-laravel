@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('product-galleries.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-lable">Nama Barang</label>
                    <select name="products_id" class="form-control @error('products_id') is-invaild @enderror" id="">
                        @foreach ($product as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('name')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="form-control-lable">Foto Barang</label>
                    <input type="file" name="photo" accept="image/*" id="" value="{{old('photo')}}" class="form-control @error('photo') is-invaild @enderror" >
                    @error('photo')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                &nbsp;
                <div class="form-group">
                    <label for="is_default" class="form-control-lable">Default</label>
                    <br>
                    <label>
                        <input type="radio" name="is_default" id="" value="1"> Ya
                    </label>
                    <label>
                        <input type="radio" name="is_default" id="" value="0"> Tidak
                    </label>
                    @error('is_default')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Foto Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection