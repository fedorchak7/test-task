@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Contacts') }}</h1>
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
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Work place</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td><a href="{{ route('contact.show', $contact->id) }}">{{ $contact->first_name . ' ' . $contact->last_name }}</a></td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->work_place }}</td>
                                        <td>{{ $contact->address }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $contacts->links() }}
                        </div>
                    </div>

                </div>
                <button type="button" class="col-3 btn btn-block btn-primary"><a href="{{ route('contact.add') }}" class="text-white">Add contact</a></button>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
