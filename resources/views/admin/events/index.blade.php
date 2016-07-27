@extends('admin.template.master')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Event List</h3>
        </div>
        <div class="box-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Bought / Total Seats</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td><a href="/admin/events/{{ $event->id }}">{{ $event->name }}</a></td>
                        <?php
                            $totalSeats = $event->seats()->count();
                            $bought = $event->seats()->whereNotNull('users_id')->count();
                        ?>
                        <td>{{ $bought . ' / ' . $totalSeats }}</td>
                        <td><a href="/admin/events/{{ $event->id }}#edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>&nbsp;<a href="/admin/events/{{ $event->id }}/delete"><i class="fa fa-trash fa-lg"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop