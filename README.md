# CRUD

- C -> create: crea l'item
- R -> read: (index: faceva la lista di tutti gli item, show: mostra il singolo item)
- U -> update: aggiorna il singolo item
- D -> delete: cancella il singolo item


Per gestire un Comic:

1. Migration: dettagliare le colonne e i tipi di dato che deve avere la mia tabella
2. Model
3. Controller
4. Vista
5. Rotta


Giro dei dati di una Read

- richiamo la rotta  
- la rotta passa la logica dell'applicazione alla funzione del controller  
- il controller prende i dati 
- il controller passa i dati alla vista  [ $comic ]


Form di edit 

- Richiamare la rotta col model binding (cioè col parametro dell'oggetto) -> action="{{ route('comic.update', $comic) }}"
- Inserire la direttiva blade @method('PUT')



# Relazioni

- Voglio associare un comic ad un utente -> voglio mettere in relazione la tabella dei comics con la tabella degli utenti

## Relazioni 

2 entità sono in relazione quando c'è tra loro un vincolo, un associazione che li lega, che li unisce per qualche motivo

Devo registrare le informazioni di riferimento che appartengono alle tabelle coinvolte

- Foreign Key (FK) (chiave esterna): è l'informazione presente in una tabella che fa riferimento (è collegata) ad una colonna in un'altra tabella

Si usa la FK per 2 motivi principali:
    - non ridondare i dati all'interno delle varie tabelle: cioè non voglio ripetere un nome spalmandolo su tutto il database 
    - non voglio fare in modo che modificando il nome della tabella users, la riga della tabella comics a cui faccio riferimento abbia un dato orfano (vedere esempio tabelle users / comics)


In Laravel la chiave esterna (FK) si deve chiamare obbligatoriamente con il nomeDelModello_nomeDellaColonna

Esempi:
user_id (nome del model al singolare)
comic_id


## Autenticazione


Laravel Fortify: seguire doc di Laravel

Pubblicare i file di Fortify significa renderli disponibili alla personalizzazione/modifica dello sviluppatore

Fortify crea, tra le altre cose, le route per noi: register e login

Con php artisan route:list posso verificare e vedere tutte le rotte della mia applicazione


- Come faccio a capire se sono loggato? Uso Auth::user(): qui Laravel incapsula tutte le informazioni dell'utente loggato. Se non sono loggato allora sarà null (Posso usarlo all'interno di tutta l'applicazione controller, blade,...)



## Mettere in relazione le tabelle

1. Voglio aggiungere un campo user_id alla tabella comics:
    - php artisan make:migration add_user_id_column_to_comics_table

2. Istruire i model usando le funzioni di relazione: devo dire ai Model coinvolti in che relazione sono tra loro, ovvero in questo caso 1 a N (ricordiamoci di aggiungere il nuovo campo nei $fillable di Comic)
- le funzioni all'interno dei Models gestiscono le associazioni tra Comic e User (in questo caso): gli diciamo
 in che relazione devono stare

3. Posso usare le funzioni di relazione per leggere i dati che associano le tabelle ovvero: 
 -  Posso ad esempio reperire tutti i comics di un utente con $user->comics
 -  Posso accedere all'utente collegato a quel comic con $comic->user


 ----------

 Relazione 1 a N

 1. tabella users (ce l'abbiamo già)
 2. tabella comics (esiste? Se la devo creare fare la migration)
 3. fare la migration per aggiungere la foreign key user_id nella tabella comics
 4. crare le funzioni di relazione all'interno dei modelli User e Comic
 5. aggiungere nei fillable del modello Comic il campo user_id (ovvero il campo al quale mi riferico per collegare il comic la FK)
 6. aggiungere il campo user_id nel mass assignment (Comic::create([...])) un nuovo elemento chiave valore:

 'user_id' => Auth::user()->id 