@extends('master', ['title' => 'Users'])

@section('content')

<div class="card">
    <h2>List of users</h2>

    <table class="users_table">
        <tr>
            <th>Users</th>
            <th>Action</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->firstName }} {{ $user->lastName }}
                </td>

                <td>
                    <a class="btn btn-outline-warning btn-sm" href="{{ route('user.edit', $user->id) }}">Edit</a>
                    <a class="btn btn-outline-info btn-sm" href="{{ route('user.info', $user->id) }}">Info</a>
                    <a class="delete-user btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter" href="{{ route('user.destroy', $user->id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $users->links() }}

    {{-- <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Deleting user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete [{{ $user->firstName }} {{ $user->lastName }}]?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger btn-sm" href="{{ route('user.destroy', $user->id) }}">Delete</a>
                </div>
            </div>
        </div>
    </div> --}}

</div>

@endsection

@section('script')
{{-- Modal delete user --}}

    <script>
        // let btnDeleteUser = document.querySelectorAll('.delete-user');
        // let exampleModalCenter = document.getElementById("exampleModalCenter");
        // let modal = new bootstrap.Modal(exampleModalCenter);

        // btnDeleteUser.forEach((btnDeleteUser) => {
        //     btnDeleteUser.addEventListener('click', () =>{
        //         modal.show();
        //     });
        // });

    </script>
@endsection
