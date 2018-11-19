<script type="text/javascript">
    $(function () {
        //var data_chart = ;
        //alert(data_chart);
        $('#histo1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ' ',
                style: {
                    fontFamily: 'Arial, sans-serif'
                }
            },
            subtitle: {
                text: '  '
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -90,
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Arial, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 2,
                title: {
                    text: ' '
                },
                scalable: false
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function () {
                    if(this.key == 10)
                    {
                        return 'Điểm <strong>' + this.key +'</strong><br><strong>' + Highcharts.numberFormat(this.point.y, 0, '', ',') + '</strong> thí sinh';
                    }
                    return 'Điểm <strong>' + this.key + ' đến &lt; '+(parseFloat(this.key)+0.25)+'</strong><br><strong>' + Highcharts.numberFormat(this.point.y, 0, '', ',') + '</strong> thí sinh';

                }
            },
            plotOptions: {
                column: {
                    colorByPoint: true
                }
            },
            series: [{
                name: ' ',
                data: <?php echo $chart; ?>,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#333',
                    align: 'center',
                    formatter: function () {
                        return Highcharts.numberFormat(this.y, 0, '', ',');
                    },
                    y: -20, // 10 pixels down from the top
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Arial, sans-serif',
                        textShadow:'none'
                    }
                }
            }],
            colors: [
                "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775", "#ccc", "#ccc", "#ccc", "#0ac775"        ],
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            }
        });
    });
</script>
<section class="benifit-eschool-area section-padding">
    <div class="container">
        <div class="section-heading text-center">
            <h2>Phổ điểm môn {{$mon}}</h2>
        </div>
        <div id="histo1"></div>
    </div>
</section>