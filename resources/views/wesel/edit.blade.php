@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Edit Data</h5>
                        </div>
                        <a href="{{ route('show-detail-wesel') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="tooltip" data-bs-original-title="Detail Ilustration">&nbsp; Show Measurement</a>
                    </div>
                    <br>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container">
                            <form action="/update-job-wesel/{{ $wesel->id }}" method="POST">
                                @method('put')
                                @csrf
                                <label class="form-label">
                                    Nama Anggota Tim
                                </label>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">1.</span>
                                    <select class="form-control" aria-label="Default select example" name="user_id">
                                        <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                                    </select>
                                </div>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">2.</span>
                                    <select class="form-control" aria-label="Default select example" name="nama_tim_2">
                                        <option value="{{ $wesel->nama_tim_2 }}" disabled selected>{{ $wesel->nama_tim_2 }}</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">3.</span>
                                    <select class="form-control" aria-label="Default select example" name="nama_tim_3">
                                        <option value="{{ $wesel->nama_tim_3 }}" disabled selected>{{ $wesel->nama_tim_3 }}</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-1">
                                    <span class="input-group-text">2.</span>
                                    <select class="form-control" aria-label="Default select example" name="nama_tim_4">
                                        <option value="{{ $wesel->nama_tim_4 }}" disabled selected>{{ $wesel->nama_tim_4 }}</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Line
                                    </label> <br>
                                    <select class="form-control" aria-label="Default select example" name="nama_line">
                                        <option selected>Pilih Nama Line</option>
                                        <option value="UT" @if ($wesel->nama_line =="UT") selected @endif>Up Track</option>
                                        <option value="DT" @if ($wesel->nama_line =="DT") selected @endif>Down Track</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Stasiun / Area
                                    </label>
                                    <input type="text" class="form-control" name="nama_stasiun" value="{{ $wesel->nama_stasiun }}">
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Nama Wesel
                                    </label>
                                    <input type="text" class="form-control" name="nama_wesel" value="{{ $wesel->nama_wesel }}">
                                </div>
                                <div class="mb-0">
                                    <label class="form-label">
                                        Tanggal Kerja
                                    </label>
                                    <input type="date" class="form-control" name="tanggal_kerja" value="{{ $wesel->tanggal_kerja }}">
                                </div>

                                {{-- TRACK GAUGE --}}
                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-warning">Track Gauge</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>1</b></span>
                                    <input type="text" class="form-control" name="TG_1" value="{{ $wesel->TG_1 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" name="TG_2" value="{{ $wesel->TG_2 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2'</b></span>
                                    <input type="text" class="form-control" name="TG_2A" value="{{ $wesel->TG_2A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>2''</b></span>
                                    <input type="text" class="form-control" name="TG_2AA" value="{{ $wesel->TG_2AA }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>3</b></span>
                                    <input type="text" class="form-control" name="TG_3" value="{{ $wesel->TG_3 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>3'</b></span>
                                    <input type="text" class="form-control" name="TG_3A" value="{{ $wesel->TG_3A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>4'</b></span>
                                    <input type="text" class="form-control" name="TG_4A" value="{{ $wesel->TG_4A }}" placeholder="  OPTIONAL">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" name="TG_5" value="{{ $wesel->TG_5 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>5'</b></span>
                                    <input type="text" class="form-control" name="TG_5A" value="{{ $wesel->TG_5A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>6'</b></span>
                                    <input type="text" class="form-control" name="TG_6A" value="{{ $wesel->TG_6A }}" placeholder="  OPTIONAL">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>7</b></span>
                                    <input type="text" class="form-control" name="TG_7" value="{{ $wesel->TG_7 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>7'</b></span>
                                    <input type="text" class="form-control" name="TG_7A" value="{{ $wesel->TG_7A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>10</b></span>
                                    <input type="text" class="form-control" name="TG_10" value="{{ $wesel->TG_10 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-warning font-weight-bold"><b>10'</b></span>
                                    <input type="text" class="form-control" name="TG_10A" value="{{ $wesel->TG_10A }}">
                                </div>


                                {{-- CROSS LEVEL --}}
                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-success">Cross Level</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>1</b></span>
                                    <input type="text" class="form-control" name="CL_1" value="{{ $wesel->CL_1 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" name="CL_2" value="{{ $wesel->CL_2 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>3</b></span>
                                    <input type="text" class="form-control" name="CL_3" value="{{ $wesel->CL_3 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>3'</b></span>
                                    <input type="text" class="form-control" name="CL_3A" value="{{ $wesel->CL_3A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>4</b></span>
                                    <input type="text" class="form-control" name="CL_4" value="{{ $wesel->CL_4 }}" placeholder="  OPTIONAL">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>4'</b></span>
                                    <input type="text" class="form-control" name="CL_4A" value="{{ $wesel->CL_4A }}" placeholder="  OPTIONAL">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" name="CL_5" value="{{ $wesel->CL_5 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>5'</b></span>
                                    <input type="text" class="form-control" name="CL_5A" value="{{ $wesel->CL_5A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>7</b></span>
                                    <input type="text" class="form-control" name="CL_7" value="{{ $wesel->CL_7 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>7'</b></span>
                                    <input type="text" class="form-control" name="CL_7A" value="{{ $wesel->CL_7A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>8</b></span>
                                    <input type="text" class="form-control" name="CL_8" value="{{ $wesel->CL_8 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>8'</b></span>
                                    <input type="text" class="form-control" name="CL_8A" value="{{ $wesel->CL_8A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>10</b></span>
                                    <input type="text" class="form-control" name="CL_10" value="{{ $wesel->CL_10 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-success font-weight-bold"><b>10'</b></span>
                                    <input type="text" class="form-control" name="CL_10A" value="{{ $wesel->CL_10A }}">
                                </div>

                                {{-- ALIGNMENT --}}
                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-info">Alignment</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>2</b></span>
                                    <input type="text" class="form-control" name="AL_2" value="{{ $wesel->AL_2 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5</b></span>
                                    <input type="text" class="form-control" name="AL_5" value="{{ $wesel->AL_5 }}">
                                </div>
                                <div class="input-group mb-0">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>1/2</b></span>
                                    <input type="text" class="form-control" name="AL_5A_1per2" value="{{ $wesel->AL_5A_1per2 }}">
                                </div>
                                <div class="input-group mb-0">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>1/4</b></span>
                                    <input type="text" class="form-control" name="AL_5A_1per4" value="{{ $wesel->AL_5A_1per4 }}">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-info font-weight-bold"><b>5'</b></span>
                                    <span class="input-group-text bg-secondary font-weight-bold"><b>3/4</b></span>
                                    <input type="text" class="form-control" name="AL_5A_3per4" value="{{ $wesel->AL_5A_3per4 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-info font-weight-bold"><b>9</b></span>
                                    <input type="text" class="form-control" name="AL_9" value="{{ $wesel->AL_9 }}">
                                </div>

                                {{-- Longitudinal Level --}}
                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-dark" style="color: white">Longitudinal Level</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>2</b></span>
                                    <input type="text" class="form-control" name="LL_2" value="{{ $wesel->LL_2 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5</b></span>
                                    <input type="text" class="form-control" name="LL_5" value="{{ $wesel->LL_5 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>5'</b></span>
                                    <input type="text" class="form-control" name="LL_5A" value="{{ $wesel->LL_5A }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-dark font-weight-bold" style="color: white"><b>9</b></span>
                                    <input type="text" class="form-control" name="LL_9" value="{{ $wesel->LL_9 }}">
                                </div>

                                {{-- BACK GAUGE --}}
                                <hr class="mt-5 mb-0">
                                <h5 class="mt-0 mb-0 font-weight-bold bg-danger" style="color: white">Back Gauge</h5>
                                <hr class="mt-0 mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8</b></span>
                                    <input type="text" class="form-control" name="BG_8" value="{{ $wesel->BG_8 }}">
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text bg-danger font-weight-bold" style="color: white"><b>8'</b></span>
                                    <input type="text" class="form-control" name="BG_8A" value="{{ $wesel->BG_8A }}">
                                </div>


                                <input class="mt-5 btn btn-primary" type="submit" name="submit" value="Simpan" data-bs-toggle="tooltip" data-bs-original-title="Save Data Job Wesel">
                                <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection