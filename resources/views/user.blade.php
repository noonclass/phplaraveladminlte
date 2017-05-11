@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.user') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.user') }}
@endsection

@section('contentheader_description')
    User Config
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
                        @role('admin|moderator')
                        <a class="btn btn-app" data-toggle="modal" data-target="#add-modal" onclick="readTenants()"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
                        @else
                        <a class="btn btn-app disabled" data-toggle="modal" data-target="#add-modal" onclick="readTenants()"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
                        @endrole
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
                          <th>{{ trans('adminlte_lang::message.usercolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.fullname') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.email') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.extension') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.role') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.status') }}</th>
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
                          <td>{{$record->fullname}}</td>
                          <td>{{$record->email}}</td>
                          <td>{{$record->extension}}</td>
                          <td>{{$record->tenant}}</td>
                          <td>{{$record->role}}</td>
                          <td>{{intval($record->status)==0?trans('adminlte_lang::message.usercolumns.down'):trans('adminlte_lang::message.usercolumns.run')}}</td>
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
                         <th>{{ trans('adminlte_lang::message.usercolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.fullname') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.email') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.extension') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.role') }}</th>
                          <th>{{ trans('adminlte_lang::message.usercolumns.status') }}</th>
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
                  <label for="name">{{ trans('adminlte_lang::message.usercolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="fullname">{{ trans('adminlte_lang::message.usercolumns.fullname') }}</label>
                  <input type="text" class="form-control" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                  <label for="email">{{ trans('adminlte_lang::message.usercolumns.email') }}</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="default@raypbx.com">
                 </div>
                 <div class="form-group">
                  <label for="password">{{ trans('adminlte_lang::message.usercolumns.password') }}</label>
                  <input type="password" class="form-control" id="password" name="password">
                 </div>
                 <div class="form-group">
                  <label for="retrypepassword">{{ trans('adminlte_lang::message.usercolumns.retrypepassword') }}</label>
                  <input type="password" class="form-control" id="retrypepassword" name="retrypepassword">
                 </div>
                <div class="form-group">
                  <label for="role">{{ trans('adminlte_lang::message.usercolumns.role') }}</label>
                  @role('admin')
                  <select class="form-control" id="roles" name="role_id">
                    <option value="1">{{ trans('adminlte_lang::message.usercolumns.admin')}}</option>
                    <option value="2">{{ trans('adminlte_lang::message.usercolumns.moderator')}}</option>
                    <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                  @else
                    @role('moderator')
                    <select class="form-control" id="roles" name="role_id">
                      <option value="2">{{ trans('adminlte_lang::message.usercolumns.moderator')}}</option>
                      <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                    @else
                    <select class="form-control" id="roles" name="role_id">
                      <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                    @endrole
                  @endrole                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="tenant">{{ trans('adminlte_lang::message.usercolumns.tenant') }}</label>
                  <select class="form-control" id="tenants" name="tenant_id">
                  </select>
                </div>
                <div class="form-group">
                  <label for="extension">{{ trans('adminlte_lang::message.usercolumns.extension') }}</label>
                  <select class="form-control" id="extensions" name="extension_id">
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.usercolumns.status') }}</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.usercolumns.down')}}</option>
                    <option value="1" selected="selected">{{ trans('adminlte_lang::message.usercolumns.run')}}</option>
                  </select>
                </div>
              </div>
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
                  <label for="name">{{ trans('adminlte_lang::message.usercolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="fullname">{{ trans('adminlte_lang::message.usercolumns.fullname') }}</label>
                  <input type="text" class="form-control" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                  <label for="email">{{ trans('adminlte_lang::message.usercolumns.email') }}</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="default@raypbx.com">
                 </div>
                 <div class="form-group">
                  <label for="password">{{ trans('adminlte_lang::message.usercolumns.password') }}</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="●●●●●●">
                 </div>
                 <div class="form-group">
                  <label for="retrypepassword">{{ trans('adminlte_lang::message.usercolumns.retrypepassword') }}</label>
                  <input type="password" class="form-control" id="retrypepassword" name="retrypepassword" placeholder="●●●●●●">
                 </div>
                <div class="form-group">
                  <label for="role">{{ trans('adminlte_lang::message.usercolumns.role') }}</label>
                  @role('admin')
                  <select class="form-control" id="roles" name="role_id">
                    <option value="1">{{ trans('adminlte_lang::message.usercolumns.admin')}}</option>
                    <option value="2">{{ trans('adminlte_lang::message.usercolumns.moderator')}}</option>
                    <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                  @else
                    @role('moderator')
                    <select class="form-control" id="roles" name="role_id">
                      <option value="2">{{ trans('adminlte_lang::message.usercolumns.moderator')}}</option>
                      <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                    @else
                    <select class="form-control" id="roles" name="role_id">
                      <option value="3" selected="selected">{{ trans('adminlte_lang::message.usercolumns.user')}}</option>
                    @endrole
                  @endrole                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="tenant">{{ trans('adminlte_lang::message.usercolumns.tenant') }}</label>
                  <select class="form-control" id="tenants" name="tenant_id">
                  </select>
                </div>
                <div class="form-group">
                  <label for="extension">{{ trans('adminlte_lang::message.usercolumns.extension') }}</label>
                  <select class="form-control" id="extensions" name="extension_id">
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.usercolumns.status') }}</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.usercolumns.down')}}</option>
                    <option value="1">{{ trans('adminlte_lang::message.usercolumns.run')}}</option>
                  </select>
                </div>
              </div>
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
        $object['create_url'] = url('account/user/c');
        $object['read_url']   = url('account/user/r');
        $object['update_url'] = url('account/user/u');
        $object['delete_url'] = url('account/user/d');
        $object['rt_url']     = url('account/tenant/r');
        $object['re_url']     = url('account/extension/r');

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
                dataType:'json',
                data: $(this).serialize() + "&_token={{ csrf_token() }}",
                beforeSend: addButterBar.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitting') }}"),
                error: function(jqXHR, textStatus, errorThrown) {
                    var t = addButterBar;
                    var responseText = $.parseJSON(jqXHR.responseText);
                    t.createButterbar(jqXHR.status+': '+responseText.message);
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
                        tbody += '<td>'+item.fullname+'</td>';
                        tbody += '<td>'+item.email+'</td>';
                        tbody += '<td>'+(item.extension?item.extension:"")+'</td>';
                        tbody += '<td>'+(item.tenant?item.tenant:"")+'</td>';
                        tbody += '<td>'+item.role+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?"{{ trans('adminlte_lang::message.tenantcolumns.down') }}":"{{ trans('adminlte_lang::message.tenantcolumns.run') }}")+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    flushDataTable(tbody);
                    
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
                    var responseText = $.parseJSON(jqXHR.responseText);
                    t.createButterbar(jqXHR.status+': '+responseText.message);
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
                        tbody += '<td>'+item.fullname+'</td>';
                        tbody += '<td>'+item.email+'</td>';
                        tbody += '<td>'+(item.extension?item.extension:"")+'</td>';
                        tbody += '<td>'+(item.tenant?item.tenant:"")+'</td>';
                        tbody += '<td>'+item.role+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?"{{ trans('adminlte_lang::message.tenantcolumns.down') }}":"{{ trans('adminlte_lang::message.tenantcolumns.run') }}")+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    flushDataTable(tbody);
                    
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
    
    function readItem(id){
      $.ajax({
        url: ray.read_url,
        type:"POST", 
        data: {"id":id, _token: "{{ csrf_token() }}"}, 
        success: function(item){
            $("#edit-modal #id").val(item.id);
            $("#edit-modal #name").val(item.name);
            $("#edit-modal #fullname").val(item.fullname);
            $("#edit-modal #email").val(item.email);
            $("#edit-modal #status").val(Number(item.status));
            $("#edit-modal #roles").val(Number(item.role_id));
            //update tenants and extensions
            readTenants();
            $("#edit-modal #tenants").val(Number(item.tenant_id));
            readExtensions(item.tenant_id);
            $("#edit-modal #extensions").val(Number(item.extension_id));
        }
      });
    }
 
    function deleteItem(id){
      var conf = confirm("{{ trans('adminlte_lang::message.crudcolumns.deleteconfirm') }}");
      if(conf){
        $.ajax({
          url: ray.delete_url,
          type: "POST", 
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
    
    function readExtensions(tenant_id){
        $.ajax({
            url: ray.re_url,
            type: "POST", 
            async: false ,
            data: {"tenant_id":tenant_id, _token: "{{ csrf_token() }}"}, 
            success: function(result){
                var result_obj = eval(result);
                var options = '';
                $(result_obj).each(function(index, item){
                    options += '<option value='+item.id+'>'+item.number+'</option>';
                });
                $('form #extensions').html(options);
            }
        });
    }
    
    function readTenants(){
        $.ajax({
            url: ray.rt_url,
            type: "POST",
            async: false ,
            data: {_token: "{{ csrf_token() }}"}, 
            success: function(result){
                var result_obj = eval(result);
                var options = '';
                $(result_obj).each(function(index, item){
                    options += '<option value='+item.id+'>'+item.name+' - '+item.desc+'</option>';
                });
                $('form #tenants').html(options);
            }
        });
    }
    
    $("form #roles").change(function(){
        var role_id = $(this).find("option:selected").val();
        if (role_id == 1){
            $('form #tenants').html('');
            $('form #tenants').attr('disabled','');
            $('form #extensions').html('');
            $('form #extensions').attr('disabled','');
        }else{
            readTenants();
            readExtensions(1);//default
            $('form #tenants').removeAttr('disabled');
            $('form #extensions').removeAttr('disabled');
        }
    });
    
    $("form #tenants").change(function(){
        var tenant_id = $(this).find("option:selected").val();
        readExtensions(tenant_id);
    });
</script>
@endsection