function conversa(frases, respostaTipo, respostaVars, respostaCallback){

    //limpa resposta..
    $('.resposta').html('');

    if(respostaTipo == 'text'){
        var input = $('<input type="' + respostaTipo + '" name="nome" placeholder="' + respostaVars.placeholder + '" required>');
        input.hide();
        input.focus();

        input.keyup(function(e) {

            if (e.keyCode == 13) {

                respostaCallback(input.val());
            }

        });

        $('.resposta').html(input);

    } else if(respostaTipo == 'question') {

        var options = $('<div class="options">');

        respostaVars.item.forEach(function(item, index){
            options.append($('<button val="' + respostaVars.index[index] + '">' + item + '</button>'));
        });

        options.find('button').click(function(){
            respostaCallback($(this).attr('val'));
        });

        $('.resposta').html(options);
    }

    Typed.new('.digitar', {
        strings: frases,
        typeSpeed: 0,
        callback: function(){

            if(respostaTipo == 'text'){
                input.fadeIn('slow', function(){
                    input.focus();
                })
            } else if(respostaTipo == 'question'){
                options.fadeIn('slow');

            } else if (respostaTipo  === false){
                respostaCallback();
            }

        }
    });

}

var usuario_nome;
var usuario_email;

var expire = new Date();
expire.setDate(expire.getDate() +365); // +1 ano

function iniciar_conversa() {

    if (getCookie('usuario_email') == null)
        pergunta_1();
    else
        pergunta_voltou();

}

function pergunta_voltou(){

    var frase = 'Ah, não acredito! Você voltou? <br><br> :D'
        + '<br><br>'
        + 'Você se chama ' + getCookie('usuario_nome') + ', acertei?';

    var options = {
        index : ['S', 'N'],
        item: ['Sim, sou eu', 'Não']
    };


    conversa([frase], 'question', options, function(val){

        if(val == 'S'){

            usuario_nome = getCookie('usuario_nome');
            usuario_email = getCookie('usuario_email');

            pergunta_6();

        } else {

            deleteCookie('usuario_nome');
            deleteCookie('usuario_email');

            pergunta_voltou_nome();

        }

    });

}

function pergunta_voltou_nome(){

    var frase = 'Caramba! Que bola fora que eu dei!  <br><br><i>#robôEnvergonhado</i><br><br>'
        +'Pensa num rôbo com as bochecas vermelhas? Esse sou eu!'
        +'<br><br>'
        + 'Mas vamos recomeçar, ok? Qual seu nome mesmo? rsrs'

    conversa([frase], 'text', {placeholder: 'Digite seu nome e tecle enter.'}, function(val){
        usuario_nome = val;
        setCookie('usuario_nome', usuario_nome, expire);
        pergunta_2();
    });
}

function pergunta_1(){

    var frase = 'Oie! Tudo bem?<br>'
    +'Sou o robô da agência Vitamina (<i>acredite se quiser, mas eu tômo vitamina de verdade, rsrs</i>)'
    +'<br><br>'
    + 'Que bacana que você está por aqui. :)'
    +'<br>'
    + 'Qual seu nome?';

    conversa([frase], 'text', {placeholder: 'Digite seu nome e tecle enter.'}, function(val){
        usuario_nome = val;
        setCookie('usuario_nome', usuario_nome, expire);
        pergunta_2();
    });
}

function pergunta_2(){

    var frase = 'Seja bem vindo ' + usuario_nome + '.'
    + '<br><br>'
    + 'Mas viu.. quer que a gente se apresente também, ou já conhece a nossa Vitamina?';

    var options = {
        index : ['S', 'N'],
        item: ['Sim, quero conhecê-los', 'Nem precisa, já conheço a Vitamina']
    };


    conversa([frase], 'question', options, function(val){

        if(val == 'S')
            pergunta_3();
        else
            pergunta_4();

    });
}

