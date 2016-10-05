


<!-- Main content -->

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            
            <section class="content">





	    <!-- Calendar -->
            <div class="box box-info ">
                <div class="box-header with-border">
                    <h3 class="box-title <?= (Yii::$app->language == 'ar') ? 'pull-right' : '' ?>"><i class="fa fa-calendar"></i> <?php echo Yii::t('app', 'Calendario por Plantel') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--The calendar -->
	<?php
	$JSEventClick = <<<EOF
		function(event, jsEvent, view) {
		    $('.fc-event').on('click', function (e) {
			$('.fc-event').not(this).popover('hide');
		    });
		}
EOF;
	$eDetail = Yii::t('app', 'Event Detail');
	$eType = Yii::t('app', 'Event Type');
	$eStart = Yii::t('app', 'Start Time');
	$eEnd = Yii::t('app', 'End Time');
	$JsF = <<<EOF
		function (event, element) {
			var start_time = moment(event.start).format("DD-MM-YYYY, h:mm:ss a");
		    	var end_time = moment(event.end).format("DD-MM-YYYY, h:mm:ss a");

			element.clickover({
		            title: event.title,
		            placement: 'top',
		            html: true,
			    global_close: true,
			    container: 'body',
		            content: "<table class='table'><tr><th>{$eDetail} : </th><td>" + event.description + " </td></tr><tr><th> {$eType} : </th><td>" + event.event_type + "</td></tr><tr><th> {$eStart} : </t><td>" + start_time + "</td></tr><tr><th> {$eEnd} : </th><td>" + end_time + "</td></tr></table>"
        		});
               }
EOF;
	?>
                <?= yii2fullcalendar\yii2fullcalendar::widget([
				'options' => ['language' => 'es'],
				'clientOptions' => [
					'fixedWeekCount' => false,
					'weekNumbers'=>true,
					'editable' => true,
					'eventLimit' => true,
					'eventLimitText' => 'more Events',
					'header' => [
						'left' => 'prev,next today',
						'center' => 'title',
						'right' => 'month,agendaWeek,agendaDay'
					],
					'eventClick' => new \yii\web\JsExpression($JSEventClick),
					'eventRender' => new \yii\web\JsExpression($JsF),
					'contentHeight' => 380,
					'timeFormat' => 'hh(:mm) A',
				],
			//	'ajaxEvents' => yii\helpers\Url::toRoute(['/dashboard/events/view-events'])
			]);
		    ?>
		   <div class="row">
			<ul class="legend">
			    <li><span class="holiday"></span> <?php echo Yii::t('app', 'Eventos confirmados') ?></li>
			    <li><span class="importantnotice"></span> <?php echo Yii::t('app', 'Eventos Pendientes') ?></li>
			    <li><span class="meeting"></span> <?php echo Yii::t('app', 'Eventos Cancelados') ?></li>
			    
			</ul>
		   </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <div class="box box-info ">
                <div class="box-header with-border">
                    <h3 class="box-title <?= (Yii::$app->language == 'ar') ? 'pull-right' : '' ?>"><i class="ion ion-university"></i> <?php echo Yii::t('app', 'Eventos para Hoy') ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->










            </section>
<!-- Main content -->

</section>

</div>