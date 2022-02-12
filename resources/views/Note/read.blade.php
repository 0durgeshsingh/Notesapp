@extends('Layouts.index')
@section('content')
<div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header bg-secondary">
            <h4 class="text-light text-center">Notes</h4>
            <a href="{{('createnotes')}}" class="btn btn-info float-end">Add Notes</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="Notestable">
                    <thead>
                        <tr>
                            <th>Serial no</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach($notes as $data)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->descript}}</td>
                            <td>
                                <a class="btn btn-success text-light mr-2" href="edit/notes/{{$data->id}}">Edit<i
                                        class="fa fa-edit"></i></a>
                                <a class="btn btn-danger text-light ml-2" href="delete/notes/{{$data->id}}">Delete<i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts-include')
<script>
$(document).ready(function() {
    $("#Notestable").DataTable();
});
</script>

@endpush