Ho usato come API REST OAuth, l'autentificazione di reddit in grado di riconoscere il mio account reddit e darmi dei risultati appropriati al mio account (nella testa della pagina, i 5 risultati visualizzati in orizzonatale).
Ho usato come API REST senza OAuth per quanto riguarda la ricerca di profili e contenuti non basati sulle preferenze del mio account


<!-- #region ==== Controlli client/server ==== -->
    Inserimento password                -> client/server
    Nome utente già in uso (signup)     -> client
    Nome utente non esistente (login)   -> client
<!-- #endregion -->

<!-- #region ==== PAGINE DISPONIBILI ==== -->
    Pagina home                         -> hw1.php      Popolata mediante fetch API di reddit
    Pagina contenuti salvati            -> saved.php    Popolata mediante db
    Pagina informazioni su subreddit    -> about.php    Popolata mediante fetch API di reddit
    Pagina post e commenti              -> comment.php  Popolata mediante db
<!-- #endregion -->

<!-- #region ==== RICHIESTE ASINCRONE ==== -->
    Tutte le richieste che necessitano l'intervento del server sono asincrone.
    L'unico ricaricamento è in saved.php:
                                --> nel logout si verrà reinderizzati in hw1.php
<!-- #endregion -->

<!-- #region ==== TODO==== -->
<!-- #region ==== TODO==== -->
    Aggiungere verifica nome utente già in uso al server
    Aggiungere alla pagina comment.php, l'opzione di commentare
<!-- #endregion -->