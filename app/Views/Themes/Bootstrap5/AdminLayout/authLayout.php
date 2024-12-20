<?php helper('go_common');
//  Open-Source License Information:
/*
    The MIT License (MIT)

    Copyright (c) 2020 Ozar (https://www.ozar.net/)

    Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
    INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
    IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
    WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/
?>
<!DOCTYPE html>
<html lang="<?= config('App')->defaultLocale ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>">
    <meta http-equiv="refresh" content="<?= config('Security')->expires ?>">

    <title><?= isset($pageTitle) ? $pageTitle . ' | ' : '' ?><?= config('Basics')->appName ?></title>

    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= base_url('assets/bs5/signin.css?v=' . (ENVIRONMENT != 'PRODUCTION' ? time() : '1')) ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Render additional css -->
    <?= $this->renderSection('css') ?>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>

        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <div class="position-fixed top-0 end-0 p-3">
        <a class="nav-link" href="#" role="button">
            <i id="darkIcon" class="bi bi-moon fs-4"></i>
        </a>
    </div>

    <main class="form-signin">

        <?= $this->renderSection('content') ?>

        <p class="mt-5 mb-3 text-muted text-center" style="font-size: small;">
            &copy; <?= date('Y') ?> <a href="<?= config('Basics')->theme['footer']['orglink'] ?>">
                <?= config('Basics')->theme['footer']['organization'] ?></a>. All rights reserved.
            <br>
            <?= config('Basics')->appName ?>
        </p>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>

    <?= $this->renderSection('additionalExternalJs') ?>

    <script type="text/javascript">
        var <?= csrf_token() ?? 'token' ?>v = '<?= csrf_hash() ?>';

        const body = document.getElementsByTagName('body')[0];
        const appNameCc = '<?= convertToCamelCase(config('Basics')->appName) ?>';
        const appDarkModeDataKey = appNameCc + "Data";
        const darkModeTogglerBtn = document.getElementById("darkIcon");

        function toggleDark() {
            body.classList.toggle("dark-mode");
            let dark = JSON.parse(localStorage.getItem(appDarkModeDataKey));
            if (dark) {
                localStorage.setItem(appDarkModeDataKey, JSON.stringify(false));
            } else {
                localStorage.setItem(appDarkModeDataKey, JSON.stringify(true));
            }
            darkModeTogglerBtn.classList.toggle("bi-moon");
            darkModeTogglerBtn.classList.toggle("bi-sun");
        }


        function yeniden(andac = null) {
            if (andac == null) {
                andac = <?= csrf_token() ?>v;
            } else {
                <?= csrf_token() ?>v = andac;
            }
            $('input[name="<?= csrf_token() ?>"]').val(andac);
            $('meta[name="<?= config('Security')->tokenName ?>"]').attr('content', andac)
            $.ajaxSetup({
                headers: {
                    '<?= config('Security')->headerName ?>': andac,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                <?= csrf_token() ?>: andac
            });
        }

        document.addEventListener('DOMContentLoaded', function() {

            $('#darkIcon').on('click', function(event) {
                toggleDark();
            });

            // Load dark mode preference
            (function() {
                let dark = JSON.parse(localStorage.getItem(appDarkModeDataKey));
                if (dark === null) {
                    localStorage.setItem(appDarkModeDataKey, JSON.stringify(false));
                } else if (dark === true) {
                    const element = document.getElementsByTagName("body")[0];
                    if (!element.classList.contains('dark-mode')) {
                        element.classList.add('dark-mode');
                    }
                    darkModeTogglerBtn.classList.remove('bi-moon');
                    darkModeTogglerBtn.classList.add('bi-sun');
                }
            })();

            <?= $this->renderSection('additionalInlineJs') ?>
        });
    </script>

</body>

</html>