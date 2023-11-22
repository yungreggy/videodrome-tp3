{{ include('header.php', {title: 'Home'}) }}
<body class="home">
    <main>
        <section class="container">
<h1>Bonjour <span class="username">{{ username }}</span> !</h1>


    <img src="{{path}}assets/img/logo_title.svg" alt="logo" class="logo_title">
        </section>





</main>

<span class="footer-home">{{ include('footer.php') }}
</body>
</html>

