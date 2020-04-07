@php
/** @var \App\Models\BloCategory $item */
/** @var \App\Models\BloCategory $categoryList*/
@endphp

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Main Data</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                        <input name="title" value="{{ $item->title }}"
                        id="title" 
                        type="text"
                        class="form-control"
                        minlength="3"
                        required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентифікатор</label>
                        <input name="slug" value="{{ $item->slug }}"
                        id="slug" 
                        type="text"
                        class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="parent_id">Батьківська категорія</label>
                        <select name="parent_id" 
                        id="parent_id" 
                        class="form-control"
                        placeholder="Вибиріть категорію"
                        required>
                            @foreach ($categoryList as $categoryOption)
                                <option value="{{ $categoryOption->id }}"
                                    @if ($categoryOption->id == $item->parent_id) selected @endif>
                                    {{ $categoryOption->id }}. {{ $categoryOption->title }}
                                </option>                            
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                        <label for="description">Описание</label>

                        <textarea name="description" style="resize: none"  
                        id="description" 
                        class="form-control"
                        rows="4">{{ $item->slug }}</textarea>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

