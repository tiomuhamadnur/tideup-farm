@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Edit Jabatan User</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container">
                            <form action="user-management/{{ $user->id }}" method="POST">
                                @method('put')
                                @csrf
                                <label class="form-label">
                                    Nama User
                                </label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                                <label class="form-label">
                                    Jabatan
                                </label>
                                <select class="form-control" aria-label="Default select example" name="role">
                                    @if( $user->role == "admin" )
                                        <option value="admin" disabled selected>Admin</option>
                                    @else
                                        <option value="Departement Head" @if ( $user->role == "Departement Head")
                                        selected @endif>Departement Head</option>
                                        <option value="Section Head" @if ( $user->role == "Section Head")
                                            selected @endif>Section Head</option>
                                        <option value="Staff Maintenance" @if ( $user->role == "Staff Maintenance")
                                            selected @endif>Staff Maintenance</option>
                                        <option value="Staff Planning" @if ( $user->role == "Staff Planning")
                                            selected @endif>Staff Planning</option>
                                    @endif
                                </select>
                                <input class="mt-3 btn btn-primary" type="submit" name="submit" value="Simpan" data-bs-toggle="tooltip" data-bs-original-title="Save Data Job Wesel">
                                <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection