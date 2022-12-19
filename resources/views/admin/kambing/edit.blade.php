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
                            <form role="form" action="{{ route('kambing.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input name="name" class="form-control" type="text"
                                            value="{{ $kambing->name }}">
                                        <input name="id" class="form-control" type="text" hidden
                                            value="{{ $kambing->id }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal beli</label>
                                    <div class="col-sm-10" id="datepicker2">
                                        {{-- <input name="tgl_beli" class="form-control" type="date"
                                            value="{{ $kambing->tgl_beli }}"> --}}
                                        <input type="text"
                                            class="form-control @error('tgl_beli')
                                        is-invalid
                                        @enderror"
                                            placeholder="dd MM, yyyy" data-date-format="dd MM, yyyy"
                                            data-date-container='#datepicker2' data-provide="datepicker"
                                            data-date-autoclose="true" name="tgl_beli"
                                            value="{{ date('d F, Y', strtotime($kambing->tgl_beli)) }}">
                                        @error('tgl_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Bobot beli (kg)</label>
                                    <div class="col-sm-10">
                                        <input name="bobot_beli"
                                            class="form-control @error('bobot_beli')
                                        is-invalid
                                        @enderror"
                                            type="text" value="{{ $kambing->bobot_beli }}">
                                        @error('bobot_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Harga beli (Rp)</label>
                                    <div class="col-sm-10">
                                        <input name="harga_beli"
                                            class="form-control @error('harga_beli')
                                        is-invalid
                                        @enderror"
                                            type="text" value="{{ $kambing->harga_beli }}">
                                        @error('harga_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Foto beli</label>
                                    <div class="col-sm-10">
                                        <input name="foto_beli"
                                            class="form-control @error('foto_beli')
                                        is-invalid
                                        @enderror"
                                            type="file">
                                        <img style="height: 100px"
                                            @if ($kambing->foto_beli != null) src="{{ asset('storage/' . $kambing->foto_beli) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                            class="img-thumbnail mt-2">
                                        @error('foto_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('kambing.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                <i class="mdi mdi-cow"></i>
                                Buat {{ $tittle }} Baru
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- ISI --}}
                            <div class="mb-3">
                                <label class="col-form-label">Nama :</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    placeholder="Nama Kambing">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal beli :</label>
                                <div class="input-group" id="datepicker2">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="text" class="form-control" placeholder="dd MM, yyyy"
                                        data-date-format="dd MM, yyyy" data-date-container='#datepicker2'
                                        data-provide="datepicker" data-date-autoclose="true" name="tgl_beli"
                                        value="{{ old('tgl_beli') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Harga beli (Rp.) :</label>
                                <input type="text" name="harga_beli" class="form-control"
                                    value="{{ old('harga_beli') }}" placeholder="Harga beli">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Bobot beli (kg) :</label>
                                <input type="text" name="bobot_beli" class="form-control"
                                    value="{{ old('bobot_beli') }}" placeholder="Bobot beli">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Foto beli :</label>
                                <input class="form-control" type="file" name="foto_beli">
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
        {{-- END MODALS --}}
    </div>
@endsection
