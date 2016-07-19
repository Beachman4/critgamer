@extends('admin.template.master')
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">User List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop