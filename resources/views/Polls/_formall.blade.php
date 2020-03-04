

@include('form._input',[
    'name'=>'name',
    'label'=>'Название голосования'
])

@include('form._input',[
    'name'=>'description',
    'label'=>'Описание'
])

@include('form._input',[
           'name'=>'image',
           'type'=>'file',
           'label'=>'Изображение'
        ])

<label for="basic-url">Варианты выбора</label>
<div id="parentId" class="row">

    <div class="poll-value col-3">
        @include('form._input',[
           'name'=>'members[]',
           'type'=>'text',
           'required'=>true,
           'label'=>''
        ])


            <a style="color:#ff7cf1;" onclick="return deleteField(this)" href="#"><i class="fas fa-minus"></i></a>
            <a style="color:#348065;" onclick="return addField()" href="#"><i class="fas fa-plus"></i></a>
    </div>
</div>


<script>
    let countOfFields = 1,
        curFieldNameId = 1,
        maxFieldLimit = 25,
        contDiv,
        div;

    function deleteField(a) {
        if (countOfFields > 1)
        {
            contDiv = a.parentNode;
            contDiv.parentNode.removeChild(contDiv);
            countOfFields--;
        }
        return false;
    }
    function addField() {
        if (countOfFields >= maxFieldLimit) {
            alert("Число полей достигло своего максимума = " + maxFieldLimit);
            return false;
        }
        countOfFields++;
        curFieldNameId++;


        div = $('.poll-value').filter(':first').clone();
        div.find('input').val('');
        $('#parentId').append(div);

        return false;
    }
</script>




