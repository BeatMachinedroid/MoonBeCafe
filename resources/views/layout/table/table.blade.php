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
                                    <li class="breadcrumb-item active"> Meja</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- column --}}
                </div>
                {{-- /# row --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <button type="button" class="btn btn-primary btn-addon" data-toggle="modal" data-target="#addModal">
                                            <i class="ti-plus"></i>
                                            Add Table
                                        </button>
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="{{ route('search.meja') }}" method="get">
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
                                                            <th>Nama Meja</th>
                                                            <th>QR Codes</th>
                                                            <th style=" text-align: left">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($meja as $no => $item)
                                                            <tr>
                                                                <th scope="row">{{ $no + 1 }}</th>
                                                                <td>{{ $item->meja }}</td>
                                                                <td><img src="{{ asset('storage/qrcodes/' . $item->qrcode) }}"
                                                                        alt="{{ $item->nama }}"
                                                                        style="width: 200px; height: 200px;"></td>
                                                                <td style="text-align: left">

                                                                    <a href="{{ 'meja/' . encrypt($item->id) . '/download' }}"
                                                                        class="btn btn-success btn-sm btn-addon">
                                                                        <i class="ti-download"></i>
                                                                        Download
                                                                    </a>

                                                                    <button class="btn btn-primary btn-sm btn-addon" data-toggle="modal" data-target="#editmeja-{{ $item->id }}">
                                                                        <i class="ti-pencil"></i>
                                                                        Edit
                                                                    </button>
                                                                    <a href="{{ 'meja/' . encrypt($item->id) . '/delete' }}"
                                                                        class="btn btn-danger btn-sm btn-addon" onclick="return confirm('Are you sure ?')">
                                                                        <i class="ti-trash"></i>
                                                                        Delete
                                                                    </a>

                                                                </td>
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

                                            {{ $meja->links('layout.vendor.pagination.costume') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="ti-close"></i></span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form method="post" action="{{ route('post.meja') }}" class="row">
                                                @csrf
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="No meja / Nama meja" name="meja">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

                @foreach ($meja as $item)
                <div class="modal fade" id="editmeja-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="ti-close"></i></span>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form method="POST" action="{{ route('meja.edit') }}" class="row">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="No meja / Nama meja" name="meja" value="{{ $item->meja }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                @endforeach
@endsection
