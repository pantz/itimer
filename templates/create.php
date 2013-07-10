<div class="row">
	<form action="/create" class="form-horizontal" method="post" enctype="multipart/form-data">
		<legend>Create a new timer by filling in the form below.</legend>
		<div class="control-group">
			<label for="Text" class="control-label">Text</label>
			<div class="controls">
				<input type="text" class="span6" name="Text" id="Text" />
			</div>
		</div>
		<div class="control-group">
			<label for="EndDate" class="control-label">End Date</label>
			<div class="controls">
				<div class="input-append bootstrap-datepicker">
					<input type="text" class="datepicker" name="EndDate" id="EndDate">
					<span class="add-on"><i class="icon-calendar"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label for="EndTime" class="control-label">End Time</label>
			<div class="controls">
				<div class="input-append bootstrap-timepicker">
					<input type="text" class="timepicker" name="EndTime" id="EndTime">
					<span class="add-on"><i class="icon-time"></i></span>
				</div>
			</div>
		</div>
		<div class="control-group">
			<label for="Background" class="control-label">Background</label>
			<div class="controls">
				<input type="file" class="" name="Background" id="Background" />
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success">Create timer</button>
		</div>
	</form>
</div>
