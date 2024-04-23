// Vérifier si getUserMedia est disponible dans le navigateur
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
} else {
    console.log('getUserMedia is not supported in this browser');
}

document.addEventListener("DOMContentLoaded", function() {
    // Définition de la fonction bindEvents
    function bindEvents(p) {
        p.on('error', function (err) {
            console.log('error', err)
        });
        p.on('signal', function (data) {
            document.querySelector('#offer').textContent = JSON.stringify(data);
        });
        p.on('stream', function (stream) {
            // Si le patient reçoit un flux vidéo, l'afficher dans la balise vidéo
            const receiverVideo = document.querySelector('#receiver-video');
            receiverVideo.srcObject = stream;
        });
    }

    // Événement de clic sur le bouton "#start"
    document.querySelector('#start').addEventListener('click', async function (e) {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true,
            });

            // Création d'une connexion peer-to-peer avec SimplePeer
            const p = new SimplePeer({
                initiator: true,
                stream: stream,
                trickle: false,
            });

            // Gestion des événements de connexion avec la fonction bindEvents
            bindEvents(p);

            // Sélection de la vidéo de l'émetteur
            const emitterVideo = document.querySelector('#emitter-video');
            emitterVideo.volume = 0;

            // Événement chargé pour commencer la lecture une fois que les métadonnées sont chargées
            emitterVideo.addEventListener('loadedmetadata', function() {
                emitterVideo.play();
            });

            // Démarrer la lecture du flux vidéo
            emitterVideo.srcObject = stream;
        } catch (error) {
            console.error('Error starting video consultation:', error);
        }
    });

    // Événement de soumission du formulaire "#incoming"
    document.querySelector("#incoming").addEventListener('submit', async function (e) {
        e.preventDefault();
        const p = new SimplePeer({
            initiator: false,
            trickle: false
        });

        // Mise à jour de la connexion avec les données reçues
        p.signal(JSON.parse(e.target.querySelector('textarea').value));

        // Gestion des événements de connexion avec la fonction bindEvents
        bindEvents(p);
    });
});
