@extends('home')
@section('content')
    <h5>Log Aktivitas Semua fitur</h5>
    <div class="card text-center">
        <div class="content">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Activity</th>
                            <th>Time</th>
                            @if (Auth::user()->role == 'admin')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dt as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user_name }} {{ $item->activity }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if (Auth::user()->role == 'admin')
                                <td>
                                    <form action="{{ route('activity.destroy', $item->id) }}" method="POST">
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
                            <tr>
                                <td class="text-center" colspan="4">Data kosong</td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection
