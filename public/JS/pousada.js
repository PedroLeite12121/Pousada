let userChoice = localStorage.getItem('userChoice'); 

var titulo = document.getElementById('titulo')
var desc1 = document.getElementById('desc1')
var desc2 = document.getElementById('desc2')
var rating = document.getElementById('avaliacao')
var img = document.getElementById('pousadaImagem')
var local = document.getElementById('local')

switch(userChoice) {
    case "antoniocarlos":
        titulo.innerText = 'Pousada Antonio Carlos'
        desc1.innerText = 'Essa Pousada condiz exatamente com o seu preço, uma das pousadas mais completas da América do Sul, essa pousada possui tudo o que você pode encontrar em uma pousada'
        desc2.innerText = 'Essa pousada é muito requisitada por famílias de grande porte que buscam as melhores férias de suas vidas, além de uma ótima vista para o mar, essa pousada possui diversos atrativos que concerteza vai torna-la uma expêriencia única'
        local.innerText = 'Praia Grande'
        img.src = "../IMG/pousada3.jpg"
        break;

    case "alvorecer":
        titulo.innerText = 'Pousada Antonio Carlos'
        desc1.innerText = 'Essa pousada é muito requisitada por famílias de grande porte que buscam as melhores férias de suas vidas, além de uma ótima vista para o mar, essa pousada possui diversos atrativos que concerteza vai torna-la uma expêriencia única'
        desc2.innerText = 'Essa Pousada é perfeita para grandes famílias que buscam conforto e lazer'
        local.innerText = 'Chácara do Alvorecer'
        img.src = "../IMG/Pousada1.jpg"
        break;

    case "casasalgada":
        titulo.innerText = 'Pousada Casa Salgada'
        desc1.innerText = 'Essa Pousada é perfeita para grandes famílias que buscam conforto e lazer'
        desc2.innerText = 'Essa pousada é muito requisitada por famílias de grande porte que buscam as melhores férias de suas vidas, além de uma ótima vista para o mar, essa pousada possui diversos atrativos que concerteza vai torna-la uma expêriencia única'
        
        local.innerText = 'Zona Sul'
        img.src = "../IMG/pousadaCasaSalgadaMinasGerais.jpg"
        break;

    case "bertioga":
        titulo.innerText = 'Pousada Bertioga House'
        desc1.innerText = 'Uma pousada aconchegante em uma das praias mais populares de São Paulo'
        desc2.innerText = 'Uma pousada com uma vista invejável e com muitas regalias que deixariam qualquer visitante satisfeito'
        local.innerText = 'Praia de Bertioga'
        img.src = "../IMG/pousada2.jpg"
        break;

    case "carioca":
        titulo.innerText = 'Pousada Carioca'
        desc1.innerText = 'Esta pousada carrega muita tradição carioca'
        desc2.innerText = 'Uma pousada que possui a essência do que é estar no Rio de Janeiro'
        local.innerText = 'Bairro dos Cariocas'
        img.src = "../IMG/pousadaCarioca.jpg"
        break;

    case "paodeacucar":
        titulo.innerText = 'Pousada Pão de Açucar'
        desc1.innerText = 'Essa pousada tem ótima vista para o morro do Pão de Áçucar e possui uma ótima qualidade'
        desc2.innerText = 'Uma pousada perfeita para quem ama a vista do Pão De Açúcar'
        local.innerText = 'Pão de Áçucar'
        img.src = "../IMG/pousadaPaoDeAcucar.jpg"
        break;

    case "castelodeminas":
        titulo.innerText = 'Pousada Castelo de Minas'
        desc1.innerText = 'Essa pousada é perfeita para quem gosta de passar um tempo em construções medievais'
        desc2.innerText = 'Um lugar perfeito para os amantes de história, os visitantes dessa pousada podem se sentir reis e rainhas por algum tempo.'
        local.innerText = 'Avenida dos Castelos'
        img.src = "../IMG/pousadaCasteloMinasGerais.jpg"
        break;

    case "girassol":
        titulo.innerText = 'Pousada Girassol'
        desc1.innerText = 'Uma pousada perfeita para se passar as férias no Rio de Janeiro'
        desc2.innerText = 'Essa pousada é muito requisitada por famílias de grande porte que buscam as melhores férias de suas vidas, além de uma ótima vista para o mar, essa pousada possui diversos atrativos que concerteza vai torna-la uma expêriencia única'
        local.innerText = 'Rio de Janeiro'
        img.src = "../IMG/pousadaGirassol.jpg"
        break;

    case "suldeminas":
        titulo.innerText = 'Pousada Sul de Minas'
        desc1.innerText = 'Essa pousada já foi considerada uma das melhores da América do Sul'
        desc2.innerText = 'Essa pousada é muito requisitada por famílias de grande porte que buscam as melhores férias de suas vidas, além de uma ótima vista para o mar, essa pousada possui diversos atrativos que concerteza vai torna-la uma expêriencia única'
        
        local.innerText = 'Zona Sul - MG'
        img.src = "../IMG/pousadaSuldeminas.jpg"
        break;
}