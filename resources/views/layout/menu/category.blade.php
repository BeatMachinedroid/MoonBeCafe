<!DOCTYPE html>
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
                                    <li class="breadcrumb-item active"> Category</li>
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
                                    <div class="col-sm-8">
                                        @if (Auth::user()->role == 'admin')
                                            <button type="button" class="btn btn-primary btn-addon m-b-10 m-l-5" data-toggle="modal" data-target="#addModal">
                                            <i class="ti-plus"></i>
                                                Add Category
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-sm-4">
                                        <form action="{{ route('search.category') }}" method="get">
                                            <div class="form-group text-right">
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
                                                            <th>Category</th>
                                                            <th>File Name</th>
                                                            <th class="text-center">Image</th>
                                                            @if (Auth::user()->role == 'admin')
                                                            <th style=" text-align: left">Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($cate as $no => $item)
                                                            <tr>
                                                                <th scope="row">{{ $no + 1 }}</th>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->image }}</td>
                                                                <td class="text-center"><img src="{{ asset('storage/category/' . $item->image) }}"
                                                                        alt="{{ $item->nama }}"
                                                                        style="width: 120px; height: 120px;"></td>
                                                                @if (Auth::user()->role == 'admin')
                                                                <td style="text-align: left">
                                                                    <button class="btn btn-primary btn-sm btn-addon" data-toggle="modal" data-target="#editcate-{{ $item->id }}">
                                                                        <i class="ti-pencil"></i>
                                                                        Edit
                                                                    </button>
                                                                    <a href="{{ 'category/' . encrypt($item->id) . '/delete' }}"
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

                                            {{ $cate->links('layout.vendor.pagination.costume') }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                @foreach ($cate as $item)
                {{-- edit --}}
                <div class="modal fade" id="editcate-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true"><i class="ti-close"></i></span>
                               </button>
                           </div>
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="card">
                                       <div class="card-body">
                                           <div class="basic-form">
                                               <form method="post" action="{{ route('put.category') }}" class="row"
                                                   enctype="multipart/form-data">
                                                   @csrf
                                                   @method('PUT')
                                                   <input type="hidden" name="id" value="{{ $item->id }}">
                                                   <div class="col-sm-12" style="text-align: center">
                                                       <img src="{{ asset('storage/category/' . $item->image) }}" alt=""
                                                           style="width: 120px; height: 120px;" />
                                                   </div>
                                                   <div class="col-sm-12">
                                                       <div class="form-group">
                                                           <input type="text" class="form-control"
                                                               placeholder="Nama Category" name="name" value="{{ $item->name }}">
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-12">
                                                       <div class="form-group">
                                                           <input type="file" class="form-control" placeholder="Image"
                                                               name="image">
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

               {{-- /# Add cate --}}
               <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true"><i class="ti-close"></i></span>
                               </button>
                           </div>
                               <div class="row">
                                   <div class="col-lg-12">
                                       <div class="card">
                                           <div class="card-body">
                                               <div class="basic-form">
                                                   <form method="post" action="{{ route('post.category') }}" class="row"
                                                       enctype="multipart/form-data">
                                                       @csrf
                                                       <div class="col-sm-6">
                                                           <div class="form-group">
                                                               <input type="text" class="form-control"
                                                                   placeholder="Nama Category" name="name">
                                                           </div>
                                                       </div>
                                                       <div class="col-sm-6">
                                                           <div class="form-group">
                                                               <input type="file" class="form-control" placeholder="Image"
                                                                   name="image">
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
               </div>
               {{-- ---- --}}
@endsection

