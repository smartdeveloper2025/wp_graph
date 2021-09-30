<?php
/**
 * Template Name: Test Graph
 *
 */


get_header();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<style>
body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

#chartdiv {
  width: 100%;
height:550px;
}

</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <section class="landing-section">
            <div class="container">
                <div class="row mx-0 align-items-center">
                    <div id="chartdiv"></div>
                </div>
                 
            </div>
        </section>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/forceDirected.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>
// Themes begin
am4core.useTheme(am4themes_animated);

// Create chart
var chart = am4core.create("chartdiv", am4plugins_forceDirected.ForceDirectedTree);

// Create series
var series = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries())


// Set data
series.data = [
	{
		"name": "Main", "value":200, "color":"#000000",
		"children": [{
			"name": "Child-1", "value": 2,"link": ["child-2"]
		}, {
			"name": "child-2", "value": 100, "color":"#FF5556",
		},{
			"name": "child-2", "value": 100, "color":"#FF5556",
		}, {
			"name": "child-3", "value": 100, "link": ["Hue"]
		}
	]}, {
		"name": "Tourism Essential", "value":100, "color":"#000000",
		"children": [{
			"name": "Tourism", "value": 2,"link": ["Tourism in Hoi", "Hue"], "linkWidths": {
			  "Tourism in Hoi": 1,
			  "Hue": 1
			}
		}, {
			"name": "Globalization", "value": 100,"link": ["eToro", "Hue"], "linkWidths": {
			  "eToro": 1
			}
		}, {
			"name": "Hue", "value": 40
		}, {
			"name": "eToro", "value": 50
		}, {
			"name": "Tourism in Hoi", "value": 60
		}]
}];
// Set up data fields
series.dataFields.value = "value";
series.dataFields.name = "name";
series.dataFields.children = "children";
series.dataFields.id = "name";
series.dataFields.linkWith = "link";
series.dataFields.color = "color";
	

// Add labels
series.nodes.template.label.text = "{name}";
//series.minRadius = 50;
series.centerStrength = 0.5;
	
// Add labels
//series.nodes.template.label.text = "{name}";
series.nodes.template.label.valign = "bottom";
series.nodes.template.label.fill = am4core.color("#000");
series.nodes.template.label.dy = 10;
series.nodes.template.tooltipText = "{name}: [bold]{value}[/]";
series.fontSize = 9;
series.minRadius = 30;
series.maxRadius = 50;
series.dataFields.collapsed = "off";
series.dataFields.fixed = "fixed";
series.nodes.template.propertyFields.x = "x";
series.nodes.template.propertyFields.y = "y";


// Set link width
series.links.template.adapter.add("strokeWidth", function(width, target) {
  var from = target.source;
  var to = target.target;
  var widths = from.dataItem.dataContext.linkWidths;
  if (widths && widths[to.dataItem.id]) {
    return widths[to.dataItem.id];
  }
  return width;
});

</script>
