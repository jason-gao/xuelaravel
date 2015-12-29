@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">管理articles</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr class="row">

                                <th class="col-lg-4">title</th>
                                <th class="col-lg-4">body</th>
                                <th class="col-lg-2">slug</th>
                                <th class="col-lg-4">image</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach ($articles as $article)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        <a href="{{URL('admin/')}}"
                                        {{ $article->title }}
                                    </td>
                                    <td class="col-lg-6">
                                        {{ $article->body }}
                                    </td>
                                    <td class="col-lg-2">
                                        {{ $article->slug }}
                                    </td>
                                    <td class="col-lg-4">
                                       <img src="{{$article->image}}" width="100" height="100">
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL('admin/articles/'.$article->id.'/edit') }}" class="btn btn-success">编辑</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL('admin/articles/'.$article->id) }}" method="POST" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
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