@extends('layouts.app')

@section('content')
    <style>
        input{
            margin: 10px;
            width: 150px;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Offers:</h2>
                <form method="get" action="{{ route('offers.index') }}">
                    {{ csrf_field() }}
                    minSalary <input type="text" name="min_salary" value="{{ old("min_salary") }}">
                    maxDeadline: <input type="date" name="max_deadline" value="{{ old("max_deadline") }}">
                    <input type="submit" class="btn btn-primary" value="Filter">
                </form>
                <br>

                <a href="{{ route('offers.create') }}" class="btn btn-primary"> Add new +</a>

                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Salary</th>
                        <th>Deadline</th>
                        <th></th>
                    </tr>
                    @foreach( $offers as $offer )
                        <tr>
                            <th> <strong>{{$offer->title}}</strong></th>
                            <th>{{$offer->maxSalary}}</th>
                            <th>{{$offer->deadline}}</th>
                            <th><a href="{{ route('offers.show', $offer) }}"class="btn btn-primary">View</a></th>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
