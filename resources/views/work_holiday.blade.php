@extends('adminlte::page')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.work_holiday') }}
@endsection

@section('contentheader_title')
    {{ trans('adminlte_lang::message.work_holiday') }}
@endsection

@section('contentheader_description')
    Work_holiday Config
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
			@role('admin')
                        <a class="btn btn-app" data-toggle="modal" data-target="#add-modal" onclick="readTenantMeta()"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
                        @else
                        <a class="btn btn-app disabled" data-toggle="modal" data-target="#add-modal" onclick="readTenantMeta()"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
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
                            <div><label type="hidden"></label></div>
                            <div><h5 align="center" class="col-lg-1">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</h5>
                                @role('admin')
                                <select class="form-control" id="tenantId" name="tenantId" style="width: 20%;">  </select>
                                @else
                                <select class="form-control" disabled="true" id="tenantId" name="tenantId" style="width: 20%;">  </select>
                                 @endrole
                            </div><br>
                            <div><h5 align="center" class="col-lg-1">{{ trans('adminlte_lang::message.work_holidaycolumns.meta_key') }}</h5>
                                <select class="form-control" id="changemeta_key" name="changemeta_key" style="width: 20%;">
                                    <option value='1'>=CHECKED=</option>
                                    <option value="week_day">{{ trans('adminlte_lang::message.work_holidaycolumns.week_day') }}</option>
                                    <option value="work_hour">{{ trans('adminlte_lang::message.work_holidaycolumns.work_hour') }}</option>
                                    <option value="holiday">{{ trans('adminlte_lang::message.work_holidaycolumns.holiday') }}</option>
                                </select>
                            </div>
                            <div><label type="hidden"></label></div>
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
                          <th style="display:none;">{{ trans('adminlte_lang::message.work_holidaycolumns.meta_id') }}</th>
                          <th style="display:none;">{{ trans('adminlte_lang::message.work_holidaycolumns.tenant_id') }}</th>
                          @role('admin')
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          @else
                          <th style="display:none;">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          @endrole
                          <th>{{ trans('adminlte_lang::message.work_holidaycolumns.meta_key') }}</th>
                          <th>{{ trans('adminlte_lang::message.work_holidaycolumns.meta_value') }}</th>
                          <th>{{ trans('adminlte_lang::message.ct') }}</th>
                          <th>{{ trans('adminlte_lang::message.ut') }}</th>
                          <th>{{ trans('adminlte_lang::message.op') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $record)
                        <tr>
                          <td style="display:none;">{{$record->meta_id}}</td>
                          <td style="display:none;">{{$record->tenant_id}}</td>
                          @role('admin')
                          <td>{{$record->name}}</td>
                          @else
                          <td style="display:none;">{{$record->name}}</td>
                          @endrole
                          <td>{{$record->meta_key}}</td>
                          <td>{{$record->meta_value}}</td>
                          <td>{{$record->created_at}}</td>
		          <td>{{$record->updated_at}}</td>
                          <td>
                              <a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem('{{$record->meta_id,$record->meta_key}}')"><i class="glyphicon glyphicon-edit"></i></a>
                              <a class="btn btn-block" onclick="deleteItem('{{$record->meta_id}}')"><i class="glyphicon glyphicon-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th style="display:none;">{{ trans('adminlte_lang::message.work_holidaycolumns.meta_id') }}</th>
                          <th style="display:none;">{{ trans('adminlte_lang::message.work_holidaycolumns.tenant_id') }}</th>
                          @role('admin')
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          @else
                          <th style="display:none;">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          @endrole
                          <th>{{ trans('adminlte_lang::message.work_holidaycolumns.meta_key') }}</th>
                          <th>{{ trans('adminlte_lang::message.work_holidaycolumns.meta_value') }}</th>
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
            <form id="add-modal-form" action="" method="post">
                 <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header --> 
                    <div class="box-body">
                        <!--<div class="form-group">-->
<!--                          <label for="week-day">{{ trans('adminlte_lang::message.tenantcolumns.weekdaysub') }}</label>-->
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-check-o"></i>
                            </div>
                              <select class="form-control" id="tenant_id" name="tenant_id" style="width: 100%;">                                  
                              </select>
                          </div>
<!--                        </div>-->
                    </div>
                    <!-- /.box-body -->
                </div> 
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.weekday') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!--<div class="form-group">-->
<!--                          <label for="week-day">{{ trans('adminlte_lang::message.tenantcolumns.weekdaysub') }}</label>-->
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-check-o"></i>
                            </div>
                            <select class="form-control" id="week-day" name="week_day[]" multiple="multiple" style="width: 100%;"></select>
                          </div>
<!--                        </div>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.workhour') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
<!--                        <div class="form-group">-->
<!--                          <label for="work-hour">{{ trans('adminlte_lang::message.tenantcolumns.workhoursub') }}</label>-->
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <select class="form-control" id="work-hour" name="work_hour[]" multiple="multiple" style="width: 100%;"></select>
                          </div>
<!--                        </div>-->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.holiday') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
<!--                        <div class="form-group">-->
<!--                          <label for="holiday">{{ trans('adminlte_lang::message.tenantcolumns.holidaysub') }}</label>-->
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-times-o"></i>
                            </div>
                            <input type="text" class="form-control" id="holiday" name="holiday">
                          </div>
<!--                        </div>-->
                    </div>
                    <!-- /.box-body -->
                </div>
            </form>
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
              <input type="hidden" id="meta_id" name="meta_id">
              <div class="box-body">
                <div class="form-group">
                  <label for="meta_key">{{ trans('adminlte_lang::message.work_holidaycolumns.meta_key') }}</label>
                  <input type="text" class="form-control" id="meta_key" name="meta_key" readonly="true">
                </div>
                <div class="form-group" id="change_meta_key">
                  <label for="meta_value">{{ trans('adminlte_lang::message.work_holidaycolumns.meta_value') }}</label>
                  <input type="text" class="form-control" id="meta_value" name="meta_value">
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
        $object['create_url'] = url('config/work_holiday/c');
        $object['read_url']   = url('config/work_holiday/r');
        $object['update_url'] = url('config/work_holiday/u');
        $object['delete_url'] = url('config/work_holiday/d');
        $object['tanantID_url'] = url('account/tenant/r');
        $object['change_url'] = url('config/work_holiday/ch');
        
        $object_json = json_encode($object);
        return $object_json;
    }
