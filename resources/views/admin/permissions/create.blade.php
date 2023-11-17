@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route("admin.permissions.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">{{ trans('cruds.permission.fields.title') }}*</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">
                                @if($errors->has('title'))
                                <p class="help-block">
                                    {{ $errors->first('title') }}
                                </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.permission.fields.title_helper') }}
                                </p>
                            </div>
                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection