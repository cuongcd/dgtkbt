{!! Form::open(array('route' => 'users.reset-password', 'autocomplete'=>'off','class'=>'smart-form client-form')) !!}
<header>
    {!! Lang::get('users.forgot_title') !!}
</header>
@include('layouts._messages')
<fieldset>
    <section>
        <label>{!! trans('users.forgot_message') !!}</label>
    </section>
    <section>
        <label class="label">{!! Lang::get('users.email') !!}</label>
        <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            {!! Form::text('username', Input::get('username'), array('placeholder'=>Lang::get('users.email'), 'required', 'autofocus','autocomplete'=>'on')) !!}
        </label>
    </section>
</fieldset>
<footer>
    {!! Form::submit('Submit', array('class'=>'btn btn-primary'))!!}
    <a title="{!! trans('users.back_to_login') !!}" href="{!! route('users.login') !!}" class="btn btn-link"
       type="button" style="float: left; padding: 0; margin: 10px 0 0 0px;">{!! trans('users.back_to_login') !!}</a>
</footer>
{!! Form::close() !!}
