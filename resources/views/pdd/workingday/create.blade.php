@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
    <x-forms.post action="{{ route('holiday.store') }}" class="">
        <x-frontend.card>
            <x-slot name="header">
                @lang('Create') @lang('Holiday')
            </x-slot>

            <x-slot name="body">
                <x-forms.textfield required type="text" name="day" label="{{ __('Day') }}" value="{{ $item->name }}" />
                 <x-forms.textfield required type="text" name="description" label="{{ __('Description') }}" value="{{ $item->description }}" />
                 <x-forms.textfield required type="text" name="holiday_name" id="holiday_name" class="form-control" value="{{ old('holiday_name') }}" placeholder="{{ __('Enter Holiday name..') }}">
                 <x-forms.textfield required type="date" name="holiday_date" class="form-control pull-right" id="datepicker">
                 
            </x-slot>
            <x-slot name="footer">
                <button type="submit" class="btn btn-primary">@lang('Save')</button>
                <a href="{{ route('donor.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
            </x-slot>
        </x-frontend.card>
    </x-forms.post>
    </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
