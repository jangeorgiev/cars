var brandSelect = $('select[name="brand_id"]'),
    brandId = 0,
    modelSelect = $('select[name="model_id"]');

$(document).ready(function () {
    // load models if Brand was selected in previous request
    if (gerBrandId() > 0) {
        let modelId = $.urlParam('model_id');

        reloadModels();

        // preselect Model option
        if (modelId > 0) {
            modelSelect.val(modelId);
        }
    }

    $('body').on('change', 'select[name="brand_id"]', function () {
        reloadModels();
    });

    // init range slider
    $( "#slider-range" ).slider({
        range: true,
        min: 100,
        max: 20000,
        values: [ 5000, 15000 ],
        slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
});

function gerBrandId() {
    if (brandSelect.length !== 0) {
        brandId = brandSelect.val();
    }

    return brandId;
}

function reloadModels() {
    modelSelect.empty();
    modelSelect.append('<option selected="selected" disabled>Select Model</option>');
    modelSelect.prop('selectedIndex', 0);

    $.ajax({
        url: '/model/getModelsByBrand/' + gerBrandId() + '/1', //get only active models
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

$.urlParam = function(name) {
    let results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);

    return results !== null ? results[1] : 0;
};