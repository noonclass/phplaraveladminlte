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
                        @role('admin')
                        <a class="btn btn-app" id="add-wizard-open"><i class="fa fa-magic"></i>{{ trans('adminlte_lang::message.wizard') }}</a>
                        <a class="btn btn-app" data-toggle="modal" data-target="#add-modal"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>    
                        @else
                        <a class="btn btn-app disabled" data-toggle="modal" data-target="#add-modal"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
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
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.desc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.acc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.ext') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.gw') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.pre') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.status') }}</th>
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
                          <td>{{$record->desc}}</td>
                          <td>{{$record->access_number}}</td>
                          <td>{{$record->extrinsic_number}}</td>
                          <td>{{$record->gateway}}</td>
                          <td>{{$record->prefix}}</td>
                          <td>{{intval($record->status)==0?trans('adminlte_lang::message.tenantcolumns.down'):trans('adminlte_lang::message.tenantcolumns.run')}}</td>
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
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.id') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.name') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.desc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.acc') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.ext') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.gw') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.pre') }}</th>
                          <th>{{ trans('adminlte_lang::message.tenantcolumns.status') }}</th>
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
    <!-- /.container-fluid -->
    
    <!-- add-wizard start -->
    <div class="wizard" id="add-wizard" data-title="{{ trans('adminlte_lang::message.crudcolumns.createrecord') }}{{ trans('adminlte_lang::message.wizard') }}">
        <h1>{{ trans('adminlte_lang::message.crudcolumns.createrecord') }}{{ trans('adminlte_lang::message.wizard') }}</h1>
        <!-- normal wizard cards -->
        <div class="wizard-card" data-cardname="card1" data-validate="validateCard1">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.cardbasic') }}</h3>
            <div class="container-fluid">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="name">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</label>
                          <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="desc">{{ trans('adminlte_lang::message.tenantcolumns.desc') }}</label>
                          <input type="text" class="form-control" id="desc" name="desc">
                        </div>
                        <div class="form-group">
                          <label for="access-number">{{ trans('adminlte_lang::message.tenantcolumns.acc') }}</label>
                          <input type="text" class="form-control" id="access-number" name="access_number">
                         </div>
                        <div class="form-group">
                          <label for="extrinsic-number">{{ trans('adminlte_lang::message.tenantcolumns.ext') }}</label>
                          <input type="text" class="form-control" id="extrinsic-number" name="extrinsic_number">
                         </div>
                        <div class="form-group">
                          <label for="gateway">{{ trans('adminlte_lang::message.tenantcolumns.gw') }}</label>
                          <input type="text" class="form-control" id="gateway" name="gateway">
                        </div>
                        <div class="form-group">
                          <label for="prefix">{{ trans('adminlte_lang::message.tenantcolumns.pre') }}</label>
                          <input type="text" class="form-control" id="prefix" name="prefix">
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
              </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card2" data-validate="validateCard2">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.carddatetime') }}</h3>
            <div class="container-fluid">
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
                        <div class="form-group">
                          <label for="week-day">{{ trans('adminlte_lang::message.tenantcolumns.weekdaysub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-check-o"></i>
                            </div>
                            <select class="form-control" id="week-day" name="week_day[]" multiple="multiple" style="width: 100%;"></select>
                          </div>
                        </div>
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
                        <div class="form-group">
                          <label for="work-hour">{{ trans('adminlte_lang::message.tenantcolumns.workhoursub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <select class="form-control" id="work-hour" name="work_hour[]" multiple="multiple" style="width: 100%;"></select>
                          </div>
                        </div>
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
                        <div class="form-group">
                          <label for="holiday">{{ trans('adminlte_lang::message.tenantcolumns.holidaysub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar-times-o"></i>
                            </div>
                            <input type="text" class="form-control" id="holiday" name="holiday">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card3" data-validate="validateCard3">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.cardmusic') }}</h3>
            <div class="container-fluid">
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.welcome') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                          <label for="welcome">{{ trans('adminlte_lang::message.tenantcolumns.welcome') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-file-audio-o"></i>
                            </div>
                            <input type="hidden" id="welcome" name="welcome_file">
                            <input type="file" class="form-control" id="upload-audio" name="upload">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.nonwork') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                          <label for="nonwork">{{ trans('adminlte_lang::message.tenantcolumns.nonworksub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-file-audio-o"></i>
                            </div>
                            <input type="hidden" id="nonwork" name="nonwork_file">
                            <input type="file" class="form-control" id="upload-audio" name="upload">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.moh') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                          <label for="moh">{{ trans('adminlte_lang::message.tenantcolumns.mohsub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-file-audio-o"></i>
                            </div>
                            <input type="hidden" id="moh" name="moh_file">
                            <input type="file" class="form-control" id="upload-audio" name="upload">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card4" data-validate="validateCard4">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.cardlimit') }}</h3>
            <div class="container-fluid">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="limit">{{ trans('adminlte_lang::message.tenantcolumns.limit') }}</label>
                          <select class="form-control" id="limit" name="limit">
                            <option value="0" selected="selected">{{ trans('adminlte_lang::message.tenantcolumns.none')}}</option>
                            <option value="1" >{{ trans('adminlte_lang::message.tenantcolumns.black')}}</option>
                            <option value="-1">{{ trans('adminlte_lang::message.tenantcolumns.white')}}</option>
                          </select>
                        </div>
                     </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                
                <div class="box box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{ trans('adminlte_lang::message.tenantcolumns.limitlist') }}</h3>
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                          <label for="limit-list">{{ trans('adminlte_lang::message.tenantcolumns.limitlistsub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <select class="form-control" id="limit-list" name="limit_list" multiple="multiple" style="width: 100%;"></select>
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card5" data-validate="validateCard5">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.cardextension') }}</h3>
            <div class="container-fluid">
                <div class="callout callout-info">
                    <h4>Tip!</h4>
                    <p>{{ trans('adminlte_lang::message.tenantcolumns.cardextensiontips') }}</p>
                </div>
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="ext-count">{{ trans('adminlte_lang::message.tenantcolumns.extcount') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" id="ext-count" name="ext_count">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="ext-password">{{ trans('adminlte_lang::message.tenantcolumns.extpassword') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="glyphicon glyphicon-lock"></i>
                            </div>
                            <input type="password" class="form-control" id="ext-password" name="ext_password">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="ext-retype-password">{{ trans('adminlte_lang::message.tenantcolumns.extretypepassword') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="glyphicon glyphicon-log-in"></i>
                            </div>
                            <input type="password" class="form-control" id="ext-retype-password" name="ext_retype_password">
                          </div>
                        </div>
                     </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card6" data-validate="validateCard6">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.carduser') }}</h3>
            <div class="container-fluid">
                <div class="callout callout-info">
                    <h4>Tip!</h4>
                    <p>{{ trans('adminlte_lang::message.tenantcolumns.cardusertips') }}</p>
                </div>
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="user-file">{{ trans('adminlte_lang::message.tenantcolumns.usersub') }}</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-file-excel-o"></i>
                            </div> 
                            <input type="hidden" id="user-file" name="user_file">
                            <input type="file" class="form-control" id="upload-file" name="upload" data-type="utpl">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        <div class="wizard-card" data-cardname="card7" data-validate="validateCard7">
            <h3>{{ trans('adminlte_lang::message.tenantcolumns.cardcharge') }}</h3>
            <div class="container-fluid">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="form-group">
                          <label for="rate">{{ trans('adminlte_lang::message.tenantcolumns.rate') }}</label>
                           <div class="input-group">
                            <input type="text" class="form-control" id="rate" name="call_rate">
                            <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pkg">{{ trans('adminlte_lang::message.tenantcolumns.pkg') }}</label>
                          <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" id="pkg" name="call_package"></span>
                            <input type="text" class="form-control" id="pkg-amount" name="call_package_amount" disabled="">
                            <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                            <input type="text" class="form-control" id="pkg-minutes" name="call_package_minutes" disabled="">
                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="status">{{ trans('adminlte_lang::message.tenantcolumns.status') }}</label>
                          <select class="form-control" id="status" name="status">
                            <option value="0">{{ trans('adminlte_lang::message.tenantcolumns.down')}}</option>
                            <option value="1" selected="selected">{{ trans('adminlte_lang::message.tenantcolumns.run')}}</option>
                          </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
        </div>
        <!-- /.wizard-card -->
        
        <!-- special status cards  -->
        <div class="wizard-success">
            {{ trans('adminlte_lang::message.crudcolumns.submitsucc') }}
        </div>
        <div class="wizard-error">
           {{ trans('adminlte_lang::message.crudcolumns.fail') }}
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
                  <label for="name">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.tenantcolumns.desc') }}</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <div class="form-group">
                  <label for="access-number">{{ trans('adminlte_lang::message.tenantcolumns.acc') }}</label>
                  <input type="text" class="form-control" id="access-number" name="access_number">
                 </div>
                <div class="form-group">
                  <label for="extrinsic-number">{{ trans('adminlte_lang::message.tenantcolumns.ext') }}</label>
                  <input type="text" class="form-control" id="extrinsic-number" name="extrinsic_number">
                 </div>
                <div class="form-group">
                  <label for="gateway">{{ trans('adminlte_lang::message.tenantcolumns.gw') }}</label>
                  <input type="text" class="form-control" id="gateway" name="gateway">
                </div>
                <div class="form-group">
                  <label for="prefix">{{ trans('adminlte_lang::message.tenantcolumns.pre') }}</label>
                  <input type="text" class="form-control" id="prefix" name="prefix">
                </div>
                <div class="form-group">
                  <label for="rate">{{ trans('adminlte_lang::message.tenantcolumns.rate') }}</label>
                   <div class="input-group">
                    <input type="text" class="form-control" id="rate" name="call_rate">
                    <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pkg">{{ trans('adminlte_lang::message.tenantcolumns.pkg') }}</label>
                  <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" id="pkg" name="call_package"></span>
                    <input type="text" class="form-control" id="pkg-amount" name="call_package_amount" disabled="">
                    <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                    <input type="text" class="form-control" id="pkg-minutes" name="call_package_minutes" disabled="">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.tenantcolumns.status') }}</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.tenantcolumns.down')}}</option>
                    <option value="1" selected="selected">{{ trans('adminlte_lang::message.tenantcolumns.run')}}</option>
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
                  <label for="name">{{ trans('adminlte_lang::message.tenantcolumns.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="desc">{{ trans('adminlte_lang::message.tenantcolumns.desc') }}</label>
                  <input type="text" class="form-control" id="desc" name="desc">
                </div>
                <div class="form-group">
                  <label for="access-number">{{ trans('adminlte_lang::message.tenantcolumns.acc') }}</label>
                  <input type="text" class="form-control" id="access-number" name="access_number">
                 </div>
                <div class="form-group">
                  <label for="extrinsic-number">{{ trans('adminlte_lang::message.tenantcolumns.ext') }}</label>
                  <input type="text" class="form-control" id="extrinsic-number" name="extrinsic_number">
                 </div>
                <div class="form-group">
                  <label for="gateway">{{ trans('adminlte_lang::message.tenantcolumns.gw') }}</label>
                  <input type="text" class="form-control" id="gateway" name="gateway">
                </div>
                <div class="form-group">
                  <label for="prefix">{{ trans('adminlte_lang::message.tenantcolumns.pre') }}</label>
                  <input type="text" class="form-control" id="prefix" name="prefix">
                </div>
                 <div class="form-group">
                  <label for="rate">{{ trans('adminlte_lang::message.tenantcolumns.rate') }}</label>
                   <div class="input-group">
                    <input type="text" class="form-control" id="rate" name="call_rate" placeholder="0.10">
                    <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pkg">{{ trans('adminlte_lang::message.tenantcolumns.pkg') }}</label>
                  <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" id="pkg" name="call_package"></span>
                    <input type="text" class="form-control" id="pkg-amount" name="call_package_amount" disabled="">
                    <span class="input-group-addon"><i class="fa fa-cny"></i></span>
                    <input type="text" class="form-control" id="pkg-minutes" name="call_package_minutes" disabled="">
                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="status">{{ trans('adminlte_lang::message.tenantcolumns.status') }}</label>
                  <select class="form-control" id="status" name="status">
                    <option value="0">{{ trans('adminlte_lang::message.tenantcolumns.down')}}</option>
                    <option value="1">{{ trans('adminlte_lang::message.tenantcolumns.run')}}</option>
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
        $object['create_url'] = url('account/tenant/c');
        $object['read_url']   = url('account/tenant/r');
        $object['update_url'] = url('account/tenant/u');
        $object['delete_url'] = url('account/tenant/d');
        $object['wizard_url'] = url('account/tenant/w');

        $object_json = json_encode($object);
        return $object_json;
    }
?>
<script type="text/javascript">
    var ray = <?php echo script_parameter(); ?>;
    
    var options = {
        contentHeight: 600,
        contentWidth: 834,// 28%(233px)+72%(600px)
        buttons:{ cancelText:"{{ trans('adminlte_lang::message.wizardbuttons.cancelText')}}",
                  nextText:"{{ trans('adminlte_lang::message.wizardbuttons.nextText')}}",
                  backText:"{{ trans('adminlte_lang::message.wizardbuttons.backText')}}",
                  submitText:"{{ trans('adminlte_lang::message.wizardbuttons.submitText')}}",
                  submittingText:"{{ trans('adminlte_lang::message.wizardbuttons.submittingText')}}"
        },
    };
    var wizard = $("#add-wizard").wizard(options);
    
    $(document).ready(function() {
        /* wizard section */
        $(document).on("click", "#add-wizard-open", function (e) {
            wizard.show();
        });
        wizard.on("submit", function(wizard) {
            $.ajax({
                url: ray.wizard_url,
                type: "POST",
                data: wizard.serialize() + "&_token={{ csrf_token() }}",
                error: function(jqXHR, textStatus, errorThrown) {
                    wizard.hideButtons();
                    wizard.submitError();
                    $("button.wizard-close").removeAttr('style');
                },
                success: function(result) {
                    wizard.hideButtons();
                    wizard.submitSuccess();
                    wizard.updateProgressBar(0);
                    wizard.reset();
                    wizard.close();
                }
            });
            return false;
        });
        
        wizard.on("reset", function() {
            // TODO:: Some reset actions
        });
        
        /* wizard card2 section */
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
        
        /* wizard card3 section */
        $("[id=upload-audio]").each(function() {
            $(this).fileinput({
                language : 'zh',
                uploadUrl: '/fileinput',
                overwriteInitial: true,
                allowedFileTypes: ['audio', 'video'],
                allowedFileExtensions : ['mp3','wav'],
                maxFilesNum: 1,
                maxFileSize: 10240,
                showUpload: true,
                showRemove: false,
                showPreview: false,
                initialCaption: "{{ trans('adminlte_lang::message.tenantcolumns.uploadaudio') }}",
                uploadExtraData: function (previewId, index) {
                    var info = {"_token": "{{ csrf_token() }}"};
                    return info;
                },
                slugCallback: function(filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            }).on("fileuploaded", function(event, data){
                $(this).parents('.file-input').prev().val(data.response.realname);
            });
        });
        
        /* wizard card4 section */
        $("#limit-list").select2({
            tags: true
        });
        
        /* wizard card5 section */
        /* wizard card6 section */
        $("[id=upload-file]").each(function(index,element) {
            $(this).fileinput({
                language : 'zh',
                uploadUrl: '/fileinput',
                overwriteInitial: true,
                allowedFileExtensions : ['csv','xls','xlsx'],
                maxFilesNum: 1,
                maxFileSize: 1024,
                showUpload: true,
                showRemove: false,
                showPreview: false,
                initialCaption: "{{ trans('adminlte_lang::message.tenantcolumns.uploadfile') }}",
                uploadExtraData: function (previewId, index) {
                    var info = {"_token": "{{ csrf_token() }}", "_type": $(element).attr("data-type")};
                    return info;
                },
                slugCallback: function(filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            }).on("fileuploaded", function(event, data){
                $(this).parents('.file-input').prev().val(data.response.realname);
            });
        });

        /* modal section */
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
                        tbody += '<td>'+item.desc+'</td>';
                        tbody += '<td>'+item.access_number+'</td>';
                        tbody += '<td>'+item.extrinsic_number+'</td>';
                        tbody += '<td>'+item.gateway+'</td>';
                        tbody += '<td>'+item.prefix+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?"{{ trans('adminlte_lang::message.tenantcolumns.down') }}":"{{ trans('adminlte_lang::message.tenantcolumns.run') }}")+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
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
                        tbody += '<td>'+item.desc+'</td>';
                        tbody += '<td>'+item.access_number+'</td>';
                        tbody += '<td>'+item.extrinsic_number+'</td>';
                        tbody += '<td>'+item.gateway+'</td>';
                        tbody += '<td>'+item.prefix+'</td>';
                        tbody += '<td>'+(parseInt(item.status)==0?"{{ trans('adminlte_lang::message.tenantcolumns.down') }}":"{{ trans('adminlte_lang::message.tenantcolumns.run') }}")+'</td>';
                        tbody += '<td>'+item.created_at+'</td>';
                        tbody += '<td>'+item.updated_at+'</td>';
                        tbody += '<td><a class="btn btn-block" data-toggle="modal" data-target="#edit-modal" onclick="readItem(\''+item.id+'\')"><i class="glyphicon glyphicon-edit"></i></a><a class="btn btn-block" onclick="deleteItem(\''+item.id+'\')"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        tbody += '</tr>';
                    });
                    
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
        
        /*
        NOTE:: DOM树中ID跟身份证一样必须唯一
        实际情况是，对于DOM树内有相同ID的，如果直接用$("#ID")来获取，在each的时候只会遍历到第1个元素；
        如果想each这个ID集合，需要用$("[id=ID]")来进行选择，小写的id为固定写法，大写的ID为对象的id属性。*/
        $("[id=pkg]").change(function() {
            if ($(this).is(":checked")) {
                $(this).attr('value', 1);
                $(this).closest("form").find('#pkg-amount').removeAttr('disabled');
                $(this).closest("form").find('#pkg-minutes').removeAttr('disabled');
            }else{
                $(this).attr('value', 0);
                $(this).closest("form").find('#pkg-amount').attr('disabled', '');
                $(this).closest("form").find('#pkg-minutes').attr('disabled', '');
            }
        });
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
          $("#edit-modal #rate").val(item.call_rate);
          $("#edit-modal #pkg").val(item.call_package);
          $("#edit-modal #pkg-amount").val(item.call_package_amount);
          $("#edit-modal #pkg-minutes").val(item.call_package_minutes);
          $("#edit-modal #status").val(Number(item.status));
          
          $("#edit-modal #pkg").prop({checked:false});
          if(Number(item.call_package) == 1){
              //NOTE:: Change .attr() to .prop() since JQuery 1.6 
              $("#edit-modal #pkg").prop({checked:true});
              $('#edit-modal #pkg-amount').removeAttr('disabled');
              $('#edit-modal #pkg-minutes').removeAttr('disabled');
          }
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
    
     /* validate cards */
    function validateCard1(card) {return true;
        var ret = true;
        if(validateBlank(card, "#prefix"))ret = false;
        if(validateBlank(card, "#gateway"))ret = false;
        if(validateBlank(card, "#extrinsic-number"))ret = false;
        if(validateBlank(card, "#access-number"))ret = false;
        if(validateBlank(card, "#desc"))ret = false;
        if(validateBlank(card, "#name"))ret = false;

        return ret;
    }
    
    function validateCard2(card) {return true;
        var ret = true;
        //if(validateBlank(card, "#holiday"))ret = false;
        if(validateBlank(card, "#work-hour"))ret = false;
        if(validateBlank(card, "#week-day"))ret = false;

        return ret;
    }
    
    function validateCard3(card) {return true;
        var ret = true;
        if(validateBlank(card, "#moh"))ret = false;
        if(validateBlank(card, "#nonwork"))ret = false;
        if(validateBlank(card, "#welcome"))ret = false;

        return ret;
    }
    
    function validateCard4(card) {return true;
        var ret = true;
        //if(validateBlank(card, "#limit-list"))ret = false;

        return ret;
    }
    
    function validateCard5(card) {return true;
        var ret = true;
        if(validateBlank(card, "#ext-retype-password"))ret = false;
        if(validateBlank(card, "#ext-password"))ret = false;
        if(validateBlank(card, "#ext-count"))ret = false;
        
        if(validateNumberIllegal(card, "#ext-count", 100))ret = false;
        if(validatePasswordDifferent(card, "#ext-password", "#ext-retype-password"))ret = false;

        return ret;
    }
    
    function validateCard6(card) {return true;
        var ret = true;
        if(validateBlank(card, "#user-file"))ret = false;

        return ret;
    }
    
    function validateCard7(card) {return true;
        var ret = true;
        if(validateBlank(card, "#rate"))ret = false;

        return ret;
    }
    
    function validateBlank(card, input) {
        var el = card.el.find(input);
        var name = el.val();
        if (name == "") {
            el.focus();
            el.parents("div.form-group").toggleClass("has-error", true);
            return true;
        }
        
        el.parents("div.form-group").toggleClass("has-error", false);
        return false;
    }
    
    function validateNumberIllegal(card, input, max) {
        var el = card.el.find(input);
        var number = el.val();

        if (number == "" || parseInt(number) <= 0 || parseInt(number) > max) {
            el.focus();
            el.parents("div.form-group").toggleClass("has-error", true);
            return true;
        }
     
        el.parents("div.form-group").toggleClass("has-error", false);
        return false;
    }
    
    function validatePasswordDifferent(card, input, retype) {
        var el = card.el.find(input);
        var el2 = card.el.find(retype);
        var name = el.val();
        var name2 = el2.val();
        
        if(name == "" || name2 == "" || name != name2){
            el2.focus();
            el2.parents("div.form-group").toggleClass("has-error", true);
            return true;
        }
        
        el2.parents("div.form-group").toggleClass("has-error", false);
        return false;
    }
</script>
@endsection