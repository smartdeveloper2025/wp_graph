<?php
/**
 * Template Name: Edit Topic Notes
 *
 * Edit Topic Notes template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();
global $wpdb;
$creation_data = $subcreation_data = array();
$is_creation_exist = 'no';
if(isset($_GET['edit_id']) && $_GET['edit_id'] != ''){
	$current_user_id = get_current_user_id();
	$creation_edit_id = $_GET['edit_id'];
	//$creation_edit_id = 101;
	$creation_table = $wpdb->prefix."tbl_creation";
	$sub_creation_table = $wpdb->prefix."tbl_sub_creation";
	$detail_sub_creation_table = $wpdb->prefix."tbl_sub_creation_detail";
	$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' and id = '{$creation_edit_id}' ", ARRAY_A );
	// echo "<br>";
		//echo "<pre>"; print_r($creation_result); //die("======rrrrrrr");
	if(count($creation_result) >= 0){
		$is_creation_exist = 'yes';
		$creation_data = $creation_result[0];
		// get sub-topic
		$sub_creation_result = $wpdb->get_results( "SELECT * from {$sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$creation_edit_id}' ", ARRAY_A );
		
		if(count($sub_creation_result) >= 0){
			$subcreation_data = $sub_creation_result;
			//echo "<pre>"; print_r($sub_creation_result); //die("======rrrrrrr");
			// get left-right (Source-Learning) nodes
			foreach($sub_creation_result as $key => $sub_row){
				$detail_sub_creation_result = $wpdb->get_results( "SELECT * from {$detail_sub_creation_table} where user_id = '{$current_user_id}' and creation_id = '{$creation_edit_id}' and sub_creation_id = '{$sub_row["id"]}' ", ARRAY_A );
				if(count($detail_sub_creation_result) >= 0){
					//echo "<pre>"; print_r($detail_sub_creation_result); die("======rrrrrrr");
					$subcreation_data[$key]['details'] = $detail_sub_creation_result;
				}
			}
			
			
		}
	}
}
//echo "<pre>"; print_r($subcreation_data); die();
?>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/amsify.suggestags.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Athiti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style type="text/css">
    .experience_row_box {
        display: grid;
        grid-template-rows: 85px;
    }
	
</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5">
            <div class="row mx-0">
                <h4 class="section-link"><a href=""><u>Edit Topic Notes</u></a></h4>
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <p class="form-text">
                            <a href="Javascript:;" class="link mr-3">View Large</a>
                            <a href="Javascript:;" class="share_link" ><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--<form method="post" id="topic_creation" action="" >-->
			<input type="hidden" name="clone_counter" id="clone_counter" value="<?php echo count($subcreation_data); ?>" />
                <div class="row mb-5">
					<form method="post" id="main_creation_frm" action="" >
						<div class="col-lg-7 col-md-7 col-sm-12">
							<input type="text" placeholder="Name your overall topic" onblur="main_creation()"  id="topic_name" name="topic_name" value="<?php echo $creation_data['name']; ?>" class="form-control creation_input">
							<label for="topic_desc">Description</label>
							<textarea name="topic_desc" id="topic_desc" onblur="main_creation()" class="form-control creation_input" ><?php echo $creation_data['description']; ?></textarea>
							<p>
								[you can use this space to describe the purpose of this creation]
							</p>
							<input type="hidden" name="hdn_creation_id" id="hdn_creation_id" value="<?php echo $creation_data['id']; ?>" />
							<!--<input type="hidden" name="hdn_detail_sub_creation_id" id="hdn_detail_sub_creation_id" value="" />-->
						</div>
					</form>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <ul class="nav list_itms">
                            <li class="nav-item pr-1"><i class="fas fa-circle"></i> Topic</li>
                            <li class="nav-item px-1"><i class="fas fa-circle"></i> Sub Topic</li>
                            <li class="nav-item px-1"><i class="fas fa-circle"></i> Source</li>
                            <li class="nav-item px-1"><i class="fas fa-circle"></i> Key Learning</li>
                        </ul>
                        <h5 class="m-0 mt-2">A Knomad creation</h5>
                    </div>
                </div>
                <div class="row chart__div">
					
						<div class="col-lg-7 col-md-7 col-sm-7">
					<?php foreach($subcreation_data as $sub_key => $sub_data){ $sub_key++;  ?>
							<div class="sec_devided">
							<h4 class="section-link mb-2"><a href="">Sub-Topic: <?php echo $sub_key; ?></a></h4>
							<form method="post" id="sub_creation_frm_<?php echo $sub_key; ?>" action="" >
							<!-- <div class="col-lg-7 col-md-7 col-sm-7 p-0"> -->
								<div class="row m-0">
									<div class="col-12 p-0">
										<input type="hidden" name="hdn_sub_creation_id" id="hdn_sub_creation_id_<?php echo $sub_key; ?>" value="<?php echo $sub_data['id']; ?>" />
										
										<label><i class="fas fa-circle"></i> Name of Sub-Topic</label>
										<input type="text" name="sub_topic_name" onblur="sub_creation(<?php echo $sub_key; ?>)" placeholder="Name the subject" class="form-control creation_input" value="<?php echo $sub_data['field_1']; ?>">
									</div>
								</div>
								<div class="row m-0 mt-5">
									<div class="col-12 p-0">
										<input type="hidden" name="skills_count" id="skills_count_<?php echo $sub_key; ?>" value="<?php echo count($sub_data['details']); ?>" />
										<div class="table-responsive">
										<table class="creation_table table_bordered topic__table">
											<thead>
												<tr>
													<th style="width:50%">Source material/location [you can use this to group the keyword]?</th>
													<th style="width:50%">Key learnings form this material/location [Press Enter to seperate]</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($sub_data['details'] as $detail_key => $detail_data){ $detail_key++; ?>
												<tr><td><div class="d-flex align-items-center">
															<i class="fas fa-circle" aria-hidden="true"></i>
															<input type="text" name="tag_val[<?php echo $detail_key; ?>][left]" placeholder="Add Skills" class="form-control creation_input " onblur="sub_creation(<?php echo $sub_key; ?>)"  value="<?php echo $detail_data['left_val']; ?>" >
														</div>
													</td>
													<td>
														<div class="d-flex align-items-center">
															<i class="fas fa-circle" aria-hidden="true"></i>
															<input type="text" name="tag_val[<?php echo $detail_key; ?>][right]" onblur="sub_creation(<?php echo $sub_key; ?>)" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control tag_cls creation_input" value="<?php echo $detail_data['right_val']; ?>" >
														</div>
													</td>
												</tr>
												
												<?php } ?>
												<tr><td><div class="d-flex align-items-center">
															<i class="fas fa-circle" aria-hidden="true"></i>
															<input type="text" name="tag_val[0][left]" placeholder="Add Skills" class="form-control creation_input " onblur="sub_creation(<?php echo $sub_key; ?>)" onclick="clone_skills(this,<?php echo $sub_key; ?>)" value="" >
														</div>
													</td>
													<td>
														<div class="d-flex align-items-center">
															<i class="fas fa-circle" aria-hidden="true"></i>
															<input type="text" name="tag_val[0][right]" onblur="sub_creation(<?php echo $sub_key; ?>)" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control tag_cls creation_input" value="" >
														</div>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
									</div>
								</div>
								
								<div class="row m-0 mt-4 experience_row_box">
									<div class="col-12 p-0">
										<label>Notes</label>
										<input type="text" name="sub_topic_notes" onblur="sub_creation(<?php echo $sub_key; ?>)" placeholder="Type Here" class="form-control creation_input" value="<?php echo $sub_data['notes']; ?>">
									</div>
								</div>
							<!-- </div> -->
							
							</form>
						</div>
					<?php } ?>
						<div class="additional_clone_data">
						</div>
					</div>
					
					<div class="col-lg-5 col-md-5 col-sm-5 p-0 ">
						<div id="chartdiv" class="scoll_chart"></div>
					</div>
                </div>
				
				
				
            <!--</form>-->
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 mt-2">
                    <h4 class="section-link mb-2"><a href="javascript:;" class="d-flex align-items-center"><i class="fas fa-plus mr-2 " onclick="html_clone()"></i> Sub-Topic: <span id="next_counter_value">2</span></a></h4>
                </div>
            </div>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/assets/js/jquery.amsify.suggestags.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript">
create_topic_graph(<?php echo $_GET['edit_id']; ?>);
var home_url = "<?php echo home_url('/share-graph');  ?>";
var current_user_id = "<?php echo get_current_user_id();  ?>";
var hdn_creation_id = jQuery('#hdn_creation_id').val();
jQuery(".share_link").attr("href", home_url+"/?user_id="+current_user_id+"&creation_id="+hdn_creation_id+"&type=tpc");
jQuery(".share_link").attr("target", "_blank");

jQuery(document).ready(function(){
	var clone_counter_loop = parseInt(jQuery('#clone_counter').val());
	jQuery('#next_counter_value').html(clone_counter_loop+1);	
});
/*********clone skills tr td start***********/
function clone_skills(objThis , count ){
	var skills_count = jQuery('#skills_count_'+count ).val();
	skills_count++;
	let tr = '<tr><td><div class="d-flex align-items-center"><i class="fas fa-circle"></i><input type="text" name="tag_val['+skills_count+'][left]" onblur="sub_creation('+count+')" placeholder="Add Skills" class="form-control creation_input skills_input"></div></td><td><div class="d-flex align-items-center"><i class="fas fa-circle"></i><input type="text" name="tag_val['+skills_count+'][right]" onblur="sub_creation('+count+')" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input"><span class="fas fa-times remove__list"></span></div></td></tr>';
	jQuery(objThis).parent().parent().parent().before(tr);
	jQuery(objThis).closest('tr').prev('tr').find('input.skills_input').focus();
	jQuery('#skills_count_'+count ).val(skills_count);
}
//jQuery(document).ready(function () {
	jQuery(document).on('click','.remove__list',function(){
		jQuery(this).parent().parent().parent().remove(); 
	}); 
