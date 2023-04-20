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