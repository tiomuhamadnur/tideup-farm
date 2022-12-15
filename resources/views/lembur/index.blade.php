@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                <span class="alert-text text-white">
                {{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </button>
            </div>
            @endif
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Lembur</h5>
                        </div>
                        <div class="float-right">
                            <a href="#" class="btn bg-gradient-primary btn-sm mb-0 fa fa-plus-circle" type="button" data-bs-toggle="modal" data-bs-target="#addModal"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Submitter
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Approval
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lembur as $item)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $item->user->name }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ date('d F Y', strtotime($item->tanggal_mulai)) }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        
                                        <span @if($item->approval == 'APPROVED') class="badge badge-sm bg-gradient-success" @elseif($item->approval == 'REJECTED') class="badge badge-sm bg-gradient-danger" @elseif ($item->approval == 'DRAFT') class="badge badge-sm bg-gradient-secondary" @else class="badge badge-sm bg-gradient-warning" @endif>
                                            {{ $item->approval }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/lembur/submit/{{ $item->id }}" class="mx-0" data-bs-toggle="tooltip" data-bs-original-title="Submit">
                                            <i class="fas fa-paper-plane text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="/edit/{{ $item->id }}/lembur" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit data">
                                                <i class="fas fa-pen text-secondary"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a class="delete-confirm" href="/lembur/delete/{{ $item->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete data">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form role="form" action="{{ url('/lembur/new') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Buat Data Lembur Baru
                        </h5>
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
                            <div class="input-group">
                                <div class="input-group mb-1">
                                    <span class="input-group-text bg-success">Mulai</span>
                                    <input type="date" name="tanggal_mulai" class="form-control">
                                    <span class="input-group-text bg-secondary">Selesai</span>
                                    <input type="date" name="tanggal_akhir" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Jam Pelaksanaan (AM/PM) :</label>
                            <div class="input-group">
                                <div class="input-group mb-1">
                                    <span class="input-group-text bg-success">Mulai</span>
                                    <input type="time" name="waktu_mulai" class="form-control">
                                    <span class="input-group-text bg-secondary">Selesai</span>
                                    <input type="time" name="waktu_akhir" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Uraian Tugas :</label>
                            <textarea class="form-control" name="deskripsi"></textarea>
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Foto Kegiatan 1 :</label>
                            <input class="form-control" type="file">
                        </div>

                        <div class="mb-2">
                            <label class="col-form-label">Foto Kegiatan 2 :</label>
                            <input class="form-control" type="file">
                        </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODALS --}}

@endsection