@extends('admin.admin_master')
@section('admin')

<div class="content">

                    
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                           
                           </div>


            <!-- Datatables  -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">All Review</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Image</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($review as $key=>$item)
                                                <tr>
                                                    
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->position }}</td>
                                                    <td><img src="{{ asset($item->image) }}" alt="Image" style="width: 70px; height: 40px;"></td>
                                                    <td>{{ Str::limit($item->message, 50) }}</td>
                                                    <td >
                                                        <a href="{{ route('edit.blog.post',$item->id) }}" class="btn btn-sm btn-success">Edit</a>
                                                        <a href="{{ route('delete.blog.post',$item->id) }}" class="btn btn-sm btn-danger" id="delete" >Delete</a> 
                                                    </td> 
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>


    </div>                   
</div>                       
                             



@endsection