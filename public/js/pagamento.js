$(document).ready(function () {

    let current_fs, next_fs; //fieldsets
    let opacity;

    $(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 600
        });
    });

});


function pegaValorEnd(){

    let endereco = document.querySelector('#ds_endereco');
    let numero = document.querySelector('#ds_numero');
    let cep = document.querySelector('#ds_cep');
    let cidade = document.querySelector('#ds_cidade');
    let uf = document.querySelector('#ds_uf');
    let address = document.querySelector('#address');

    address.innerHTML = endereco.value + ', ' + numero.value + '<br>' + cidade.value + ' - ' + uf.value + '<br>' + 'CEP: ' + cep.value
}

function pegaValorParcela(){

    let parcela = document.querySelector('#nr_parcela');
    let textParcela = document.querySelector('#parcela');

    textParcela.innerHTML = "Pago em " + parcela.options[parcela.selectedIndex].innerHTML;
}
