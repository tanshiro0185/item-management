@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>編集画面</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
            <form action="/items/edit/{{$item->id}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{$item->name}}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select  class="form-control" id="type" name="type" placeholder="種別">
                        @foreach (Config::get('pulldown.category_name') as $key => $val)
                            <option value="{{ $key }}" {{$item->type === $key ? 'selected' : ''}}>{{ $val }}</option>
                         @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" value="{{$item->detail}}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
