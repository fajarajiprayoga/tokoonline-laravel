@extends('layouts.default')

@section('content')
<a href="{{route('transactions.index')}}" class="btn btn-success btn-sm">Back</a>
    <table class="table table-bordered">
    <tr>
        <th>Nama</td>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <th>Email</td>
        <td>{{$item->email}}</td>
    </tr>
    <tr>
        <th>Nomor</td>
        <td>{{$item->number}}</td>
    </tr>
    <tr>
        <th>Address</td>
        <td>{{$item->address}}</td>
    </tr>
    <tr>
        <th>Total</td>
        <td>{{$item->transaction_total}}</td>
    </tr>
    <tr>
        <th>Status</td>
        <td>{{$item->transaction_status}}</td>
    </tr>
    <tr>
        <th>Pembelian Product</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @foreach ($product as $pr)
                    <tr>
                        <td>{{$pr->name}}</td>
                        <td>{{$pr->type}}</td>
                        <td>{{$pr->price}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{route('transactions.status', $item->id)}}?status=SUCCESS" class="btn btn-success btn-block"><i class="fa fa-check">Set Success</i></a>
        <a href="{{route('transactions.status', $item->id)}}?status=FAILED" class="btn btn-warning btn-block"><i class="fa fa-times">Set Gagal</i></a>
        <a href="{{route('transactions.status', $item->id)}}?status=PENDING" class="btn btn-info btn-block"><i class="fa fa-spinner">Set Pending</i></a>
    </div>
</div>
@endsection

