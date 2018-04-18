@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Post</div>
                    <div class="panel-heading"><a href="{{url('/add-post')}}">Add Post</a></div>
                    @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>User ID</th>
                                <th>Post 1</th>
                                <th>Delete</th>
                                <th>Edite</th>
                            </tr>


                            @foreach($post as $postes)
                                <tr>
                                    <td>
                                        {{$postes->user_id}}
                                    </td>
                                    <td>
                                        {{$postes->test}}
                                    </td>

                                    <td>
                                        <a href="{{url('/delete-post/'.$postes->id)}}">Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{url('/edite-post/'.$postes->id)}}">Edite</a>
                                    </td>

                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
