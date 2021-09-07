@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8 mx-auto text-center py-4">
        <h2 class="my-4">Harga Bitcoin hari ini</h2>
        <div class="table-responsive my-5">
            <table class="table table-bordered rounded">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Mata Uang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currencies as $currency)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $currency['symbol'] }}</td>
                            <td>{{ number_format($currency['buy']) }}</td>
                            <td>{{ number_format($currency['sell']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
