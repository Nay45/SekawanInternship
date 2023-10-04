@extends('home')

@section('content')
    <div class="row">
        <div class="col-6">
            <h4>
                Laporan Pemesanan Kendaraan
            </h4>
            <div class="card">
                <div class="content">
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('manage.create') }}" class="btn btn-success mb-3 ">add data</a>
                        @endif
                        <a href="{{ route('export') }}" class="btn btn-secondary mb-3 ">Export </a>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kendaraan </th>
                                    <th>Driver</th>
                                    <th>Approval</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $item)
                                    @if (Auth::user()->role == 'admin' || (Auth::user()->role == 'approval' && Auth::user()->id == $item->approval_id))
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kendaraan }}</td>
                                            <td>{{ $item->driver }}</td>
                                            <td>{{ $item->approval_id-1 }}</td>
                                            <td>
                                                @php
                                                    $pendingApprovals = $data->where('created_at', $item->created_at)->where('approved', 0)->count();
                                                @endphp

                                                @if ($pendingApprovals > 0)
                                                    <span style="color: black;background-color:wheat;padding:10px;border-radius:45px;font-size:14px">Pending</span>
                                                @else
                                                    <span style="color: white;background-color:rgb(116, 205, 116);padding:10px;border-radius:45px;font-size:14px">Disetujui</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if (Auth::user()->role == 'approval' && Auth::user()->id == $item->approval_id)
                                                    @if ($item->approved == 1)
                                                        <form class="d-flex justify-content-center" action="{{ route('setStatus', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"> 
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form class="d-flex justify-content-center" action="{{ route('setStatus', $item->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success">
                                                                Approve
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <button class="d-flex justify-content-center btn btn-danger" disabled> 
                                                        <i class="fa-solid fa-ban"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <h4>
                Log History
            </h4>
            <div class="card">
                <div class="content">
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th># </th>
                                    <th>Activity</th>
                                    @if (Auth::user()->role == 'admin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($history as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $item->user_name }} {{ $item->activity_name }} pada
                                            {{ $item->created_at }}
                                        </td>
                                        @if (Auth::user()->role == 'admin')
                                        <td>
                                            <form action="{{ route('manage.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @empty
                                    <td colspan="3" class="text-center">Data kosong</td>
                                @endforelse


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
