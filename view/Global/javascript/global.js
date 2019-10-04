function fn_reload_object() {
    $('body').bootstrapMaterialDesign();
    $('[data-toggle="tooltip"]').tooltip();
}

$(document).ready(function () {
    fn_reload_object();
    $('.showLoader').on('click', function (e) {
        $('#loader_container').show();
    });
    setTimeout(function () {
        $("#div_alert").fadeOut("normal", function () {
            $(this).remove();
        });
    }, 5000);

    // Si el formulario tiene esta clase validamos
    $('.needs-validation').on('submit', function (event) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        $(this).addClass('was-validated');
        $('#loader_container').show();
    });

    $('input[type="reset"]').on('click',function () {
        $(this).parent('form').find('input:text, input:password, input:file, textarea').attr('value','');
        $(this).parent('form').find('select option').removeAttr('selected');
        $(this).parent('form').find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
    });

    $('[data-toggle="custom-drawer"]').on('click',function(e){
        $target = $($(this).data('target'));
        $target.toggleClass('bmd-drawer-in');
        $target.find('.bmd-layout-backdrop').toggleClass('in');
    });
    $('[data-toggle="collapse"]').on('click',function(e){
        $target = $($(this).data('target'));
        console.log($target.attr('id'));
        if($target.attr('id') == 'd-actions') {
            $('.collapse-layout-backdrop').toggleClass('fixed-top');
        }
    });

});