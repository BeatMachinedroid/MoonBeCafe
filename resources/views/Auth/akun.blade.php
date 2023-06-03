@extends('layout.main.main')

@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">

                            </div>
                        </div>
                    </div>
                    {{-- /# column --}}
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('view.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Menu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- column --}}
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-6" style="text-align:right; ">
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ route('search.menu') }}" method="get">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search" name="search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            @if (session()->has('message'))
                                                                <div class="alert alert-success">
                                                                    {{ session()->get('message') }}
                                                                </div>
                                                            @endif
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Username</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th class="text-left">Create_at</th>
                                                                @if (Auth::user()->role == 'admin')
                                                                <th class="text-left">Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($user as $no => $item)
                                                                <tr>
                                                                    <th scope="row">{{ $no+1 }}</th>
                                                                    <td>{{ $item->username }}</td>

                                                                    <td>{{ $item->email }}</td>

                                                                    <td>{{ $item->role }}</td>
                                                                    <td class="text-left">{{ $item->created_at->format('d / m / Y , g.i A') }}</td>
                                                                    @if (Auth::user()->role == 'admin')
                                                                    <td class="text-left">
                                                                        <button class="btn btn-primary btn-sm btn-addon" data-toggle="modal" data-target="#editmenu-{{ $item->id }}">
                                                                            <i class="ti-pencil"></i>
                                                                            Edit
                                                                        </button>
                                                                        <a href="{{ '/akun/' . encrypt($item->id) .'/delete' }}"
                                                                            class="btn btn-danger btn-sm btn-addon" onclick="return confirm('Are you sure ?')">
                                                                            <i class="ti-trash"></i>
                                                                            Delete
                                                                        </a>
                                                                    </td>
                                                                    @endif
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Data is Empty
                                                                    </div>
                                                                </tr>
                                                            @endforelse

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <div class="row">

                                            {{ $user->links('layout.vendor.pagination.costume') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


{{-- /# row add--}}


{{-- {{ row edit }} --}}
@foreach ($user as $item)
<div class="modal fade" id="editmenu-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close"></i></span>
                </button>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <form method="POST" action="{{ route('put.user') }}">
                                        @csrf
                                        @method('PUT')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="password" value="{{ $item->password }}">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $item->username }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $item->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <select name="role" class="form-control">
                                                        <option value="{{ $item->role }}">{{ $item->role }}</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="kasir">Kasir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
