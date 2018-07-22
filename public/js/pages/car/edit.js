var brandSelect = $('select[name="brand_id"]'),
    brandId = 0,
    modelSelect = $('select[name="model_id"]');

$(document).ready(function () {
    // load models if Brand was selected in previous request
    if (gerBrandId() > 0) {
        reloadModels();
        console.log(modelSelect.data('id')); //todo
        if (modelSelect.data().hasOwnProperty('id')) {
            modelSelect.val(modelSelect.data('id'));
        }
    }

    $('body').on('change', 'select[name="brand_id"]', function () {
        reloadModels();
    });
});

function gerBrandId() {
    if (brandSelect.length !== 0) {
        brandId = brandSelect.val();
    }

    return brandId;
}

function reloadModels() {
    modelSelect.empty();
    modelSelect.append('<option disabled>Choose Model</option>');
    modelSelect.prop('selectedIndex', 0);

    $.ajax({
        url: '/model/getModelsByBrand/' + gerBrandId(),
        method: 'GET',
        success: function (response) {
            if (response.hasOwnProperty('models')) {
                $.each(response.models, function (key, name) {
                    modelSelect.append($('<option></option>').attr('value', key).text(name));
                })
            }
        },
        error: function (response) {
            //todo show error msg
        }
    });
}