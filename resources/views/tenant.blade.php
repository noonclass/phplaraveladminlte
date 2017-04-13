@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.tenant') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.tenant') }}
@endsection

@section('contentheader_description')
    Tenant Config
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
                          <th>{{ trans('adminlte_lang::message.tenantid') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantname') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantdesc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantacc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantstatus') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantct') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantut') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantop') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->name}}</td>
                          <td>{{$record->desc}}</td>
                          <td>{{$record->access_number}}</td>
                          <td>{{intval($record->status)==0?trans('adminlte_lang::message.tenantdown'):trans('adminlte_lang::message.tenantrun')}}</td>
                          <td>{{$record->created_at}}</td>
                          <td>{{$record->updated_at}}</td>
                          <td>
                              <a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem('{{$record->id}}')"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-block" onclick="deleteItem('{{$record->id}}')"><i class="glyphicon glyphicon-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>{{ trans('adminlte_lang::message.tenantid') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantname') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantdesc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantacc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantstatus') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantct') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantut') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantop') }}</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
		</div>
	</div>
    
    <!-- Add Modal start -->
    <div class="modal fade" id="add-modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Record</h4>
          </div>
          <div class="modal-body">
            <form id="add-form" action="" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ trans('adminlte_lang::message.tenantname') }}:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.tenantdesc') }}:</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <div class="form-group">
                  <label for="access-number">{{ trans('adminlte_lang::message.tenantacc') }}:</label>
                  <input type="text" class="form-control" id="access-number" name="access_number">
                 </div>
                <div class="form-group">
                  <label for="extrinsic-number">{{ trans('adminlte_lang::message.tenantext') }}:</label>
                  <input type="text" class="form-control" id="extrinsic-number" name="extrinsic_number">
                 </div>
                <div class="form-group">
                  <label for="gateway">{{ trans('adminlte_lang::message.tenantgw') }}:</label>
                  <input type="text" class="form-control" id="gateway" name="gateway">
                </div>
                <div class="form-group">
                  <label for="prefix">{{ trans('adminlte_lang::message.tenantpre') }}:</label>
                  <input type="text" class="form-control" id="prefix" name="prefix">
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.tenantstatus') }}:</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.tenantdown')}}</option>
                    <option value="1" selected="selected">{{ trans('adminlte_lang::message.tenantrun')}}</option>
                  </select>
                </div>
              </div>
              
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->
    
    <!-- Edit Modal start -->
    <div class="modal fade" id="edit-modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <form id="edit-form" action="" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">{{ trans('adminlte_lang::message.tenantname') }}:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.tenantdesc') }}:</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <div class="form-group">
                  <label for="access-number">{{ trans('adminlte_lang::message.tenantacc') }}:</label>
                  <input type="text" class="form-control" id="access-number" name="access_number">
                 </div>
                <div class="form-group">
                  <label for="extrinsic-number">{{ trans('adminlte_lang::message.tenantext') }}:</label>
                  <input type="text" class="form-control" id="extrinsic-number" name="extrinsic_number">
                 </div>
                <div class="form-group">
                  <label for="gateway">{{ trans('adminlte_lang::message.tenantgw') }}:</label>
                  <input type="text" class="form-control" id="gateway" name="gateway">
                </div>
                <div class="form-group">
                  <label for="prefix">{{ trans('adminlte_lang::message.tenantpre') }}:</label>
                  <input type="text" class="form-control" id="prefix" name="prefix">
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.tenantstatus') }}:</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.tenantdown')}}</option>
                    <option value="1">{{ trans('adminlte_lang::message.tenantrun')}}</option>
                  </select>
                </div>
              </div>
              
              <button type="submit" class="btn btn-default">Update</button>
              <input type="hidden" id="id" name="id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          
        </div>
        
      </div>
    </div>
    <!-- Edit code ends -->
@endsection

@section('main-script')
<?php 
    function script_parameter(){
        $object = array();
        $object['create_url'] = url('account/tenant/c');
        $object['read_url']   = url('account/tenant/r');
        $object['update_url'] = url('account/tenant/u');
        $object['delete_url'] = url('account/tenant/d');

        $object_json = json_encode($object);
        return $object_json;
    }
?>
<script type="text/javascript">
    var ray = <?php echo script_parameter(); ?>;

    $(document).ready(function() {
        $(document).on("submit", "#add-form", function() {
            $.ajax({
                url: ray.create_url,
                type: $(this).attr('method'),
                data: $(this).serialize() + "&_token={{ csrf_token() }}",
                beforeSend: addButterBar.createButterbar("Submitting..."),
                error: function(response) {
                    var t = addButterBar;
                    t.createButterbar(response);
                },
                success: function(result) {
                    var t = addButterBar;
                    t.createButterbar("Submit successfully.");
                    var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                        tbody += '<tr>';
                        tbody += '<td>'+item.id+'</td>';
                        tbody += '<td>'+item.name+'</td>';
                        tbody += '<td>'+item.desc+'</td>';
                        tbody += '<td>'+item.access_number+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?{{ trans('adminlte_lang::message.tenantdown') }}:{{ trans('adminlte_lang::message.tenantrun') }})+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-pencil"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    $('#datatable tbody').html(tbody);
                    $('#add-modal').modal('hide');
                }
            });
            return false;
        });
        $(document).on("submit", "#edit-form", function() {
            $.ajax({
                url: ray.update_url,
                type: $(this).attr('method'),
                data: $(this).serialize() + "&_token={{ csrf_token() }}",
                beforeSend: addButterBar.createButterbar("Submitting..."),
                error: function(response) {
                    var t = addButterBar;
                    t.createButterbar(response);
                },
                success: function(result) {
                    var t = addButterBar;
                    t.createButterbar("Submit successfully.");
                    var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                        tbody += '<tr>';
                        tbody += '<td>'+item.id+'</td>';
                        tbody += '<td>'+item.name+'</td>';
                        tbody += '<td>'+item.desc+'</td>';
                        tbody += '<td>'+item.access_number+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?{{ trans('adminlte_lang::message.tenantdown') }}:{{ trans('adminlte_lang::message.tenantrun') }})+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-pencil"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    $('#datatable tbody').html(tbody);
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
          $("#edit-modal #desc").val(item.desc);
          $("#edit-modal #access-number").val(item.access_number);
          $("#edit-modal #extrinsic-number").val(item.extrinsic_number);
          $("#edit-modal #gateway").val(item.gateway);
          $("#edit-modal #prefix").val(item.prefix);
          $("#edit-modal #status").val(Number(item.status));
        }
      });
    }
 
    function deleteItem(id)
    {
      var conf = confirm("Are you sure want to delete?");
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