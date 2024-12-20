<!-- Push section css -->
<?= $this->section('css') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        /* for dark-mode compatibility */

        :root {
            --bs-border-width: 1px;
            --bs-border-color: gray;
            --bs-link-hover-color: blue;
            --bs-light-bg-subtle: #8bb4dd;
            --bs-dark-bg-subtle: darkgray;
        }

        body .select2-container--bootstrap-5 .select2-selection {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            border: var(--bs-border-width) solid var(--bs-border-color);
        }

        body
        .select2-container--bootstrap-5.select2-container--focus
        .select2-selection,
        body
        .select2-container--bootstrap-5.select2-container--open
        .select2-selection {
            border-color: var(--bs-link-hover-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        body
        .select2-container--bootstrap-5
        .select2-selection--multiple
        .select2-selection__clear,
        body
        .select2-container--bootstrap-5
        .select2-selection--single
        .select2-selection__clear {
            background: transparent
            url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23676a6d'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e")
            50%/0.75rem auto no-repeat;
        }
        body
        .select2-container--bootstrap-5
        .select2-selection--multiple
        .select2-selection__clear:hover,
        body
        .select2-container--bootstrap-5
        .select2-selection--single
        .select2-selection__clear:hover {
            background: transparent
            url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e")
            50%/0.75rem auto no-repeat;
        }
        body .select2-container--bootstrap-5 .select2-dropdown {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            border-color: var(--bs-link-hover-color);
        }

        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-search
        .select2-search__field {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: var(--bs-border-width) solid var(--bs-border-color);
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-search
        .select2-search__field:focus {
            border-color: var(--bs-link-hover-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option.select2-results__message {
            color: #6c757d;
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option.select2-results__option--highlighted {
            color: var(--bs-body-color);
            background-color: var(--bs-light-bg-subtle) !important;
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option.select2-results__option--selected,
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option[aria-selected="true"]:not(
        .select2-results__option--highlighted
    ) {
            color: var(--bs-body-color);
            background-color: var(--bs-dark-bg-subtle);
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option.select2-results__option--disabled,
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option[aria-disabled="true"] {
            color: #6c757d;
        }
        body
        .select2-container--bootstrap-5
        .select2-dropdown
        .select2-results__options
        .select2-results__option[role="group"]
        .select2-results__group {
            color: #6c757d;
        }
        body
        .select2-container--bootstrap-5
        .select2-selection--single
        .select2-selection__rendered {
            color: var(--bs-body-color);
        }
        body
        .select2-container--bootstrap-5
        .select2-selection--single
        .select2-selection__rendered
        .select2-selection__placeholder {
            color: #6c757d;
        }
        body
        .select2-container--bootstrap-5
        .select2-selection--multiple
        .select2-selection__rendered
        .select2-selection__choice {
            color: var(--bs-body-color);
            border: var(--bs-border-width) solid var(--bs-border-color);
        }

        body
        .select2-container--bootstrap-5.select2-container--disabled
        .select2-selection,
        body
        .select2-container--bootstrap-5.select2-container--disabled.select2-container--focus
        .select2-selection {
            color: #6c757d;
            background-color: var(--bs-light-bg-subtle);
            border-color: var(--bs-dark-bg-subtle);
        }
        .is-valid + body .select2-container--bootstrap-5 .select2-selection,
        .was-validated
        select:valid
        + body
        .select2-container--bootstrap-5
        .select2-selection {
            border-color: #198754;
        }
        .is-valid
        + body
        .select2-container--bootstrap-5.select2-container--focus
        .select2-selection,
        .is-valid
        + body
        .select2-container--bootstrap-5.select2-container--open
        .select2-selection,
        .was-validated
        select:valid
        + body
        .select2-container--bootstrap-5.select2-container--focus
        .select2-selection,
        .was-validated
        select:valid
        + body
        .select2-container--bootstrap-5.select2-container--open
        .select2-selection {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
        .is-invalid + body .select2-container--bootstrap-5 .select2-selection,
        .was-validated
        select:invalid
        + body
        .select2-container--bootstrap-5
        .select2-selection {
            border-color: #dc3545;
        }
        .is-invalid
        + body
        .select2-container--bootstrap-5.select2-container--focus
        .select2-selection,
        .is-invalid
        + body
        .select2-container--bootstrap-5.select2-container--open
        .select2-selection,
        .was-validated
        select:invalid
        + body
        .select2-container--bootstrap-5.select2-container--focus
        .select2-selection,
        .was-validated
        select:invalid
        + body
        .select2-container--bootstrap-5.select2-container--open
        .select2-selection {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
    </style>

<?= $this->endSection() ?>

<!-- Push section js -->
<?= $this->section('additionalExternalJs') ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<?= $this->endSection() ?>


<?= $this->section('additionalInlineJs') ?>
    
        $('.select2bs').select2({
            theme: "bootstrap-5",
            allowClear: false,
        });
       
<?= $this->endSection() ?>