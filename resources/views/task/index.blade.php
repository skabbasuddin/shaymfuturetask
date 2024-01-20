@extends('task.layout.app')
@section('css')
<style>
    .header-fixed{
        padding: 5px 10px ;
        margin-bottom: 15px;
    }
    table.dataTable thead th, table.dataTable thead td {
        border: 0px !important;
    }
    table.dataTable.no-footer{
        border: 0px !important;
    }
</style>
@endsection
@section('content')
<body class="bg-light">
    <div class="container mt-4">
        <div class="bg-white ">
            <div class="d-flex justify-content-between bg-dark header-fixed">
                <div>
                    <h3 class="text-white">User List</h3>
                </div>
                <div>

                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#createUserModal"><span class="material-symbols-outlined text-white align-middle">
                        add_circle
                        </span>
                        Create User
                    </button>
                </div>
            </div>
        <div class="p-3">
        <table id="userTable" class="table table-bordered table-striped text-center shadow-sm">
            <thead class="bg-light">
                <tr>
                    <th data-orderable="true">ID</th>
                    <th data-orderable="true">Name</th>
                    <th data-orderable="false">Address</th>
                    <th data-orderable="false">Gender</th>
                    <th data-orderable="false">Image</th>
                    <th data-orderable="false">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <td class="shadow-sm">{{ $index + 1 }}</td>
                        <td class="shadow-sm">{{ $user['name'] }}</td>
                        <td class="shadow-sm">{{ $user['address'] }}</td>
                        <td class="shadow-sm">{{ $user['gender'] }}</td>
                        <td class="shadow-sm">
                            <a href="{{ asset('storage/' . $user['image']) }}" download><img src="{{ asset('storage/' . $user['image']) }}" alt="User Image" style="height: 30px;"></a>
                        </td>
                        <td class="shadow-sm">
                            <button type="button" class="btn p-0" data-toggle="modal" data-target="#editUserModal{{ $index }}">
                                <span class="material-symbols-outlined text-primary">
                                    edit
                                    </span>
                            </button>
                            <form class="d-inline" action="{{ route('users.destroy', $index) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn p-0"><span class="material-symbols-outlined text-danger">
                                    delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </div>

    <!-- Modal for creating a new user -->
    @include('task.modal.create')
    <!-- Modals for update user -->
    @foreach($users as $index => $user)
        @include('task.modal.edit', ['index' => $index, 'user' => $user])
    @endforeach
    @endsection
    @section('script')
    <script>
        jQuery(document).ready(function($) {
            $('#userTable').DataTable({
             searching: false,
             paging: false,
             info: false,
            });
        });

    </script>
    @endsection







