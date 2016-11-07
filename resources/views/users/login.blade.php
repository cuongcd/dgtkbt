{!! Form::open(array('route' => 'users.login', 'autocomplete'=>'off','class'=>'smart-form client-form')) !!}
<header>
</header>
@include('layouts._messages')

<fieldset id="fromlogin">
    <section>
        <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
            {!! Form::text('username', Input::get('username'), array('placeholder'=>Lang::get('users.email'), 'required', 'autofocus','autocomplete'=>'on')) !!}
        </label>
    </section>
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    <section>
        <label class="input"> <i class="icon-append fa fa-lock"></i>
            {!! Form::password('password', array('placeholder'=> Lang::get('users.password'), 'required','autocomplete'=>'on')) !!}
        </label>
    </section>
</fieldset>
<footer>
    {!! Form::submit('Sign in', array('class'=>'btn btn-primary'))!!}
    <label class="checkbox" style="margin:10px 0 0 0px;float:left;">
        {!! Form::checkbox('remember_me', '1',true) !!}
        <i></i>{!! Lang::get('users.remember_me') !!}</label>
</footer>
{!! Form::close() !!}