@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>New offer:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('offers.store') }}">
                    {{ csrf_field() }}
                    Title: <input type="text" name="title" value="{{ old("title") }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ old("description") }}">
                    <br>
                    Deadline: <input type="date" name="deadline" value="{{ old("deadline") }}">
                    <br>
                    Max salary: <input type="text" name="maxSalary" value="{{ old("maxSalary") }}">
                    <br>
                    <input type="submit" value="Create">
                </form>
            </div>
        </div>
    </div>
@endsection
