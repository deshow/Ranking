<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
    });
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var jsonData = $.ajax({
            url: '<?php echo Yii::app()->createAbsoluteUrl('ranking/getdata');?>',
            dataType:"json",
            async: false
            }).responseText;
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable(jsonData);
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, {width: 400, height: 240});
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, {width: 400, height: 240});
        var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
        chart.draw(data, {width: 400, height: 240});
        var chart = new google.visualization.PieChart(document.getElementById('chart_div4'));
        chart.draw(data, {width: 400, height: 240});
	}
    </script>
  </head>
  <body>
    <!--Div that will hold the pie chart-->
    <table>
    <tr>
    	<td><div id="chart_div1"></div></td>
    	<td><div id="chart_div2"></div></td>
    </tr>
    <tr>
    	<td><div id="chart_div3"></div></td>
    	<td><div id="chart_div4"></div></td>
    </tr>
    </table>
  </body>
</html>