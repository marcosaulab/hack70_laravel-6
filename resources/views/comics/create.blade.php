<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Aggiungi un nuovo Comic</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">
                
            <x-comic-form 
                :categories="$categories" 
                :formats="$formats"
            />

        </div>
    </div>


</x-layout>