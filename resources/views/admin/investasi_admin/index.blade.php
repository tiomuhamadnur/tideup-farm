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
                                        <th>Investasi (Rp)</th>
                                        <th>Tgl. Investasi</th>
                                        <th>Kwitansi Investasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($investasi as $item)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <b>{{ $item->user->name }}</b>
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->modal }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ date('d F Y', strtotime($item->tgl_investasi)) }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->kwitansi_investasi != null) src="{{ asset('storage/' . $item->kwitansi_investasi) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
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
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.investasi.edit', $item->id) }}">
                                                            Ubah
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.investasi.delete', $item->id) }}"
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
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form role="form" action="{{ route('admin.investasi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                <i class="mdi mdi-currency-usd"></i>
                                Buat {{ $tittle }} Baru
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-2">
                                <label class="col-form-label">Investor :</label>
                                <select name="user_id"
                                    class="form-select @error('user_id')
                                    is-invalid
                                @enderror">
                                    <option selected disabled>- Pilih Investor -</option>
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
                                    value="{{ old('modal') }}" autocomplete="off">
                                @error('modal')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Tanggal
                                    investasi :</label>
                                <div class="input-group" id="datepicker2">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="text"
                                        class="form-control @error('tgl_investasi')
                                    is-invalid
                                    @enderror"
                                        placeholder="dd MM, yyyy" data-date-format="dd MM, yyyy"
                                        data-date-container='#datepicker2' data-provide="datepicker"
                                        data-date-autoclose="true" name="tgl_investasi" value="{{ old('tgl_investasi') }}">
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

@section('javascript')
    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                $('#addModal').modal('show');
            });
        </script>
    @endif
@endsection
@endsection
