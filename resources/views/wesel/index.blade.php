@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">List Job Turnout Wesel</h5>
                        </div>
                        <a href="create-job-wesel" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Job</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Tim
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Wesel
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Pengerjaan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wesel as $item)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $item->user->name }} <br> 
                                            {{ $item->nama_tim_2 }} <br> 
                                            {{ $item->nama_tim_3 }} <br> 
                                            {{ $item->nama_tim_4 }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $item->nama_wesel }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $item->tanggal_kerja }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/export-job-wesel/{{ $item->id }}" target="_blank" class="mx-0" data-bs-toggle="tooltip" data-bs-original-title="Export PDF">
                                            <i class="fas fa-file-pdf text-secondary"></i>
                                        </a>
                                        <span>
                                            <a href="/edit-job-wesel/{{ $item->id }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit data">
                                                <i class="fas fa-pen text-secondary"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a class="delete-confirm" href="/wesel/delete/{{ $item->id }}" data-bs-toggle="tooltip" data-bs-original-title="Delete data">
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
@endsection