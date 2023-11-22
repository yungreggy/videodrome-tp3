{{ include('header.php', {title: 'Créer un compte'}) }}

<body>
    <main>
        <section class="container-create-user">
            <div>
                <h1>Créez votre compte Vidéodrôme !</h1>
            </div>

            <div class="container-login">

                <form action="{{ path }}user/store" method="post">
                    <span class="text-danger">{{ errors | raw }}</span>

                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username" value="{{ user.username }}">

                    <label>Mot de passe</label>
                    <input type="password" name="password">

                    <label>Courriel</label>
                    <input type="email" name="email" value="{{ user.email }}">

                    <input type="submit" value="Sauvegarder" class="btn">
                </form>

            </div>
        </section>
    </main>
</body>
</html>
