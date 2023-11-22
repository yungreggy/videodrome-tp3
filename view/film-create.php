{{ include('header.php', {title: 'Ajouter un film'}) }}

<body>
    <main>

  
    <div class="container-film-create">
        <h1>Ajouter un film</h1>
        <form action="{{ path }}/film/store" method="post">
         
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ film.titre }}" required>
           
          
                <label for="annee_de_sortie">Année de sortie</label>
                
                    <input type="text" name="annee_de_sortie" pattern="\d{4}" placeholder="YYYY" value="{{ film.annee_de_sortie }}" required>

          
                <label for="realisateur_id">Réalisateur</label>
                <select id="realisateur_id" name="realisateur_id" required>
                    {% for realisateur in realisateurs %}
                        <option value="{{ realisateur.id }}" {% if realisateur.id == realisateur_id %}selected{% endif %}>
                            {{ realisateur.nom }} {{ realisateur.prenom }}
                        </option>
                    {% endfor %}
                </select>
        

         
          
                <label for="genre">Genre</label>
                <select name="genre">
                    {% for genre in genres %}
                    <option value="{{ genre.id }}">{{ genre.nom_genre }}</option>
                    {% endfor %}
                </select>
           
                <div class="form-group">
    <label for="pays_d_origine">Pays d'origine</label>
    <select id="pays_d_origine" name="pays_d_origine" class="form-control">
        <option value="États-Unis">États-Unis</option>
        <option value="Afrique du Sud">Afrique du Sud</option>
        <option value="Allemagne" >Allemagne</option>
        <option value="Argentine">Argentine</option>
        <option value="Australie">Australie</option>
        <option value="Autriche" >Autriche</option>
        <option value="Belgique">Belgique</option>
        <option value="Brésil" >Brésil</option>
        <option value="Canada">Canada</option>
        <option value="Chine" >Chine</option>
        <option value="Corée du Sud" >Corée du Sud</option>
        <option value="Danemark" >Danemark</option>
        <option value="Espagne" >Espagne</option>
        <option value="Égypte" >Égypte</option>
        <option value="France">France</option>
        <option value="Grèce" >Grèce</option>
        <option value="Hong Kong" >Hong Kong</option>
        <option value="Inde" >Inde</option>
        <option value="Irlande" >Irlande</option>
        <option value="Italie" >Italie</option>
        <option value="Japon">Japon</option>
        <option value="Mexique">Mexique</option>
        <option value="Norvège">Norvège</option>
        <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
        <option value="Pays-Bas">Pays-Bas</option>
        <option value="Pologne">Pologne</option>
        <option value="Portugal">Portugal</option>
        <option value="Royaume-Uni">Royaume-Uni</option>
        <option value="Russie">Russie</option>
        <option value="Suède">Suède</option>
        <option value="Suisse">Suisse</option>
        <option value="Thaïlande">Thaïlande</option>
        <option value="Turquie">Turquie</option>
        <!-- Continuez avec les autres pays populaires ici -->
    </select>
</div>


   
        <label for="resume">Résumé</label>
        <textarea id="resume" name="resume">{{ film.resume }}</textarea>
    
 
        <label for="poster">Poster (URL)</label>
        <input type="text" id="poster" name="poster" value="{{ film.poster_url }}">
  
    <button type="submit" class="btn">Ajouter</button>
    </form>
    </div>
    </main>
    {{ include('footer.php') }}
    
</body>

</html>