@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.role') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.role') }}
@endsection

@section('contentheader_description')
    Role Config
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('adminlte_lang::message.operationpanel') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a class="btn btn-app" data-toggle="modal" data-target="#add-modal"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
                        <a class="btn btn-app"><span class="badge bg-green">N</span><i class="glyphicon glyphicon-export"></i>{{ trans('adminlte_lang::message.export') }}</a>
                        <a class="btn btn-app"><span class="badge bg-purple">N</span><i class="glyphicon glyphicon-import"></i>{{ trans('adminlte_lang::message.import') }}</a>
                        <a class="btn btn-app"><span class="badge bg-red">N</span><i class="glyphicon glyphicon-cog"></i>{{ trans('adminlte_lang::message.cfg') }}</a>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
                    <div class="box-body">
                      <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.slug') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.desc') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.level') }}</th>
                          <th>{{ trans('adminlte_lang::message.ct') }}</th>
                          <th>{{ trans('adminlte_lang::message.ut') }}</th>
                          <th>{{ trans('adminlte_lang::message.op') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->name}}</td>
                          <td>{{$record->slug}}</td>
                          <td>{{$record->description}}</td>
                          <td>{{$record->level}}</td>
                          <td>{{$record->created_at}}</td>
                          <td>{{$record->updated_at}}</td>
                          <td>
                              <a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem('{{$record->id}}')"><i class="glyphicon glyphicon-edit"></i></a>
                              <a class="btn btn-block" onclick="deleteItem('{{$record->id}}')"><i class="glyphicon glyphicon-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.slug') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.desc') }}</th>
                          <th>{{ trans('adminlte_lang::message.rolecolumns.level') }}</th>
                          <th>{{ trans('adminlte_lang::message.ct') }}</th>
                          <th>{{ trans('adminlte_lang::message.ut') }}</th>
                          <th>{{ trans('adminlte_lang::message.op') }}</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
		</div>
	</div>
    
    <!-- add modal start -->
    <div class="modal fade" id="add-modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ trans('adminlte_lang::message.crudcolumns.createrecord')}}</h4>
          </div>
          <div class="modal-body">
            <form id="add-modal-form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ trans('adminlte_lang::message.rolecolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="slug">{{ trans('adminlte_lang::message.rolecolumns.slug') }}</label>
                  <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.rolecolumns.desc') }}</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                 </div>
                <div class="form-group">
                  <label for="level">{{ trans('adminlte_lang::message.rolecolumns.level') }}</label>
                  <input type="text" class="form-control" id="level" name="level">
                </div>
              </div>
              <!--<button type="submit" class="btn btn-default">{{ trans('adminlte_lang::message.crudcolumns.submit')}}</button>-->
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="add-modal-submit">{{ trans('adminlte_lang::message.crudcolumns.submit')}}</button>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">{{ trans('adminlte_lang::message.crudcolumns.close')}}</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    
    <!-- edit modal start -->
    <div class="modal fade" id="edit-modal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ trans('adminlte_lang::message.crudcolumns.updaterecord')}}</h4>
          </div>
          <div class="modal-body">
            <form id="edit-modal-form" action="" method="post">
              <input type="hidden" id="id" name="id">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ trans('adminlte_lang::message.rolecolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="slug">{{ trans('adminlte_lang::message.rolecolumns.slug') }}</label>
                  <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.rolecolumns.desc') }}</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                 </div>
                <div class="form-group">
                  <label for="level">{{ trans('adminlte_lang::message.rolecolumns.level') }}</label>
                  <input type="text" class="form-control" id="level" name="level">
                </div>
              </div>
              <!--<button type="submit" class="btn btn-default">{{ trans('adminlte_lang::message.crudcolumns.update')}}</button>-->
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" id="edit-modal-submit">{{ trans('adminlte_lang::message.crudcolumns.update')}}</button>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">{{ trans('adminlte_lang::message.crudcolumns.close')}}</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
@endsection

@section('main-script')
<?php 
    function script_parameter(){
        $object = array();
        $object['create_url'] = url('account/role/c');
        $object['read_url']   = url('account/role/r');
        $object['update_url'] = url('account/role/u');
        $object['delete_url'] = url('account/role/d');

        $object_json = json_encode($object);
        return $object_json;
    }
?>
<script type="text/javascript">
    var ray = <?php echo script_parameter(); ?>;

    $(document).ready(function() {
         $(document).on("click", "#add-modal-submit", function (e) {
            $('#add-modal-form').submit();
        });
        $(document).on("click", "#edit-modal-submit", function (e) {
            $('#edit-modal-form').submit();
        });
        $(document).on("submit", "#add-modal-form", function() {
            $.ajax({
                url: ray.create_url,
                type: $(this).attr('method'),
                data: $(this).serialize() + "&_token={{ csrf_token() }}",
                beforeSend: addButterBar.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitting') }}"),
                error: function(jqXHR, textStatus, errorThrown) {
                    var t = addButterBar;
                    t.createButterbar(jqXHR.status+': '+jqXHR.responseText);
                },
                success: function(result) {
                    var t = addButterBar;
                    t.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitsucc') }}");
                    var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                        tbody += '<tr>';
                        tbody += '<td>'+item.id+'</td>';
                        tbody += '<td>'+item.name+'</td>';
                        tbody += '<td>'+item.slug+'</td>';
                        tbody += '<td>'+item.description+'</td>';
                        tbody += '<td>'+item.level+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    //To completely delete and remove the datatable object with its DOM elements you need to :
                    $("#datatable").dataTable().fnDestroy();
                    $('#datatable tbody').empty();
                    
                    $('#datatable tbody').html(tbody);
                    $("#datatable").dataTable();
                    
                    $('#add-modal').modal('hide');
                }
            });
            return false;
        });
        $(document).on("submit", "#edit-modal-form", function() {
            $.ajax({
                url: ray.update_url,
                type: $(this).attr('method'),
                data: $(this).serialize() + "&_token={{ csrf_token() }}",
                beforeSend: addButterBar.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitting') }}"),
                error: function(jqXHR, textStatus, errorThrown) {
                    var t = addButterBar;
                    t.createButterbar(jqXHR.status+': '+jqXHR.responseText);
                },
                success: function(result) {
                    var t = addButterBar;
                    t.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitsucc') }}");
                    var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                        tbody += '<tr>';
                        tbody += '<td>'+item.id+'</td>';
                        tbody += '<td>'+item.name+'</td>';
                        tbody += '<td>'+item.slug+'</td>';
                        tbody += '<td>'+item.description+'</td>';
                        tbody += '<td>'+item.level+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    //To completely delete and remove the datatable object with its DOM elements you need to :
                    $("#datatable").dataTable().fnDestroy();
                    $('#datatable tbody').empty();
                    
                    $('#datatable tbody').html(tbody);                    
                    $("#datatable").dataTable();
                    
                    $('#edit-modal').modal('hide');
                }
            });
            return false;
        });
        addButterBar = {
            clearButterbar: function(e) {
                if ($(".butter-bar").length > 0) {
                    $(".butter-bar").remove();
                }
            },
            createButterbar: function(message) {
                var t = this;
                t.clearButterbar();
                $("body").append('<div class="butter-bar butter-bar-center"><p class="butter-bar-message">' + message + '</p></div>');
                setTimeout("$('.butter-bar').remove()", 3000);
            }
        };
    });
    
    function readItem(id)
    {
      $.ajax({
        url: ray.read_url,
        type:"POST", 
        data: {"id":id, _token: "{{ csrf_token() }}"}, 
        success: function(item){
          $("#edit-modal #id").val(item.id);
          $("#edit-modal #name").val(item.name);
          $("#edit-modal #slug").val(item.slug);
          $("#edit-modal #desc").val(item.description);
          $("#edit-modal #level").val(item.level);
        }
      });
    }
 
    function deleteItem(id)
    {
      var conf = confirm("{{ trans('adminlte_lang::message.crudcolumns.deleteconfirm') }}");
      if(conf){
        $.ajax({
          url: ray.delete_url,
          type:"POST", 
          data: {"id":id, _token: "{{ csrf_token() }}"}, 
          success: function(response){
            var t = addButterBar;
			t.createButterbar(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }
</script>
@endsection
