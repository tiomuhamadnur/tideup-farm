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
                                <a href="{{ route('kambing.qrcode') }}" class="btn btn-lg btn-success fas fa-qrcode"
                                    title="Generate QR Code Kambing" type="button"></a>
                            </div>
                            <p class="card-title-desc">{{ $tittle }} Tide Up Farm
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tgl. Beli</th>
                                        <th>Bobot Beli (kg)</th>
                                        <th>Harga Beli (Rp)</th>
                                        <th>Status</th>
                                        <th>Foto Beli</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($kambing as $item)
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
                                                    {{ date('d F Y', strtotime($item->tgl_beli)) }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->bobot_beli }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->harga_beli }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                {{-- <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->status }}
                                                </p> --}}
                                                <span class="badge badge-lg bg-success font-weight-bold">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail" src="{{ asset('storage/' . $item->foto_beli) }}"
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
                                                            href="{{ route('kambing.edit', $item->qr_code) }}">
                                                            Ubah
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('kambing.destroy', $item->id) }}"
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
