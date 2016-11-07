{!! Form::open(array('route' => 'users.reset-password', 'autocomplete'=>'off','class'=>'smart-form client-form')) !!}
<header>
    {!! Lang::get('users.reset_title') !!}
</header>
@include('layouts._messages')
<fieldset>
    <section>
        <label class="label">{!! Lang::get('users.new_password') !!}</label>
        <label class="input"> <i class="icon-append fa fa-lock"></i>
            {!! Form::password('password', array('placeholder'=> Lang::get('users.new_password'), 'required','autocomplete'=>'on')) !!}
        </label>
    </section>
    <section>
        <label class="label">{!! Lang::get('users.password_confirmation') !!}</label>
        <label class="input"> <i class="icon-append fa fa-lock"></i>
            {!! Form::password('password_confirmation', array('placeholder'=> Lang::get('users.password_confirmation'), 'required','autocomplete'=>'on')) !!}
        </label>
    </section>
</fieldset>
<footer>
    {!! Form::submit(trans('users.reset_password'), array('class'=>'btn btn-primary'))!!}
    <a title="{{ trans('users.back_to_login') }}" href="{!! route('users.login') !!}" class="btn btn-link" type="button" style="float: left; padding: 0; margin: 10px 0 0 0px;">{{ trans('users.back_to_login') }}</a>
</footer>
{!! Form::close() !!}
