<?php
require_once('./utils/auth.php');


$sql = "SELECT id, title, description, start, end, color FROM events ";

$req = $auth->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Takvim</title>
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
    <!-- Bootstrap Core CSS -->
	
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>


    <!-- Custom CSS -->
    
	 <style>
    
	#calendar {
		max-width: 1200px;
	}
	.nocheckbox {
    display: none;
}

.label-on {
    border-radius: 3px;
    background: red;
    color: #ffffff;
    padding: 10px;
    border: 1px solid red;
    display: table-cell;
}

.label-off {
    border-radius: 3px;
    background: white;
    border: 1px solid red;
    padding: 10px;
    display: table-cell;
}
	
	  #calendar a.fc-event {
  color: #fff; /* bootstrap default styles make it black. undo */
  background-color: #0065A6;
}


    </style>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
			<div style="height:20px"></div>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		<!-- Modal -->

		
		<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<form class="form-horizontal" method="POST" action="./core/edit-title.php">
			  <div class="modal-header">
			  <h4 class="modal-title" id="myModalLabel">Etkinli??i G??r??nt??le</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Kapat"><span aria-hidden="true">&times;</span></button>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group" >
					<label for="title" class="col-sm-2 control-label">Ba??l??k</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Ba??l??k" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="description" class="col-sm-2 control-label">A????klama</label>
					<div class="col-sm-10">
					  <input type="text" name="description" class="form-control" id="description" placeholder="A????klama" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label" readonly>Renk</label>
					<div class="col-sm-10" readonly>
					  <select name="color" class="form-control" id="color" readonly>
						  <option style="color:#0071c5;" value="#0071c5" >&#9724; Koyu Mavi</option>
						  <option style="color:#40E0D0;" value="#40E0D0" >&#9724; Turkuaz</option>
						  <option style="color:#008000;" value="#008000" >&#9724; Ye??il</option>						  
						  <option style="color:#FFD700;" value="#FFD700" >&#9724; Sar??</option>
						  <option style="color:#FF8C00;" value="#FF8C00" >&#9724; Turuncu</option>
						  <option style="color:#FF0000;" value="#FF0000" >&#9724; K??rm??z??</option>
						  <option style="color:#000;" value="#000" >&#9724; Siyah</option>
						  
						</select>
					</div>
				  </div>
					<script>
					function toggleCheck(check) {
						if ($('#'+check).is(':checked')) {
							$('#'+check+'_label').removeClass('label-on');
							$('#'+check+'_label').addClass('label-off');
						} else {
							$('#'+check+'_label').addClass('label-on');
							$('#'+check+'_label').removeClass('label-off');
						}
					}		  
					</script>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		<div class="container" style="width:103px; top: 620px; left:1150px; padding:7px;">
			<div class="row" >
				<div class="col-md-4">
					<form action="login.php" method="POST" id="frmcik">
					<button type="submit" class="btn btn-primary" >Giri?? Yap</button>
				</div>
			</div>
			
		</form>
		</div>
		
		



    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='js/moment.min.js'></script>
    <script
  src="https://code.jquery.com/jquery-1.9.1.min.js"
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>
	
	<!-- FullCalendar -->
	<script src='js/fullcalendar.min.js'></script>
	
	 <!-- Bootstrap Core JavaScript -->
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
	
	
	<script>

	 $(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next,today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			height: 590,
			businessHours: {
			  dow: [ 1, 2, 3, 4, 5 ],

			  start: '8:00',
			  end: '17:00',
			},

		
  		

			nowIndicator: true,
			scrollTime: '08:00:00',
			editable: true,
			navLinks: true,
			eventLimit: true, // allow "more" link when there are too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventAfterRender: function(eventObj, $el) {
				var request = new XMLHttpRequest();
				request.open('GET', '', true);
				request.onload = function () {
					$el.popover({
						title: eventObj.title,
						content: eventObj.description,
						trigger: 'hover',
						placement: 'top',
						container: 'body'
					});
				}
			request.send();
			},
	
			eventRender: function(event, element) {
				element.bind('click', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #description').val(event.description);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					description: '<?php echo $event['description']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: './core/edit-date.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Kaydedildi');
					}else{
						
						window.location.href="index.php";
					}
				}
			});
		}
		
	});

</script>

</body>

</html>
