@extends('home')
@section('content')
    <div class="row">
        @if (Auth::user()->role == 'admin')
        <div class="col-6">
            <h4>Manage Kendaraan</h4>
            <div class="card p-3" style="margin-top: 10px">
                <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp"
                            name="nama">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            </div>
        </div>
        @endif
        <div class="col-6">
            <h4>List Kendaraan</h4>
            <div class="card">
                <div class="content">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>Nama Kendaraan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
