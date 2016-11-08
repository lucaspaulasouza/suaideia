<!DOCTYPE html>
<html lang="en">
<head>
	@include('head')
	<link rel="stylesheet" type="text/css" href="css/paginacao.css">
	<title>Sua Ideia</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#menu-home").addClass('active');
		});
	</script>
</head>
<body>
@include('menu')
@if(!empty($enquetes))
	@foreach($enquetes as $enquete)
		<br /><br />
		<div class="container">
			<fieldset class="form-group">
				<form method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id_enquete" value="{{ $enquete->id }}">
				    <legend>{{ $enquete->pergunta }}</legend>
				 	@if(!empty($enquete->resposta1))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta1 }} @if(!empty($enquete->porcentagemResposta1)) {{ $enquete->porcentagemResposta1 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta1 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif	
				 	
				 	@if(!empty($enquete->resposta2))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta2 }} @if(!empty($enquete->porcentagemResposta2)) {{ $enquete->porcentagemResposta2 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta2 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif				

				 	@if(!empty($enquete->resposta3))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta3 }} @if(!empty($enquete->porcentagemResposta3)) {{ $enquete->porcentagemResposta3 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta3 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif

				 	@if(!empty($enquete->resposta4))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta4 }} @if(!empty($enquete->porcentagemResposta4)) {{ $enquete->porcentagemResposta4 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta4 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif

				 	@if(!empty($enquete->resposta5))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta5 }} @if(!empty($enquete->porcentagemResposta5)) {{ $enquete->porcentagemResposta5 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta5 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif

				 	@if(!empty($enquete->resposta6))
						<div class="text-xs-center" id="example-caption-1">{{ $enquete->resposta6 }} @if(!empty($enquete->porcentagemResposta6)) {{ $enquete->porcentagemResposta6 }}% @else 0% @endif</div>
						<progress class="progress" value="{{ $enquete->porcentagemResposta6 }}" max="100" aria-describedby="example-caption-1"></progress>
					@endif	
					<button type="submit" class="btn btn-primary">Encerrar enquete</button>
				</form>																    
			</fieldset>	  	
		</div>
	@endforeach
	@if (count($errors) > 0)
    	<div class="alert alert-danger errors">
        	@foreach ($errors->all() as $error)
            	<p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@else
	<h2>Você não possui enquetes!</h2>    	
@endif	
</body>
</html>