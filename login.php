<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Oferecemos serviços como Musculação, Hidroginástica, Pilates, Fisioterapia, Ginástica em grupo, entre outros.">
        <meta name="author" content="jF">
        <meta name="keywords" content="musculação, personal trainer, academia para idosos, hidroginástica, pilates, ginástica, zumba, fisioterapia">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/login-register.css">
        <title> Helthier | Login </title>
    </head>
    <body>
        <section class="showcase">

            <header>
                <h2 class="logo">Helthier</h2>
                <div class="toggle"></div>
            </header>

            <video src="images/Helthier.m4v" muted loop autoplay></video>

            <div class="overlay"></div>

            <div class="container">
                <section id="login">
                    <h1>Entrar</h1>
                    <form method="POST">
                        <input type="email" name="email" placeholder="E-mail" autofocus maxlength="40">
                        <input type="password" name="password" placeholder="Senha" maxlength="16">
                        <input type="submit" name="button" value="Acessar">
                    </form>
                </section>
        
                <section id="register">
                    <a href="register.php">Não é inscrito? <strong>Cadastre-se.</strong></a>
                </section>
            </div>

            <ul class="social">
                <li><a href="https://pt-br.facebook.com/" target="_blank"><img src="images/icon/facebook.png" alt="facebook"></a></li>
                <li><a href="https://twitter.com/login" target="_blank"><img src="images/icon/twitter.png" alt="twitter"></a></li>
                <li><a href="https://www.instagram.com/" target="_blank"><img src="images/icon/instagram.png" alt="instagram"></a></li>
            </ul>
        </section>

        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contato</a></li>                
            </ul>
        </div>

        <script>
            const menuToggle = document.querySelector('.toggle');
            const showcase = document.querySelector('.showcase');

            menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            showcase.classList.toggle('active');
      })
        </script>
    </body>
</html>