?>
<script type="text/javascript">
    var ray = <?php echo script_parameter(); ?>;
    
    function change()
    {
        $.ajax({
	url: ray.change_url,
        type:"POST",
	async: false , 
        data: {"changemeta_key":$('#changemeta_key').val(), "tenantId":$('#tenantId').val(),_token: "{{ csrf_token() }}"}, 
	success : function(result) { 
                    var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                         tbody += '<tr>';
                        tbody += '<td style="display:none;">'+item.meta_id+'</td>';
                        tbody += '<td style="display:none;">'+item.tenant_id+'</td>';
                        @role('admin')
                        tbody += '<td >'+item.name+'</td>';
                        @else
                        tbody += '<td style="display:none;">'+item.name+'</td>';
                        @endrole
                        tbody += '<td>'+item.meta_key+'</td>';
                        tbody += '<td>'+item.meta_value+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    flushDataTable(tbody);
                    
                    $('#add-modal').modal('hide');
                    $('#edit-modal').modal('hide');
	},
	error : function(error) {
		console.log("error:" + error);
	}
        });
    }
    $(document).ready(function() {   
     $.ajax({
	url: ray.tanantID_url,
        type:"POST",
	async: false ,
        data: {_token: "{{ csrf_token() }}"}, 
	success : function(item) { 
            var result_obj = eval(item);
            var options ="<option value='1'>=CHECKED=</option>";
            $(result_obj).each(function(index, item){
                    options += '<option value='+item.id+'>'+item.name+'</option>';
            });
                $('form #tenant_id').html(options);
                $('#tenantId').html(options);
	},
	error : function(error) {
		console.log("error:" + error);
	}
        });
        $("#changemeta_key").on("change",change);      
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
                    var responseText = $.parseJSON(jqXHR.responseText);
                    t.createButterbar(jqXHR.status+': '+responseText.message);
                },
                success: function(result) {
                     var t = addButterBar;
                        t.createButterbar("{{ trans('adminlte_lang::message.crudcolumns.submitsucc') }}");
                         if($('#changemeta_key').val()==1&&$('#tenantId').val()==1)
                    {
                     var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                         tbody += '<tr>';
                        tbody += '<td style="display:none;">'+item.meta_id+'</td>';
                        tbody += '<td style="display:none;">'+item.tenant_id+'</td>';
                        @role('admin')
                        tbody += '<td >'+item.name+'</td>';
                        @else
                        tbody += '<td style="display:none;">'+item.name+'</td>';
                        @endrole
                        tbody += '<td>'+item.meta_key+'</td>';
                        tbody += '<td>'+item.meta_value+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                   flushDataTable(tbody);
                    
                    $('#add-modal').modal('hide');
                }
                else{
                    change();
                    }   
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
                    if($('#changemeta_key').val()==1&&$('#tenantId').val()==1)
                    {
                        var result_obj = eval(result);
                    var tbody = '';
                    $(result_obj).each(function(index, item){
                         tbody += '<tr>';
                        tbody += '<td style="display:none;">'+item.meta_id+'</td>';
                        tbody += '<td style="display:none;">'+item.tenant_id+'</td>';
                        @role('admin')
                        tbody += '<td >'+item.name+'</td>';
                        @else
                        tbody += '<td style="display:none;">'+item.name+'</td>';
                        @endrole
                        tbody += '<td>'+item.meta_key+'</td>';
                        tbody += '<td>'+item.meta_value+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.meta_id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
                    flushDataTable(tbody);
                    
                    $('#edit-modal').modal('hide');
                    }
                    else{
                    change();
                    }           
                    
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
    
    function readItem(meta_id,meta_key)
    {    
       
      $.ajax({
        url: ray.read_url,
        type:"POST", 
        data: {"meta_id":meta_id, _token: "{{ csrf_token() }}"}, 
        success: function(item){
          $("#edit-modal #meta_id").val(item.meta_id);
          $("#edit-modal #meta_key").val(item.meta_key);
          $("#edit-modal #meta_value").val(item.meta_value);
        }
      });
    }
    
    var weekday = $("#week-day").select2({
            allowClear: true,
            data: window.dates.weekdays
        });
        weekday.val(["1", "2", "3", "4", "5"]).trigger("change");
        
        var workhour = $("#work-hour").select2({
            allowClear: true,
            data: window.dates.workhours
        });
        workhour.val(["9", "10", "11", "14", "15", "16"]).trigger("change");
        
        $('#holiday').datepicker({
            autoclose: false,
            multidate: true,
            language: "zh-CN",
            dateFormat: "yyyy-mm-dd",
            onSelect: gotoDate
        }).on('changeDate',gotoDate);
        function gotoDate(ev){
            //alert(ev.date.getFullYear().toString());
        }
 
    function deleteItem(meta_id)
    {
      var conf = confirm("{{ trans('adminlte_lang::message.crudcolumns.deleteconfirm') }}");
      if(conf){
        $.ajax({
          url: ray.delete_url,
          type:"POST", 
          data: {"meta_id":meta_id, _token: "{{ csrf_token() }}"}, 
          success: function(response){
              if($('#changemeta_key').val()==1&&$('#tenantId').val()==1){
                  var t = addButterBar;
                  t.createButterbar(response);
                  location.reload();   
              }
              else{
                  change();
              }
                   
            }
        });
      }
      else{
        return false;
      }
    }
</script>
@endsection
