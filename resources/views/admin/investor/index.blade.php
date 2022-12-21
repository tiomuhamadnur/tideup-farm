@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $tittle }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tide Up Farm</a></li>
                                <li class="breadcrumb-item active">{{ $tittle }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title-desc">{{ $tittle }} Tide Up Farm
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($investor as $item)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $item->id }}">
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <b>{{ $item->name }}</b>
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->role }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->email }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->phone }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-xs font-weight-bold mb-0">
                                                    {{ $item->location }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown card-header-dropdown">
                                                    <a class="text-reset dropdown-btn" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span>
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="#" class="dropdown-item" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#editModal"
                                                            data-id-user="{{ $item->id }}"
                                                            data-name-user="{{ $item->name }}"
                                                            data-email-user="{{ $item->email }}">
                                                            Ubah Role
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('investor.delete', $item->id) }}"
                                                            id="delete">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('investor.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                <i class="fas fa-users"></i>
                                Ubah Role {{ $tittle }}
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="col-form-label">Nama :</label>
                                <input type="text" class="form-control" id="name_update" readonly>
                                <input type="text" class="form-control" name="id" id="id_update" hidden>
                            </div>

                            <div class="mb-2">
                                <label class="col-form-label">Email :</label>
                                <input type="text" class="form-control" id="email_update" readonly>
                            </div>

                            <div class="mb-2">
                                <label class="col-form-label">Role :</label>
                                <select name="role"
                                    class="form-control @error('role')
                                    is-invalid
                                @enderror">
                                    <option selected disabled> - Pilih Role - </option>
                                    <option value="guest">Guest</option>
                                    <option value="investor">Investor</option>
                                    <option value="pengelola">Pengelola</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    aria-label="Close">Batal</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('javascript')
    <script>
        $('#editModal').on('show.bs.modal', function(e) {
            let id_update = $(e.relatedTarget).data('id-user');
            let name_update = $(e.relatedTarget).data('name-user');
            let email_update = $(e.relatedTarget).data('email-user');
            $('#id_update').val(id_update);
            $('#name_update').val(name_update);
            $('#email_update').val(email_update);
        });
    </script>
@endsection
@endsection
