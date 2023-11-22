{{ include('header.php', {title: 'Créer un utilisateur'}) }}

<body>
    <main>
        <section class="container-create-user">
            <div>
                <h1>Créez un utilisateur ou administrateur</h1>
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

                    <label>Privilège</label>
                    <select name="privilege_id">
                        <option value="">Sélectionner un privilège</option>
                        <option value="1" {% if user.privilege_id==1 %} selected {% endif %}>Admin</option>
                        <option value="2" {% if user.privilege_id==2 %} selected {% endif %}>User</option>
                    </select>

                    <input type="submit" value="Sauvegarder" class="btn">
                </form>

            </div>
        </section>
    </main>
</body>
</html>
