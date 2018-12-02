@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Artwork
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('records.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="AC">AC# :</label>
                    <input type="text" class="form-control" name="AC"/>
                </div>
                <div class="form-group">
                    <label for="Artist">Artist :</label>
                    <input type="text" class="form-control" name="Artist"/>
                </div>
                <div class="form-group">
                    <label for="Title">Title :</label>
                    <input type="text" class="form-control" name="Title"/>
                </div>
                <div class="form-group">
                    <label for="Date">Date :</label>
                    <input type="text" class="form-control" name="Date"/>
                </div>
                <div class="form-group">
                    <label for="Medium">Medium :</label>
                    <input type="text" class="form-control" name="Medium"/>
                </div>
                <div class="form-group">
                    <label for="Dimension">Dimension :</label>
                    <input type="text" class="form-control" name="Dimension"/>
                </div>
                <div class="form-group">
                    <label for="Category">Category :</label>
                    <input type="text" class="form-control" name="Category"/>
                </div>


                <button type="submit" class="btn btn-primary">Add</button>

                <a class="btn btn-primary"  href="{{ route('records.index')}}">Back</a>

            </form>
        </div>
    </div>
@endsection