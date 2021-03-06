function conversa(frases, respostaTipo, respostaVars, respostaCallback){

    //limpa resposta..
    $('.resposta').html('');

    if(respostaTipo == 'text'){
        var input = $('<input type="' + respostaTipo + '" name="nome" placeholder="' + respostaVars.placeholder + '" required>');
        input.hide();
        input.focus();

        input.keyup(function(e) {

            if (e.keyCode == 13) {

                var val = input.val();
                input.fadeOut('slow');
                respostaCallback(val);
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
        typeSpeed: -10,
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

    RoboPing('session_reset', null);

    if (getCookie('usuario_email') == null) {
        pergunta_1();
    } else {
        pergunta_voltou();
    }

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

            RoboPing('nome', usuario_nome, function(){
                RoboPing('email', usuario_email);
            });


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
        RoboPing('nome', usuario_nome);
        pergunta_2();
    });
}

function pergunta_1(){

    var frase = 'Oie! Tudo bem?<br>'
    +'Somos uma agência 100% online, então até nossa secretária é digital. Isso mesmo, sou um robô.  =)'
    +'<br><br>'
    + 'Que bacana que você está por aqui.'
    +'<br>'
    + 'Qual seu nome?';

    conversa([frase], 'text', {placeholder: 'Digite seu nome e tecle enter.'}, function(val){
        usuario_nome = val;
        setCookie('usuario_nome', usuario_nome, expire);
        RoboPing('nome', usuario_nome);
        pergunta_2();
    });
}

function pergunta_2(){

    var frase = 'Seja bem vindo ' + usuario_nome + '.'
    + '<br><br>'
    + 'Viu.. quer que a gente se apresente também, ou já conhece a nossa agência?';

    var options = {
        index : ['S', 'N'],
        item: ['Sim, quero conhecê-los', 'Não precisa, já conheço a Vitamina']
    };


    conversa([frase], 'question', options, function(val){

        if(val == 'S') {
            RoboPingPassos('Disse que gostaria de conhecer a Vitamina', 'VIS');
            pergunta_3();
        } else {
            RoboPingPassos('Disse que já conhecia a Vitamina', 'VIS');
            pergunta_4();
        }

    });
}

function pergunta_3(){

    var frase = 'Somos uma agência digital, mas <i>diferentona</i>.'
    + '<br><br>'
    + 'Primeiro que aqui é tudo 100% online. Então tudo é feito através do nosso site. '
    + 'Segundo que somos uma agência focada na praticidade. Isso mesmo! Jogamos tudo no liquidificador, batemos e <i>vualá</i>... uma deliciosa vitamina pra sua marca.'
    + '<br><br>'
    + 'E o melhor de tudo, é mega saudável (pra sua marca crescer fortinha, <i>hehe</i>)!  Sempre divertida, criativa, mas com muita responsabilidade e profissionalismo.'

    + '<br><br>'
    + 'Antes de continuarmos o papo, conte pra gente seu e-mail:';

    conversa([frase], 'text', {placeholder: 'digite seu e-mail e depois de enter'}, function(val){

        if(validate.isMail(val)) {
            usuario_email = val;
            setCookie('usuario_email', usuario_email, expire);
            RoboPing('email', usuario_email);
            pergunta_6();
        } else {
            pergunta_5(val);
        }
    });

}

function pergunta_4(){

    var frase = 'Show! Que bom que já nos conhece. Sabe que aqui com a gente a coisa é vitanimada, hehe.'
        + '<br><br>'
        + 'Só pra caso aconteça algum problema e a gente perca a conexão, conte pra nós seu e-mail:'

    conversa([frase], 'text', {placeholder: 'seunome@dominio.com depois enter'}, function(val){

        if(validate.isMail(val)) {
            usuario_email = val;
            setCookie('usuario_email', usuario_email, expire);
            RoboPing('email', usuario_email);
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
    var frases_fake = [
        'E aí... curte Game of Thrones? Ops..',
        'E aí.. quer comprar um UNO 147, inteirão? Ops..',
        'E aí.. que tal qualquer hora um cineminha? Ops...'
    ];

    frases_fake = shuffle(frases_fake);


    var frase = 'Perfeito! Então vamos ao que interessa.'
    + '<br><br>'
    + 'Ao quê devo a honra da sua visita?'

    var options = {
        index : ['Contratar', 'Portifolio', 'Falar', ],
        item: ['Quero contratar um trabalho', 'Quero conhecer os trabalho de vocês', 'Desculpe, mas prefiro falar com um <i>serumaninho</i> de verdade']
    };


    conversa([frases_fake[0], frase], 'question', options, function(val){

        if(val == 'Portifolio') {

            RoboPingPassos('Disse que gostaria de conhecer o Portólio Vitamina.', 'PRT');
            redireciona_portifolio();

        } else if(val == 'Falar') {

            RoboPingPassos('Preferiu falar com um humano ao invés do robô.', 'FLR');
            redireciona_atendimento();

        } else if (val == 'Contratar') {

            RoboPingPassos('Disse que queria nos contratar! :)', 'CNT');
            pergunta_7();

        }

    });
}

function redireciona_portifolio(){

    var frase = 'Belezura! Clique no botão abaixo e você será redirecionado pra conhecer os trabalhos que já realizamos...'
        + '<br><br>'
        + 'Grande abraço, ' + usuario_nome + '. Até mais! :)';


    var options = {
        index : ['S'],
        item: ['Ir a página de Portólio']
    };

    conversa([frase], 'question', options, function(){

        document.location.href = site_url = 'site/#portfolio';


    });
}

function redireciona_atendimento(){

    var frase = 'Tudo bem! Não é todo mundo que está preparado pra ser amigo de um robô.'
        + '<br><br>:\'('
        + '<br><br>'
        + 'Clique no botão abaixo e redirecionarei você ao nosso "site normal". Lá, utilize o chat para falar com um <i>atendente-humano</i>.'
        + '<br><br>'
        + 'Grande abraço, ' + usuario_nome + '. Até mais! :)';

    var options = {
        index : ['S'],
        item: ['Falar com um humano']
    };

    conversa([frase], 'question',options, function(){

        document.location.href = site_url = 'site';
        //iniciarChat('Não me dou bem com robôs. Prefiro falar com um humano igual a mim. :)');

    });
}

function pergunta_7(){

    var frase = 'Opa! Já estamos ansiosos pra trabalhar pra você.'
        + '<br><br>'
        + 'Antes, fale pra gente um pouco de qual tipo de trabalho você está procurando:'

    var options = {
        index : ['Design', 'Web', 'Outro'],
        item: [
            'Design (Logomarca, Anúncio, Post de facebook, etc',
            'Web (Site, Loja Virtual, E-mail Marketing, etc)',
            'Outro tipo de trabalho'
        ]
    };

    conversa([frase], 'question',options, function(val){

        if(val == 'Design') {
            pergunta_8();
            RoboPingPassos('Interesse por Design.', 'DSN');
        } else if(val == 'Web') {
            pergunta_9();
            RoboPingPassos('Interesse por Web', 'WEB');
        } else if(val == 'Outro') {
            abrir_descricao('Outro');
            RoboPingPassos('Interesse por um assunto que não estava na lista.', 'OUT');
        }
    });
}

function pergunta_8(){

    var frase = 'Design? Veio ao lugar certo! :)'
        + '<br><br>'
        + 'Nos conte, o quê, especificamente, precisa:'

    var itens_array = [
        'Logomarca',
        'Cartão de Visita',
        'Anúncio',
        'Post (Facebook, Instagram, etc)',
        'Tema de FanPage',
        'Banner',
        'Marca Página',
        'Tratamento de Foto',
        'Flyer',
        'Folder',
        'Ícone',
        'Outros'
    ]
    var options = {
        index : itens_array,
        item: itens_array
    };

    conversa([frase], 'question',options, function(val){

        abrir_descricao(val);
        RoboPingPassos('Interesse por ' + val + '.', 'DSN');

    });
}

function pergunta_9(){

    var frase = 'Web? Tá brincando? Veio ao lugar certo. Essa é nossa especialidade! :)'
        + '<br><br>'
        + 'Nos conte, o quê, especificamente, precisa:'

    var itens_array = [
        'Site',
        'Hotsite',
        'Manutenção (já tenho site)',
        'Post (Facebook, Instagram, etc)',
        'E-mail Marketing',
        'Hospedagem',
        'E-mail Corporativo',
        'Assinatura de E-mail',
        'Consultoria de Marketing',
        'Social Manager',
        'Aplicativo pra Celular',
        'Jogos'
    ]
    var options = {
        index : itens_array,
        item: itens_array
    };

    conversa([frase], 'question',options, function(val){

        RoboPingPassos('Interesse por ' + val + '.', 'WEB');
        abrir_descricao(val);

    });
}

function abrir_solicitacao(id, chave){

    var frase = 'Ok, já entendi. '
        + '<br>'
        + 'Anote aí o número do seu pedido <strong>#' + NumeroComZero(id) + '</strong>.'
        + '<br>'
        + 'Fique tranquilo que já enviamos um e-mail pra você com esse número também. :)'
        + '<br><br>'
        + 'Deixe eu explicar: esse é o número que você vai acompanhar sua solicitação e, também, que nossos atendentes utilizarão pra identificar você.'
        + '<br><br>'
        + 'Caso queira anexar arquivos ao pedido ou complementar com alguma informação, clique no botão abaixo.';

    var itens_array = [
        'Ver solicitação'
    ]
    var options = {
        index : itens_array,
        item: itens_array
    };

    conversa([frase], 'question',options, function(){

        document.location.href = site_root + 'pedido/' + chave;

    });

}

function abrir_descricao(servico){

    var frase = 'Show!'
        + '<br>'
        + 'Agora, descreva um pouco da sua necessidade.'
        + '<br><br>'
        + 'Ah, só pra avisar que mais pra frente poderá anexar arquivos à sua solicitação, mas por enquanto só nos explique por texto mesmo.'



    conversa([frase], 'text',{placeholder: 'Descreva sua necessidade e tecle enter'}, function(val){

        var descricao = val;
        RoboPing('pedido', null, function(val){
            RoboPing('descricao', descricao);

            var x = val.split('|');

            abrir_solicitacao(x[0], x[1]);
        });

    });

}

function iniciarChat(msg){

    /* Se usuario_email não existir, tenta pegar no cookie */
    if (typeof usuario_email === "undefined") {
        if(getCookie('usuario_email') !== null){
            usuario_email = getCookie('usuario_email');
            //alert(usuario_email);
        }
    }

    /* Se usuario_nome não existir, tenta pegar no cookie */
    if (typeof usuario_nome === "undefined") {
        if(getCookie('usuario_nome') !== null){
            usuario_nome = getCookie('usuario_nome');
            //alert(usuario_nome);
        }
    }


    !function(t){
        var e=t.createElement("script");
            e.type="text/javascript",
            e.charset="utf-8",
            e.src="https://static.moxchat.it/visitor-widget-loader/pon30YrvAP.js",
            e.async=!0;

        var r=t.getElementsByTagName("script")[0];
        r.parentNode.insertBefore(e,r);
    }(document);

    $(window).load(function(){
        $('.mxcw-titlebar').click(function(){


            setTimeout(function(){

                //alert('clic');

                if (typeof usuario_nome !== "undefined") {
                    var input_nome = $('.mxcw-form input[type=text]');
                    input_nome.val(usuario_nome);
                    input_nome.attr('type', 'hidden');
                }

                if (typeof usuario_email !== "undefined") {
                    var input_email = $('.mxcw-form input[type=email]');
                    input_email.val(usuario_email);
                    input_email.attr('type', 'hidden');
                }

            }, 500)


        });
    });



    //$('.mxcw-form input[type=text]').hide();

}

var LHCChatOptions
function iniciarChatXXX(msg) {

    LHCChatOptions = {};

    LHCChatOptions.attr_prefill = new Array();


    /* Se usuario_email não existir, tenta pegar no cookie */
    if (typeof usuario_email === "undefined") {
        if(getCookie('usuario_email') !== null){
            usuario_email = getCookie('usuario_email');
            //alert(usuario_email);
        }
    }

    /* Se usuario_nome não existir, tenta pegar no cookie */
    if (typeof usuario_nome === "undefined") {
        if(getCookie('usuario_nome') !== null){
            usuario_nome = getCookie('usuario_nome');
            //alert(usuario_nome);
        }
    }

    if (typeof usuario_email !== "undefined") {

        LHCChatOptions.attr_prefill.push({'name': 'email', 'value': usuario_email, 'hidden': false});
    }

    if (typeof(usuario_nome) !== "undefined") {
        LHCChatOptions.attr_prefill.push({'name': 'username', 'value': usuario_nome, 'hidden': true});
    }

    if(typeof(msg) !== "undefined") {
        LHCChatOptions.attr_prefill.push({'name': 'question', 'value': msg, 'hidden': true});
    }

    LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
        var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
        po.src = '//atendimento.zbraestudio.com.br/index.php/por/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1/(disable_pro_active)/true/(theme)/1?r='+referrer+'&l='+location;
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();

    /* muda botões do dialogo */
    $('#lhc_container #lhc_close img').attr('src', 'http://localhost/github/vitamina/images/cancel.png');
    $('#lhc_container #lhc_remote_window img').attr('src', 'http://localhost/github/vitamina/images/application_double.png');

}