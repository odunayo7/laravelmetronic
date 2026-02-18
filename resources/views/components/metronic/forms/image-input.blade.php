@props([
    'avatar' => '/assets/media/svg/avatars/blank.svg', // Default image or current image
    'name' => 'avatar'
])

<!--begin::Image input-->
<div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
    <!--begin::Image preview wrapper-->
    <div class="image-input-wrapper w-125px h-125px" @if($avatar && $avatar !== '/assets/media/svg/avatars/blank.svg') style="background-image: url({{ $avatar }})" @endif></div>
    <!--end::Image preview wrapper-->

    <!--begin::Edit button-->
    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="change"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Change avatar">
        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

        <!--begin::Inputs-->
        <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg" />
        <input type="hidden" name="{{ $name }}_remove" />
        <!--end::Inputs-->
    </label>
    <!--end::Edit button-->

    <!--begin::Cancel button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="cancel"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Cancel avatar">
        <i class="ki-duotone ki-cross fs-3"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Cancel button-->

    <!--begin::Remove button-->
    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
       data-kt-image-input-action="remove"
       data-bs-toggle="tooltip"
       data-bs-dismiss="click"
       title="Remove avatar">
        <i class="ki-duotone ki-cross fs-3"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Remove button-->
</div>
<!--end::Image input-->
