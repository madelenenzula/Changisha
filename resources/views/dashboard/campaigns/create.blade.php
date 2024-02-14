@extends('layouts.dashboard.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('page-css')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css')}}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10 col-xs-12 offset-md-1">

            <form action="" id="startCampaignForm" class="form-horizontal" method="post" >
                @csrf

                <div class="card bg-info">
                    <div class="card-header">
                        <i class="fa fa-info-circle"></i> @lang('app.feature_available_info')
                    </div>
                </div>

                <legend>@lang('app.campaign_info')</legend>

                <div class="row mb-3 {{ $errors->has('category')? 'is-invalid':'' }}">
                    <label for="category" class="col-sm-4 col-form-label">@lang('app.category') <span class="field-required">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control select2" name="category">
                            <option value="">@lang('app.select_a_category')</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->has('category')? '<p class="help-block">'.$errors->first('category').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('title')? 'is-invalid':'' }}">
                    <label for="title" class="col-sm-4 col-form-label">@lang('app.title') <span class="field-required">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="@lang('app.title')">
                        {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                        <p class="text-info"> @lang('app.great_title_info')</p>
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('short_description')? 'is-invalid':'' }}">
                    <label for="short_description" class="col-sm-4 col-form-label">@lang('app.short_description')</label>
                    <div class="col-sm-8">
                        <textarea name="short_description" class="form-control" rows="3">{{ old('short_description') }}</textarea>
                        {!! $errors->has('short_description')? '<p class="help-block">'.$errors->first('short_description').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('description')? 'is-invalid':'' }}">
                    <label for="description" class="col-sm-3 col-form-label">@lang('app.description') <span class="field-required">*</span></label>
                    <div class="col-sm-12">
                        <div class="alert alert-info"> @lang('app.image_insert_limitation') </div>
                    </div>
                    <div class="col-sm-12">
                        <textarea name="description" class="form-control description" rows="8">{{ old('description') }}</textarea>
                        {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}
                        <p class="text-info"> @lang('app.description_info_text')</p>
                    </div>
                </div>

                <div class="alert alert-info">
                    <h3> <i class="fa fa-money"></i> @lang('app.you_will_get') {{get_option('campaign_owner_commission')}}% @lang('app.of_total_raised')</h3>
                </div>
                <div class="row mb-3{{ $errors->has('goal')? 'is-invalid':'' }}">
                    <label for="goal" class="col-sm-4 col-form-label">@lang('app.goal') <span class="field-required">*</span></label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="goal" value="{{ old('goal') }}" name="goal" placeholder="@lang('app.goal')">
                        {!! $errors->has('goal')? '<p class="help-block">'.$errors->first('goal').'</p>':'' !!}
                    </div>
                </div>

                {{--          <div class="row mb-3{{ $errors->has('min_amount')? 'is-invalid':'' }}">
                              <label for="min_amount" class="col-sm-4 col-form-label">@lang('app.min_amount')</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" id="min_amount" value="{{ old('min_amount') }}" name="min_amount" placeholder="@lang('app.min_amount')">
                                  {!! $errors->has('min_amount')? '<p class="help-block">'.$errors->first('min_amount').'</p>':'' !!}
                              </div>
                          </div>
                          <div class="row mb-3{{ $errors->has('max_amount')? 'is-invalid':'' }}">
                              <label for="max_amount" class="col-sm-4 col-form-label">@lang('app.max_amount')</label>
                              <div class="col-sm-8">
                                  <input type="number" class="form-control" id="max_amount" value="{{ old('max_amount') }}" name="max_amount" placeholder="@lang('app.max_amount')">
                                  {!! $errors->has('max_amount')? '<p class="help-block">'.$errors->first('max_amount').'</p>':'' !!}
                              </div>
                          </div>
--}}
                <div class="row mb-3{{ $errors->has('recommended_amount')? 'is-invalid':'' }}">
                    <label for="recommended_amount" class="col-sm-4 col-form-label">@lang('app.recommended_amount')</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="recommended_amount" value="{{ old('recommended_amount') }}" name="recommended_amount" placeholder="@lang('app.recommended_amount')">
                        {!! $errors->has('recommended_amount')? '<p class="help-block">'.$errors->first('recommended_amount').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('amount_prefilled')? 'is-invalid':'' }}">
                    <label for="amount_prefilled" class="col-sm-4 col-form-label">@lang('app.amount_prefilled')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="amount_prefilled" value="{{ old('amount_prefilled') }}" name="amount_prefilled" placeholder="@lang('app.amount_prefilled')">
                        {!! $errors->has('amount_prefilled')? '<p class="help-block">'.$errors->first('amount_prefilled').'</p>':'' !!}
                        <p class="text-info"> @lang('app.amount_prefilled_info_text')</p>

                    </div>
                </div>


                <div class="row mb-3{{ $errors->has('end_method')? 'is-invalid':'' }}">
                    <label for="end_method" class="col-sm-4 col-form-label">@lang('app.campaign_end_method')</label>
                    <div class="col-sm-8">

                        <label>
                            <input type="radio" name="end_method"  value="goal_achieve" @if( ! old('end_method') || old('end_method') == 'goal_achieve') checked="checked" @endif > @lang('app.after_goal_achieve')
                        </label> <br />

                        <label>
                            <input type="radio" name="end_method" value="end_date"  @if(old('end_method') == 'end_date') checked="checked" @endif > @lang('app.after_end_date')
                        </label> <br />

                        {{--<label>
                            <input type="radio" name="end_method" value="both"  @if(old('end_method') == 'both') checked="checked" @endif > @lang('app.both_need')
                        </label>--}}

                        {!! $errors->has('end_method')? '<p class="help-block">'.$errors->first('end_method').'</p>':'' !!}

                        <p class="text-info"> @lang('app.end_method_info_text')</p>
                    </div>
                </div>


                <div class="row mb-3{{ $errors->has('video')? 'is-invalid':'' }}">
                    <label for="video" class="col-sm-4 col-form-label">@lang('app.video')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="video" value="{{ old('video') }}" name="video" placeholder="@lang('app.video')">
                        {!! $errors->has('video')? '<p class="help-block">'.$errors->first('video').'</p>':'' !!}
                        <p class="text-info"> @lang('app.video_info_text')</p>
                    </div>
                </div>


                <div class="row mb-3 {{ $errors->has('country_id')? 'is-invalid':'' }}">
                    <label for="country_id" class="col-sm-4 col-form-label">@lang('app.country')<span class="field-required">*</span></label>
                    <div class="col-sm-8">
                        <select class="form-control select2" name="country_id">

                            <option value="">@lang('app.select_a_country')</option>

                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach

                        </select>
                        {!! $errors->has('country_id')? '<p class="help-block">'.$errors->first('country_id').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('address')? 'is-invalid':'' }}">
                    <label for="address" class="col-sm-4 col-form-label">@lang('app.address')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address" value="{{ old('address') }}" name="address" placeholder="@lang('app.address')">
                        {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('start_date')? 'is-invalid':'' }}">
                    <label for="start_date" class="col-sm-4 col-form-label">@lang('app.start_date')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="@lang('app.start_date')">
                        {!! $errors->has('start_date')? '<p class="help-block">'.$errors->first('start_date').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3{{ $errors->has('end_date')? 'is-invalid':'' }}">
                    <label for="end_date" class="col-sm-4 col-form-label">@lang('app.end_date')</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="@lang('app.end_date')">
                        {!! $errors->has('end_date')? '<p class="help-block">'.$errors->first('end_date').'</p>':'' !!}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">@lang('app.submit_new_campaign')</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection

@section('page-js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replaceClass = 'description';
        });

        $(function () {
            $('#start_date, #end_date').datetimepicker({format: 'YYYY-MM-DD'});
        });



    </script>
@endsection