var ActualOption = 1;

$('#SuccessMessage').hide();
$('#questionTwo').hide();
$('#questionTree').hide();

function HideAll() {
    $('#SuccessMessage').hide();
    $('#questionOne').hide();
    $('#questionTwo').hide();
    $('#questionTree').hide();
}

function nextFormAction() {

    ActualOption++;


    console.log(ActualOption);

    HideAll();

    switch (ActualOption) {
        case 1:
            $('#questionOne').show();
        break;

        case 2:
            $('#questionTwo').show();
        break;

        case 3:
            $('#questionTree').show();
        break;

        case 4:
            $('#SuccessMessage').show();
        break;
    }

}

