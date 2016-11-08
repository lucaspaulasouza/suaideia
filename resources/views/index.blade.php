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
		<form class="container" method="POST" style="border: 1px solid #ddd;">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" value="{{$enquete->id}}" name="id_enquete">
			<input type="hidden" value="logado" name="{{$logado}}">
			<fieldset class="form-group">
			    <legend>{{ $enquete->pergunta }}</legend>
			    @if(!empty($enquete->resposta1))
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="resposta" value="1" required="true">
				        {{ $enquete->resposta1 }}
				      </label>
				    </div>
				@endif
			    @if(!empty($enquete->resposta2))
				    <div class="form-check">
				      <label class="form-check-label"> 
				        <input type="radio" class="form-check-input" name="resposta" value="2" required="true">
				        {{ $enquete->resposta2 }}
				      </label>
				    </div>
				@endif
			    @if(!empty($enquete->resposta3))
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="resposta" value="3" required="true">
				        {{ $enquete->resposta3 }}
				      </label>
				    </div>
				@endif
			    @if(!empty($enquete->resposta4))
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="resposta" value="4" required="true">
				        {{ $enquete->resposta4 }}
				      </label>
				    </div>
				@endif
			    @if(!empty($enquete->resposta5))
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="resposta"  value="5" required="true">
				        {{ $enquete->resposta5 }}
				      </label>
				    </div>
				@endif
			    @if(!empty($enquete->resposta6))
				    <div class="form-check">
				      <label class="form-check-label">
				        <input type="radio" class="form-check-input" name="resposta" value="6" required="true">
				        {{ $enquete->resposta6 }}
				      </label>
				    </div>
				@endif					    
		  		<button type="submit" class="btn btn-primary">Votar</button>
			</fieldset>	  	
		</form>
	@endforeach

	@if (count($errors) > 0)
    <div class="container alert alert-danger errors">
    	@if($logado)
    		<p>Selecione uma opção da enquete para poder votar!</p>
    	@else
    		<p>Você precisa estar logado para votar!</p>
    	@endif	
    </div>
    @endif

	<div class="container">
	{{ $enquetes->links() }}
	</div>
@else
	<h2>Não possui enquetes para você avaliar!</h2>
@endif	
</body>
</html>