<!DOCTYPE html>
<html>
<head>
	<title>Files Browser</title>

</head>


<body>
	<div id="fileExplorer">
		@foreach($fileNames as $fileName)
		<div class="thumbnail">
			<img src="{{ asset('http://127.0.0.1:8000/storage/galleries/'.$fileName) }}" alt="thumb" title="http://127.0.0.1:8000/storage/galleries/{{$fileName}}" width="120" height="100">
			<br />
			{{$fileName}}
			@endforeach
		</div>
	</div>

	<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var funcNum = <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
		$('#fileExplorer').on('click', 'img', function(){
			var fileUrl = $(this).attr('title');
			window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
			window.close();
		}).hover(function() {
			$(this).css('cursor', 'pointer');				
		});
	});
</script>

</body>
</html>