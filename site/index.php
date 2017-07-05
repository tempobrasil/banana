<?
include('../includes/autoload.php');

$social_facebook = 'https://www.facebook.com/Ag%C3%AAncia-Vitamina-1919960214886165/';
$social_twitter = 'http://twitter.com/agvitamina';

SetPageTitle('Home');
?><!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title><?= GetPageTitle(); ?></title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.min.css">
   <link rel="stylesheet" href="css/main.css">     

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png" >

</head>

<body>

	<!-- header
   ================================================== -->
   <header id="main-header">

   	<div class="row">

	      <div class="logo">
	         <a href="<?= GetLink('site'); ?>">Vitamina</a>
	      </div>

	      <nav id="nav-wrap">         
	         
	         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
	         	<span class="menu-icon">Menu</span>
	         </a>
         	<a class="mobile-btn" href="#" title="Hide navigation">
         		<span class="menu-icon">Menu</span>
         	</a>            

	         <ul id="nav" class="nav">
	            <li><a class="smoothscroll" href="#hero">Home.</a></li>
		         <li class="current"><a class="smoothscroll" href="#portfolio">Trabalhos já feitos.</a></li>
	            <li><a class="smoothscroll" href="#services">Serviços.</a></li>
	            <li><a class="smoothscroll" href="#about">Sobre nós.</a></li>
	            <li><a class="smoothscroll robo" href="#robo">Falar com robô.</a></li>
	            <li><a class="smoothscroll" href="#contact">Contato.</a></li>
	         </ul> <!-- end #nav -->

	      </nav> <!-- end #nav-wrap -->

	      <ul class="header-social">
	        	<li><a href="<?= $social_facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
	        	<li><a href="<?= $social_twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
	      </ul>      

	   </div>

   </header> <!-- end header -->


   <!-- homepage hero
   ================================================== -->
	<?
	$diretorio_url = get_config('SITE_URL') . 'site/images/headers/';
	$diretorio_path = get_config('SITE_PATH') . 'site/images/headers/';
	$arquivos = glob($diretorio_path . '*.png');
	shuffle($arquivos);
	?>
   <section id="hero" style="background-image: url('<?= $diretorio_url . basename($arquivos[0]); ?>');">
   	  
		<div class="row hero-content">

			<div class="twelve columns hero-container">

			   <!-- hero-slider start-->
			   <div id="hero-slider" class="flexslider">

				   <ul class="slides">

					   <!-- slide -->
					   <li>
						   <div class="flex-caption">
								<h1 class="">Muita <span>energia</span> pra você crescer como nunca.
								</h1>	
									
								<h3 class="">Quer que sua marca tenha força e sua empresa cresca forte e saudável? Somente com uma boa vitamina. :)</h3>
							</div>						
					   </li>

					   <!-- slide -->
					   <li>						
							<div class="flex-caption">
								<h1 class="">Praticidade e um precinho <span>camarada</span>.</h1>

								<h3 class="">Vitamina tem que ser coisa rápida e barata. Mas acima de tudo, feita no capricho!</h3>
							</div>					
					   </li>

					   <!-- slide -->
					   <li>
						   <div class="flex-caption">
								<h1 class="">Somos uma agência <span>100%</span> online.</h1>

								<h3 class="">Somos rápido, com preço diferenciado e 100% online pra agilizar e tornar prático nosso relacionamento com você.</h3>
							</div>
					   </li>					              

				   </ul>

			   </div> <!-- end hero-slider -->				   

	      </div> <!-- end twelve columns-->

		</div> <!-- end row -->	

		<div id="more">
		      <a class="smoothscroll" href="#services">Quem somos nós<i class="fa fa-angle-down"></i></a>
		</div> 	

   </section> <!-- end homepage hero -->


   <!-- portfolio
   ================================================== -->
   <section id="portfolio">

      <div class="row section-head">

      	<div class="twelve columns">

      		<h1>Um pouco dos <span>Nossos trabalhos</span> .</h1>

	         <hr />               

	         <p>Conheça um pouco do trabalho que temos realizados.
	         </p>

	      </div>

      </div> <!-- end section-head -->

      <div class="row items">

         <!-- portfolio-wrapper -->
         <div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half">

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-01">
	                  <img src="images/portfolio/aline.jpg" alt="Underwater">
                     <div class="overlay"></div>                       
                     <div class="portfolio-item-meta">
     					      <h5>Marca</h5>
                        <p>Aline Gonçalves Design de Sobrancelha e Depilação</p>
     					   </div> 
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
        		</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-02">
                     <img src="images/portfolio/netforce.jpg" alt="Netforce Sistemas">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Marca</h5>
                           <p>Netforce Sistemas</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-03">
                     <img src="images/portfolio/maiscafe-livro.jpg" alt="Livro do Blog Mais Café">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Editoração de Livro</h5>
                           <p>Mais Café</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-04">
                     <img src="images/portfolio/estacao-site.jpg" alt="Site da Igreja Estação">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Site</h5>
                           <p>Igreja Estação</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-05">
                   <img src="images/portfolio/unipraias-site.jpg" alt="Parque Unipraias">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Site e Loja Virtual</h5>
                           <p>Parque Unipraias</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-06">
                     <img src="images/portfolio/aline-post.jpg" alt="Girl Stuff">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Mídia Social</h5>
                           <p>Aline Gonçalves Design de Sobrancelhas e Depilação</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-07">                        
                     <img src="images/portfolio/estacao-fanpage.jpg" alt="Coffee Cup">
                     <div class="overlay">
                      <div class="portfolio-item-meta">
          					   <h5>Mídia Social</h5>
                           <p>Igreja Estação</p>
          					</div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>
                  </a>
               </div>
         	</div> <!-- item end -->

            <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-08">
                     <img src="images/portfolio/zbra.jpg" alt="Judah">
                     <div class="overlay">
                      	<div class="portfolio-item-meta">
        					      <h5>Branding</h5>
                           <p>Z.BRA Estúdio</p>
        					   </div>
                     </div>
                     <div class="link-icon"><i class="fa fa-plus"></i></div>                     
                  </a>
               </div>
       		</div>  <!-- item end -->

         </div> <!-- end portfolio-wrapper -->
         

         <!-- modal popup
	   	========================================================= -->
         <div id="modal-01" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/aline.jpg" alt="Underwater" />
	      	</div>

		      <div class="description-box">
			      <h4>Aline Gonçalves Design de Sobrancelhas e Depilação</h4>
			      <p>Aceitamos o desafio de desenvolver uma marca que expressasse toda a delicadeza e profissionalismo da Aline.  Nos juntamos a ela na alegria do resultado do trabalho que conseguiu somar ainda mais a excelência do trabalho prestado por ela.</p>
               <span class="categories">Marca</span>
		      </div>

            <div class="link-box group">
            	<!--<a href="http://www.behance.net">Details</a>-->
            	<a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-01 end -->

         <div id="modal-02" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/netforce.jpg" alt="Hotel Sign" />
	      	</div>

		      <div class="description-box">
			      <h4>Netforce Sistemas</h4>
			      <p>A Netforce Sistemas é uma empresa que trabalha no nosso universo: digital. E como uma empresa digital, então, sabemos que somos seu parceiro perfeito para cuidar da gestão de comunicação da sua marca. Desde o esboço até o resultado inicial, somos felizes por ter sido os criadores dessa marca.</p>
               <span class="categories">Marca</span>
		      </div>

            <div class="link-box">            	
               <!--<a href="http://www.behance.net">Details</a>-->
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-02 end -->

         <div id="modal-03" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/maiscafe-livro.jpg" alt="" />
	      	</div>

		      <div class="description-box">
			      <h4>Livro Mais Café</h4>
			      <p>O Blog Mais Café lançou um livro de crônicas em comemoração ao seu primeiro aniversário. Fomos privilegiados por ter feito a editoração desse livro. Desde diagramação, editoração até mesmo a programação das versões para plataformas digitais.</p>
               <span class="categories">Editoração</span>
		      </div>

            <div class="link-box">
               <!--<a href="http://www.behance.net">Details</a>-->
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-03 end -->

			<div id="modal-04" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/estacao-site.jpg" alt="" />
	      	</div>

		      <div class="description-box">
			      <h4>Igreja Estação</h4>
			      <p>Como uma igreja bem moderna, a Estação não poderia ter encontrado uma agência melhor. Com muita alegria desenvolvemos o site da igreja, que é atual e moderno.</p>
               <span class="categories">Site</span>
		      </div>

            <div class="link-box">
               <a href="http://www.igrejaestacao.com.br" target="_blank">igrejaestacao.com.br</a>
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-04 end -->

	      <div id="modal-05" class="popup-modal slider mfp-hide">	

	      	<div class="media">
	      		<img src="images/portfolio/modals/unipraias-site.jpg" alt="" />
	      	</div>      	

		      <div class="description-box">
			      <h4>Parque Unipraias</h4>

			      <p>Como um dos maiores Parques Turísticos do estado de Santa Catarina, recebendo meio milhão de turistas de todo o Brasil e também do mundo, contou com a Vitamina para desenvolver seu site institucional e também Loja Virtual.</p>

			      <div class="categories">Web Development</div>
               
		      </div>

            <div class="link-box">
               <a href="http://www.unipraias.com.br" target="_blank">unipraias.com.br</a>
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>		      

	      </div><!-- modal-05 end -->

	      <div id="modal-06" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/aline-post.jpg" alt="" />
	      	</div>	

		      <div class="description-box">
			      <h4>Aline Gonçalves Design de Sobrancelhas e Depilação</h4>

			      <p>As Mídias Sociais de uma empresa, hoje, é a extensão da sua marca no universo digital. É com muita satisfação que gerenciamos os canais de Mídia Social da Aline. Sempre com muito bom humor, utilizando a criatividade para evidenciar a excelência do atendimento e serviço prestado.</p>

			      <div class="categories">Mídia Social / Instagram</div>
               
		      </div>

            <div class="link-box">
               <a href="http://www.behance.net">Details</a>
		         <a href="#" class="popup-modal-dismiss">Close</a>
            </div>

	      </div><!-- modal-06 end -->

	      <div id="modal-07" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/estacao-fanpage.jpg" alt="" />
	      	</div>	

		      <div class="description-box">
			      <h4>Igreja Estação</h4>

			      <p>Uma igreja <i>diferentona</i> (como dizem), precisa ter uma agência <i>diferentona</i> também. Afinal, a gente se entende. Se identifica. E somos todo carinho ao cuidar das Mídias Sociais da Igreja Estação.</p>

			      <div class="categories">Mídia Social / Fanpage</div>
               
		      </div>

            <div class="link-box">
               <!--<a href="http://www.behance.net">Details</a>-->
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-07 end -->

	      <div id="modal-08" class="popup-modal mfp-hide">

		      <div class="media">
	      		<img src="images/portfolio/modals/zbra.jpg" alt="" />
	      	</div>	

		      <div class="description-box">
			      <h4>Z.BRA Estúdio</h4>

			      <p>Eles são mestres na criação de Apps Mobile e Games. Um dos nossos parceiros mais antigos, a Z.BRA deixa a parte criativa por nossa conta. </p>

			      <div class="categories">Marca</div>
               
		      </div>

            <div class="link-box">
               <a href="http://www.zbraestudio.com.br" target="_blank">zbraestudio.com.br</a>
		         <a href="#" class="popup-modal-dismiss">Fechar</a>
            </div>

	      </div><!-- modal-08 end -->

      </div>  <!-- end row -->

   </section> <!-- end portfolio -->


   <!-- Services Section
   ================================================== -->
   <section id="services">

   	<div class="row section-head">

      	<div class="twelve columns">

      		<h1>Um pouco do que <span>a gente faz</span> .</h1>

	         <hr />      	         

	         <p>Veja abaixo um pouco do que a gente é especialista.
	         </p>

	      </div>

      </div> <!-- end section-head -->

      <div class="row mobile-no-padding">      	

	      <div class="service-list bgrid-third s-bgrid-half tab-bgrid-whole group">

	      	<div class="bgrid">	               

	            <h3>Marca.</h3>

	            <div class="service-content">	                  
		            <p>A marca não é simplesmente o logotipo da sua empresa. Do ponto de vista do consumidor, a ela representa a sua experiência, impressões e sentimentos da sua empresa.
	         		</p> 
	         	</div>  

				</div> <!-- end bgrid -->

				<div class="bgrid">	              

	            <h3>Mídia Social.</h3>

	            <div class="service-content">	                  
		            <p>Tudo o que uma empresa faz dentro do ambiente web está diretamente ligado aos canais de relacionamento digitais.  Assim, cada passo precisa ser medido, avaliado e otimizado.
	         		</p> 
	            </div>	              

			   </div> <!-- end bgrid -->

			   <div class="bgrid">	              

	            <h3>Sites e Hotsites.</h3>

	            <div class="service-content">		                  
		            <p>Um site ou hotsite é a extensão da sua empresa na internet. Ela deve representar tudo o que você sua empresa é. É sua presença em desktops, tablets e smartphones.
	        			</p> 
	            </div> 	               

			   </div> <!-- end bgrid -->




			  <div class="bgrid">

				  <h3>Marketing Digital.</h3>

				  <div class="service-content">
					  <p>Ações coordenadas a fim de comunicar, promover e vender seus produtos e serviços pela internet.
					  </p>
				  </div>

			  </div> <!-- end bgrid -->


			  <div class="bgrid">

				  <h3>Apps Mobile.</h3>

				  <div class="service-content">
					  <p>Seja em iOS ou Android, sua marca pode estar próxima de seu público-alvo com soluções personalizadas para smartphones e tablets.
					  </p>
				  </div>

			  </div> <!-- end bgrid -->

			  <div class="bgrid">

				  <h3>Otimização de Sites (SEO).</h3>

				  <div class="service-content">
					  <p>Detectar falhas dentro da estrutura do seu site faz a diferença na hora de exibir seu conteúdo nas buscas orgânicas. Este diagnóstico só é possível quando usamos as ferramentas certas.
					  </p>
				  </div>

			  </div> <!-- end bgrid -->


	      </div> <!-- end service-list -->	      

      </div> <!-- end row -->      

   </section> <!-- end services -->


   <!-- About Section
   ================================================== -->
   <section id="about">

   	<div class="row section-head">

      	<div class="twelve columns">

      		<h1>Um pouco <span> Sobre nós</span></h1>

	         <hr />     	    

	         <p>Somos uma agência de marketing digital, mas um pouco diferente das outras outras.</p>

			<p>Primeiro que aqui é tudo 100% online. Então tudo é feito através do nosso site. Segundo que somos uma agência focada na praticidade. Isso mesmo! Jogamos tudo no liquidificador, batemos e <i>vualá</i>... uma deliciosa vitamina pra sua marca.</p>

			<p>E o melhor de tudo, é mega saudável! Sempre divertida, criativa, mas com muita responsabilidade e profissionalismo.</p>

	      </div> <!-- end section-head -->

      </div>

      <div class="row mobile-no-padding">       	

      	<div class="process bgrid-half tab-bgrid-whole group">

      		<div class="bgrid">

			      <h3>100% online.</h3>

			      <p>Somos uma agência focada em trabalhar online não é por acaso. Somos uma agência que nasceu no digital, com uma grande bagagem  de comunicação, desde a época que o “online” nem existia, até hoje. Entendemos que trabalhar assim, 100% digital, online, nos permite fazer coisas que e oferecer diferenciais a nossos clientes que numa agência convencional não seria possível.
			      </p>

		   	</div>

      		<div class="bgrid">

			     	<h3>Atendimento de primeira.</h3>

			     	<p>Aqui a gente não abre mão disso não. Atendimento é prioridade. Tá, ok.. “atendimento” é modo de dizer, queremos mesmo é ter um relacionamento com nossos clientes. Por isso levamos tão a sério o que fazemos. Queremos gerar resultados aos nossos clientes. Resultado! E apesar de sermos 100% digitais, nosso atendimento digital está sempre a sua disposição pra bater um papo com você e te ajudar no que for preciso.
			   	</p>	

		      </div> 

		      <div class="bgrid">

			     	<h3>Precinho camarada.</h3>

			     	<p>Do que adiante ser tão diferente se fosse pra ser, também, mais caro, né? Pois então.. a gente além de <i>diferentão</i> é também mais barato do que nossos concorrentes. Estrategicamente nós focamos naquilo que importa e conseguimos oferecer pra você um serviço de qualidade com um precinho camarada, tipo “coisa de irmão”, entende?
			      </p>

		      </div>

		      <div class="bgrid">

			      <h3>Responsabilidade e Profissionalismo.</h3>

			      <p>Ok, papo sério agora. Nosso estilo de agência é daquelas divertidas, brincalhonas, mas sempre levando tudo o que nós fazemos com muita seriedade. Temos um compromisso com nossos clientes que com muito profissionalismo. Somos assim, práticos, alegres, mas acima de tudo muito profissionais.
			      </p>	

		      </div>

      	</div> <!-- end process -->      	

     	</div> <!-- end row -->

