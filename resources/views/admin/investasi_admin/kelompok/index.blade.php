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
                            <div class="float-end">
                                <a href="#" class="btn btn-lg btn-primary fa fa-plus-circle me-2" type="button"
                                    data-bs-toggle="modal" data-bs-target="#addModal"></a>
                            </div>
                            <p class="card-title-desc">{{ $tittle }} Tide Up Farm
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($kelompok as $item)
                                        <tr>
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
                                                        <a class="dropdown-item" href="#" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#editKelompokModal"
                                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                                            Ubah
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.kelompok.delete', $item->id) }}"
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
    </div>

    <!-- Modal Add Investasi -->
    <div>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('admin.kelompok.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                <i class="far fa-object-group"></i>
                                Buat {{ $tittle }} Baru
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-2">
                                <label class="col-form-label">Kelompok :</label>
                                <input type="text" name="name"
                                    class="form-control @error('name')
                                is-invalid
                                @enderror"
                                    autocomplete="off" placeholder="Nama kelompok">
                                @error('name')
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
    {{-- END MODALS --}}

    <!-- Modal Add Kelompok -->
    <div>
        <div class="modal fade" id="addKelompokModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('admin.kelompok.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                Buat Data Kelompok Investasi Baru
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="col-form-label">Nama Kelompok :</label>
                                <input type="text" name="name"
                                    class="form-control @error('name')
                                        is-invalid
                                        @enderror"
                                    value="{{ old('name') }}" autocomplete="off">
                                @error('name')
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

    <!-- Modal Edit Kelompok -->
    <div>
        <div class="modal fade" id="editKelompokModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('admin.kelompok.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                Edit Data Kelompok Investasi
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="col-form-label">Nama Kelompok :</label>
                                <input type="text" name="id" id="id_update" hidden>
                                <input type="text" name="name" id="name_update"
                                    class="form-control @error('name')
                                            is-invalid
                                            @enderror"
                                    value="{{ old('name') }}" autocomplete="off">
                                @error('name')
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
        $('#editKelompokModal').on('show.bs.modal', function(e) {
            let id = $(e.relatedTarget).data('id');
            let name = $(e.relatedTarget).data('name');
            $('#id_update').val(id);
            $('#name_update').val(name);
        });
    </script>

    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                $('#addModal').modal('show');
            });
        </script>
    @endif
@endsection
@endsection
