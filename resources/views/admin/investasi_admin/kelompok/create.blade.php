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
                            <form role="form" action="{{ route('admin.kelompok.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <label class="col-form-label">Kelompok:</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name')
                                    is-invalid
                                    @enderror"
                                        placeholder="Nama kelompok" autocomplete="off">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1">Simpan</button>
                                    <a href="{{ route('admin.investasi.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
