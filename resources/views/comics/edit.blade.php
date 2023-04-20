<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Modifica Comic</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

           <x-comic-edit-form 
                :comic="$comic"
            />

        </div>
    </div>


</x-layout>