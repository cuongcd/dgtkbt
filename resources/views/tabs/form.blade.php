<div class="row">
    <div class="col-lg-12">
        <fieldset>
            @foreach($form->getFields() as $field)
                @if($field->getType() != 'hidden')
                <div class="form-group">
                @endif
                    @if(!in_array($field->getType(), ['hidden']))
                    <label class="col-lg-3 control-label">
                        @if($field->getType() != 'buttons')
                            {{$field->getLabel()}}
                            @if($field->isRequired()) <span class="required">*</span> @endif
                        @endif
                    </label>
                    <div class="col-lg-8">
                    @endif
                    @if($field->getBefore())
                        <span class="hidden">{!!$field->getBefore()!!}</span>
                    @endif
                    @if($field->getType() == 'select')
                        {!!Form::select($field->getKey(),  $field->getValues(), ($form->getValue($field) !== null)?$form->getValue($field):$field->getValue(),
                            $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'multiselect')
                        {!!Form::select($field->getKey().'[]', $field->getValues(), $form->getValue($field)?$form->getValue($field):$field->getValue(),
                            $field->getAttributesHtml())!!}
                    @elseif(in_array($field->getType(), ['search', 'range', 'date', 'datetime', 'time', 'email', 'color', 'tel', 'url', 'week', 'month', 'number']))
                        {!!Form::input($field->getType(), $field->getKey(), $form->getValue($field), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'textarea')
                        {!!Form::textarea($field->getKey(), $form->getValue($field), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'password')
                        {!!Form::password($field->getKey(), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'confirm_password')
                        {!!Form::password($field->getKey(), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'file')
                        {!!Form::file($field->getKey(), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'hidden')
                        {!!Form::hidden($field->getKey(), $form->getValue($field), $field->getAttributesHtml())!!}
                    @elseif($field->getType() == 'checkbox')
                        <div class="checkbox i-checks">
                            <label>
                                <div class="icheckbox_square-green">
                                    <?php $options = ['class' => 'i-checks']?>
                                    {!!Form::checkbox($field->getKey(), $field->getValue(),
                                        ($form->getValue($field) == $field->getValue())?true:$field->getChecked(),
                                        $field->getDisabled()?array_merge(['disabled'], $options):$options) !!}
                                </div>
                                {!!$field->getText()!!}
                            </label>
                        </div>
                    @elseif($field->getType() == 'radio')
                        @foreach($field->getValues() as $value => $text)
                        <div class="radio i-checks">
                            <label>
                                <div class="iradio_square-green">
                                    <?php $options = ['class' => 'i-checks']?>
                                    <?php $selectedValue = $form->getValue($field)?$form->getValue($field):$field->getValue()?>
                                    @if(is_array($text) && isset($text[1]) && $text[1])
                                        {!!Form::radio($field->getKey(), $value, $value==$selectedValue?true:false, ['disabled']) !!}
                                    @else
                                        {!!Form::radio($field->getKey(), $value, $value==$selectedValue?true:false) !!}
                                    @endif
                                </div>
                                @if(!is_array($text)) {!!$text!!} @else {!!$text[0]!!} @endif
                            </label>
                        </div>
                        @endforeach
                    @elseif($field->getType() == 'checkbox-group')
                        @foreach($field->getValues() as $value => $text)
                            <div class="checkbox i-checks">
                                <label>
                                    <div class="icheckbox_square-green">
                                        <?php $options = ['class' => 'i-checks']?>
                                        {!!Form::checkbox($field->getKey().'['.$text[0].']', $value, in_array($value, $form->getValue($field)?$form->getValue($field):[])?true:false,
                                            (isset($text[2]) && $text[2])?['disabled']:[]) !!}
                                    </div>
                                    {!!$text[1]!!}
                                </label>
                            </div>
                        @endforeach
                    @elseif($field->getType() == 'label')
                        <p class="form-control-static">{!!$field->getText()!!}</p>
                    @elseif($field->getType() == 'buttons')
                        @foreach ($field->getValues() as $buttonName => $button)
                            <button class="right btn btn-sm @if($buttonName != 'back') btn-primary @else btn-default @endif" type="button" id="{{$buttonName}}"
                                @if($button->getOnclick()) onclick="{!!$button->getOnclick()!!}" @endif>
                                <i class="fa {{$button->getIcon()}}"></i>
                                <span class="bold">{{$button->getLabel()}}</span>
                            </button>
                        @endforeach
                    @else
                        {!!Form::text($field->getKey(), $form->getValue($field), $field->getAttributesHtml())!!}
                    @endif

                    @if($field->getScript())
                        <script type="text/javascript">{!! $field->getScript() !!}</script>
                    @endif

                    @if($field->getAfter())
                        <span class="help-block m-b-none">{!!$field->getAfter()!!}</span>
                    @endif
                @if(!in_array($field->getType(), ['hidden']) )
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                @endif
            @endforeach
    </fieldset>

    </div>
</div>
@if($form->getJs())
@if(count($form->getJsParams()))
<script type="text/javascript">
    @foreach($form->getJsParams() as $key => $value)
    var {{$key}} = '{{$value}}';
    @endforeach
</script>
@endif
<script type="text/javascript" src="{{$form->getJsPath()}}"></script>
@endif
