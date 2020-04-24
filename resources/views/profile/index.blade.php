@extends('layouts.app')

@section('content')
    <style>
        .container{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .col-md-8{
            flex: 1;
        }

    </style>
    <div class="container">
        <div class="col-md-8">
                <div class="panel-body">
                    <br>
                    <h3>Your offers</h3>
                    <a href="/offers/create" class="btn btn-primary">Add new offer +</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Salary</th>
                            <th>Deadline</th>
                            <th></th>
                        </tr>
                        @foreach( $offers as $offer )
                            <tr>
                                <th> <a href="{{ route('offers.show', $offer) }}">{{$offer->title}}</a></th>
                                <th>{{$offer->description}}</th>
                                <th>{{$offer->maxSalary}}</th>
                                <th>{{$offer->deadline}}</th>
                                <th><a href="{{ route('offers.edit', $offer) }}" class="btn btn-default">Edit</a><br>
                                <a href="{{ route('offers.destroy', $offer) }}" class="btn btn-default">Delete</a></th>
                            </tr>
                        @endforeach
                    </table>
                </div>
        </div>
        <div class="col-md-8">
            <div class="panel-body"><br>
                <h3>Assigned offers</h3>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach( $assignments as $assignment )
                        <tr>
                            <th>{{$assignment->offer->title}}</th>
                            <th>{{$assignment->offer->description}}</th>
                            <th>{{$assignment->expected_salary}}</th>
                            <th>{{$assignment->expected_deadline}}</th>
                            @if ( $assignment->status == 'Pending')
                                <th>{{$assignment->status}}</th>
                            @elseif ($assignment->status == 'Accepted' )
                                <th> <a href="{{route('offers.assignments.edit', [$offer, $assignment])}}" class="btn btn-default">Confirm</a><br>
                                <a href="{{route('offers.assignments.destroy', [$offer, $assignment])}}" class="btn btn-default">Resign</a></th>
                            @elseif ($assignment->status == 'Confirmed' )
                                <th>You got a job to do!</th>
                            @endif

                            <!-- To do
                            Confirm, Resign buttons dependent on assignments status -->
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
