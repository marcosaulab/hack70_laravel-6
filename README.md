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


# Autenticazione


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

 # Relazione 1 a N

 1. tabella users (ce l'abbiamo già)
 2. tabella comics (esiste? Se no la devo creare con la migration)
 3. fare la migration per aggiungere la foreign key user_id nella tabella comics
 4. crare le funzioni di relazione all'interno dei modelli User e Comic
 5. aggiungere nei fillable del modello Comic il campo user_id (ovvero il campo al quale mi riferico per collegare il comic, la FK)
 6. aggiungere il campo user_id nel mass assignment (Comic::create([...])) un nuovo elemento chiave valore:

 'user_id' => Auth::user()->id 


 1 Category - Comic N

 - Un Comic può avere associata 1 sola Categoria: quando creo un comic posso associare una sola categoria

 - Una Categoria può essere associata a più Comic: la stessa categoria (ad esempio "Azione") può essere 
   associata a più Comics

1. Creare migration, model e controller: php artisan make:model Category -mcr (la r crea il controller con tutti i metodi 
   già preimpostati: index, show, create, store, update, edit, delete)

2. Definire i campi nella migration della tabella categories, $fillable nel model Category

3. Abbiamo creato un Seeder per le categorie nel file DatabaseSeeder.php: vogliamo che quando eseguo un
   fresh del database abbia la possibilità anche di compilare alcune tabelle (users e categories) con alcuni
   dati preimpostati: php artisan migrate:fresh --seed

4. Creare la migration per aggiungere il campo category_id alla tabella comics usando la convenzione di Laravel:
   php artisan make:migration add_category_id_column_to_comics_table 

5. Dobbiamo aggiungere nei fillable di Comic -> category_id

6. Istruire i models con le funzioni di relazione

7. Creiamo una select/option nel form di create del Comic

8. Passiamo i dati del nuovo campo category_id al controller nel metodo store (la rotta che scatta quando 
   clicchiamo sul pulsante di submit) e inserisco il nuovo campo category_id all'interno della Comic::create([...])

9. All'interno della card uso la funzione di relazione per richiamare la categoria appartenente a quel comic: 
   $comic->category->name


# Relazioni Many To Many N a N

- Per collegare N record di una tabella con N record di un’altra tabella crea una tabella intermedia: la   cosidetta TABELLA PIVOT

- Con un inserimento all’interno della tabella pivot (tabella intermedia) io sancisco l’esistenza di una relazione tra le tabelle coinvolte

- N:B: per creare una relazione N a N tra 2 tabelle devo inserire una o più righe all'interno della tabella pivot


## Come si realizza una relazione N a N in Laravel

comics / formats ('paper', 'eBook', 'audioBook')

1. Assicurarsi di avere entrambe le tabelle coinvolte (comics / formats)

2. Se non ho una o entrambe le tabelle cosa devo fare? Creare il modello, la migration e il controller php artisan make:model Format -mcr

3. Creare la tabella intermedia (tabella pivot) (creare la migration per la tabella) con le fk di entrambi i model (usando le convenzioni di Laravel):
    - parola chiave create
    - nomi delle tabelle coinvolte con i nomi al singolare (riferimento ai model) in ordine alfabetico
    - php artisan make:migration create_comic_format_table
    - definire i campi all'interno della tabella pivot comic_format

4. Inserire le funzioni di relazione all'interno dei model

5. Permettere all'utente di associare N formats (formati) ad un comic quando creo un comic (nella vista)

6. Associamo i comics ai formats selezionati (nel controller)
