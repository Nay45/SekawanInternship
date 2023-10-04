@extends('home')
@section('content')
    <h4>User approval yang aktif</h4>
    <div class="card">
        <div class="content">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Nama user</th>
                            <th>Email user</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                        @endforeach

                    </tbody>


                </table>
            </div>
            {{-- <div class="card-footer">{{ $dtlayanan->links() }}</div> --}}
        </div>
    </div>
@endsection
