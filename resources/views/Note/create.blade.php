@extends('Layouts.index')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header bg-secondary">
            <h4 class="text-light text-center">Add Notes</h4>
        </div>
        <div class="card-body">
            <form id="createform" method="post" class="offset-3">
                @csrf
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="mb-1">Title</label>
                        <input type="text" class="form-control" name="tit" placeholder="Enter your title here ...."
                            required>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="mb-1">Description</label>
                        <input type="text" class="form-control" name="des" placeholder="Enter your description here...."
                            required>
                    </div>
                </div>
                <div class="col-md- mt-3">
                    <input name="" id="" class="btn btn-primary" type="submit" value="Add Note">
                    <a href="{{('records')}}" class="btn btn-primary ">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts-include')
<script>
$(document).ready(function() {
    $('#createform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{('createnote')}}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if ($.isEmptyObject(response.error)) {
                    toastr['success'](response.success);
                } else {
                    toastr['error'](response.error);
                }
            },
        });
    });

});
</script>

@endpush