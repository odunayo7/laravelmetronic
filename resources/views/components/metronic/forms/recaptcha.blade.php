@props([
    'sitekey' => ''
])

<div class="g-recaptcha" data-sitekey="{{ $sitekey }}"></div>
<script src="https://www.google.com/recaptcha/api.js"></script>
