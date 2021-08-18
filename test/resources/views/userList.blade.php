@extends('welcome')
@section('content')
    <div class="p-5">

        <h2 class="text-center p-2">Users</h2>

        @if ($usuarios->count())
            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            <h4>Name </h4>
                        </th>
                        <th>
                            <h4>UserName</h4>
                        </th>
                        <th>
                            <h4>Email</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $user)
                        <tr>
                            <td style="font-size: 1.5rem">  {{ $user->name }}</td>
                            <td style="font-size: 1.5rem">{{ $user->username }}</td>
                            <td style="font-size: 1.5rem">{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-warning m-1 btn-lg" href="{{ route('updateUsuario', $user->id) }}">Edit</a>
                                <a class="btn btn-primary m-1 btn-lg" href="{{ route('updateUsuarioPassword', $user->id) }}">Edit
                                    Password</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger m-1 btn-lg" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h1 class="text-center">No User in Database</h1>
        @endif
    </div>

@endsection
