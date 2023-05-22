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
                                    <li class="breadcrumb-item"><a href="{{ route('view.dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Orders</li>
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
                                    <div class="col-sm-9">
                                        <button type="button" class="btn btn-primary btn-addon" data-toggle="modal" data-target="#addModal">
                                            <i class="ti-plus"></i>
                                            Add Table
                                        </button>
                                    </div>

                                    <div class="col-sm-3" style="padding-bottom: 0; padding-top: 0;">
                                        <form action="{{ route('order.search') }}" method="get">
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
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Meja</th>
                                                                <th>Menu</th>
                                                                <th>jumlah</th>
                                                                <th>Total Price</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                                <th class="text-left">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($order as $no => $item)
                                                            <tr>
                                                                <th scope="row">{{ $no+1 }}</th>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->email }}</td>
                                                                <td>{{ $item->Meja->meja }}</td>
                                                                <td>{{ $item->Menu->name }}</td>
                                                                <td>{{ $item->jumlah }}</td>
                                                                <td class="color-primary">Rp. {{ $item->total_price }}</td>
                                                                <td>
                                                                    @if ($item->payment_status == 'menunggu pembayaran')
                                                                    <span class="badge badge-warning">{{ $item->payment_status }}</span>
                                                                    @elseif ($item->payment_status == 'sudah dibayar')
                                                                    <span class="badge badge-primary">{{ $item->payment_status }}</span>
                                                                    @else
                                                                    <span class="badge badge-danger">{{ $item->payment_status }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $item->updated_at->format('d / m / Y')}}</td>
                                                                @if (Auth::user()->role == 'kasir')
                                                                <td >
                                                                    <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#editmenu-{{ $item->id }}">
                                                                        <i class="ti-pencil"></i>
                                                                    </button>
                                                                    <a href="{{ '/orders/' . encrypt($item->id) .'/delete' }}"
                                                                        class="btn btn-danger btn-sm " onclick="return confirm('Are you sure ?')">
                                                                        <i class="ti-trash"></i>
                                                                    </a>
                                                                </td>
                                                                @else
                                                                <td></td>
                                                                @endif
                                                                <div class="modal fade " id="editmenu-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                                <div class="row">
                                                                                                    <form method="post" action="{{ route('order.edit') }}">
                                                                                                        @csrf
                                                                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                                        @foreach ($menu as $item2)
                                                                                                            <input type="hidden" name="price" value="{{ $item2->price }}">
                                                                                                        @endforeach
                                                                                                        <div class="row">
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $item->name }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $item->email }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <select class="form-control" name="meja">
                                                                                                                            <option value="{{ $item->meja }}">{{ $item->Meja->meja }}</option>
                                                                                                                        @foreach ($meja as $item1)
                                                                                                                            <option value="{{ $item1->id }}">{{ $item1->meja }}</option>
                                                                                                                        @endforeach
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <select class="form-control" name="menu">
                                                                                                                            <option value="{{ $item->menu }}">{{ $item->Menu->name }}</option>
                                                                                                                        @foreach ($menu as $item2)
                                                                                                                            <option value="{{ $item2->id }}">{{ $item2->name }}</option>
                                                                                                                        @endforeach
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" value="{{ $item->jumlah }}">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-lg-4">
                                                                                                                <div class="form-group">
                                                                                                                    <select name="payment_status" class="form-control">
                                                                                                                        <option>{{ $item->payment_status }}</option>
                                                                                                                        <option >menunggu pembayaran</option>
                                                                                                                        <option >sudah dibayar</option>
                                                                                                                        <option >batal</option>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="col-lg-12">
                                                                                                                <button type="submit" class="btn btn-default">Submit</button>
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
                                                            </tr>

                                                            @empty
                                                            <div class="alert alert-danger" role="alert">
                                                                <strong>Data</strong> Is Empty
                                                            </div>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <div class="row">
                                                    <form method="post" action="{{ route('order.proses') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Nama" name="name" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" placeholder="Email" name="email" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="meja">
                                                                        <option> --Meja-- </option>
                                                                        @foreach ($meja as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->meja }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="menu">
                                                                        <option> --Menu-- </option>
                                                                        @foreach ($menu as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="form-group">
                                                                    <select name="payment_status" class="form-control" id="">
                                                                        <option>
                                                                            --Status--
                                                                        </option>
                                                                        <option>menunggu pembayaran</option>
                                                                        <option>sudah dibayar</option>
                                                                        <option>batal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <button type="submit" class="btn btn-default">Submit</button>
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




@endsection
