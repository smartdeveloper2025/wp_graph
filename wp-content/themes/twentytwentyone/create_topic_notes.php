<?php
/**
 * Template Name: Create Topic Notes
 *
 * Create Topic Notes template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();
/*$current_user_id = get_current_user_id();
global $wpdb;
$creation_table = $wpdb->prefix."tbl_creation";
$results = $wpdb->get_results( "SELECT * from $creation_table where user_id = '$current_user_id'", ARRAY_A );
$json_array = array();
$result_count = count($results);
if($result_count > 0){
//if(isset($results)) {
  $colorArray = array('#FF6633', '#FFB399', '#FF33FF', '#80cbc4', '#00B3E6','#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D');
  foreach ($results as $key => $val) {
    $strPerc = (($val['task_completed'] / $val['total_task']) * 100);
    $json_array[] = array(
                  language => $val['job_title'],
                  value =>  number_format($strPerc,2,'.',''),
                  color =>  $colorArray[$key]
            );
  }
  
}*/
?>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/amsify.suggestags.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<style type="text/css">
    .experience_row_box {
        display: grid;
        grid-template-rows: 85px;
    }
	#chartdiv {
	  width: 100%;
	height:550px;
	}
</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5">
            <div class="row mx-0">
                <h4 class="section-link"><a href=""><u>Topic Notes</u></a></h4>
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <p class="form-text">
                            <a href="Javascript:;" class="link mr-3">View Large</a>
                            <a href="Javascript:;" class="link"><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--<form method="post" id="topic_creation" action="" >-->
			<input type="hidden" name="clone_counter" id="clone_counter" value="1" />
                <div class="row mb-5">
					<form method="post" id="main_creation_frm" action="" >
						<div class="col-lg-7 col-md-7 col-sm-12">
							<input type="text" placeholder="Name your overall topic" onblur="main_creation()"  id="topic_name" name="topic_name" class="form-control creation_input">
							<label for="topic_desc">Description</label>
							<textarea name="topic_desc" id="topic_desc" class="form-control creation_input" ></textarea>
							<p>
								[you can use this space to describe the purpose of this creation]
							</p>
							<input type="hidden" name="hdn_creation_id" id="hdn_creation_id" value="" />
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
                <div class="row">
                    <div class="col-12">
                        <h4 class="section-link mb-2"><a href="">Sub-Topic: 1</a></h4>
                    </div>
					<form method="post" id="sub_creation_frm_1" action="" >
						<div class="col-lg-7 col-md-7 col-sm-7 p-0">
							<div class="row m-0">
								<div class="col-12">
									<input type="hidden" name="hdn_sub_creation_id" id="hdn_sub_creation_id_1" value="" />
									
									<label><i class="fas fa-circle"></i> Name of Sub-Topic</label>
									<input type="text" name="sub_topic_name" onblur="sub_creation(1)" placeholder="Name the subject" class="form-control creation_input">
								</div>
							</div>
							<div class="row m-0 mt-5">
								<div class="col-12">
									<input type="hidden" name="skills_count" id="skills_count_1" value="0" />
									<table class="creation_table table_bordered topic__table">
										<thead>
											<tr>
												<th style="width:50%">Source material/location [you can use this to group the keyword]?</th>
												<th style="width:50%">Key learnings form this material/location [Press Enter to seperate]</th>
											</tr>
										</thead>
										<tbody>
											<tr><td><div class="d-flex align-items-center">
														<i class="fas fa-circle" aria-hidden="true"></i>
														<input type="text" name="tag_val[0][left]" placeholder="Add Skills" class="form-control creation_input " onclick="clone_skills(this,1)" >
													</div>
												</td>
												<td>
													<div class="d-flex align-items-center">
														<i class="fas fa-circle" aria-hidden="true"></i>
														<input type="text" name="tag_val[0][right]" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input" >
													</div>
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
							</div>
							
							<div class="row m-0 mt-4 experience_row_box">
								<div class="col-12">
									<label>Notes</label>
									<input type="text" name="sub_topic_notes" placeholder="Type Here" class="form-control creation_input">
								</div>
							</div>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 p-0">
							<div id="chartdiv"></div>
						</div>
					</form>
                </div>
				
				<div class="additional_clone_data">
				</div>
				
            <!--</form>-->
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 mt-5">
                    <h4 class="section-link mb-2"><a href="javascript:;" class="d-flex align-items-center"><i class="fas fa-plus mr-2 " onclick="html_clone()"></i> Sub-Topis: <span id="next_counter_value">2</span></a></h4>
                </div>
            </div>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/assets/js/jquery.amsify.suggestags.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script type="text/javascript">
