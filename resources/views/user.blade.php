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
                        <a class="btn btn-app"><i class="glyphicon glyphicon-plus"></i>{{ trans('adminlte_lang::message.add') }}</a>
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
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          <th>CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 4.0
                          </td>
                          <td>Win 95+</td>
                          <td> 4</td>
                          <td>X</td>
                        </tr>
                        <tr>
                          <td>Misc</td>
                          <td>IE Mobile</td>
                          <td>Windows Mobile 6</td>
                          <td>-</td>
                          <td>C</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          <th>CSS grade</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
		</div>
	</div>
@endsection

@section('main-script')
<script type="text/javascript">
    
</script>
@endsection