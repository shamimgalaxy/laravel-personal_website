@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Blog Post</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update.blog.post') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{  $post->id}}">
                            
                            <div class="form-group mb-3 row">
                                <label class="form-label">Blog Category</label>
                                <div class="col-lg-6">
                                    <select name="blogcat_id" class="form-select">
                                        <option selected disabled>Select Option</option>
                                        @foreach($blogcat as $cat)
                                            <option value="{{ $cat->id }}"{{ $cat->id==$post->blogcat_id ? 'selected' : '' }}> {{  $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="form-label">Post Title</label>
                                <div class="col-lg-6">
                                    <input class="form-control" value="{{ $post->post_title }}" type="text" name="post_title" required>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="form-label">Post Description</label>
                                <div class="col-lg-12">
                                    <textarea name="long_descp" id="long_descp" style="display:none"></textarea>
                                    <div id="quill-editor" style="height: 250px;">
                                        {!! $post->long_descp !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="form-label">Post Image</label> 
                                <div class="col-lg-12">
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-lg-12">
                                    <img id="showImage" src="{{ asset($post->image) }}" 
                                         class="rounded-circle avatar-xxl img-thumbnail" 
                                         style="width:100px; height:100px;">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // 1. Image Preview
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // 2. Initialize Quill
      

        // 3. Sync Quill content to hidden textarea before form submission
        $('form').on('submit', function() {
            var quillContent = quill.root.innerHTML;
            // Handle cases where editor is effectively empty
            if (quillContent === '<p><br></p>') {
                $('#long_descp').val('');
            } else {
                $('#long_descp').val(quillContent);
            }
        });
    });
</script>
@endsection