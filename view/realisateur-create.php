{{ include('header.php', {title: 'Ajouter un réalisateur'}) }}
<body>
    <main>
    <div class="container-playlist-create">
        <h1>Ajouter un réalisateur</h1>
        <form action="{{ path }}/realisateur/store" method="post">

         <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
           
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
        
         
               
       
            <button type="submit" class="btn">Ajouter</button>
        </form>
    </div>
</main>
{{ include('footer.php') }}
</body>
</html>

