<table class="table table-bordered">

    @foreach($dogs as $dog)
        <tr>
            <td>
                <table style="width: 100%">
                    <tr>
                        <td><b>{{ $dog->name }}</b></td>
                    </tr>
                    <tr>
                        <td class="center">
                            <img src="{{$dog->image_url}}" style="width: 150px"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="center">
                            Taken In:<br/> {{ date('m/d/Y h:i', strtotime($dog->created_at)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button
                                class="float-right btn btn-sm btn-danger"
                                onclick="euthanize({{ $dog->id }}, '{{ $dog->name }}')"
                            >Euthanize
                            </button>
                            <button
                                class="btn btn-sm btn-primary"
                                onclick="modelWindowShow('on-board', {{ $dog->id }})"
                            >On-Board
                            </button>

                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    @endforeach
</table>