<? /*
      <div class="row team section-head">

   		<div class="twelve columns">

	         <h1>Conheça quem são <span>nossos artilheiros</span> .</h1>

	         <hr />	         

	      </div>

      </div> <!-- end section-head -->

      <div class="row">

         <div id="team-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half mob-bgrid-whole group">

            <div class="bgrid member">

					<div class="member-pic">
						<img src="images/team/member01-k.jpg" alt=""/>
                 	<div class="mask"></div>       	
               </div>
               <div class="member-name">
                  <h3>Naruto Uzumaki</h3>
                  <span>Creative Director</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->

            <div class="bgrid member">
								
					<div class="member-pic">
                  <img src="images/team/member03-k.jpg" alt=""/>
               	<div class="mask"></div>  
               </div>
               <div class="member-name">
                  <h3>Sasuke Uchiha</h3>
                  <span>Lead Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->

            <div class="bgrid member">
								
					<div class="member-pic">
						<img src="images/team/member04-k.jpg" alt=""/>
                 	<div class="mask"></div>                          	
               </div>
               <div class="member-name">
                  <h3>Shikamaru Nara</h3>
                  <span>Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

     			</div> <!-- end member -->

            <div class="bgrid member">
								
					<div class="member-pic">
                 	<img src="images/team/member05-k.jpg" alt=""/>
                 	<div class="mask"></div>  
               </div>
               <div class="member-name">
                  <h3>Sakura Haruno</h3>
                  <span>Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->

         </div> <!-- end team-wrapper -->

      </div> <!-- end row -->
*/ ?>

   </section> <!-- end about -->

	<section id="robo">
	<div id="call-to-action">

		   <div class="row section-ads">

		      <div class="twelve columns">		         		

			      <h2><a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Aqui nossa secretária é um Robô. <span>Faça seu pedido</span> com ele.</a></h2>

			      <p>
					  Somos tão digitais e 100% online que nossa secretária é um robô. Ela ajuda você a fazer seus pedidos.
					  Conte com ela pro que precisar. Ela é um amor de pessoa.. digo, de robô.
					  <!-- Simply type	the promocode in the box labeled “Promo Code” when placing your order. -->
					</p>

					<div class="action">
			         <a href="<?= GetLink('robo'); ?>" >Chamar o robô</a>
	         	</div>

			   </div>

		   </div> <!-- end section-ads -->		         	         

	   </div> <!-- end call-to-action -->

	</section> <!-- end about -->


	<!-- Testimonials Section
       ================================================== -->
   <section id="testimonials">

      <div class="row content flex-container">
    
         <div id="testimonial-slider" class="flexslider">

            <ul class="slides">
               <li>
                  <p>Precisávamos reorganizar a comunicação da nossa empresa e nosso departamento de marketing nos mostrou a Agência Vitamina. No começo ficamos receosos, pois estávamos habituados a trabalhar com as agências convencionais. Hoje, a Vitamina é uma das maiores parceiras da nossa empresa. Foi uma das melhores apostas que fizemos e hoje colhemos bons frutos. Criativa, moderna e sempre bem humorada. Recomendo!
				  </p>

                  <div class="testimonial-author">
                    	<img src="https://scontent.fbfh1-1.fna.fbcdn.net/v/t1.0-9/10322624_707955222597176_7755063321273254507_n.jpg?oh=e8cd4c343027d3f10c0c8801e91a47d9&oe=59CC4BFE" alt="Author image">
                    	<div class="author-info">
                    		Bruno Gonçalves
                    		<span class="position">CEO, Netforce Sistemas.</span>
                    	</div>
                  </div>
             	</li> <!-- end slide -->
