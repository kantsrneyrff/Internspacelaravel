@extends('layouts.template')

@section('title','Home')

@section('content')
<link rel="stylesheet" href="/css/landing_page02.css">
<script src="/js/landing_page.js"></script>
    <body id="page-top">


    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="/img/Logo_Light.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-2 py-lg-0">
                        <li class="nav-item" id="nav-item"><a class="nav-link"href="#services">Serviços</a></li>
                        <li class="nav-item"id="nav-item"><a class="nav-link" href="#team">Equipe</a></li>
                        <li class="nav-item"id="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
                        <li class="nav-item"><a class="nav-link" href="login">Logiiiin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Otimize a gestão dos estágios na sua empresa com o nosso sistema! Acompanhe o desempenho dos
                estagiários, gerencie documentos e informações de forma segura e eficiente, tudo em um só lugar.
            </div>

        </div>
    </header>
    <!-- Services-->
    <main>
        <section class="page-section" id="services" id="cor-services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Serviços</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-calendar-days fa-stack-1x fa-inverse"></i>

                        </span>
                        <h4 class="my-3">Agendamento</h4>
                        <p class="text-muted">O Sistema de Gestão de Agendamentos e Estágio é uma
                            aplicação desenvolvida para auxiliar na organização e gerenciamento de
                            agendamentos e estágios em uma determinada instituição ou empresa. Esse sistema automatiza processos relacionados à marcação de horários, acompanhamento de estágios e facilita a comunicação entre os envolvidos.

                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">
                            O site é responsivo, o que significa que é projetado e desenvolvido para fornecer uma experiência de usuário ideal em uma ampla variedade de dispositivos e tamanhos de tela, incluindo smartphones, tablets, laptops e desktops.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-solid fa-user fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Gerenciamento</h4>
                        <p class="text-muted">O Sistema de Gerenciamento de Perfis é uma aplicação projetada para gerenciar perfis de usuários em um ambiente online. O sistema permite que os usuários criem e personalizem seus perfis, armazenando informações relevantes e oferecendo recursos adicionais para uma experiência personalizada.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->

        <!-- About-->

        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Equipe</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/membros/d37950b4-f9e1-4d82-ae7b-3db1e4dc7117.jpg" alt="..." />
                            <h4>Gabriel Nogueira</h4>
                            <p class="text-muted">Líder</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/gabri.nogueira_/" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/eMithz" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/gabriel-nogueira-68829027a" aria-label="Parveen Anand LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto img-fluid rounded-circle" src="img/membros/f7daa57d-edfb-4406-89a9-15a1de335249.jpg" alt="..." />
                            <h4>Davi Castro</h4>
                            <p class="text-muted">Desenvolvedor Full-Stack</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/davi.castroo1/" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/kantsrneyrff" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/davi-castro-170510264/" aria-label="Diana Petersen LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/membros/9f842b12-f0fc-4c4c-8eab-ec1ecee25f82.jpg" alt="..." />
                            <h4>Raphael Oliveira</h4>
                            <p class="text-muted">Desenvolvedor Full-Stack</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/raphael.ferreira.oliveira/" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/raphael0627f" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/raphael-ferreira-de-oliveira" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/membros/ffe78658-e6b2-4017-b1cc-4d1d147376b7.jpg" alt="..." />
                            <h4>Pedro Abrita</h4>
                            <p class="text-muted">Desenvolvedor Front-End</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://instagram.com/pmab.06?igshid=ZDc4ODBmNjlmNQ==" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/NavyBlue1" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/pedro-abrita-459995263/" aria-label="Larry Parker LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/membros/c9f2d4ca-b3b6-4a32-b0b1-8dd518005e37.jpg" alt="..." />
                            <h4>Levi Farelli</h4>
                            <p class="text-muted">QA Tester</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/levipsfarelli/" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="" aria-label="Larry Parker LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/membros/8ce2c417-56fc-4fcd-ad42-4a665dd02ff5.jpg" alt="..." />
                            <h4>Higor Lopes</h4>
                            <p class="text-muted">QA Tester</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/higor_sl05/" aria-label="Parveen Anand Twitter Profile" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile" target="_blank"><i class="fa-brands fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/higor-de-souza-31bb92254" aria-label="Larry Parker LinkedIn Profile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted"></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contato</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
              
                
                <form id="contactForm" method="post" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" name="nome" type="text" placeholder="Nome *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" name="email" placeholder="Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" name="telefone" placeholder="Telefone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Mensagem" name="mensagem" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                
                  
                            <div class="fw-bolder"></div>
                            
                            <br />
                            
                        </div>
                    </div>
                    
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Enviar mensagem</button></div>
                </form>
            </div>
        </section>

        <!-- Footer-->

        <!-- Portfolio Modals-->

    </main>


    </body>
</html>
@endsection
