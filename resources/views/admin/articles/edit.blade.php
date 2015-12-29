@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑articles</div>

                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ URL('admin/articles/'.$article->id) }}" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            title: <input type="text" name="title" class="form-control" required="required" value="{{ $article->title }}">
                            <br>
                            slug:
                            <input type="text" name="slug" class="form-control" required="required" value="{{ $article->slug }}">
                            <br>
                            body:
                            <input type="text" name="body" class="form-control" required="required" value="{{ $article->body }}">
                            <br>
                            image:
                            <textarea name="image" rows="10" class="form-control" required="required">{{ $article->image }}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">提交修改</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection