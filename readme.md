Ho usato come API REST OAuth, l'autentificazione di reddit in grado di riconoscere il mio account reddit e darmi dei risultati appropriati al mio account (nella testa della pagina, i 5 risultati visualizzati in orizzonatale).
Ho usato come API REST senza OAuth per quanto riguarda la ricerca di profili e contenuti non basati sulle preferenze del mio account


<!-- #region ==== Controlli client/server ==== -->
    Inserimento password    -> client/server
    Nome utente già in uso  -> client
<!-- #endregion -->

<!-- #region ==== PAGINE DISPONIBILI ==== -->
    Pagina home                         -> hw1.php
    Pagina contenuti salvati            -> saved.php
    Pagina informazioni su subreddit    -> about.php
<!-- #endregion -->


<!-- #region ==== CONTENUTI DA REVISIONARE==== -->

<!-- #region ==== RICHIESTE ASINCRONE ==== -->
    L'unica richiesta non asincrona, che richiede il ricaricamento della pagina è l'accesso ad un account sia questo fatto tramite Registrazione che Login.
<!-- #endregion -->

<!-- #region ==== DATABASE ==== -->
    Si potrebbe fare che quando si salva un post, questo venga caricata sul database nella tabella POST, e poi creata la relazione nella tabella UTENTE_POST
<!-- #endregion -->

<!-- #region ==== CARICAMENTO POST ==== -->
    Quando carico, il feeed, limitato a 25 post, è lento
<!-- #endregion -->



<!-- #endregion -->