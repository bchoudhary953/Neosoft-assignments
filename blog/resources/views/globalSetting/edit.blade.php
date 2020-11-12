@extends('layouts.admin_template')

@section('title', 'Settings')

@section('content')
<div class="row">
  <div class="col-sm-8 col-md-offset-2">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> Edit Setting </h3>
        <div class="box-tools">
            <a href="{{ route('globalSetting.index') }}" type="button" id="title-btn" class="btn btn-primary">Back</a>
        </div>
      </div>
      <div class="box-body">

        <form id="globalSetting_form" class="form-horizontal" method="POST" action="{{ route('globalSetting.update',$globalSetting->id) }}" enctype="multipart/form-data" >
              <input name="_method" type="hidden" value="PATCH">
          {{ csrf_field() }}


          <div class="form-group{{ $errors->has('setting_name') ? ' has-error' : '' }}">
            <label for="setting name" class="col-md-4 control-label"> Name<span class="hasstick">*</span></label>
            <div class="col-md-4">
                <input id="setting_name" type="text" class="form-control" name="setting_name" value="{{ $globalSetting->setting_name}}"  autofocus="" required>

                @if ($errors->has('setting_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('setting_name') }}</strong>
                </span>
                @endif
            </div>
            <!-- <label for="Km" class="control-label">Km</label> -->
          </div>

          <div class="form-group{{ $errors->has('setting_value') ? ' has-error' : '' }}">
            <label for="setting value" class="col-md-4 control-label"> Value<span class="hasstick">*</span></label>
            <div class="col-md-4">
              @if ($globalSetting->id == '1')
                <input id="setting_value" type="number" class="form-control" name="setting_value" value="{{ $globalSetting->setting_value}}"  autofocus="" required>
              @else
                  <input id="setting_value" type="text" class="form-control" name="setting_value" value="{{ $globalSetting->setting_value}}"  autofocus="" required>
              @endif
                @if ($errors->has('setting_value'))
                <span class="help-block">
                    <strong>{{ $errors->first('setting_value') }}</strong>
                </span>
                @endif
            </div>
              @if ($globalSetting->id == '1')
                <label for="Miles" class="control-label">Miles</label>
              @endif
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn  btn-default">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

    $('#globalSetting_form').parsley();

</script>


@endsection
