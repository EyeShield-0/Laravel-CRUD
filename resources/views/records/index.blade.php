@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

            <form class="form-inline" action="{{ route('search')}}">
                {{ csrf_field() }}
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" name="Search" placeholder="Search" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary mb-2">&nbsp;&nbsp;➤&nbsp;&nbsp;   </button>
            </form>


        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>AC#</td>
                <td>Artist</td>
                <td>Title</td>
                <td>Date</td>
                <td>Medium</td>
                <td>Dimensions</td>
                <td>Category</td>

                @guest

                    @else
                    <td colspan="2">Action</td>

                    @endguest
            </tr>

            </thead>
            <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->AC}}</td>
                    <td>{{$record->Artist}}</td>
                    <td>{{$record->Title}}</td>
                    <td>{{$record->Date}}</td>
                    <td>{{$record->Medium}}</td>
                    <td>{{$record->Dimension}}</td>
                    <td>{{$record->Category}}</td>
                    @guest

                        @else
                        <td><a href="{{ route('records.edit',$record->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('records.destroy', $record->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>

                        @endguest

                </tr>
            @endforeach
            </tbody>
        </table>

        </div>

    <div class="mx-auto" style="width: 400px;">
        {{ $records->links() }}

    </div>



@endsection