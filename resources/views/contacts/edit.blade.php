@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Contact edit') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('contact.update', $contact->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter first name" value="{{ $contact->first_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter last name" value="{{ $contact->last_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $contact->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="work_place">Work place</label>
                                <input name="work_place" type="text" class="form-control" id="work_place" placeholder="Enter work place" value="{{ $contact->work_place }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input name="address" type="text" class="form-control" id="address" placeholder="Enter address" value="{{ $contact->address }}">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
