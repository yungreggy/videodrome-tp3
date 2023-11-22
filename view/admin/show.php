{{ include('header.php', {title: 'Infos Utilisateur'}) }}

<body>
    <main>
       <section class="account-info">

        <h1>Informations sur l'utilisateur'</h1>
        
    <div class="container-profile-pucture">
        <form action="{{ path }}user/uploadProfilePhoto" method="post" enctype="multipart/form-data" class="form-photo-profile">
            <label for="profile-photo">Téléverser une photo de profil :</label>
            <input type="file" name="profile-photo" id="profile-photo" accept="image/*">
            <button type="submit">Envoyer</button>
        </form>

        <form action="{{ path }}user/deleteProfilePhoto" method="post" class="form-photo-profile">
            <button type="submit" class="btn-delete">Supprimer la photo de profil</button>
        </form>

      <div class="profile-picture">
          {% if user.profile_photo %}
              <img src="{{ path }}{{ user.profile_photo }}" alt="Photo de profil">
          {% else %}
              <p class="aucune-photo">Aucune photo de profil.</p>
          {% endif %}
        
          
      </div>
          </div>

       <div class="info-block">
    <p><strong>Nom d'utilisateur :</strong> {{ user.username }}</p>
    <p><strong>Courriel :</strong> {{ user.email }}</p>
    <p><strong>Privilège :</strong> {{ user.privilege_id }}</p>
  
   


    <br>
    <a href="{{ path }}admin/edit/{{ user.id }}" class="btn-edit">Modifier</a>
    <a href="{{ path }}user/destroy/{{ user.id }}" class="btn" onclick="return confirm('Confirmez-vous la suppression de cet utilisateur ?');">Supprimer</a>

   

</section>
</main>

</body>


</html>