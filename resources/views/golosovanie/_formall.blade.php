@include('form._input',[
      'name'=>'email',
      'type'=>'email',
      'required'=>true,
      'label'=>'Электронная почта'
  ])



@include('form._input',[
'name'=>'l_name',
  'required'=>true,
'label'=>'Фамилия'
])

@include('form._input',[
    'name'=>'f_name',
    'label'=>'Имя'
])


@include('form._input',[
   'name'=>'m_name',
   'label'=>'Отчество'
])


@include('form._input',[
           'name'=>'age',
           'label'=>'Дата рождения',
           'type'=>'date'
        ])


@include('form._input',[
  'name'=>'password',
  'type'=>'password',
    'required'=>true,
  'label'=>'Пароль'
])


@include('form._input',[
  'name'=>'password_confirmation',
   'type'=>'password',
     'required'=>true,
  'label'=>'Повторение пароля'
])

<button type="button" class="btn btn-outline-secondary btn-block"  id="copy_tel">
    Опа па <i class="fa fa-fw fa-plus"></i>
</button>
@push('scripts')
    <script>
        $('#copy_tel').on('click',function () {
            let
                telSelector = '[type=tel]',
                telInputs = $(telSelector),
                telInput = telInputs.filter(':last');

            let telGroup = telInput.closest('.form-group'),
                telGroupClone = telGroup.clone();

            if (telInputs.length < 5){
                telGroupClone.filter('[type=tel]').val('');
                telGroup.after(telGroupClone);
                $(telSelector).filter(':last').val('');
                appPhoneMask.init();
            }else{
                alert('Пацанам салам салам')
            }
        })

    </script>
@endpush



