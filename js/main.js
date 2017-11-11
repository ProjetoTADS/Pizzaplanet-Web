$(document).ready(function(){

	var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};

	//MASCARA DATA
	$("#data").mask("00/00/0000");

	//MASCARA TELEFONE
	$('#telefone').mask(SPMaskBehavior, spOptions);


	//APPEND
	var count = 1;
	var html;
	$("#show").click(function(){

		var html = `
			<div class="row form-group group_`+count+`">
					<div class="col-md-11">
						<input type="text" id="ingredientes" name="ingredientes[]" class="form-control" placeholder="Ingredientes">
					</div>

					<div class="col-md-1">
						<i class="fa fa-times excluir" aria-hidden="true" id="group_`+count+`"></i>
					</div>
			</div>					
		`;

		$("#append-div").append(html);

		count ++;


		$(".excluir").click(function(el){

			swal({
			  title: "Tem certeza que deseja deletar isto?",
			  text: "Uma vez deletado, jamais será restaurado!",
			  icon: "warning",
			  buttons: {
  					cancel: {
    				text: "Cancelar",
    				value: false,
    				visible: true,
    				className: "",
    				closeModal: true,
  					},
  					confirm: {
    				text: "OK",
    				value: true,
    				visible: true,
    				className: "",
    				closeModal: true
  					}
			},
			  dangerMode: true
			})
			.then((willDelete) => {
			  if (willDelete) {
			    swal("A escolha foi sua, jamais verás este campo novamente!", {
			      icon: "success",

			    }); 

			var conteudo = $(this).attr('id');

			$("."+conteudo).remove();

			  } else {
			  }
			});


		});

		/*$(".excluir").hover(function(){

			var content = $(this).attr('id');
			$("."+content).css("cursor","pointer");



		});*/




	});
});