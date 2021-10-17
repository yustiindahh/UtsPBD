@extends('template.adminLayout')

@section('homeAdmin')
<div class="card mx-3">
    <div class="card-header">
        <h3 class="card-title">HOME PAGE ADMINISTRATOR</h3>
    </div>

    <button class="btn btn-success btn-sm mx-3 mt-3 mb-2" style="width: max-content;" data-toggle="modal" data-target="#mdladdH"><i class="fas fa-plus mr-1"></i> Add</button>
    <div class="card-body pt-0">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" width="20%">Action</th>
                </tr>
            </thead>
            <tbody id="tblhome">
                <?php $no = 1; ?>
                @foreach($home as $h)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$h['title']}}</td>
                    <td>{{$h['content']}}</td>
                    <td><img src="{{asset('img/'.$h['image'])}}" alt="{{$h['image']}}" width="100px"></td>
                    <td class="text-center">
                        <?php if ($h['status'] == 1) { ?>
                            <div class="badge badge-success">Enabled</div>
                        <?php } else { ?>
                            <div class="badge badge-danger">Disabled</div>
                        <?php } ?>
                    </td>
                    <td class="d-flex flex-column">
                        <button data-toggle="modal" data-target="#mdleditH" data-id="<?= $h['id'] ?>" data-title="<?= $h['title'] ?>" data-content="<?= $h['content'] ?>" data-image="<?= $h['image'] ?>" data-status="<?= $h['status'] ?>" data-created_at="<?= $h['created_at'] ?>" class="btn btn-primary btn-sm my-1 mx-auto" style="width: max-content;"><i class="fa fa-pen"></i> Edit</button>
                        <button data-toggle="modal" data-target="#mdldelH" data-id="<?= $h['id'] ?>" class="btn btn-danger btn-sm my-1 mx-auto" style="width: max-content;"><i class="fa fa-trash"></i> Delete</button>
                        <button id="activate" data-id="<?= $h['id'] ?>" data-status="<?= $h['status'] ?>" class="btn btn-success btn-sm my-1 mx-auto" style="width: max-content;"><i class="fa fa-check"></i> Activate</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="mdladdH" tabindex="-1" role="dialog" aria-labelledby="mdladdHLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="mdladdHLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body pt-1">
                    <div class="form-group my-1">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label>Content</label>
                        <textarea name="content" id="content" rows="6" class="form-control"></textarea>
                    </div>
                    <div class="form-group my-1">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus mr-1"></i> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mdleditH" tabindex="-1" role="dialog" aria-labelledby="mdleditHLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="mdleditHLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.update','admin')}}" method="post" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="modal-body pt-1">
                    <div class="form-group my-1 d-none">
                        <label>Id</label>
                        <input type="text" name="id_h" id="id_h" class="form-control" readonly>
                    </div>
                    <div class="form-group my-1">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group my-1">
                        <label>Content</label>
                        <textarea name="content" id="content" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group my-1">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="fileku" id="fileku">
                    </div>
                    <input type="hidden" name="status" id="status">
                    <input type="hidden" name="created_at" id="created_at">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane mr-1"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mdldelH" tabindex="-1" role="dialog" aria-labelledby="mdldelHLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="mdldelHLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.destroy','admin')}}" method="post">
                <div class="modal-body">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <p>Apakah anda yakin menghapus data dengan id :</p>
                    <input type="text" class="form-control" id="id_h" name="id_h" value="" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('#mdldelH').on('shown.bs.modal', function(e) {
        var btn = $(e.relatedTarget)
        var id = btn.data('id')
        var modal = $(this)
        modal.find('#id_h').val(id)
    })

    $('#mdleditH').on('shown.bs.modal', function(e) {
        var btn = $(e.relatedTarget)
        var id = btn.data('id')
        var title = btn.data('title')
        var content = btn.data('content')
        var image = btn.data('image')
        var status = btn.data('status')
        var created_at = btn.data('created_at')
        var modal = $(this)
        modal.find('#id_h').val(id)
        modal.find('#title').val(title)
        modal.find('#content').val(content)
        modal.find('#fileku').val(image)
        modal.find('#status').val(status)
        modal.find('#created_at').val(created_at)
    })

    $(document).on('click', '#activate', function() {
        var id = $(this).data('id')
        var status = $(this).data('status')
        if (status === 1) {
            console.log('already enabled');
        } else {
            console.log('enabling...');
            $.ajax({
                type: 'POST',
                url: '/activating',
                data: {
                    id: id,
                    status: status
                },
                success: function(result) {
                    if (result.success == true) {
                        console.log(result)
                        location.reload()
                    } else {
                        console.log(result)
                    }
                }
            })
        }
    })
</script>
@endsection