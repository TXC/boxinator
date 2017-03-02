@extends('layouts.main')

@section('title', 'List boxes')

@section('content')

    <table>
        <caption>Table caption is the descriptive title</caption>
        <thead>
            <tr>
                <th>Receiver</th>
                <th>Weight</th>
                <th>Color</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>

    @foreach ($boxes as $box)

        <tr>
            <td>{{ $box->name }}</td>
            <td>{{ $box->weight }} kg</td>
            <td style="background-color: #{{ $box->color }};">&nbsp;</td>
            <td>{{ $box->cost }} SEK</td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection