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
                            <form role="form" action="{{ route('admin.investasi.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-2">
                                    <label class="col-form-label">Investor :</label>
                                    <input type="text" name="id" hidden value="{{ $investasi->id }}">
                                    <select name="user_id"
                                        class="form-select @error('user_id')
                                        is-invalid
                                    @enderror">
                                        <option selected disabled value="{{ $investasi->user->id }}">
                                            {{ $investasi->user->name }}</option>
                                        @foreach ($investor as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="col-form-label">Modal Investasi (Rp) :</label>
                                    <input type="text" name="modal"
                                        class="form-control @error('modal')
                                    is-invalid
                                    @enderror"
                                        value="{{ $investasi->modal }}" autocomplete="off">
                                    @error('modal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Tanggal
                                        investasi :</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        <input type="date"
                                            class="form-control @error('tgl_investasi')
                                        is-invalid
                                        @enderror"
                                            name="tgl_investasi" value="{{ $investasi->tgl_investasi }}">
                                        @error('tgl_investasi')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="col-form-label">Kwitansi beli :</label>
                                    <input
                                        class="form-control @error('kwitansi_investasi')
                                    is-invalid
                                    @enderror"
                                        type="file" name="kwitansi_investasi">
                                    @error('kwitansi_investasi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img style="height: 100px"
                                        @if ($investasi->kwitansi_investasi != null) src="{{ asset('storage/' . $investasi->kwitansi_investasi) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                        class="img-thumbnail mt-2">
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
