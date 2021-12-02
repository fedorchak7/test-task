@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Contact') }}</h1>
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
                            <h3 class="card-title">{{ $contact->first_name . ' ' . $contact->last_name }}</h3>
                            <p class="card-text">
                                {{ __('email') }}:{{ $contact->email }}
                            </p>
                            <p class="card-text">
                                {{ __('Work place') }}:{{ $contact->work_place }}
                            </p>
                            <p class="card-text">
                                {{ __('Address') }}:{{ $contact->address }}
                            </p>
                            <p class="card-text">
                                {{ __('User') }}:{{ $contact->user->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="col-3 btn btn-block btn-primary"><a href="{{ route('contact.edit', $contact->id) }}" class="text-white">Edit contact</a></button>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