function pergunta_3(){

    var frase = 'Somos uma agência de propaganda diferente.'
    + '<br><br>'
    + 'Primeiro que aqui é tudo 100% online. Então tudo é feito através do nosso site. '
    + 'Segundo que somos uma agência focada na praticidade. Isso mesmo! Jogamos tudo no liquidificador, batemos e vualá... uma deliciosa vitamina pra sua marca.'
    + '<br><br>'
    + 'E o melhor de tudo, é mega saudável!  Sempre divertida, criativa, mas com muita responsabilidade e profissionalismo.'

    + '<br><br>'
    + 'Antes de continuarmos o papo, conte pra gente seu e-mail:'

    conversa([frase], 'text', {placeholder: 'seunome@dominio.com depois enter'}, function(val){

        if(validate.isMail(val)) {
            usuario_email = val;
            setCookie('usuario_email', usuario_email, expire);
            pergunta_6();
        } else {
            pergunta_5(val);
        }
    });

}

function pergunta_4(){

    var frase = 'Show! Que bom que já nos conhece. Sabe que aqui com a gente a coisa é vitanimada, hehe.'
        + '<br><br>'
        + 'Só pra caso aconteça algum problema e a gente perca a conexão, conte pra gente seu e-mail:'

    conversa([frase], 'text', {placeholder: 'seunome@dominio.com depois enter'}, function(val){

        if(validate.isMail(val)) {
            usuario_email = val;
            setCookie('usuario_email', usuario_email, expire);
            pergunta_6();
        } else {
            pergunta_5(val);
        }

    });

}

function pergunta_5(email_errado){
    var frase = 'Ops! Estive dando uma olhada aqui e o que você nos enviou não foi um e-mail válido.'
    + '<br><br>'
    + 'Confere pra gente o que aconteceu. <br>Você tinha mandado: <i>' + email_errado + '</i>';

    conversa([frase], 'text', {placeholder: 'seunome@dominio.com depois enter'}, function(val){

        if(validate.isMail(val)) {
            usuario_email = val;
            setCookie('usuario_email', usuario_email, expire);
            pergunta_6();
        } else {
            pergunta_5(val);
        }

    });
}

function pergunta_6(){
    var frase_fake = 'E aí... ta assistindo Game of Thrones? Ops..';


    var frase = 'Perfeito! Então vamos ao que interessa.'
    + '<br><br>'
    + 'Ao quê devo a honra da sua visita?'

    var options = {
        index : ['Contratar', 'Portifolio', 'Falar', ],
        item: ['Quero contrara um trabalho', 'Quero conhecer os trabalhos que já fizeram', 'Desculpe, mas prefiro falar com um <i>serumaninho</i> de verdade']
    };


    conversa([frase_fake, frase], 'question', options, function(val){

        if(val == 'Portifolio')
            redireciona_portifolio();
        else if(val == 'Falar')
            redireciona_atendimento();

    });
}

function redireciona_portifolio(){

    var frase = 'Belezura! Clique no botão abaixo e você será redirecionado pra conhecer os trabalho que já realizamos...'
        + '<br><br>'
        + 'Grande abraço, ' + usuario_nome + '. Até mais! :)';


    var options = {
        index : ['S'],
        item: ['Ir a página de Portólio']
    };

    conversa([frase], 'question', options, function(){

        //document.location.href = 'http://www.zbraestudio.com.br';
        alert('Esta página ainda está sendo desenvolvida');

    });
}

function redireciona_atendimento(){

    var frase = 'Tudo bem! Não é todo mundo que está preparado pra ser amigo de um robô.'
        + '<br><br>:\'('
        + '<br><br>'
        + 'Clique no botão abaixo e você será redirecionado ao departamento de atendimento (pra falar com uma pessoa de verdade).'
        + '<br><br>'
        + 'Grande abraço, ' + usuario_nome + '. Até mais! :)';

    var options = {
        index : ['S'],
        item: ['Ir a página de Atendimento']
    };

    conversa([frase], 'question',options, function(){

            //document.location.href = 'http://www.blog.tiago.art.br';
        alert('Esta página ainda está sendo desenvolvida');

    });
}