//});
/*********clone skills tr td end***********/
/*********clone code start*************/
function html_clone(){
	var clone_counter = jQuery('#clone_counter').val();
	clone_counter++;
	var html = '';
	html += '<div class="row">';
	html += '<div class="col-lg-12"><div class="sec_devided"><h4 class="section-link mb-2"><a href="">Sub-Topic: ' + clone_counter + '</a></h4><form method="post" id="sub_creation_frm_' + clone_counter + '" action="" >';
	html += '<div class="col-12 p-0">';
	html += '<div class="col-12 p-0">';
	html += '<input type="hidden" name="hdn_sub_creation_id" id="hdn_sub_creation_id_' + clone_counter + '" value="" />';
	html += '<label><i class="fas fa-circle"></i> Name of Sub-Topic</label>';
	html += '<input type="text" name="sub_topic_name" onblur="sub_creation(' + clone_counter + ')" placeholder="Name the subject" class="form-control creation_input"></div>';
	html += '<div class="row m-0 mt-5"><div class="col-12 p-0">';
	html += '<input type="hidden" name="skills_count" id="skills_count_' + clone_counter + '" value="0" />';
	html += '<div class="table-responsive"><table class="creation_table table_bordered topic__table">';
	html += '<thead><tr><th style="width:50%">Source material/location [you can use this to group the keyword]?</th><th style="width:50%">Key learnings form this material/location [Press Enter to seperate]</th></tr></thead><tbody>';
	html += '<tr><td><div class="d-flex align-items-center"><i class="fas fa-circle" aria-hidden="true"></i>';
	html += '<input type="text" name="tag_val[0][left]" onblur="sub_creation(' + clone_counter + ')" placeholder="Add Skills" class="form-control creation_input " onclick="clone_skills(this,' + clone_counter + ')" ></div></td><td><div class="d-flex align-items-center"><i class="fas fa-circle" aria-hidden="true"></i><input type="text" name="tag_val[0][right]" onblur="sub_creation(' + clone_counter + ')" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input" ></div></td></tr></tbody></table></div></div></div>';					
	html += '<div class="row m-0 mt-4 experience_row_box">';
	html += '<div class="col-12 p-0"><label>Notes</label><input type="text" name="sub_topic_notes" onblur="sub_creation(' + clone_counter + ')" placeholder="Type Here" class="form-control creation_input"></div></div></div></form></div></div></div>';
	
	jQuery(".additional_clone_data").append(html);
	jQuery('#clone_counter').val(clone_counter);			
	jQuery('#next_counter_value').html(clone_counter+1);			
}

