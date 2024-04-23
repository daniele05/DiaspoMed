document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('btn-filtrer').addEventListener('click', function() {
        var specialite = document.getElementById('specialite').value;
        var ville = document.getElementById('ville').value;

        // Envoi de la requête AJAX au serveur
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/recherche-medecins?specialite=' + specialite + '&ville=' + ville, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                // Mettez à jour votre vue avec les résultats de la recherche
                console.log(response);
                // Exemple de mise à jour dynamique de la liste des médecins
                // Ici, vous pouvez utiliser JavaScript pour mettre à jour le contenu de votre page en fonction des résultats de la recherche
            }
        };
        xhr.send();
    });
});