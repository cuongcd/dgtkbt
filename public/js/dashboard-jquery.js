/**
 * Created by ryou on 7/16/15.
 */
$(document).ready(function () {
    $('#page-wrapper').css('background-color','#f3f3f4 !important');
    $('.dashboard-order-chart').click(function () {
        $('.dashboard-order-chart').each(function () {
            $(this).removeClass('active');
            $('#'.concat($(this).text().trim()).concat('-content')).hide();
        });
        $(this).addClass('active');
        $('#'.concat($(this).text().trim()).concat('-content')).show();
    });

    $('.dashboard-order-chart').each(function () {
        $(this).removeClass('active');
        $('#'.concat($(this).text().trim()).concat('-content')).hide();
    });

    $('.dashboard-order-chart:first').each(function () {
        $(this).addClass('active');
        $('#'.concat($(this).text().trim()).concat('-content')).show();
    });

    $('.dashboard-top-title').each(function () {
        var fontSize = 0;
        while ($(this).width() > $(this).parent().width()) {
            fontSize = parseInt($(this).css('fontSize'), 10) - 1;
            $(this).css('font-size', fontSize + 'px');
        }
    });

    $('text:contains("Highcharts.com")').remove();
    $('g.highcharts-button').remove();
});

function history_charts(target, step, categories, unit, column_name, column_data, spline_name, spline_data) {
    $('#'.concat(target)).highcharts({
        title: {
            text: ''
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            tickInterval: step,
            title: {
                text: unit
            }
        },
        labels: {},
        series: [{
            type: 'column',
            name: column_name,
            data: column_data,
            showInLegend: false
        }, {
            type: 'spline',
            name: spline_name,
            data: spline_data,
            showInLegend: false,
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }]
    });
}