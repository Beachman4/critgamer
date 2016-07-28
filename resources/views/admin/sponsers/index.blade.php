@extends('admin.template.master')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Sponser List</h3>
        </div>
        <div class="box-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sponser Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sponsers as $sponser)
                    <tr>
                        <td>{{ $sponser->id }}</td>
                        <td><a href="/admin/sponsers/{{ $sponser->id }}">{{ $sponser->title }}</a></td>
                        <td><a href="/admin/sponsers/{{ $sponser->id }}/edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>&nbsp;<a id="delete" href="/admin/sponsers/{{ $sponser->id }}"><i class="fa fa-trash fa-lg"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#delete').click(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'delete',
                url: $(this).prop('href')
            });
        });
    </script>
@stop