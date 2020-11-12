@extends('layouts.admin_template')

@section('title', ' Setting')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Setting Detail</h3>
                    <div class="box-tools">
                        <a class="btn btn-primary" href="{{ route('globalSetting.index') }}"> Back</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table">
                        <tbody>
                            <tr><td> Name </td><td>{{ $globalSetting->setting_name}}</td></tr>
                            @if($globalSetting->id=='1')
                            <tr><td> Value</td><td>{{ $globalSetting->setting_value}} Miles</td></tr>
                            @else
                            <tr><td> Value</td><td>{{ $globalSetting->setting_value}} </td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
