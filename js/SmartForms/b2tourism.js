var ActualOption = 1;

$('#questionTwo').hide();
$('#questionTree').hide();

function HideAll() {
    $('#questionOne').hide();
    $('#questionTwo').hide();
    $('#questionTree').hide();
}

function nextFormAction() {

    ActualOption++;

    HideAll();

    switch (ActualOption) {
        case 1:
            $('#questionOne').show();
            break;

        case 2:
            $('#questionTwo').show();
        break;

        case 3:
            $('#questionTree').hide();
            break;
    }

}