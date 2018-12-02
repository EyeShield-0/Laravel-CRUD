@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Artwork
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
            <form method="post" action="{{ route('records.update', $records->id) }}">
                @method('PATCH')


                <div class="form-group">
                    @csrf
                    <label for="AC#">AC# :</label>
                    <input type="text" class="form-control" name="AC#" value='{{ $records-> AC }}'>
                </div>
                <div class="form-group">
                    <label for="Artist">Artist :</label>
                    <input type="text" class="form-control" name="Artist" value='{{$records-> Artist}}'>
                </div>
                <div class="form-group">
                    <label for="Title">Title :</label>
                    <input type="text" class="form-control" name="Title" value='{{$records->Title}}'>
                </div>
                <div class="form-group">
                    <label for="Date">Date :</label>
                    <input type="text" class="form-control" name="Date" value='{{$records->Date}}' >
                </div>
                <div class="form-group">
                    <label for="Medium">Medium :</label>
                    <input type="text" class="form-control" name="Medium"value='{{$records->Medium}}'>
                </div>
                <div class="form-group">
                    <label for="Dimension">Dimension :</label>
                    <input type="text" class="form-control" name="Dimension" value='{{$records->Dimension}}'>
                </div>
                <div class="form-group">
                    <label for="Category">Category :</label>
                    <input type="text" class="form-control" name="Category"value='{{$records->Category}}'>
                </div>

















                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-primary"  href="{{ route('records.index')}}">Back</a>

            </form>
        </div>
    </div>
@endsection