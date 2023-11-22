   
   {{ include('header.php', {title: 'Erreur'}) }}
   <main>
        {% if message is not empty %}
            <div class='error-message'>{{ message }}</div>
        {% endif %}
    </main>
        
</body>

</html>