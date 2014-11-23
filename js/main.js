$(document).ready( function() {
	$("#login").validate({
		// Define as regras
		rules:{
			user:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 4
			},
			pass:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 4
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			user:{
				required: "Digite seu usuário",
				minLength: "O seu usuário deve conter, no mínimo, 4 caracteres"
			},
			pass:{
				required: "Digite sua senha",
				minLength: "A sua senha deve conter, no mínimo, 4 caracteres"
			}
		}
	});

	$(".user").validate({
		// Define as regras
		rules:{
			name:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 2
			},
			user:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 4
			},
			pass:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 4
			},
			email:{
				// campo será obrigatório (required) e precisará ser um e-mail válido (email)
				required: true, email: true
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			name:{
				required: "Digite o seu nome",
				minLength: "O seu nome deve conter, no mínimo, 2 caracteres"
			},
			user:{
				required: "Digite o seu usuário para contato",
				minLength: "O seu nome deve conter, no mínimo, 4 caracteres"
			},
			pass:{
				required: "Digite a sua senha",
				minLength: "A sua senha deve conter, no mínimo, 4 caracteres"
			},
			email:{
				required: "Digite o seu e-mail para contato",
				email: "Digite um e-mail válido"
			}
		}
	});

	$(".post").validate({
		// Define as regras
		rules:{
			title:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 10
			},
			content:{
				// campo será obrigatório (required) e terá tamanho mínimo (minLength)
				required: true, minLength: 50
			}
		},
		// Define as mensagens de erro para cada regra
		messages:{
			title:{
				required: "Digite o seu título",
				minLength: "O título deve conter, no mínimo, 10 caracteres"
			},
			content:{
				required: "Digite o seu conteúdo",
				minLength: "O seu conteudo deve conter, no mínimo, 50 caracteres"
			}
		}
	});
});