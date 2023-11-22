{{ include('header.php', {title: 'Login'}) }}
<main>
    <section class="container-auth">
        <div class="container-login">
            <form action="{{ path }}login/auth" method="post">
                <h2>Login</h2>
                <span class="text-danger">{{ errors | raw }}</span>
                <label class="login">Utilisateur</label>
                <input type="text" name="username" value="{{ user.username }}">
                <label class="login">Mot de passe</label>
                <input type="password" name="password" value="">
                <br>
                <br>
                <input type="submit" value="Connecter" class="btn">
            </form>
      
        </div>
    </section>
</main>