/*********clone skills tr td start***********/
function clone_skills(obj_skills , count ){
	var skills_count = jQuery('#skills_count_'+count ).val();
	skills_count++;
	let tr = '<tr><td><div class="d-flex align-items-center"><i class="fas fa-circle"></i><input type="text" name="tag_val['+skills_count+'][left]" placeholder="Add Skills" class="form-control creation_input skills_input"></div></td><td><div class="d-flex align-items-center"><i class="fas fa-circle"></i><input type="text" name="tag_val['+skills_count+'][right]" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input"><span class="fas fa-times remove__list"></span></div></td></tr>';
	jQuery(obj_skills).parent().parent().parent().before(tr);
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
    html += '<div class="col-12"><h4 class="section-link mb-2"><a href="">Sub-Topic: ' + clone_counter + '</a></h4></div>';
	html += '<form method="post" id="sub_creation_frm_' + clone_counter + '" action="" >';
	html += '<div class="col-lg-7 col-md-7 col-sm-12 p-0">';
	html += '<div class="row m-0"><div class="col-12">';
	html += '<input type="hidden" name="hdn_sub_creation_id" id="hdn_sub_creation_id_' + clone_counter + '" value="" />';
	html += '<label><i class="fas fa-circle"></i> Name of Sub-Topic</label>';
	html += '<input type="text" name="sub_topic_name" onblur="sub_creation(' + clone_counter + ')" placeholder="Name the subject" class="form-control creation_input"></div></div>';
	html += '<div class="row m-0 mt-5"><div class="col-12">';
	html += '<input type="hidden" name="skills_count" id="skills_count_' + clone_counter + '" value="0" />';
	html += '<table class="creation_table table_bordered topic__table">';
	html += '<thead><tr><th style="width:50%">Source material/location [you can use this to group the keyword]?</th><th style="width:50%">Key learnings form this material/location [Press Enter to seperate]</th></tr></thead><tbody>';
	html += '<tr><td><div class="d-flex align-items-center"><i class="fas fa-circle" aria-hidden="true"></i>';
	html += '<input type="text" name="tag_val[0][left]" placeholder="Add Skills" class="form-control creation_input " onclick="clone_skills(this,' + clone_counter + ')" ></div></td><td><div class="d-flex align-items-center"><i class="fas fa-circle" aria-hidden="true"></i><input type="text" name="tag_val[0][right]" onclick="tag_call(this)" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input" ></div></td></tr></tbody></table></div></div>';					
	html += '<div class="row m-0 mt-4 experience_row_box">';
	html += '<div class="col-12"><label>Notes</label><input type="text" name="sub_topic_notes" placeholder="Type Here" class="form-control creation_input"></div></div></div></form></div>';
	
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

function main_creation(){
	var topic_name = jQuery('#topic_name').val();
	var hdn_creation_id = jQuery('#hdn_creation_id').val();
	/****************************/
      if(topic_name != ''){
              jQuery.ajax({
                url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
                type:'POST',
                data: jQuery("#main_creation_frm").serialize() +'&action=create_creation_by_ajax&type=topic',
                dataType: 'JSON',
                 success:function(res)
                   {
                      if(res.flag == 'success'){
						jQuery('#hdn_creation_id').val(res.creation_id);
                        alert(res.msg);
						//graph ajax start
						if(res.creation_id != ''){
							create_topic_graph(res.creation_id);
						}
						//graph ajax end
                        //location.reload();
                        //window.location.href="<?php //echo esc_url( home_url( '/chart' ) ); ?>";
                      }else{
                          alert('Opps! Something went wrong');
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
							  alert('Opps! Something went wrong');
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
                data: jQuery("#sub_creation_frm_"+index).serialize() +'&action=create_sub_creation_by_ajax&creation_id='+hdn_creation_id+'&counter='+index,
                dataType: 'JSON',
                 success:function(res)
                   {
					   console.log(res);
                      if(res.flag == 'success'){
						jQuery('#hdn_sub_creation_id_'+index).val(res.sub_creation_id);
                        alert(res.msg);
						if(hdn_creation_id != ''){
							create_topic_graph(hdn_creation_id);
						}
                        //location.reload();
                        //window.location.href="<?php //echo esc_url( home_url( '/chart' ) ); ?>";
                      }else{
                          alert('Opps! Something went wrong');
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
		
	// Themes begin
	am4core.useTheme(am4themes_animated);

	// Create chart
	var chart = am4core.create("chartdiv", am4plugins_forceDirected.ForceDirectedTree);

	// Create series
	var series = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries());
	
	
	// Set up data fields
	series.dataFields.value = "value";
	series.dataFields.name = "name";
	series.dataFields.children = "children";
	series.dataFields.id = "name";
	series.dataFields.linkWith = "link";
	series.dataFields.color = "color";
	
	series.data	= graph_data;
	// series.data	= [{"name":"tanu-node","value":100,"color":"#9ba2a6","children":[{"name":"tanu sub 1","value":50,"color":"#000000"},{"name":"tanu sub 2","value":50,"color":"#000000"}]},{"name":"sub1 l1","value":30,"color":"#593e97"},{"name":"sub1 l2","value":30,"color":"#593e97"},{"name":"sub2 l1","value":30,"color":"#593e97"},{"name":"s2 l2","value":30,"color":"#593e97"}];
	

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
	});
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

</script>
<!---Graph Js End--->
