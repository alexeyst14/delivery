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

//    formData[0]['value'] = 10;
//    $.ajax({
//        url : URL_CALCULATE_API,
//        type: "POST",
//        data : formData,
//        dataType : 'json',
//        success : function (data) {
//            $(data.data).each(function (key, val) {
//                $("#results tbody").append(getResultTpl(val));
//            });
//        }
//    });
}

function getResultTpl(data)
{
    str = '<tr>';
    str += '<td>' + data.company + '</td>';
    str += '<td>' + data.delivery_time + ' дней</td>';
    str += '<td>' + data.cost + ' грн.</td>';
    str += '</tr>';
    return str;
}