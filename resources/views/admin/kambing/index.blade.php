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
                                        <th>Investor</th>
                                        <th>Kelompok</th>
                                        <th>Status</th>
                                        <th>Tgl. Beli</th>
                                        <th>Tgl. Jual</th>
                                        <th>Bobot Beli (kg)</th>
                                        <th>Harga Beli (Rp)</th>
                                        <th>Foto Beli</th>
                                        {{-- <th>Kwitansi Beli</th> --}}
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
                                                    <b>{{ $item->user->name ?? '-' }}</b>
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <b>{{ $item->kelompok->name ?? '-' }}</b>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a type="button" class="waves-effect waves-light" data-bs-toggle="modal"
                                                    @if ($item->status == 'sold') data-bs-target="#xxx" @else data-bs-target="#jualKambingModal" @endif
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    title="Jual kambing {{ $item->name }}?">
                                                    <span
                                                        class="badge badge-lg @if ($item->status == 'ongoing') bg-success @else bg-danger @endif font-weight-bold">
                                                        {{ $item->status }}
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ date('d F Y', strtotime($item->tgl_beli)) }}
                                                </p>
                                            </td>
                                            <td class="text-left">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->tgl_jual ?? '-' }}
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
                                                <img class="img-thumbnail"
                                                    @if ($item->foto_beli != null) src="{{ asset('storage/' . $item->foto_beli) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td>
                                            {{-- <td class="text-center">
                                                <img class="img-thumbnail"
                                                    @if ($item->kwitansi_beli != null) src="{{ asset('storage/' . $item->kwitansi_beli) }}" @else src="{{ asset('storage/photo-kambing-beli/default/default.png') }}" @endif
                                                    style="height:50px">
                                            </td> --}}
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

            <!-- Modal Add-->
            <div>
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label class="col-form-label">Tipe Investasi :</label>
                                        <select name="tipe"
                                            class="form-select @error('tipe')
                                    is-invalid
                                @enderror">
                                            <option selected disabled>- Pilih Tipe Investasi -</option>
                                            <option value="mandiri">Mandiri</option>
                                            <option value="kelompok">Kelompok</option>
                                        </select>
                                        @error('tipe')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Kelompok :</label>
                                        <select name="kelompok_id"
                                            class="form-select @error('kelompok_id')
                                    is-invalid
                                @enderror">
                                            <option selected disabled>- Pilih Kelompok -</option>
                                            @foreach ($kelompok as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('kelompok_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

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
                                        <label class="col-form-label">Nama Kambing :</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name')
                                is-invalid
                                @enderror"
                                            value="{{ old('name') }}" autocomplete="off">
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">Tanggal
                                            beli :</label>
                                        <div class="input-group" id="datepicker2">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            <input type="text"
                                                class="form-control @error('tgl_beli')
                                    is-invalid
                                    @enderror"
                                                placeholder="dd MM, yyyy" data-date-format="dd MM, yyyy"
                                                data-date-container='#datepicker2' data-provide="datepicker"
                                                data-date-autoclose="true" name="tgl_beli"
                                                value="{{ old('tgl_beli') }}">
                                            @error('tgl_beli')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Harga beli (Rp.) :</label>
                                        <input type="text" name="harga_beli"
                                            class="form-control @error('harga_beli')
                                is-invalid
                                @enderror"
                                            value="{{ old('harga_beli') }}">
                                        @error('harga_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Bobot beli (kg) :</label>
                                        <input type="text" name="bobot_beli"
                                            class="form-control @error('harga_beli')
                                is-invalid
                                @enderror"
                                            value="{{ old('bobot_beli') }}">
                                        @error('bobot_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Foto beli :</label>
                                        <input
                                            class="form-control @error('foto_beli')
                                is-invalid
                                @enderror"
                                            type="file" name="foto_beli">
                                        @error('foto_beli')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Kwitansi beli :</label>
                                        <input
                                            class="form-control @error('kwitansi_beli')
                                is-invalid
                                @enderror"
                                            type="file" name="kwitansi_beli">
                                        @error('kwitansi_beli')
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
            {{-- End Modals --}}

            <!-- Modals Jual -->
            <div>
                <div id="jualKambingModal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form role="form" action="{{ route('kambing.jual') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-header">
                                    <h4 class="text-uppercase" id="exampleModalLabel">
                                        <i class="mdi mdi-cow"></i>
                                        Jual Kambing?
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="col-form-label">Nama Kambing :</label>
                                        <input type="text" name="id" id="id_update" hidden>
                                        <input type="text" class="form-control" id="name_update" readonly>
                                    </div>

                                    <div class="mb-2">
                                        <label class="form-label">Tanggal
                                            Jual :</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                            <input type="date"
                                                class="form-control @error('tgl_jual')
                                    is-invalid
                                    @enderror"
                                                name="tgl_jual" value="{{ old('tgl_jual') }}">
                                            @error('tgl_jual')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Harga jual (Rp.) :</label>
                                        <input type="text" name="harga_jual"
                                            class="form-control @error('harga_jual')
                                is-invalid
                                @enderror"
                                            value="{{ old('harga_jual') }}">
                                        @error('harga_jual')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Bobot jual (kg) :</label>
                                        <input type="text" name="bobot_jual"
                                            class="form-control @error('harga_jual')
                                is-invalid
                                @enderror"
                                            value="{{ old('bobot_jual') }}">
                                        @error('bobot_jual')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Foto jual :</label>
                                        <input
                                            class="form-control @error('foto_jual')
                                is-invalid
                                @enderror"
                                            type="file" name="foto_jual">
                                        @error('foto_jual')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Kwitansi jual :</label>
                                        <input
                                            class="form-control @error('kwitansi_jual')
                                is-invalid
                                @enderror"
                                            type="file" name="kwitansi_jual">
                                        @error('kwitansi_jual')
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
            {{-- End Modals --}}

        </div>
    </div>

@section('javascript')
    <script>
        $('#jualKambingModal').on('show.bs.modal', function(e) {
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