/*********clone code end*************/

function tag_call(obj){
	jQuery(obj).amsifySuggestags({
		type : 'amsify'
	});
}
jQuery('.tag_cls').amsifySuggestags({
		type : 'amsify'
	});
function main_creation(){
	var topic_name = jQuery('#topic_name').val();
	var hdn_creation_id = jQuery('#hdn_creation_id').val();
	/****************************/
      if(topic_name != ''){
              jQuery.ajax({
                url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                type:'POST',
				//async:false,
                data: jQuery("#main_creation_frm").serialize() +'&action=create_creation_by_ajax&type=topic',
                dataType: 'JSON',
                 success:function(res)
                   {
                      if(res.flag == 'success'){
						jQuery('#hdn_creation_id').val(res.creation_id);
                        // alert(res.msg);
						//graph ajax start
						if(res.creation_id != ''){
							create_topic_graph(res.creation_id);
							jQuery(".share_link").attr("href", home_url+"/?user_id="+current_user_id+"&creation_id="+hdn_creation_id+"&type=tpc");
							jQuery(".share_link").attr("target", "_blank");
						}
						//graph ajax end
                        //location.reload();
                        //window.location.href="<?php //echo esc_url( home_url( '/chart' ) ); ?>";
                      }else{
                          // alert('Opps! Something went wrong');
                      }
                  //  alert(results);
          
                      }
               });
      }else{
        return false;
      }
    /****************************/
}

