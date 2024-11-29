<?php
//  Open-Source License Information:
/*
    The MIT License (MIT)

    Copyright (c) 2020-2024 Ozar (https://www.ozar.net/)

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

    <title><?= isset($pageTitle) ? $pageTitle . ' | ' : '' ?><?= config('Basics')->appName ?></title>

    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/bs5/dashboard.css?v=' . (ENVIRONMENT == 'production' ? 1 : time())) ?>">

    <!-- flag-icon-css -->
    <link rel="stylesheet" href="<?= base_url('assets/flag-icon-css/css/flag-icon.min.css') ?>">

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
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
    </svg>
    <div id="pageWrapper" class="d-flex">
        <!-- BEGIN Left Sidebar -->
        <?= $this->include('Themes/Bootstrap5/AdminLayout/_leftSidebar') ?>
        <!-- END Left Sidebar -->

        <div id="contentWrapper">
            <!-- BEGIN Navbar -->
            <?= $this->include('Themes/Bootstrap5/AdminLayout/_defaultHeaderNav') ?>
            <!-- END Navbar -->

            <div class="container-fluid">
                <div class="row">
                    <main class="ms-sm-auto px-md-4" role="main">

                        <!-- Content Header (Page header) -->
                        <?= $this->include('Themes/Bootstrap5/AdminLayout/_contentHeader') ?>
                        <!-- /.content-header -->

                        <!-- Main content -->
                        <?= $this->renderSection('content') ?>
                        <!-- End main content -->
                        <noscript>
                            <div class="alert alert-warning mt-3" role="alert">
                                <svg class="bi mt-1 me-3 float-start" width="24" height="24" role="img" aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <h4><?= lang('Basic.global.Warning') ?></h4>
                                    <?= lang('Basic.global.jsNeedMsg') ?>
                                </div>
                            </div>
                        </noscript>
                    </main>
                </div><!-- /.row -->
                <div class="row">
                    <footer class="main-footer mt-4 py-3 bg-light">
                        <div class="container">
                            <!-- Default to the left -->
                            <strong>&copy; <?= date('Y') ?> <a href="<?= config('Basics')->theme['footer']['orglink'] ?>">
                                    <?= config('Basics')->theme['footer']['organization'] ?></a>.</strong> <?= lang('Basic.global.allRightsReserved') ?>
                            <!-- To the right -->
                            <div class="float-end d-none d-sm-inline">
                                <?= config('Basics')->appName ?>
                            </div>
                        </div>
                    </footer>
                </div><!-- /.row -->
            </div><!--//.container-fluid -->
        </div><!--//#contentWrapper -->
    </div><!--//#pageWrapper -->

    <?= $this->renderSection('footerAdditions') ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?= $this->renderSection('additionalExternalJs') ?>

    <script type="text/javascript">
        var theTable;
        var <?= csrf_token() ?? 'token' ?>v = '<?= csrf_hash() ?>';

        const body = document.getElementsByTagName('body')[0];
        const appNameCc = '<?= convertToCamelCase(config('Basics')->appName) ?>';
        const appDarkModeDataKey = appNameCc + "Data";
        const darkModeTogglerBtn = document.getElementById("darkIcon");
        const footer = document.querySelector('.main-footer');

        function updateTableTheme(isDark) {
            // Find all tables with DataTables initialized
            const tables = document.querySelectorAll('.table');
            tables.forEach(table => {
                if (isDark) {
                    table.setAttribute('data-bs-theme', 'dark');
                } else {
                    table.removeAttribute('data-bs-theme');
                }
            });
        }

        function updateDarkThemeElements(isDark) {
            const theMode = isDark ? 'dark' : 'light';
            const oppositeMode = isDark ? 'light' : 'dark';
            // Handle cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.setAttribute('data-bs-theme', theMode);
            });

            const modal = document.getElementById('confirm2delete');
            if (modal != null) {
                modal.setAttribute('data-bs-theme', theMode);
            }
            document.querySelectorAll('div.modal').forEach(input => {
                input.setAttribute('data-bs-theme', theMode);
            });

            document.querySelectorAll('input[type="range"]').forEach(input => {
                input.setAttribute('data-bs-theme', oppositeMode);
            });

        }

        function toggleDark() {
            body.classList.toggle("dark-mode");

            // Toggle footer classes
            footer.classList.toggle("bg-light");
            footer.classList.toggle("bg-gray");

            let dark = JSON.parse(localStorage.getItem(appDarkModeDataKey));
            if (dark) {
                localStorage.setItem(appDarkModeDataKey, JSON.stringify(false));
                updateDarkThemeElements(false);
            } else {
                localStorage.setItem(appDarkModeDataKey, JSON.stringify(true));
                updateDarkThemeElements(true);
            }

            // Toggle Bootstrap Icons
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

        function isInViewport(element) {
            // Check if element exists
            if (!element) return false;

            const rect = element.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;
            const windowWidth = window.innerWidth || document.documentElement.clientWidth;

            // Consider element visible if it's partially in viewport
            // We can adjust the visibility threshold (currently set to 0 - any part visible counts)
            const verticalVisible = rect.top < windowHeight && rect.bottom >= 0;
            const horizontalVisible = rect.left < windowWidth && rect.right >= 0;

            return verticalVisible && horizontalVisible;
        }

        document.addEventListener('DOMContentLoaded', function() {

            function adjustSidebar4ContentWrapper() {
                if ($('#sidebar').hasClass('d-none') && $(window).width() <= 768) {
                    $('#contentWrapper').addClass('full-width');
                } else {
                    if (!$('#sidebar').hasClass('inactive')) {
                        $('#contentWrapper').removeClass('full-width');
                    }
                }
            }

            adjustSidebar4ContentWrapper();

            $('#sidebarCollapse').on('click', function() {

                if ($('#sidebar').hasClass('d-none') && $(window).width() <= 768) {
                    $('#sidebar').removeClass('d-none d-sm-none d-md-block');

                    $('#contentWrapper').removeClass('full-width');
                } else {
                    $('#sidebar').toggleClass('inactive');
                    $('#contentWrapper').toggleClass('full-width');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                }
                if (theTable != null && theTable.columns !== undefined) {
                    setTimeout(function() {
                        theTable.columns.adjust().draw();
                    }, 600);
                }
            });

            $(window).resize(function() {
                adjustSidebar4ContentWrapper();
            });

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

                    // Update footer for dark mode
                    footer.classList.remove("bg-light");
                    footer.classList.add("bg-gray");

                    // Update icon for dark mode
                    darkModeTogglerBtn.classList.remove('bi-moon');
                    darkModeTogglerBtn.classList.add('bi-sun');

                    // Update table theme
                    updateDarkThemeElements(true);
                }
            })();

            <?= $this->renderSection('additionalInlineJs') ?>

        });
    </script>

    <script>
        function copyLink(url) {
            // Create a temporary input field to copy the URL
            var tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = url;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Show feedback message
            var feedback = document.getElementById('copy-feedback');
            feedback.style.display = 'block';

            // Hide feedback message after 2 seconds
            setTimeout(function() {
                feedback.style.display = 'none';
            }, 2000);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the phone number input field
            const phoneInput = document.querySelector("#phoneNumber");

            // Regular expression to match phone numbers with a country code (starts with + followed by digits)
            const countryCodeRegex = /^\+(\d{1,3})\d*/;

            // Listen for input or form submission
            phoneInput.addEventListener("blur", function() {
                let phoneNumber = phoneInput.value.trim();

                // Check if the phone number starts with a country code
                if (!countryCodeRegex.test(phoneNumber)) {
                    // Show a warning message if no country code is found
                    alert("Country code not found. Please add a valid country code.");
                }
            });

            // Optional: You can also do this check on form submission
            const form = document.querySelector("form"); // Replace with your form's selector
            form.addEventListener("submit", function(event) {
                let phoneNumber = phoneInput.value.trim();

                if (!countryCodeRegex.test(phoneNumber)) {
                    event.preventDefault(); // Prevent form submission if country code is missing
                    alert("Please include a valid country code.");
                }
            });
        });
    </script>

</body>

</html>