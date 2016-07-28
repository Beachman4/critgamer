@extends('admin.template.master')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $edit ? 'Edit' : 'Create' }} Sponser</h3>
        </div>
        <form method="post" action="{{ $edit ? '/admin/sponsers/'.$sponser->id : '/admin/sponsers' }}" enctype="multipart/form-data">
            @if ($edit)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $edit ? $sponser->title : '' }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="link">Link to Sponser</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{ $edit ? $sponser->link : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <img id="sponser_img" width="350px">
                        <div class="form-group">
                            <label for="picture" class="form-control-label">Sponser Picture</label>
                            <input type="file" id="picture" class="form-control" name="picture">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success-outline">{{ $edit ? 'Edit' : 'Create' }} Sponser</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#sponser_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#picture').change(function() {
            readURL(this);
        })
    </script>
@stop