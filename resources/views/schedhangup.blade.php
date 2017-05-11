@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.schedhangup') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.schedhangup') }}
@endsection

@section('contentheader_description')
    Schedhangup Config
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
                        <a class="btn btn-app disabled" data-toggle="modal" data-target="#add-modal" onclick="readTenants()"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.superinduce') }}</a>                      
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
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.number') }}</th>
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.alias_number') }}</th>
                          @role('admin')
                          <th>{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          @else
                          <th style="display:none;">{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          @endrole
                          <th>{{ trans('adminlte_lang::message.schedhangupcolumns.outdial_sched') }}</th>
                          <th>{{ trans('adminlte_lang::message.op') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $record)
                        <tr>
                          <td>{{$record->id}}</td>
                          <td>{{$record->number}}</td>
                          <td>{{$record->alias_number}}</td>
                          @role('admin')
                          <td>{{$record->tenant}}</td>
                          @else
                          <td style="display:none;">{{$record->tenant}}</td>
                          @endrole
                          <td>{{$record->outdial_sched}}</td>
                          <td>
                              <a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem('{{$record->id}}')"><i class="glyphicon glyphicon-edit"></i></a>
                              
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.number') }}</th>
                          <th>{{ trans('adminlte_lang::message.extensioncolumns.alias_number') }}</th>
                          @role('admin')
                          <th>{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          @else
                          <th style="display:none;">{{ trans('adminlte_lang::message.usercolumns.tenant') }}</th>
                          @endrole
                          <th>{{ trans('adminlte_lang::message.schedhangupcolumns.outdial_sched') }}</th>
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
                  <label for="number">{{ trans('adminlte_lang::message.extensioncolumns.number') }}</label>
                  <input type="text" class="form-control" id="number" name="number" readonly="true">
              </div>
               <div class="form-group">
                  <label for="number">{{ trans('adminlte_lang::message.schedhangupcolumns.outdial_sched') }}</label>
                  <input type="text" class="form-control" id="outdial_sched" name="outdial_sched">
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
        $object['read_url'] = url('config/schedhangup/r');
        $object['update_url'] = url('config/schedhangup/u');
        
        $object_json = json_encode($object);
        return $object_json;
    }
?>
<script type="text/javascript">
    var ray = <?php echo script_parameter(); ?>;

    $(document).ready(function() {
        $(document).on("click", "#edit-modal-submit", function (e) {
            $('#edit-modal-form').submit();
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
                            tbody += '<td>'+item.number+'</td>';
                            tbody += '<td>'+item.alias_number+'</td>';
                            @role('admin')
                            tbody += '<td>'+item.tenant+'</td>';
                            @else
                            tbody += '<td style="display:none;">'+item.tenant+'</td>';
                            @endrole                      
                            tbody += '<td>'+item.outdial_sched+'</td>';
                            tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a></td>';
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
    
    
    function readItem(id)
    {         
      $.ajax({
        url: ray.read_url,
        type:"POST", 
        data: {"id":id, _token: "{{ csrf_token() }}"}, 
        success: function(item){
          $("#edit-modal #id").val(item.id);
          $("#edit-modal #number").val(item.number);
          $("#edit-modal #outdial_sched").val(item.outdial_sched);
        }
      });
    }
</script>
@endsection
