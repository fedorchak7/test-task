@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Template') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                {{ __('Subject') }}: {{ $template->subject }}
                            </p>
                            <p class="card-text">
                                {{ __('Body') }}: {{ $template->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="col-3 btn btn-block btn-primary"><a href="{{ route('template.edit', $template->id) }}" class="text-white">Edit template</a></button>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
