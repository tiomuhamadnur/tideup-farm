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
                                <a href="#" class="btn btn-lg btn-primary fa fa-plus-circle" type="button"
                                    data-bs-toggle="modal" data-bs-target="#addModal"></a>
                            </div>
                            <p class="card-title-desc">{{ $tittle }} Tide Up Farm
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Submitter</th>
                                        <th>Kambing</th>
                                        <th>Tgl. Catat</th>
                                        <th>Bobot (kg)</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($pencatatan as $item)
                                        <tr>
                                            <input type="hidden" class="delete_id" value="{{ $item->id }}">
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
                                                    <b>{{ $item->kambing->name }}</b>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ date('d F Y', strtotime($item->tgl_catat)) }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $item->bobot }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <img class="img-thumbnail" src="{{ asset('storage/' . $item->foto) }}"
                                                    style="height:50px" alt="">
                                            </td>
                                            <td class="text-center">
                                                {{-- <div class="btn-group">
                                                    <span @if ($item->approval != 'DRAFT') hidden @else @endif>
                                                        <a href="/lembur/submit/{{ $item->id }}" class="mx-0"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Submit">
                                                            <button class="fas fa-paper-plane btn-success btn-sm"></button>
                                                        </a>
                                                    </span>
                                                    <span @if ($item->approval != 'DRAFT') hidden @else @endif>
                                                        <a href="/edit/{{ $item->id }}/lembur" class="mx-1"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Edit data">
                                                            <button class="fas fa-pen btn-warning btn-sm"></button>
                                                        </a>
                                                    </span>
                                                    <span @if ($item->approval == 'APPROVED') hidden @else @endif>
                                                        <form action="{{ route('lembur.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                class="fas fa-trash btn-danger btn-sm btndelete waves-effect waves-light"data-bs-toggle="tooltip"
                                                                data-bs-original-title="Delete data"></button>
                                                        </form>
                                                    </span>
                                                </div> --}}
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
                    <form role="form" action="{{ route('pencatatan.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="text-uppercase" id="exampleModalLabel">
                                <i class="fas fa-pencil-alt"></i>
                                {{ $tittle }}
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- ISI --}}
                            <div class="mb-3">
                                <label class="col-form-label">Submitter :</label>
                                <input type="text" class="form-control" readonly value="{{ auth()->user()->name }}">
                                <input type="text" name="user_id" class="form-control" value="{{ auth()->user()->id }}"
                                    hidden>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Kambing :</label>
                                <select name="kambing_id" class="form-control">
                                    <option selected disabled> - Pilih Kambing - </option>
                                    @foreach ($kambing as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Penimbangan :</label>
                                <div class="input-group" id="datepicker2">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    <input type="text" class="form-control" placeholder="dd MM, yyyy"
                                        data-date-format="dd MM, yyyy" data-date-container='#datepicker2'
                                        data-provide="datepicker" data-date-autoclose="true" name="tgl_catat">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Bobot (kg) :</label>
                                <input type="text" name="bobot" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Foto Penimbangan :</label>
                                <input class="form-control" type="file" name="foto">
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
