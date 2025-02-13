<div class="container row">
    @foreach($dogs as $dog)
        <div class="card col-3" style="width: 300px; margin: 30px">
            <img class="card-img-top" src="{{ $dog->image_url }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $dog->name }}</h5>
                @foreach(['age', 'sex', 'temperament', 'cuteness', 'size'] as $trait)
                    <span class="badge badge-pill badge-primary">{{ ucfirst($trait) }}: {{ $dog->{$trait} }}</span>
                @endforeach
            </div>
            <div>
                <button
                    class="float-left btn btn-sm btn-primary"
                    onclick="adopt({{ $dog->id }}, '{{ $dog->name }}')"
                >Adopt
                </button>

                <button
                    class="float-right btn btn-sm btn-danger"
                    onclick="euthanize({{ $dog->id }}, '{{ $dog->name }}')"
                >Euthanize
                </button>
            </div>
        </div>
    @endforeach
</div>
