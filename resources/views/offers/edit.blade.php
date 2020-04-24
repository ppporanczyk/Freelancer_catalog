@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit offer:</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="post" action="{{ route('offers.update', $offer) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    Title: <input type="text" name="title" value="{{ $offer->title }}">
                    <br>
                    Description: <input type="text" name="description" value="{{ $offer->description }}">
                    <br>
                    Deadline: <input type="date" name="deadline" value="{{ $offer->deadline }}">
                    <br>
                    Max salary: <input type="text" name="maxSalary" value="{{ $offer->maxSalary }}">
                    <br>
                    <input type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
