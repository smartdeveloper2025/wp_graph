<?php
/**
 * Template Name: Share Graph Link
 */

$user_id = $_GET['user_id'];
$creation_id = $_GET['creation_id'];
$type = $_GET['type'];
$tpl_graph_data = '';

if(isset($user_id) && $user_id != '' && isset($creation_id) && $creation_id != '' && isset($type) && $type != ''){
	switch( $type ){
		case 'tpc':
			$tpl_graph_data = get_topic_graph_data($user_id,$creation_id);
			break;
		case 'exp':
			$tpl_graph_data = get_exp_graph_data($user_id,$creation_id);
			break;
		case 'net':
			$tpl_graph_data = get_net_graph_data($user_id,$creation_id);
			break;
	}
	//echo $tpl_graph_data; die('hello');
}

	//echo $tpl_graph_data; die('--hello');
//echo "<pre>"; print_r($subcreation_data); die();
?>
<style type="text/css">
	#chartdiv {
	    width: 100%;
	    height: 100%;
	    /*position: sticky;
	    top: 70px;
	    display: flex;
	    justify-content: center;
	    background-color: transparent;
	    box-shadow: 0px 1px 3px rgb(0 0 0 / 40%);
	    border-radius: 5px;*/
	}
</style>

	
			<div id="chartdiv"></div>
        
    <!-- #content -->


<!---Graph Js Start--->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/forceDirected.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>

	

	
	//license key of amcharts for remove branding
	am4core.addLicense("CH297328668")
	// Themes begin
	am4core.useTheme(am4themes_animated);

	// Create chart
	var chart = am4core.create("chartdiv", am4plugins_forceDirected.ForceDirectedTree);
	// Create series
	var series = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries());
	
	/* chart.legend = new am4charts.Legend();
	chart.legend.position = "bottom";
	chart.legend.fontSize = 12;
	chart.fontFamily = "Arial"; */
	
	chart.responsive.enabled = true;
	chart.tooltip.label.maxWidth = 150;
	chart.tooltip.label.wrap = true;
	
	chart.legend = new am4charts.Legend();
	chart.legend.useDefaultMarker = true;
	var marker = chart.legend.markers.template.children.getIndex(0);
	marker.cornerRadius(12, 12, 12, 12);
	marker.strokeWidth = 2;
	marker.strokeOpacity = 1;
	marker.stroke = am4core.color("#ccc");


	chart.colors.step = 2;
	
	// Set up data fields
	series.dataFields.value = "value";
	series.dataFields.name = "name";
	series.dataFields.children = "children";
	series.dataFields.id = "name";
	series.dataFields.linkWith = "link";
	series.dataFields.color = "color";
	
	series.data	= <?php echo $tpl_graph_data; ?>;
	 //series.data	= [{"name":"Main","value":100,"color":"#9ba2a6","children":[{"name":"Sub-1","value":50,"color":"#000000"},{"name":"sub-2","value":50,"color":"#000000"}]},{"name":"SB-Lft-1","value":30,"color":"#593e97","link":["a","b","c"]},{"name":"a","value":30,"color":"#593e97"},{"name":"b","value":30,"color":"#593e97"},{"name":"c","value":30,"color":"#593e97"},{"name":"SB-Lft-2","value":30,"color":"#593e97","link":["x","h"]},{"name":"x","value":30,"color":"#593e97"},{"name":"h","value":30,"color":"#593e97"},{"name":"SB2-LFT-1","value":30,"color":"#593e97","link":["1"]},{"name":"1","value":30,"color":"#593e97"}];
	

	// Add labels
	series.nodes.template.label.text = "[bold]{name}[/]";
	//series.minRadius = 50;
	series.centerStrength = 0.5;
		
	// Add labels
	//series.nodes.template.label.text = "{name}";
	series.nodes.template.label.valign = "bottom";
	series.nodes.template.label.fill = am4core.color("#000");
	series.nodes.template.label.dy = 10;
	//series.nodes.template.tooltipText = "[bold]{name}[/]";
	series.fontSize = 16;
	series.minRadius = 10;
	series.maxRadius = 20;
	series.dataFields.collapsed = "off";
	series.dataFields.fixed = "fixed";
	series.nodes.template.propertyFields.x = "x";
	series.nodes.template.propertyFields.y = "y";
	
	series.manyBodyStrength = -10;
series.links.template.distance = 7;
series.links.template.strength = 0.25;
	
	// Set tooltip of nodes on hover
	series.nodes.template.adapter.add("tooltipText", function(text, target) {
	  if (target.dataItem) {
		switch(target.dataItem.level) {
		  case 0:
			return "{name}";
		  case 1:
			return "{tooltip}";
		  case 2:
			return "{name}";
		  default : 
		    return "{name}";
		}
	  }
	  return text;
	});
	series.nodes.template.adapter.add("tooltip", function(text, target) {
	  color_t = "#000000";
	  
	  return color_t;
	});
 
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
	
	series.links.template.adapter.add("stroke", function(color) {
	  color = "#000000";
	  return color;
	});
	
	// Add watermark
	var watermark = chart.createChild(am4core.Label);
	watermark.text = "Source: A Knomad Creation";
	watermark.align = "right";
	watermark.fontSize = 15;
	watermark.fillOpacity = 0.5;
	watermark.disabled = false;

	// Enable watermark on export
	chart.exporting.events.on("exportstarted", function(ev) {
	  watermark.disabled = false;
	});

	// Disable watermark when export finishes
	chart.exporting.events.on("exportfinished", function(ev) {
	  watermark.disabled = true;
	});

	// Add watermark to validated sprites
	chart.exporting.validateSprites.push(watermark);










</script>
<!---Graph Js End--->