@extends('layouts.admin')
@section('content')

    <x-metronic.card flush="true" title="{{ trans('global.edit') }} {{ trans('cruds.crmDocument.title_singular') }}">
        <form method="POST" action="{{ route("admin.crm-documents.update", [$crmDocument->id]) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="customer_id">{{ trans('cruds.crmDocument.fields.customer') }}</label>
                <select class="form-control form-control-solid select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}"
                    name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $crmDocument->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmDocument.fields.customer_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2"
                    for="document_file">{{ trans('cruds.crmDocument.fields.document_file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('document_file') ? 'is-invalid' : '' }}"
                    id="document_file-dropzone">
                </div>
                @if($errors->has('document_file'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document_file') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmDocument.fields.document_file_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2" for="name">{{ trans('cruds.crmDocument.fields.name') }}</label>
                <input class="form-control form-control-solid {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" id="name" value="{{ old('name', $crmDocument->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmDocument.fields.name_helper') }}</div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2"
                    for="description">{{ trans('cruds.crmDocument.fields.description') }}</label>
                <textarea class="form-control form-control-solid {{ $errors->has('description') ? 'is-invalid' : '' }}"
                    name="description" id="description">{{ old('description', $crmDocument->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <div class="text-muted fs-7">{{ trans('cruds.crmDocument.fields.description_helper') }}</div>
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
        Dropzone.options.documentFileDropzone = {
            url: '{{ route('admin.crm-documents.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function (file, response) {
                $('form').find('input[name="document_file"]').remove()
                $('form').append('<input type="hidden" name="document_file" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="document_file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($crmDocument) && $crmDocument->document_file)
                    var file = {!! json_encode($crmDocument->document_file) !!}
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document_file" value="' + file.file_name + '">')
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