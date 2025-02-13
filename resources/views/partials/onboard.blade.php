<form id="onboardForm" onsubmit="return false">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $dog->id }}"/>
    <img src="{{ $dog->image_url }}" style="
            max-height: 150px"/>
    <table class="table-bordered table">

        <table>
            <tr>
                <td class="font-weight-bold">Name</td>
                <td><input name="name" type="text" class="form-control" value="{{ $dog->name }}"/></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Breed</td>
                <td><input name="breed" type="text" class="form-control" value="{{ $dog->breed }}"/></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Age</td>
                <td><input name="age" type="text" class="form-control" value="{{ $dog->age }}"/></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Sex</td>
                <td>
                    <select name="sex">
                        @foreach(array_merge([''], $sexes) as $sex)
                            <option
                                value="{{ $sex }}"

                                    <?= $sex == $dog->sex ? 'selected' : ''; ?>
                            >{{ $sex }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Size</td>
                <td>
                    <select name="size">
                        @foreach(array_merge([''], $sizes) as $size)
                            <option
                                value="{{ $size }}"

                                    <?= $size == $dog->size ? 'selected' : ''; ?>
                            >{{ $size }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Temperament</td>
                <td>
                    <select name="temperament">
                        @foreach(array_merge([''], $temperaments) as $temperament)
                            <option
                                value="{{ $temperament }}"

                                    <?= $temperament == $dog->temperament ? 'selected' : ''; ?>
                            >{{ $temperament }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Cuteness</td>
                <td>
                    <select name="cuteness">
                        @foreach(array_merge([''], $cutenesses) as $cuteness)
                            <option
                                value="{{ $cuteness }}"

                                    <?= $cuteness == $dog->cuteness ? 'selected' : ''; ?>
                            >{{ $cuteness }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
</form>
