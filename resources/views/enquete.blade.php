<!DOCTYPE html>
<html lang="en">
<head>
	@include('head')
	<title>Sua Ideia</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#menu-enquete").addClass('active');

			var html = "<div class='form-group row'>";
      		html += "<div class='col-sm-10'>";
       		html += "<input type='text' class='form-control' name='resposta[]' required='true' placeholder='Escreva qual vai ser a resposta da enquete Ps: Máximo de 50 caracteres' maxlength='50'>";
      		html += "</div>";

			$('#quantidade-respostas').on('change', function(){
				$('#conteudo-respostas').html('');

				if($(this).val().length !== 0){
					for (var i = 1; i <= $(this).val(); i++) {
						$('#conteudo-respostas').append(html);
					}
				}
			});
		});
	</script>	
</head>
<body>
@include('menu')
<div class="container">
  <form method="POST">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-4 col-form-label">Qual vai ser a pergunta da sua enquete?</label>
      <div class="col-sm-6">
        <input type="text" name="pergunta" class="form-control" id="pergunta" placeholder="Qual vai ser a pergunta da sua enquete?" required="true">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-4 col-form-label">Quantidade de opções para resposta?</label>
      <div class="col-sm-6">
        <select name="quantidade_respostas" class="form-control" id="quantidade-respostas" required="true">
        	<option value="">Selecione..</option>
    			<option>2</option>
    			<option>3</option>
    			<option>4</option>
    			<option>5</option>
    			<option>6</option>
        </select>
      </div>
    </div>
    <div id="conteudo-respostas">
    </div>
    <div class="form-group row">
      <div class="offset-sm-5 col-sm-10">
        <button type="submit" class="btn btn-primary">Criar enquete</button>
      </div>
    </div>
    @if (count($errors) > 0)
      <div class="alert alert-danger errors">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
      </div>
    @endif    
  </form>
</div>	
</body>
</html>