function create_topic_graph(creation_id){
	jQuery.ajax({
					url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
					type:'POST',
					//async:false,
					data: 'action=start_creation_graph_by_ajax&creation_id='+creation_id,
					dataType: 'JSON',
					 success:function(res)
					   {
							
							plot_topic_graph(res);
							console.log(res);
						  if(res.flag == 'success'){
							
							
							//location.reload();
							//window.location.href="<?php //echo esc_url( home_url( '/chart' ) ); ?>";
						  }else{
							  // alert('Opps! Something went wrong');
						  }
					  //  alert(results);
			  
						  }
				   });
}

function sub_creation(index){
	var hdn_creation_id = jQuery('#hdn_creation_id').val();
	/****************************/
      if(hdn_creation_id != ''){
              jQuery.ajax({
                url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                type:'POST',
				async:false,
                data: jQuery("#sub_creation_frm_"+index).serialize() +'&action=create_sub_creation_by_ajax&creation_id='+hdn_creation_id+'&counter='+index,
                dataType: 'JSON',
                 success:function(res)
                   {
					   console.log(res);
                      if(res.flag == 'success'){
						jQuery('#hdn_sub_creation_id_'+index).val(res.sub_creation_id);
                        // alert(res.msg);
						if(hdn_creation_id != ''){
							create_topic_graph(hdn_creation_id);
							jQuery(".share_link").attr("href", home_url+"/?user_id="+current_user_id+"&creation_id="+hdn_creation_id+"&type=tpc");
							jQuery(".share_link").attr("target", "_blank");
						}
                        //location.reload();
                        //window.location.href="<?php //echo esc_url( home_url( '/chart' ) ); ?>";
                      }else{
                          // alert('Opps! Something went wrong');
                      }
                  //  alert(results);
          
                      }
               });
      }else{
        return false;
      }
    /****************************/
}
</script>
<!---Graph Js Start--->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/forceDirected.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>

	
function plot_topic_graph(graph_data){
	
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
	
	series.data	= graph_data;
	// series.data	= [{"name":"Main","value":100,"color":"#9ba2a6","children":[{"name":"Sub-1","value":50,"color":"#000000"},{"name":"sub-2","value":50,"color":"#000000"}]},{"name":"SB-Lft-1","value":30,"color":"#593e97","link":["a","b","c"]},{"name":"a","value":30,"color":"#593e97"},{"name":"b","value":30,"color":"#593e97"},{"name":"c","value":30,"color":"#593e97"},{"name":"SB-Lft-2","value":30,"color":"#593e97","link":["x","h"]},{"name":"x","value":30,"color":"#593e97"},{"name":"h","value":30,"color":"#593e97"},{"name":"SB2-LFT-1","value":30,"color":"#593e97","link":["1"]},{"name":"1","value":30,"color":"#593e97"}];
	

	// Add labels
	series.nodes.template.label.text = "{name}";
	//series.minRadius = 50;
	series.centerStrength = 0.5;
		
	// Add labels
	//series.nodes.template.label.text = "{name}";
	series.nodes.template.label.valign = "bottom";
	series.nodes.template.label.fill = am4core.color("#000");
	series.nodes.template.label.dy = 10;
	//series.nodes.template.tooltipText = "[bold]{tooltip}[/]";
	series.fontSize = 9;
	series.minRadius = 10;
	series.maxRadius = 20;
	series.dataFields.collapsed = "off";
	series.dataFields.fixed = "fixed";
	series.nodes.template.propertyFields.x = "x";
	series.nodes.template.propertyFields.y = "y";
	
	series.manyBodyStrength = -50;
series.links.template.distance = 1;
series.links.template.strength = 1;
	
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
		}
	  }
	  return text;
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
}


