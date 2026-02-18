@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" id="name" value="{{ old('name', $product->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" id="description">{{ old('description', $product->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.description_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2" for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                    name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.price_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="categories">{{ trans('cruds.product.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control form-control-solid select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                    name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.category_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="tags">{{ trans('cruds.product.fields.tag') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all"
                        style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all"
                        style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control form-control-solid select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}"
                    name="tags[]" id="tags" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $product->tags->contains($id)) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.tag_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.product.fields.photo_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </x-metronic.card>



@endsection

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($product) && $product->photo)
                    var file = {!! json_encode($product->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
        },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>
@endsection