$(function() {
    $('#calc_form_submit').click(calculate);
});

function calculate(event)
{
    $("#results tbody").empty();
    formData = $('[name="calc_form"]').serializeArray();
    $.ajax({
        url : URL_CALCULATE,
        type: "POST",
        data : formData,
        dataType : 'json',
        success : function (data) {
            $(data.data).each(function (key, val) {
                $("#results tbody").append(getResultTpl(val));
            });
            calculateApi(formData);
        }
    });
}

function calculateApi(formData)
{
    for (var i = 0; i < API_COMPANIES.length; i++) {
        (function(key) {
            formData[0].value = API_COMPANIES[key].id;
            $.ajax({
                url : URL_CALCULATE_API,
                type: "POST",
                async: true,
                data : formData,
                dataType : 'json',
                beforeSend : function () {
                    data = {
                        company_id : API_COMPANIES[key].id,
                        company : API_COMPANIES[key].name,
                        delivery_time : '<img src="' + IMAGES_PATH + 'loading.gif" />',
                        cost : '<img src="' + IMAGES_PATH + 'loading.gif" />'
                    };
                    $("#results tbody").append(getResultTpl(data));
                },
                success : function (data) {
                    $("#companyid_" + data.company_id).replaceWith(getResultTpl(data));
                }
            });
        })(i);
    }
}

function getResultTpl(data)
{
    str = '<tr id="companyid_' + data.company_id + '">';
    str += '<td>' + data.company + '</td>';
    str += '<td>' + data.delivery_time + ' дней</td>';
    str += '<td>' + data.cost + ' грн.</td>';
    str += '</tr>';
    return str;
}