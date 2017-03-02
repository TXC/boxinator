@extends('layouts.main')

@section('title', 'Form to add boxes')

@section('content')

    {!! Form::open(['url' => 'api/box']) !!}

    <h2>Add boxes</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::label('name', 'Name', ['class' => 'sr-only']) !!}
    {!!
        Form::text(
            'name',
            '',
            [
                'placeholder' => 'Name',
                'class' => 'form-control',
                'required' => 'required',
                'maxlength' => '10',
            ]
        )
    !!}

    {!! Form::label('weight', 'Weight (in kilograms)', ['class' => 'sr-only']) !!}
    {!!
        Form::number(
            'weight',
            '',
            [
                'placeholder' => 'Weight (in kilograms)',
                'class' => 'form-control',
                'required' => 'required',
                'step' => '0.01',
            ]
        )
    !!}

    {!! Form::label('color', 'Color', ['class' => 'sr-only']) !!}
    {!!
        Form::color(
            'color',
            '',
            [
                'placeholder' => 'Color',
                'class' => 'form-control',
                'required' => 'required',
            ]
        )
    !!}


    {!! Form::label('destination', 'Destination', ['class' => 'sr-only']) !!}
    {!!
        Form::select(
            'destination',
            [
                'sweden'    => 'Sweden',
                'china'     => 'China',
                'brazil'    => 'Brazil',
                'australia' => 'Australia',
            ],
            null,
            [
                'placeholder'   => 'Destination Country',
                'class'         => 'form-control',
            ]
        )
    !!}

    {!!
        Form::button(
            'Save',
            [
                'class' => 'btn btn-lg btn-primary btn-block',
                'type'  => 'submit',
            ]
        )
    !!}

    {!! Form::close() !!}
@endsection