<!--
               <li>                       
                  <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                  Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                  nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                  </p>
                  <div class="testimonial-author">
                    	<img src="images/avatars/avatar-2.jpg" alt="Author image">
                    	<div class="author-info">
                    		John Doe
                    		<span>CEO, ABC Corp.</span>
                    	</div>
                  </div>                        
               </li>--> <!-- end slide -->

            </ul> <!-- end slides -->

         </div> <!-- end flexslider -->         
        
      </div> <!-- end row -->

   </section> <!-- end testimonials section -->  


   <!-- contact
   ================================================== -->
   <section id="contact">

   	<div class="row section-head">

   		<div class="twelve columns">

	         <h1>Fale com nossa equipe<span>.</span></h1>

	         <hr />	        

	      </div>

      </div> <!-- end section-head -->

      <div class="row">
      	
      	<div id="contact-form" class="six columns tab-whole left">

            <!-- form -->
            <form name="contactForm" id="contactForm" method="post" action=""  >
      			<fieldset>

                  <div class="group">
 						   <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minLength="2" required />
                  </div>
                  <div>
	      			   <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required />
	               </div>
                  <div>
	     				   <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject"  value="" />
	               </div>                       
                  <div>
	                 	<textarea name="contactMessage"  id="contactMessage" placeholder="message" rows="10" cols="50" required ></textarea>
	               </div>                      
                  <div>
                     <button class="submitform">Submit</button>
                     <div id="submit-loader">
                        <div class="text-loader">Sending...</div>                             
       				      <div class="s-loader">
								  	<div class="bounce1"></div>
								  	<div class="bounce2"></div>
								  	<div class="bounce3"></div>
								</div>
							</div>
                  </div>

      			</fieldset>
      		</form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"></div>
            <!-- contact-success -->
      		<div id="message-success">
               <i class="icon-ok"></i>Your message was sent, thank you!<br />
      		</div>

         </div>

         <div class="six columns tab-whole right">

            <p class="lead">Somos uma agência com atendimento exclusivamente digital. Ou seja, você fala com nossa equipe 100% online. Mas fique tranquilo, pois isso dá a você ser atendido a qualquer instante no horário comercial. Temos uma equipe preparada e ansiosa pra falar com você.

			   <p><a href="mailto:falecom@agenciavitamina.com.br">falecom@agenciavitamina.com.br</a></p>
               	
         </div>     	

      </div> <!-- end row -->     

   </section>  <!-- end contact -->


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">  

      	<div class="twelve columns content group">
      		
				<ul class="social-links">
               <li><a href="<?= $social_facebook; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
               <li><a href="<?= $social_twitter; ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            </ul>

            <hr />

            <div class="info">

            	<div class="footer-logo"></div>

	            <p>Uma agência digital, 100% online.
	            </p>	        

	         </div>

      	</div>           

         <ul class="copyright">
         	<li>&copy; Copyright 2017 agenciavitamina.com.br.</li>
         </ul>

         <div id="go-top">
            <a class="smoothscroll" title="Volte ao topo dessa página" href="#hero">Voltar ao topo<i class="fa fa-angle-up"></i></a>
         </div>

      </div> <!-- end row -->

   </footer> <!-- end footer -->

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/jquery.flexslider-min.js"></script>
   <script src="js/jquery.waypoints.min.js"></script>
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/jquery.placeholder.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>  
   <script src="js/main.js"></script>

</body>

</html>


<!-- MoxChat -->
<script type="text/javascript">
	!function(t){var e=t.createElement("script");e.type="text/javascript",e.charset="utf-8",
		e.src="https://static.moxchat.it/visitor-widget-loader/Z72ENYena9.js",e.async=!0;
		var a=t.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a);
	}(document);
</script>


<?
if(!is_localhost()) {
	?>
	<!-- Google Analytics (início) -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-101933054-1', 'auto');
		ga('send', 'pageview');

	</script>
	<!-- Google Analytics (fim) -->

<?
}
?>