// Set data
/* series.data =	[
					{
						"name": "Main", "value":100, "color":"#9ba2a6",
						"children": [
										{
											"name": "Sub-1", "value": 50, "color":"#000000"
										}, 
										{
											"name": "Sub-2", "value": 50, "color":"#000000"
										}
									]
					},
					{
						"name": "Case Study", "value":30, "color":"#593e97","link": ["Tourism", "Globalization","Sub-1"]
					},
					{
						"name": "Globalization", "value":20, "color":"#b4bcfc","link": ["Sub-1","Tourism"]
					},
					{
						"name": "Tourism", "value":20, "color":"#b4bcfc","link": ["Sub-1", "Globalization"]
					}

				];
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
series.minRadius = 10;
series.maxRadius = 20;
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
}); */






// code by prem
jQuery(document).ready(function() {
  	var stickyTop = jQuery('#chartdiv').offset().top;
  	var windowTop = jQuery(window).scrollTop();
  	console.log(windowTop);
  	console.log('stickyTop');
  // 	jQuery(window).scroll(function() {
  //   	var windowTop = jQuery(window).scrollTop();
  //   	if(stickyTop<windowTop && jQuery(".chart__div").height() + jQuery(".chart__div").offset().top- jQuery("#chartdiv").height()>windowTop){
  //     		jQuery('#chartdiv').css('position', 'fixed');
  //   	}else{
  //     		jQuery('#chartdiv').css('position', 'unset');
  //   	}
  // });
});
</script>
<!---Graph Js End--->