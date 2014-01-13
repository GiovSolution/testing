<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Highcharts lib examples</title>
	<style type="text/css">
		a, a:link, a:visited {
			color: #444;
			text-decoration: none;
		}
		a:hover {
			color: #000;
		}
		.left {
			float: left;
		}
		#menu {
			width: 20%;
		}
		#g_render {
			width: 80%;
		}
		li {
			margin-bottom: 1em;
		}
	</style>
	<!-- <script type="text/javascript" src="http://www.google.com/jsapi"></script>-->
	<script type="text/javascript" src="http://localhost/mis/assets/js/jquery-1.6.4.min.js"></script>
	<!-- <script type="text/javascript" src="../../assets/js/jquery-1.5.2.min.js">
		google.load("jquery", "1.4.4");
	</script>-->
	<!--<script type="text/javascript" src="http://www.highcharts.com/js/highcharts.js"></script>-->
    <script type="text/javascript" src="http://localhost/mis/assets/js/highcharts.js"></script>
    <!-- <script type="text/javascript" src="http://localhost/mis/assets/modules/main/js/exporting.js"></script> -->
</head>
<body>
	<div id="g_render"  class="left">
		<script type="text/javascript">
$(function(){
Highcharts.setOptions({"credits":{"enabled":true,"text":"this page has been viewed for 18 times","href":"#"}});
var chart_1 = new Highcharts.Chart({"series":[{"name":"Medis","data":[11492000,33571000,85942000,26423500,17153000,45998000,41045000,54982000,51576500,39012000,41928000,16790000,48807250,14202250,32766500,47670000,25836500,45756000,14727000,61753000]},{"name":"Non Medis","data":[5643000,6730250,8469250,17664500,8788750,12019000,9680500,9652500,10207000,10149500,10977250,8932500,9451000,14002250,13445250,10380750,11954000,15195000,11755500,12393000]},{"name":"Surgery","data":[0,4500000,0,0,1950000,350000,0,0,350000,0,350000,0,700000,0,700000,0,0,0,0,700000]},{"name":"Anti Aging","data":[0,5660000,5522000,800000,1650000,1720000,7150000,900000,1000000,0,0,0,0,850000,720000,4920000,19238500,2100000,800000,130000]},{"name":"Produk","data":[20730500,9925550,22556200,20853500,14248300,18115800,14883500,15895500,16012250,21822000,27702500,13230750,33192250,10267600,17953890,26061000,19307000,20934500,13960000,29089250]},{"name":"Lain-Lain","data":[6600000,0,12600000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]},{"name":"Total","data":[44540500,60842800,141139450,66266500,43510050,79002800,73329000,83755000,79845750,70883500,81132750,38853250,92775500,38797100,66885640,89106750,76711000,84785500,41092500,105830250]}],"chart":{"renderTo":"hc_chart_1","type":"line","width":1170,"height":380},"title":{"text":"Laporan Net Sales  01 February 2012 - 20 February 2012"},"xAxis":{"categories":["01 Feb","02 Feb","03 Feb","04 Feb","05 Feb","06 Feb","07 Feb","08 Feb","09 Feb","10 Feb","11 Feb","12 Feb","13 Feb","14 Feb","15 Feb","16 Feb","17 Feb","18 Feb","19 Feb","20 Feb"]},"yAxis":{"title":{"text":"Nominal"}}});
});
</script>
<div id="hc_chart_1"></div>
			</div>
</body>
</html>