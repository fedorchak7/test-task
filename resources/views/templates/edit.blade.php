@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Template edit') }}</h1>
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
                    <form action="{{ route('template.update', $template->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p>Еhese variables will be replaced by contact data</p>
                            <p>contact.first_name, contact.last_name, contact.email, contact.work_place, contact.address</p>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <textarea id="subject" name="subject" class="form-control" rows="4" required>{{ $template->subject }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="body" name="body" class="form-control" rows="4" required>{{ $template->body }}</textarea>
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
