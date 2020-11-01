//abrir modal
abrirModal = (element, page) =>{
	$("#modal").addClass("modal-ativo");
	$("#modal-tamanho").addClass(element);

	$("#modal-conteudo").load(page);
}


//tap form
modalTap = (element) => {
	$(element).toggleClass("enabled");
	let sel = element.getAttribute('data-toggle-target');		
	
	$(".modal-tab-content").removeClass("enabled").filter(sel).addClass("enabled");

	return false;
}


// $(".modal-tab a").click(function(e){
//     $(this).toggleClass("modal-tab-active");
//     e.preventDefault();
// });

//adicionar form
adicionarForm = (page, form) =>{
	let dados = $(form).serialize();
	$.ajax({
		url: page,
		type: 'POST',
		data: dados,
		success: (data) => {
			console.log(data);
			alert("Cadastro efetuado com sucesso!");
			$(form)[0].reset();
			$("#input-img label .url-img").attr("src","http://server01/SeculoPass/assets/images/img_error.png");
			$("#p_foto_componente").val("");
			$("#p_img_principal").val("");
		},
		error: (error) => {
			console.log(error);
		}
	})

	return false;
}

//fechar modal
fecharModal = () =>{
	$("#modal").removeClass("modal-ativo");
	$("#modal").find('#modal-tamanho').removeClass('modal-corpo-grande');
	$("#modal").find("#modal-tamanho").removeClass("modal-corpo-medio");
	$("#modal").find("#modal-tamanho").removeClass("modal-corpo-pequeno");
	$("#modal").find("#modal-conteudo").html("");	
}

//abre o toggle
abrirToggle = (props) =>{
	let id 		= $(props).attr("id");
	let id_sub 	= $(props).data("item");	
	$(props).each(() => {
		if($(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).hasClass("app-toggle-ativo")){
    		$(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).removeClass("app-toggle-ativo");
    		$(props).next(".app-toggle-ativo").nextAll("#componente_"+id_sub).addClass("app-toggle");
    	}
    	$(props).nextAll("#"+id).toggleClass("app-toggle-ativo"); 
	})
}

//abre o sub toggle
abrirSubToggle = (props) =>{
	let id = $(props).data("item");

	$(props).each(() => {
		$(props).nextAll("#componente_"+id).toggleClass("app-toggle-ativo"); 
		$(props).nextAll("#componente_"+id).toggleClass("app-toggle");
	});

}

//upload de imagem
uploadImagem = (props, page) =>{
	let id 			= $(props).attr("id");
	let file 		= $("#"+id)[0].files[0];
	let file_path 	= $("#"+id).val(); 
	let file_name 	= $("#"+id)[0].files[0].name;

	$("#input-img label .url-img").attr("src", "http://server01/SeculoPass/arquivos/"+file_name);
	$("#"+id).attr("value", file_name);
	$("#p_img_principal").attr("value", file_name);

	let dados 		= new FormData();
	dados.append("file", file);

	$.ajax({
		url: page, 
		type: "POST",
		enctype: "multipart/form-data",
		data: dados,
		processData:false,
		contentType:false,
		cache:false,
		async:false,
		success: function(data){
			console.log(data);
			// alert("Upload Efetuado com Sucesso");
		}
	});


}