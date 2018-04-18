@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">ADD Post</div>
                    <div class="panel-heading"><a href="{{url('/all-post')}}">All Post</a></div>

                    <div class="panel-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form method="post"

                              @if(isset($post))action="{{url('/update-post/'.$post->id)}}"
                              @else action="{{url('/store-post')}}"
                            @endif
                        >
                            {{ csrf_field() }}
                            <div class=" col-md-6">
                                <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
                                    <label for="text">text 1 *</label>
                                    <input type="text" id="text" name="text"
                                           @if(isset($post)) value="{{$post->test}}"
                                           @else value="{{ old('text') }}"
                                           @endif class="form-control" required="">
                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                                      <small class="text-danger">{{ $errors->first('text') }}</small>
                                                </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Submit BTN*</label>
                                    <input type="submit" class="form-control btn-primary" value="Submit">
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
