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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">TCSM</a></li>
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
                            <a href="#" class="btn btn-lg btn-primary fa fa-plus-circle" type="button" data-bs-toggle="modal" data-bs-target="#addModal"></a>
                        </div>
                        <p class="card-title-desc">Data Lembur Karyawan Departemen TCSM PT. MRT Jakarta
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Submitter</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Total (hrs)</th>
                                <th>Approval</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($lembur as $item)
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
                                        {{ date('d F Y', strtotime($item->tanggal_mulai)) }}
                                        {{-- -
                                        {{ date('d F Y', strtotime($item->tanggal_akhir)) }} --}}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $item->waktu_mulai }}
                                        -
                                        {{ $item->waktu_akhir }}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $item->waktu_total }}
                                    </p>
                                </td>
                                <td class="text-center">

                                    <span @if($item->approval == 'APPROVED') class="badge badge-sm bg-success" @elseif($item->approval == 'REJECTED') class="badge badge-sm bg-danger" @elseif ($item->approval == 'DRAFT') class="badge badge-sm bg-secondary" @else class="badge badge-sm bg-warning" @endif>
                                        {{ $item->approval }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <span @if($item->approval != 'DRAFT') hidden @else @endif>
                                            <a href="/lembur/submit/{{ $item->id }}" class="mx-0" data-bs-toggle="tooltip" data-bs-original-title="Submit">
                                                <button class="fas fa-paper-plane btn-success btn-sm"></button>
                                                {{-- <i class="fas fa-paper-plane text-secondary"></i> --}}
                                            </a>
                                        </span>
                                        <span @if($item->approval != 'DRAFT') hidden @else @endif>
                                            <a href="/edit/{{ $item->id }}/lembur" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Edit data">
                                                <button class="fas fa-pen btn-warning btn-sm"></button>
                                                {{-- <i class="fas fa-pen text-secondary"></i> --}}
                                            </a>
                                        </span>
                                        <span @if($item->approval == 'APPROVED') hidden @else @endif>
                                            <form action="{{ route('lembur.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="fas fa-trash btn-danger btn-sm btndelete waves-effect waves-light"data-bs-toggle="tooltip" data-bs-original-title="Delete data"></button>
                                            </form>
                                        </span>
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
                <form role="form" action="{{ url('/lembur/new') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="text-uppercase" id="exampleModalLabel">
                            <i class="fas fa-briefcase"></i>
                            Buat {{ $tittle }} Baru
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- ISI --}}
                        <div class="mb-2">
                            <label class="col-form-label">Nama :</label>
                            <input type="text" class="form-control font-weight-bold" readonly value="{{ __(auth()->user()->name) }}">
                            <input type="text" name="user_id" class="form-control" hidden value="{{ __(auth()->user()->id) }}">
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Jenis Lembur :</label>
                            <select class="form-control" aria-label="Default select example" name="jenis_lembur" required>
                                <option disabled selected>- Pilih jenis lembur -</option>
                                    <option value="Hari Kerja">Hari Kerja</option>
                                    <option value="Hari Libur Shift">Hari Libur Shift</option>
                                    <option value="Hari Libur Nasional">Hari Libur Nasional</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Tanggal Pelaksanaan :</label>
                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd MM yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                <input type="text" class="form-control" name="tanggal_mulai" placeholder="Tanggal mulai"/>
                                <input type="text" class="form-control" name="tanggal_akhir" placeholder="Tanggal selesai"/>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Jam Pelaksanaan (AM/PM) :</label>
                            <div class="input-group">
                                <div class="input-group mb-1">
                                    <span class="input-group-text bg-success">Mulai</span>
                                    <input type="time" name="waktu_mulai" class="form-control">
                                    <span class="input-group-text bg-warning">Selesai</span>
                                    <input type="time" name="waktu_akhir" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Uraian Tugas :</label>
                            <textarea class="form-control" name="deskripsi"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Foto Tap IN :</label>
                            <input class="form-control" type="file">
                        </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODALS --}}
</div>

@endsection